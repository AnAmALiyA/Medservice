<?php
session_start();
require_once 'med-BAL.php';
require_once 'validate.php';
require_once 'authorize.php';

$auth = new Authorization();
$bal = new BAL();
$handling = new HandlingData();

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

    private $bal;
    private $validateData;

    function __construct()
    {        
        $this->bal = new BAL();
        $this->validateData = new ValidateData();
    }

    public function SetError($stringError = null)
    {
        // в ответ пользователю
        $_SESSION['error'] = $stringError == null ? 'Ошибка.' : $stringError;
    }

    private function IsFillField()
    {        
        // Тип учереждения
        $_POST['typeCompany'] = $this->validateData->FilterStringOnHtmlSql($_POST['typeCompany']);
        if (!$validateData->IsExist($_POST['typeCompanyId'])) {
            $this->SetError('Присутствуют пустые поля');
            $bal->RedirectBack();
        }
        // Направления/услуги
        foreach ($_POST['arrayServices'] as $key => $value) {
            $_POST['arrayServices'][$key] = $this->validateData->FilterStringOnHtmlSql($value);
            if (!$validateData->IsExist($_POST['arrayServices'][$key])) {
                $this->SetError('Присутствуют пустые поля');
                $bal->RedirectBack();
            }
        }
        // Страховые компании
        foreach ($_POST['arrayInsuranceCompanes'] as $key => $value) {
            $_POST['arrayInsuranceCompanes'][$key] = $this->validateData->FilterStringOnHtmlSql($value);
            if (!$validateData->IsExist($_POST['arrayInsuranceCompanes'][$key])) {
                $this->SetError('Присутствуют пустые поля');
                $bal->RedirectBack();
            }
        }
        // Название
        $_POST['nameCompany'] = $this->validateData->FilterStringOnHtmlSql($_POST['nameCompany']);
        if (!$validateData->IsExist($_POST['nameCompany'])) {
            $this->SetError('Присутствуют пустые поля');
            $bal->RedirectBack();
        }
        // Область
        $_POST['region'] = $this->validateData->FilterStringOnHtmlSql($_POST['region']);
        if (!$validateData->IsExist($_POST['region'])) {
            $this->SetError('Присутствуют пустые поля');
            $bal->RedirectBack();
        }
        // Город
        $_POST['town'] = $this->validateData->FilterStringOnHtmlSql($_POST['town']);
        if (!$validateData->IsExist($_POST['town'])) {
            $this->SetError('Присутствуют пустые поля');
            $bal->RedirectBack();
        }
        // Район
        $_POST['district'] = $this->validateData->FilterStringOnHtmlSql($_POST['district']);
        if (!$validateData->IsExist($_POST['district'])) {
            $this->SetError('Присутствуют пустые поля');
            $bal->RedirectBack();
        }
        // Улица
        $_POST['street'] = $this->validateData->FilterStringOnHtmlSql($_POST['street']);
        if (!$validateData->IsExist($_POST['street'])) {
            $this->SetError('Присутствуют пустые поля');
            $bal->RedirectBack();
        }
    }

    private function IsValidFild()
    {
        // Тип учереждения
        if (!$validateData->ValidInteger($_POST['typeCompanyId'])) {
                $this->SetError('Не валидное поле.');
                $bal->RedirectBack();
            }
        // Направления/услуги - чекбоксы (ожидаю в поле только числа) тут прийдет ассоциативный array(1,2,3)
        foreach ($_POST['arrayServices'] as $key => $value){
            if (!$validateData->ValidInteger($_POST['arrayServices'][$key])) {
                $this->SetError('Не валидное поле.');
                $bal->RedirectBack();
            }
        }
        // Страховые компании - чекбоксы //тут прийдет array(1,2,3)
        $arrayInsuranceCompanesId = $_POST['arrayInsuranceCompanes'];
        for ($i = 0; $i < count($arrayInsuranceCompanesId); $i++){
            if (!$validateData->ValidInteger($arrayInsuranceCompanesId[$i])) {
                $this->SetError('Не валидное поле.');
                $bal->RedirectBack();
            }
        }
        // Название
        if (!$this->validateData->ValidIntegerString($_POST['nameCompany'])) {
            $this->SetError('Не валидное поле.');
            $bal->RedirectBack();
        }
        //область
        if (!$this->validateData->ValidString($_POST['region'])) {
            $this->SetError('Не валидное поле.');
            $bal->RedirectBack();
        }
        //город
        if (!$this->validateData->ValidString($_POST['town'])) {
            $this->SetError('Не валидное поле.');
            $bal->RedirectBack();
        }
        //район области
        if (! $this->validateData->ValidString($_POST['district'])) {
            $this->SetError('Не валидное поле.');
            $bal->RedirectBack();
        }
        //улица
        if (! $this->validateData->ValidIntegerString($_POST['street'])) {
            $this->SetError('Не валидное поле.');
            $bal->RedirectBack();
        }
        // необязательные параметры
        //дом
        if ($validateData->IsExist($_POST['home'])) {
            $_POST['home'] = $this->validateData->FilterStringOnHtmlSql($_POST['home']);
            if (!$this->validateData->ValidIntegerString($_POST['home'])) {
                $this->SetError('Не валидное поле.');
                $bal->RedirectBack();
            }
        }
        //телефоны
        if ($this->validateData->IsExist($_POST['arrayPhones'])) {
            foreach ($_POST['arrayPhones'] as $key => $value) {
                if (!$this->validateData->IsExist($value) && !$this->validateData->ValidInteger($value)) {
                    $this->SetError('Не валидное поле.');
                    $bal->RedirectBack();
                }
            }
        }
        //время работы // выходной
        if ($validateData->IsExist($_POST['arrayDayTimeWork'])) {
            $arrayDayTimeWork = $_POST['arrayDayTimeWork'];
            
            foreach ($arrayDayTimeWork['dayWork'] as $key => $value) {
                if($validateData->IsExist($value) && !$value){ //если существует и на false(рабочий день)
                    if(!$validateData->ValidInteger($arrayDayTimeWork['startWork']) ||
                        !$validateData->ValidInteger($arrayDayTimeWork['endWork'])){
                            $this->SetError('Не валидное поле.');
                            $bal->RedirectBack();
                    }
                }
            }
        }
    }

    public function SaveDataForm()
    {
        $this->IsFillField();
        $this->IsValidFild();
        $this->IsExistId();
        
        if ($_POST['state'] == 'Save') {
            $this->bal->Save($_POST);
        }
        else {
            $this->bal->Update($_POST);
        }
    }
}


if ($auth->IsAuthorized('organization')) {
    //методы для организации
    if (isset($_POST['save_form_main']) && empty($_POST['save_form_main'])) {
        $handling->SaveDataForm();
        $bal->RedirectBack();
    }
}
elseif ($auth->IsAuthorized('client')) {
//     методы для клиентов
}
elseif($_POST['submit'] == 'Авторизация') {    
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
?>
