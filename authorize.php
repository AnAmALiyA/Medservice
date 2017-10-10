<?php
require_once 'validate.php';
require_once 'med-DAL.php';

class Authorization
{
    private $validate;
    private $bal;

    public function __construct()
    {
        $this->bal = new BAL();
        $this->validate = new ValidateData();
    }

    public function IsAuthorized($user_category)
    {
        $isAuthorized = false;
        
        if ($this->validate->IsExist($_SESSION['user_id']) && $this->validate->IsExist($_SESSION['user_hash'])) {
            // echo 'Проверка ChekSession()<br/>';
            $isAuthorized = $this->ChekSession($user_category);
        }
        
        if ($isAuthorized) {
            return $isAuthorized;
        }
        
        if ($this->validate->IsExist($_COOKIE['user_id']) && $this->validate->IsExist($_COOKIE['user_hash'])) {
            // echo 'Проверка ChekCookie()<br/>';
            $isAuthorized = $this->ChekCookie($user_category);
        }
        return $isAuthorized;
    }

    private function IsUserIdHash($id, $hash, $user_category)
    {
        $id = $this->validate->FilterStringOnHtmlSql($id);
        if ($this->validate->ValidInteger($id)) {
            $userData = $this->bal->GetUserById($id);
            // echo 'userdata[\'hash\'] - '.$userdata['hash'].' == hash - '.$hash.'<br/>';
            if ($userData['hash'] == $hash && $userData['user_category'] == $user_category) {
                return true;
            }
        }
        return false;
    }

    public function ChekSession($user_category)
    {
        return $this->IsUserIdHash($_SESSION['user_id'], $_SESSION['user_hash'], $user_category);
    }

    public function ChekCookie($user_category)
    {
        $isAuthorized = false;
        $isAuthorized = $this->IsUserIdHash($_COOKIE['user_id'], $_COOKIE['user_hash'], $user_category);
        if ($isAuthorized) {
            $this->SetCookie($_COOKIE['user_id'], $_COOKIE['user_hash']);
            $_SESSION['user_id'] = $_COOKIE['user_id'];
            $_SESSION['user_hash'] = $_COOKIE['user_hash'];
        }
        return $isAuthorized;
    }

    public function SetCookie($cookie_user_id, $cookie_user_hash)
    {
        setcookie('user_id', $cookie_user_id, time() + 3600 * 24 * 3);
        setcookie('user_hash', $cookie_user_hash, time() + 3600 * 24 * 3);
    }

    private function GenerateCode($length = 6)
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";
        $code = "";
        $clen = strlen($chars) - 1;
        while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0, $clen)];
        }
        return $code;
    }

    public function GetIsLogin($login)
    {
        $login = $this->validate->FilterStringOnHtmlSql($login);
        if ($this->validate->ValidIntegerString($login)) {
            return $this->bal->FindIdByLogin($login);
        }
    }
    
    public function IsLogin($login){
        if ($this->GetIsLogin($login) > 0) {
            return true;
        }
        return false;
    }

    public function SaveUser($login, $password, $user_category)
    {
        $id = $this->GetIsLogin($login, $passwordMd5);
        if ($id < 0) {
//             $id = $this->bal->GetLastLoginId(); // проверить в DAL SELECT id FROM med_users ORDER BY id DESC LIMIT 1
//             $id++;
            $passwordMd5 = md5(md5(trim($password)));
            $hash = md5($this->GenerateCode(10));
            
            $result = $this->bal->SaveUser($login, $passwordmd5, $hash, $user_category);
            echo $result;
            if ($result) {
                $userId = $this->dal->GetIdByLoginPassword($login, $passwordmd5);
                return array(userId, $hash);
            }
            return array(-1);
        }
        return array(-1);
    }
}
?>
