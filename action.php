<?php
session_start();
require_once 'med-BAL.php';
require_once 'validate.php';
require_once 'authorize.php';

class HandlingData
{

    private $arrHoliday = array(
        'none',
        'monday',
        'tuesday',
        'wednesday',
        'thursday',
        'friday',
        'saturday',
        'sunday'
    );

    private $timeWork = array(
        'Start',
        'End'
    );

    private $controller;
    private $validateData;

    function __construct()
    {        
        $this->controller = new Controller();
        $this->validateData = new ValidateData();
    }

    public function SetError($value, $case)
    {
        switch ($case) {
            case 'em':
                $_SESSION[$value . '_error'] = 'empty';
                break;
            
            case 'notCh':
                $_SESSION[$value . '_error'] = 'not_Chosen';
                break;
            
            case 'notVStr':
                $_SESSION[$value . '_error'] = 'not_Validate_String';
                break;
            
            case 'notV':
                $_SESSION[$value . '_error'] = 'not_Valide';
                break;
            
            case 'notUL':
                $_SESSION[$value . '_error'] = 'not_Unique_Login';
                break;
                
            case 'notSafe':
                $_SESSION[$value . '_error'] = 'not_Safe';
                break;
                
            case 'unset':
                unset($_SESSION[$value . '_error']);
                break;
            
            // default:
            // # code...
            // break;
        }
    }

    private function IsFillField()
    {
        $flag = true;
        
        // Тип учереждения
        // if (!isset($_POST['typeCompany']) && empty($_POST['typeCompany']))
        if (! $validateData->IsExist($_POST['typeCompany'])) {
            $this->SetError('typeCompany', 'em');
            $flag = false;
        }
        
        // Направления/услуги
        $tempFlagServices = false;
        for ($i = 1; $i <= count($arrayNamesServices); $i ++) {
            // if (isset($_POST[$i.'-service']) && !empty($_POST[$i.'-service']))
            if ($validateData->IsExist($_POST[$i . '-service'])) {
                $tempFlagServices = true;
            }
        }
        
        if (! $tempFlagServices) {
            $this->SetError('service', 'notCh');
            $flag = false;
        }
        
        // Страховые компании
        $tempFlagInsurance = false;
        for ($i = 1; $i <= count($this->controller->GetInsuranceCompany()); $i ++) {
            // if (isset($_POST[$i.'-insurance']) && !empty($_POST[$i.'-insurance']))
            if ($validateData->IsExist($_POST[$i . '-insurance'])) {
                $tempFlagInsurance = true;
            }
        }
        
        if (! $tempFlagInsurance) {
            $this->SetError('insurance', 'notCh');
            $flag = false;
        }
        
        // Название
        // if (!isset($_POST['nameCompany']) || empty($_POST['nameCompany']))
        if (! $validateData->IsExist($_POST['nameCompany'])) {
            $this->SetError('nameCompany', 'em');
            $flag = false;
        }
        
        // Область
        if (! $validateData->IsExist($_POST['region'])) {
            $this->SetError('region', 'em');
            $flag = false;
        }
        
        // Город
        if (! $validateData->IsExist($_POST['town'])) {
            $this->SetError('town', 'em');
            $flag = false;
        }
        
        // Район
        if (! $validateData->IsExist($_POST['district'])) {
            $this->SetError('district', 'em');
            $flag = false;
        }
        
        // Улица
        if (! $validateData->IsExist($_POST['street'])) {
            $this->SetError('street', 'em');
            $flag = false;
        }
        
        // Дом
        if (! $validateData->IsExist($_POST['home'])) {
            $this->SetError('home', 'em');
            // $flag = false;
        }
        
        // // Телефон
        // $tempPhone = false;
        // for ($i = 1; $i <= 10; $i ++) {
        // if ($validateData->IsExist($_POST[$i . '-phone'])) {
        // $tempPhone = true;
        // }
        // }
        
        // if (! $tempPhone) {
        // $this->SetError('phone'.$i, 'em');
        // // $flag = false;
        // }
        
        // Время работы - заранее установленно
        foreach ($this->timeWork as $item => $period) {
            foreach ($this->arrHoliday as $number => $day) {
                if (! $this->validateData->IsExist($_POST[$day . $period])) {
                    $this->SetError('$day . $period', 'em');
                    $flag = false;
                }
            }
        }
        
        // Выходной
        if (! $validateData->IsExist($_POST['none']) || ! $validateData->IsExist($_POST['monday']) || ! $validateData->IsExist($_POST['tuesday']) || ! $validateData->IsExist($_POST['wednesday']) || ! $validateData->IsExist($_POST['thursday']) || ! $validateData->IsExist($_POST['saturday']) || ! $validateData->IsExist($_POST['sunday'])) {
            $this->SetError('holiday', 'em');
        }
    }

