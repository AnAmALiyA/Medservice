<?php
session_start();
require_once 'check.php';
require_once 'med-BAL.php';
require_once 'validate.php';

class HandlingData
{
    private $arrHoliday = array('none', 'monday', 'tuesday', 'wednesday', 'thursday',
        'friday', 'saturday', 'sunday');
    private $timeWork = array('Start', 'End');
    
    private $controller;
    private $validateData;
    
    function __construct()
    {
        $this->controller = new Controller();
        $this->validateData = new ValidateData();
    }
    
    private function SetError($value, $case)
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
                
            case 'notP':
                $_SESSION[$value . '_error'] = 'not_Phone';
                break;
                
            case 'notV':
                $_SESSION[$value . '_error'] = 'not_Valide';
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
        
        // Телефон
        $tempPhone = false;
        for ($i = 1; $i <= 10; $i ++) {
            if ($validateData->IsExist($_POST[$i . '-phone'])) {
                $tempPhone = true;
            }
        }
        
        if (! $tempPhone) {
            $this->SetError('phone', 'em');
            // $flag = false;
        }
        
        // Время работы - заранее установленно
        foreach ($this->timeWork as $item => $period) {
            foreach ($this->arrHoliday as $number => $day) {
                if (!$this->validateData->IsExist($_POST[$day . $period]))
                {
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
        
        //Направления/услуги - чекбоксы
        $itemServiceInput = 1;
        foreach ($arrayNamesServices as $key => $value) {
            if ($this->validateData->IsExist($_POST[$itemServiceInput . '-service'])) {
                $_POST[$itemServiceInput . '-service'] = $this->validateData->FilterStringOnHtmlSql($_POST[$itemServiceInput . '-service']);
                if (!$this->validateData->ValidInteger($_POST[$itemServiceInput.'-service'])) {
                    $this->SetError($itemServiceInput.'-service', 'notV');
                    $flag = false;
                }
            }
        }
        
        //Страховые компании  - чекбоксы
        $itemInsuranceInput = 1;
        foreach ($arrayNamesServices as $key => $value) {
            if ($this->validateData->IsExist($_POST[$itemInsuranceInput . '-insurance'])) {
                $_POST[$itemInsuranceInput . '-insurance'] = $this->validateData->FilterStringOnHtmlSql($_POST[$itemInsuranceInput . '-insurance']);
                if (!$this->validateData->ValidInteger($_POST[$itemInsuranceInput.'-insurance'])) {
                    $this->SetError($itemInsuranceInput.'-insurance', 'notV');
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
                    $this->SetError($i . '-phone', 'notP');
                }
            }
        }
        
        //время работы
        foreach ($this->timeWork as $item => $period) {
            foreach ($this->arrHoliday as $number => $day) { //
                $_POST[$day . $period] = $this->validateData->FilterStringOnHtmlSql($_POST[$day . $period]);
                if (! $this->validateData->ValidIntegerString($_POST[$day . $period])) {
                    $this->SetError($day . $period, 'notV');
                    $flag = false;
                }
            }
        }
        
        //выходной
        foreach ($this->arrHoliday as $key => $value) {
            if ($this->validateData->IsExist($_POST[$value])) {
                $_POST[$value] = $this->validateData->FilterStringOnHtmlSql($_POST[$value]);
                if (!$this->validateData->ValidInteger($_POST[$value])) {
                    $this->SetError($value, 'notV');
                    $flag = false;
                }
            }
        }
    }
    
    //выполнить проверку на пустые значения
    //выпонить валидацию данных
    //запустить сохранение
    //получить id таблицы
   /*
    private function SaveDB()//предварительная проверка на существование в БД, а потом только сохранение данных
    {
        $conclusion = true;
        //загрузить компания(наименование) - сравнить, если нет - добавить, если есть использовать id(если такая есть - выкинуть ошибку)
        $organization = $this->controller->GetOrganizationAll();
        foreach ($organizationPost as $key => $value) {
            if ($value == $_POST['nameCompany']) {
                return false;
            }
        }
        
        $this->controller->InsertOrganization($_POST['nameCompany']);
        
        //загрузить области - сравнить, если нет - добавить, если есть использовать id
        $region = $this->controller->GetRegionAll();
        
        //загрузить районы - сравнить, если нет - добавить, если есть использовать id
        $districtRegion = $this->controller->GetDistrictRegionAll();
        
        //загрузить города - сравнить, если нет - добавить, если есть использовать id
        $locality = $this->controller->GetLocalityAll();
        
        //загрузить улицы - сравнить, если нет - добавить, если есть использовать id
        $actualLocation = $this->controller->GetActualLocationAll();
        
        //загрузить дом - сравнить, если нет - добавить, если есть использовать id
        $home = $this->controller->GetHomeAll();
        
        //загрузить телефоны - сравнить, если нет - добавить, если есть использовать id
        $phone = $this->controller->GetPhoneAll();
        
        //загрузить время работы - сравнить, если нет - добавить, если есть использовать id
        $timeWork = $this->controller->GetTimeWorkAll();
        
        //загрузить дни работы - сравнить, если нет - добавить, если есть использовать id
        $dayWork = $this->controller->GetDayWorkAll();
        
        //загрузить сервисы - сравнить, если нет - добавить, если есть использовать id
        $services = $this->controller->GetServiceAll();
        
        //загрузить тип учереждения - сравнить и использовать id
        $typeInstitution = $this->controller->GetTypeInstitutionAll();
        
        //загрузить страховые компании - сравнить и использовать id
        $insuranceCompanies = $this->controller->GetInsuranceCompaniesAll();
        
        //добавить суммарную таблицу
        $summaryTable = $this->controller->GetSummaryTableAll();
        return $conclusion;
    }
    */
    //Нужно будет в том случае, если человек не использует JavaScript
//         private function SaveIntoSessions()
//         {
//     //         Удаление переменных из сессии. Если у вас register_globals=off, то достаточно написать
//     //         unset($_SESSION['var']);
//     //         Если же нет, то тогда рядом с ней надо написать:
//     //         session_unregister('var');
//             unset($_SESSION['submit']);
//             foreach ($_POST as $key => $value) {
//                 if ($key!='authorization' && $key!='key')
//                 {
//                     unset($_SESSION[$key]);
//                 }
//             }
    
//             $_SESSION['submit']= true;
//             foreach ($_POST as $key => $value)
//             {
//                 $_SESSION[$key] = $value;
//             }
//         }
    
    //описать валидацию и неверные данные ввести в сесию
    function ValidataLoginPass() 
    {
        $_POST['zm_alr_login_user_name'];
        $_POST['zm_alr_login_password'];
        //$_SESSION['error'] = array('error_Validata' => 'Не верно введенные данные.');
        if (!$isLogin)
        {
            $_SESSION['error'] = array('error_authorisation_login' => 'Такого пользователя не существует.');
        }
        else
        {
            $_SESSION['error'] = array('error_authorisation_password' => 'Не верный пароль.');
        }
        return true;
    }
    
    public function SaveData()
    {
            if (! $this->IsFillField()) {
                $_SESSION['new_session'] = false;
//                 $this->SaveIntoSessions();
                $this->RedirectBack();
            }
            
            if (! $this->IsValidFild()) {
                $_SESSION['new_session'] = false;
//                 $this->SaveIntoSessions();
                $this->RedirectBack();
            }
            
            // после проверки данных сохранить в БД
            $isSave = $this->controller->Save($_POST);
            if ($isSave == -1) {
                return false;
            }
            return true;
    }
    
    function RedirectBack()
    {
        if (!empty($_SERVER['HTTP_REFERER']))
        {
            header("Location: ".$_SERVER['HTTP_REFERER']);
        }
        else
        {
            header("http://medservice24.pirise.com");
        }
    }
    
    function RedirectMain()
    {
        header('Location: index.html'); exit();
    }
}

$auth = new AuthClass();
$handlingData = new HandlingData();

$isAuthorisated = false;
$isAuthorisated = $auth->IsAuth($_POST['zm_alr_login_user_name'], $_POST['zm_alr_login_password']);
if(!$isAuthorisated && $_POST['zm_alr_login_submit_button'] == 'Авторизация')//если он авторизирован, я его допущу
{    
     if (!$handlingData->ValidataLoginPass())
     {
         $auth->Authorize($_POST['zm_alr_login_user_name'], $_POST['zm_alr_login_password']);
         //$_SESSION['error'] = array('error_Validata' => 'Не верно введенные данные.');
         $handlingData->RedirectBack();
     }
}
else 
{
    $handlingData->RedirectBack();
}

//проверка введеных данных
if($_POST['submit'] == 'Сохранить')
{
    if ($_POST['form'] == 'kabinet_main') {
        $handlingData->SaveData();
    }
    else
    {   //вернуть назад
        $handlingData->RedirectBack();
    }    
}
else
{   //вернуть назад
    $handlingData->RedirectBack();
}

// require('test.php');
// header('Location: index.html'); exit();


//для тестирования введенных данных
// $submit = isset($_POST['submit']);
// echo $submit . ' - submit<br>';

// // Тип учереждения
// $typeCompany = isset($_POST['typeCompany']);
// echo $typeCompany . ' - typeCompany<br>';

// // Направленияуслуги
// $services = isset($_POST['orthodontics']);
// echo $services . ' - services Не выбран <br>';

// $services = isset($_POST['stomatologi_imlantologi']);
// echo $services . ' - services<br>';

// // Страховые компании
// $insuranceCompany = isset($_POST['usk']);
// echo $insuranceCompany . ' - insuranceCompany<br>';

// $insuranceCompany = isset($_POST['aska']);
// echo $insuranceCompany . ' - insuranceCompany Не выбран <br>';

// $nameCompany = isset($_POST['nameCompany']);
// if (! empty($nameCompany)) {
//     echo $nameCompany . ' - nameCompany<br>';
// } else {
//     echo 'пустая строка - nameCompany<br>';
// }

// $region = isset($_POST['region']);
// if (! empty($region)) {
//     echo $region . ' - region<br>';
// } else {
//     echo 'пустая строка - region<br>';
// }

// $town = isset($_POST['town']);
// if (! empty($town)) {
//     echo $town . ' - town<br>';
// } else {
//     echo 'пустая строка - town<br>';
// }

// $district = isset($_POST['district']);
// if (! empty($district)) {
//     echo $district . ' - district<br>';
// } else {
//     echo 'пустая строка - district<br>';
// }

// $street = isset($_POST['street']);
// if (! empty($street)) {
//     echo $street . ' - street<br>';
// } else {
//     echo 'пустая строка - street<br>';
// }

// $home = isset($_POST['home']);
// if (! empty($home)) {
//     echo $home . ' - home<br>';
// } else {
//     echo 'пустая строка - home<br>';
// }

// $phone = isset($_POST['phone']);
// if (! empty($phone)) {
//     echo $phone . ' - phone<br>';
// } else {
//     echo 'пустая строка - phone<br>';
// }

// $phone2 = isset($_POST['phone2']);
// if (! empty($phone2)) {
//     echo $phone2 . ' - phone2<br>';
// } else {
//     echo 'пустая строка - phone2<br>';
// }

// $phone3 = isset($_POST['phone3']);
// if (! empty($phone3)) {
//     echo $phone3 . ' - phone3<br>';
// } else {
//     echo 'пустая строка - phone3<br>';
// }

// $sundayStart = isset($_POST['sundayStart']);
// echo $sundayStart . ' - sundayStart<br>';

// $sundayEnd = isset($_POST['sundayEnd']);
// echo $sundayEnd . ' - sundayEnd<br>';

// $days = isset($_POST['sunday']);
// echo $days . ' - sunday<br>';

// foreach ($_POST as $key => $value) {
//     echo 'ключ: ' . $key . ' => значение: ' . $value . '<br>';

/*
нужно закончить:
- валидацию логина и пароля
- авторизацию
- проверку авторизированных пользователей
- написать класс авторизации с методом создания ключа
- написать в БД нужную таблицу
- связать сохранения в БД
- протестировать

http://php.net/manual/ru/tutorial.forms.php
http://developer.alexanderklimov.ru/php/forms.php
http://www.php.su/articles/?cat=examples&page=069
http://addphp.ru/materials/base/1_13.php
https://ru.stackoverflow.com/questions/605555/%D0%92%D0%B0%D0%BB%D0%B8%D0%B4%D0%B0%D1%86%D0%B8%D1%8F-%D1%84%D0%BE%D1%80%D0%BC%D1%8B-php
http://php.net/manual/ru/language.variables.external.php
http://php.net/manual/ru/reserved.variables.cookies.php
http://php.net/manual/ru/reserved.variables.session.php
http://php.net/manual/ru/ref.session.php
http://www.php.su/articles/?cat=examples&page=070
https://www.tutorialrepublic.com/php-tutorial/php-mysql-insert-query.php

авторизация
https://habrahabr.ru/post/13726/
http://programmer-weekdays.ru/archives/125
http://blog.ox2.ru/php/avtorizaciya-i-rabota-sessii/

*/
?>
