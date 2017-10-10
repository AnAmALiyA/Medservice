<?php
//session_start();
require_once 'med-DAL.php';
class BAL
{
    private $dal;
    private $arrayNamesServices;
    private $arrayFilds;
    public function __construct()
    {
        $this->dal = new DAL();
        $this->arrayNamesServices = $arrayNamesServicesBAL;
        $this->arrayFilds = $arrayFilds;
        $this->arrayDay = array(
            'monday' => 'Понедельник',
            'tuesday' => 'Вторник',
            'wednesday' => 'Среда',
            'thursday' => 'Четверг',
            'friday' => 'Пятница',
            'saturday' => 'Суббота',
            'sunday' => 'Воскресенье'
        );
    }
    
    /////////// получить данные организации// старт /////////
    //TODO проработать метод на возможные пусты значение, когда пользователь только зарегался
    public function GetOrganizationSummaryData(){
        $arrayOrganizationData = array();
        $id = $_SESSION['user_id'];
        
        $organizationId = $this->dal->GetOrganizationIdByUser($id);
        if ($organizationId > 0) { // если существует
            $arrayOrganizationData = array();
            $resultOrganizationSummaryData = $this->dal->GetOrganizationSummaryData($organizationId);
            
            $typeInstitutionId = $resultOrganizationData['typeInstitution'];
            $resultInstitution = $this->dal->GetTypeInstitutionById($typeInstitutionId);
            $arrayOrganizationData['typeCompany'] = array(
                'id' => $resultInstitution['id'],
                'name' => $resultInstitution['typeDescription']
            );
            
            $servicesId = $resultOrganizationData['service'];
            $resultServicesData = $this->dal->GetServicesData($servicesId);
            $resultServicesId = array();
            $resultServicesNames = array();
            for ($i = 0; $i < count($resultServicesData); $i++) {
                array_push($resultServices, $i);
                array_push($resultServicesNames, $resultServicesData[$i]);
            }
            $arrayOrganizationData['arrayServices'] = array(
                'id' => $resultServicesId,
                'name' => $resultServicesNames
            );
            
            $insuranceCompanesId = $resultOrganizationData['insuranceCompanie'];
            $resultInsuranceCompanesData = $this->dal->GetInsuranceCompanesData($insuranceCompanesId);
            $resultInsuranceCompanesId = array();
            $resultInsuranceCompanesNames = array();
            for ($i = 0; $i < count($resultServicesData); $i++) {
                array_push($resultInsuranceCompanesId, $i);
                array_push($resultInsuranceCompanesNames, $resultServicesData[$i]);
            }
            $arrayOrganizationData['arrayInsuranceCompanes'] = array(
                'id' => $resultInsuranceCompanesId,
                'name' => $resultInsuranceCompanesNames
            );
            // имя организации и id
            $companyId = $arrayOrganizationData['organization'];
            $resultCompany = $this->dal->GetOrganization($companyId);
            $arrayOrganizationData['nameCompany'] = array( //наименование
                'id' => $resultInstitution['id'],
                'name' => $resultInstitution['name']
            );
            
            $actualLocationId = $resultOrganizationData['actualLocation'];
            $resultActualLocation = $this->dal->GetActualLocation($actualLocationId);
            $actualLocationData = array(
                ['street'] => array(
                    'id' => $resultActualLocation['id'],
                    'name' => $resultActualLocation['actualLocation']
                )
            );
            
            $localityId = $resultActualLocation['locality'];
            $resultLocation = $this->dal->GetLocationById($localityId);
            $locationData = array(
                ['city'] => array(
                    'id' => $resultLocation['id'],
                    'name' => $resultLocation['locality']
                )
            );
            
            $districtRegionId = $resultLocation['districtRegion'];
            $resultDistrictRegion = $this->dal->GetDistrictRegion($districtRegionId);
            $districtRegionData = array(
                ['district'] => array(
                    'id' => $resultDistrictRegion['id'],
                    'name' => $resultDistrictRegion['district']
                )
            );
            
            $regionId = $resultDistrictRegion['region'];
            $resultRegion = $this->dal->GetRegion($regionId);
            $regionData = array(
                ['region'] => array(
                    'id' => $resultRegion['id'],
                    'name' => $resultRegion['region']
                )
            );
            
            $resultHome = $this->dal->GetHomeById($resultActualLocation['home']);
            $homeData = array(
                ['home'] => array(
                    'id' => $resultHome['id'],
                    'name' => $resultHome['numberHome']
                )
            );
            
            $arrayOrganizationData['arrayLocation'] = array(
                $actualLocationData,
                $locationData,
                $districtRegionData,
                $regionData,
                $homeData
            );
            return $arrayOrganizationData;
        }
        return null;
    }
    // Тип учереждения
    public function GetTypeInstitutions()
    {
        return  $this->dal->GetTypeInstitutions();
    }
    // сервис
    public function GetNamesServices()
    {
        return $this->dal->GetNamesServices();
    }
    // страховая компания
    public function GetNamesInsuranceCompanes()
    {
        return $this->dal->GetNamesInsuranceCompanes();
    }
    // Область
    public function GetRegiones()
    {
        return $this->dal->GetRegionsArray();
    }
    // район области TODO може измениться
    public function GetDistrictRegionByRegion($id){
        return $this->dal->GetDistrictRegionArrayByRegion($id);
    }
    //город
    public function GetCitesByDistrictRegion($id){
        return $this->dal->GetCitesArrayByDistrictRegion($id);
    }
    // район
    // улица
    public function GetActualLocationByCity($id){
        return $this->dal->GetActualLocationArrayByCity($id);
    }
    // дом (т.е. конкретный)
    public function GetHomeById($id){
        return $this->dal->GetHomeById($id);
    }
    //телефоны
    public function GetPhones() {
        $id = $_SESSION['user_id'];
        $organizationId = $this->dal->GetOrganizationIdByUser($id);
        if ($organizationId != null) {
            return $this->dal->GetPhonesOrganizationId($organizationId);
        }
        return array(-1);
    }
    //дни время работы
    public function GetDaysTimesWork(){
        $id = $_SESSION['user_id'];
        $organizationId = $this->dal->GetOrganizationIdByUser($id);
        if ($organizationId != null) {
            $resultOrganizationSummaryData = $this->dal->GetOrganizationSummaryData($organizationId);
            return $this->dal->GetDaysTimeWork($resultOrganizationData['dayWork']);
        }
        return array(-1);
    }
    //TODO логотип в BAL
    public function GetLogo(){}
    ///////// получить данные организации// конец /////////
    ///////// сохранить данные организации// старт /////////
    public function Save()
    {
            // id пользователя
        $id = $_SESSION['user_id'];
        // id организации
        $organizationId = $this->dal->GetOrganizationIdByUser($id);
        // данные из сумарной таблици
        $resultOrganizationSummaryData = $this->dal->GetOrganizationSummaryData($organizationId);
        
        // id тип учереждения
        $idTypeCompany = $_POST['typeCompanyId'];
        // проверить существует ли тип учереждения
        if ($this->dal->GetTypeInstitutionById($selectId) == null) {
            $idTypeCompany = null;
        }
        // если сумарная таблица не установлена
        if ($organizationId == null) {
            return - 1; // не тот id - попытка взлома
        }
        
        // id сервисов - тут прийдет массив из названий сервисов
        $serviceId = $this->dal->FindServiceId($_POST['arrayServices']); // ищу похожую строку
        if ($serviceId == - 1) {
            $this->dal->InsertService($_POST['arrayServices']); // если не нахожу то создаю
            $serviceId = $this->dal->FindLastServiceId(); // получить id
        }
        
        // id страховых - тут прийдет массив из названий страховых
        $insuranceCompanesId = $this->dal->FindInsuranceCompanyId($_POST['arrayInsuranceCompanes']);
        // тут тоже нужно будет добовлять код для добовления данных если разрастутся страхования
        // if ($insuranceCompanesId == -1) { code }
        
        // id Наименование(name company)
        $nameCompanyId = $this->dal->CheckForAmatchCompanyDateId($_POST['nameCompany']['id']);
        if ($nameCompanyId != - 1) { // если найду по id //проверить на совпадание
            if (! $this->CheckForAmatchCompanyDate($_POST['nameCompany']['name'])) { // проверить совпадают ли имена
                $this->dal->UpdateCompanyName($nameCompanyId, $_POST['nameCompany']['name']); // если нет - обновить
            }
        } else {
            return - 1; // не тот id - попытка взлома
        }
        
        // id улица из суммарной таблицы
        $actualLocationIdWhithSummary = $resultOrganizationData['actualLocation'];
        if ($actualLocationIdWhithSummary == null) { // написать если равен null
                                                     
            // дом
            $homeId = $this->dal->GetHomeIdByNumber($_POST['home']['name']);
            if ($idHome == null) {
                $this->dal->InsertHome($string);
                $idHome = $this->dal->GetHomeIdByNumber($_POST['home']['name']);
            }
            // город(данные) / проверить id из таблици и проверить по названию города
            //TODO я не буду добовлять проверку на район / область - это нужно внести до использования формы, а не на форме.
            $cityId = $_POST['town']['id'];
            $cityData = $this->dal->GetLocationById($cityId);
            if ($cityData != null) {
                if ($cityData['locality'] != $_POST['town']['name']) { // если id в базе городов есть, но несовпадает по имени
                    return - 1;
                }
            } else {
                return - 1;
            }
            // улица
            $streetStr = $_POST['street']['name'];
            $this->dal->InsertActualLocation($streetStr, $homeId, $cityId);
            $actualLocationData = $this->dal->GetActualLocationByStreetHomeCity($streetStr, $homeId, $cityId); // получить таблицу
            if ($actualLocationData == null) {
                return - 1; // ненайдена таблица
            }
            // телефоны $_POST['arrayPhones']; //если существует тут прийдет 2 array( is => array(1 => tel, 2 => tel, 3 => tel), new => array(null-4 => tel)); - новосозданные);
            if ($arrayPhones != null) {
                //найти id телефона из существующих
                foreach ($_POST['arrayPhones']['new'] as $key => $value) {
                    $this->dal->InsertPhone($value, $organizationId);                    
                }
                
                //прверить совпадающие значения
                //добавить новый
            }
            
            // дни часы$_POST['arrayDayTimeWork']; //array( ['dayWork']=>array(1 => false), ['startWork']=>array(1 => 7), ['endWork']=>array(1 => 19))
        }
//         else { // если нет таблицы actualLocation
//             $actualLocationData = null; // / чтобы потом от сюда взять данные
//             if ($_POST['street']['id'] != null) {
//                 $actualLocationData = $this->dal->FindActualLocationDataById($_POST['street']['id']);
//                 if ($actualLocationIdWhithSummary != $actualLocationData['id']) {} else { // если id улиц совпадают
//                     if ($actualLocationData['actualLocation'] != $_POST['street']['name']) { // если были изменения
//                     }
//                     // если изменений не было мне не нужно проверять область / город / район
//                     $_POST['town'];
//                     $_POST['region'];
//                     $_POST['district'];
//                 }
//             } // если есть таблица actualLocation
              
//             // проверить дом / строка данных из БД TODO была изменена таблица home и actualLocation
//             $idHome = null;
//             if ($actualLocationData['home'] != null) {
//                 $homeData = $this->dal->GetHomeById($actualLocationData['home']);
                
//                 if ($_POST['home']['id'] != $homeData['id']) {
//                     return - 1; // не тот id - попытка взлома
//                 } else {
//                     $idHome = $homeData['id'];
//                     if ($_POST['home']['name'] != $homeData['name']) { // если не совпадабт то обновить
//                         $this->dal->UpdateHome($homeData['id'], $_POST['home']['name']);
//                     }
//                 }
//             } else {
//                 $this->dal->InsertHome($_POST['home']['name']);
//                 $idHome = $this->dal->GetHomeByNumber($_POST['home']['name']);
//             }
//телефоны
//         if ($arrayPhones != null) {
//             //найти id телефона из существующих
//             foreach ($_POST['arrayPhones']['exist'] as $key => $value) {
//                 $phone = $this->dal->GetPhoneById($key);//проверить организацию после получения массива данных телефона
//                 if ($phone != null) {
//                     if ($phone['phone'] != $value) {
//                         $this->dal->UpdatePhone($phone['id'], $phone['phone'], );
//                     }
//                 }
//                 else {
//                     return -1;
//                 }
//             }
//         }
    }
///////// сохранить данные организации// конец /////////
////////Методы для перенаправления // начало////////
    public function RedirectBack()
    {
        if (! empty($_SERVER['HTTP_REFERER'])) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        } else {
            $this->RedirectMain();
        }
    }
    public function RedirectMain()
    {
        header('Location: http://medservice24.webspectrum.top');
        exit();
        // header("http://medservice24.pirise.com");
        // header('Location: index.html'); exit();
    }
    public function RedirectKabinet()
    {
        header('Location: indexcabinet.php');
        exit();
    }
    ////////Методы по авторизации // коенц////////
    ////////Методы по авторизации // начало////////
    public function GetUserById($id)
    {
        return $this->dal->GetUserById($id);
    }
    
    public function FindIdByLogin($login)
    {
        return $this->dal->FindIdByLogin($login);
    }
    public function GetLastLoginId()
    {
        return $this->dal->GetLastLoginId();
    }
    //TODO проверить $id = null, он не должен быть тут указан BAL
    public function SaveUser($id, $login, $password, $hash, $user_category)
    {
        return $this->dal->SaveUser($id, $login, $password, $hash, $user_category);
    }
    //////Методы по авторизации // конец
}
?>