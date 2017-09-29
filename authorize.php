<?php
require_once 'validate.php';
require_once 'med-DAL.php';

class Authorization
{
    private $validate;
    private $dal;

    public function __construct()
    {
        $this->dal = new MedDB();
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
            $userdata = $this->dal->GetUserById($id);
            // echo 'userdata[\'hash\'] - '.$userdata['hash'].' == hash - '.$hash.'<br/>';
            if ($userdata['hash'] == $hash && $userdata['user_category'] == $user_category) {
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

    private function GetIsLogin($login)
    {
        $login = $this->validate->FilterStringOnHtmlSql($login);
        if ($this->validate->ValidIntegerString($login)) {
            return $this->dal->FindIdLogin($login);
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
        $id = $this->GetIsLogin($login);
        if ($id < 0) {
            $id = $this->dal->GetLastLoginId(); // проверить в DAL SELECT id FROM med_users ORDER BY id DESC LIMIT 1
            
            $passwordMd5 = md5(md5(trim($password)));
            $hash = md5($this->GenerateCode(10));
            
            $this->dal->SaveUser($id, $login, $passwordmd5, $hash, $user_category);
            $arrSave = array($id, $hash);
            return $arrSave;
        }
        return array(-1);
    }
}
?>