    private function IsValidFild()
    {
        $flag = true;
        
        // Тип учереждения
        if (($_POST['typeCompany']) == 0) {
            $this->SetError('typeCompany', 'notCh');
            // $_POST['typeCompany_error']='notChosen';
            $flag = false;
        }
        
        // Направления/услуги - чекбоксы
        $itemServiceInput = 1;
        foreach ($arrayNamesServices as $key => $value) {
            if ($this->validateData->IsExist($_POST[$itemServiceInput . '-service'])) {
                $_POST[$itemServiceInput . '-service'] = $this->validateData->FilterStringOnHtmlSql($_POST[$itemServiceInput . '-service']);
                if (! $this->validateData->ValidInteger($_POST[$itemServiceInput . '-service'])) {
                    $this->SetError($itemServiceInput . '-service', 'notV');
                    $flag = false;
                }
            }
        }
        
        // Страховые компании - чекбоксы
        $itemInsuranceInput = 1;
        foreach ($arrayNamesServices as $key => $value) {
            if ($this->validateData->IsExist($_POST[$itemInsuranceInput . '-insurance'])) {
                $_POST[$itemInsuranceInput . '-insurance'] = $this->validateData->FilterStringOnHtmlSql($_POST[$itemInsuranceInput . '-insurance']);
                if (! $this->validateData->ValidInteger($_POST[$itemInsuranceInput . '-insurance'])) {
                    $this->SetError($itemInsuranceInput . '-insurance', 'notV');
                    $flag = false;
                }
            }
        }
        
        // Название
        $_POST['nameCompany'] = $this->validateData->FilterStringOnHtmlSql($_POST['nameCompany']);
        if (! $this->validateData->ValidIntegerString($_POST['nameCompany'])) {
            $this->SetError('nameCompany', 'notVStr');
        }
        
        $_POST['region'] = $this->validateData->FilterStringOnHtmlSql($_POST['region']);
        if (! $this->validateData->ValidString($_POST['region'])) {
            $this->SetError('region', 'notVStr');
        }
        
        $_POST['town'] = $this->validateData->FilterStringOnHtmlSql($_POST['town']);
        if (! $this->validateData->ValidString($_POST['town'])) {
            $this->SetError('town', 'notVStr');
        }
        
        $_POST['district'] = $this->validateData->FilterStringOnHtmlSql($_POST['district']);
        if (! $this->validateData->ValidString($_POST['district'])) {
            $this->SetError('district', 'notVStr');
        }
        
        $_POST['street'] = $this->validateData->FilterStringOnHtmlSql($_POST['street']);
        if (! $this->validateData->ValidIntegerString($_POST['street'])) {
            $this->SetError('street', 'notVStr');
        }
        
        // необязательные параметры
        if ($validateData->IsExist($_POST['home'])) {
            $_POST['home'] = $this->validateData->FilterStringOnHtmlSql($_POST['home']);
            if (! $this->validateData->ValidInteger($_POST['home'])) {
                $this->SetError('home', 'notVStr');
            }
        }
        
        for ($i = 1; $i < 10; $i ++) {
            if ($validateData->IsExist($_POST[$i . '-phone'])) {
                $_POST[$i . '-phone'] = $this->validateData->FilterStringOnHtmlSql($_POST[$i . '-phone']);
                if (! $this->validateData->ValidInteger($_POST[$i . '-phone'])) {
                    $this->SetError($i . '-phone', 'notV');
                }
            }
        }
        
        // время работы
        foreach ($this->timeWork as $item => $period) {
            foreach ($this->arrHoliday as $number => $day) { //
                $_POST[$day . $period] = $this->validateData->FilterStringOnHtmlSql($_POST[$day . $period]);
                if (! $this->validateData->ValidIntegerString($_POST[$day . $period])) {
                    $this->SetError($day . $period, 'notV');
                    $flag = false;
                }
            }
        }
        
        // выходной
        foreach ($this->arrHoliday as $key => $value) {
            if ($this->validateData->IsExist($_POST[$value])) {
                $_POST[$value] = $this->validateData->FilterStringOnHtmlSql($_POST[$value]);
                if (! $this->validateData->ValidInteger($_POST[$value])) {
                    $this->SetError($value, 'notV');
                    $flag = false;
                }
            }
        }
    }

    public function SaveData()
    {
        if (! $this->IsFillField()) {
            // $_SESSION['session_errors'] = true;
            // $this->SaveIntoSessions();
            $this->controller->RedirectBack($_SERVER);
        }
        
        if (! $this->IsValidFild()) {
            // $_SESSION['session_errors'] = true;
            // $this->SaveIntoSessions();
            $this->controller->RedirectBack($_SERVER);
        }
        
        // после проверки данных сохранить в БД
        $isSave = $this->controller->Save($_POST);
        if ($isSave == - 1) {
            return false;
        }
        // $_SESSION['session_errors'] = false;
        return true;
    }

    public function Redirect()
    {
        $this->controller->RedirectBack($_SERVER);
    }

    public function RedirectKabinet()
    {
        $this->controller->RedirectKabinet();
    }

    public function RedirectError()
    {
        $this->controller->RedirectError();
    }

    // public function IsExistTwoData($param1, $param2) {
    // $notEmpty = true;
    // if(!$this->validateData->IsExist($param1)){
    // $this->SetError($param1, 'em');
    // $notEmpty = false;
    // }
    
    // if (!$this->validateData->IsExist($param1))
    // {
    // $this->SetError($param2, 'em');
    // $notEmpty = false;
    // }
    // return $notEmpty;
    // }
    public function IsLogin($login)
    {
        return $this->controller->IsLogin($login);
    }

    public function ValidataLoginPass($login, $password)
    {
        $valid = true;
        if (! $this->validateData->ValidIntegerString($login)) {
            $valid = false;
            $this->SetError($login, 'notVStr');
        }
        
        if (! $this->validateData->ValidIntegerString($password)) {
            $valid = false;
            $this->SetError($password, 'notVStr');
        }
        return $valid;
    }

    public function Authorize($login, $password, $check = false)
    {
        $arrLogPass = $this->controller->SaveLoginPassword($login, $password);
        if (count($arrLogPass) != 1) {
            $_SESSION['id'] = $arrLogPass[1];
            $_SESSION['hash'] = $arrLogPass[2];
            
            if ($check) {
                setcookie('id', $id, time() + 3600 * 24 * 3);
                setcookie('hash', $hash, time() + 3600 * 24 * 3);
            }
        }
    }

    public function IsAuthorized($id, $hash)
    {
        return $this->controller->IsAuthorized($id, $hash);
    }
}

$auth = new Authorization();
$bal = new Controller();

if ($auth->IsAuthorized('organization')) {
    echo "методы для организации";
    //если проходит проверку, то проверяются запросы
}
elseif ($auth->IsAuthorized('client')) {
    echo "методы для клиентов";
    //если проходит проверку, то проверяются запросы
}
elseif($_POST['submit'] == 'Авторизация') {
    $handling = new HandlingData();
    if ($auth->IsLogin($_POST['login'])) {        
        $handling->SetError('login', 'notUL');
        $bal->RedirectBack();
    }//тут понадобиться отслеживать организацию
    $handling->SetError('login', 'unset');
    $success = $auth->SaveUser($login, $password, $user_category);
    if ($success < 0) {       
        $handling->SetError('notSafe', 'notUL');
        $bal->RedirectBack();
    }
    $handling->SetError('notSafe', 'unset');
}
else {
    $bal->RedirectBack();
}

//тут будут выполнять методы после того как пройдут проверку авторизации
?>
