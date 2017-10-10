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
            $resultOrganizationData = $this->dal->GetOrganizationSummaryData($organizationId);
            
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
            $phoneData = $this->GetPhones($organizationId);
            $daysTimesWork = $this->GetDaysTimesWork($resultOrganizationData['dayWork']);
            
            $arrayOrganizationData['arrayLocation'] = array(
                $actualLocationData,
                $locationData,
                $districtRegionData,
                $regionData,
                $homeData,
                $phoneData,//тут может отсутствовать значение
                $daysTimesWork
            );
            return $arrayOrganizationData;
        }
        else {
            //TODO тут проверить что вернуть в ответ пользователю когда он первый раз заходит в кабинет
            return null;
        }
    }
    // Тип учереждения
    private function GetTypeInstitutions()
    {
        return  $this->dal->GetTypeInstitutions();
    }
    // сервис
    private function GetNamesServices()
    {
        return $this->dal->GetNamesServices();
    }
    // страховая компания
    private function GetNamesInsuranceCompanes()
    {
        return $this->dal->GetNamesInsuranceCompanes();
    }
    // Область
    private function GetRegiones()
    {
        return $this->dal->GetRegionsArray();
    }
    // район области TODO може измениться
    private function GetDistrictRegionByRegion($id){
        return $this->dal->GetDistrictRegionArrayByRegion($id);
    }
    //город
    private function GetCitesByDistrictRegion($id){
        return $this->dal->GetCitesArrayByDistrictRegion($id);
    }
    // район
    // улица
    private function GetActualLocationByCity($id){
        return $this->dal->GetActualLocationArrayByCity($id);
    }
    // дом (т.е. конкретный)
    private function GetHomeById($id){
        return $this->dal->GetHomeById($id);
    }
    //телефоны
//     public function GetPhones() {
    private function GetPhones($organizationId) {
//         $id = $_SESSION['user_id'];
//         $organizationId = $this->dal->GetOrganizationIdByUser($id);
//         if ($organizationId != null) {
            return $this->dal->GetPhonesOrganizationId($organizationId);
//         }
//         return array(-1);
    }
    //дни время работы
//     public function GetDaysTimesWork(){
    private function GetDaysTimesWork($idDayWork){
//         $id = $_SESSION['user_id'];
//         $organizationId = $this->dal->GetOrganizationIdByUser($id);
//         if ($organizationId != null) {
//             $resultOrganizationSummaryData = $this->dal->GetOrganizationSummaryData($organizationId);
//             return $this->dal->GetDaysTimeWork($resultOrganizationData['dayWork']);
        return $this->dal->GetDaysTimeWorkById($idDayWork);
//         }
//         return array(-1);
    }
    //TODO логотип в BAL
    private function GetLogo(){}
    ///////// получить данные организации// конец /////////
    ///////// сохранить данные организации// старт /////////
    public function Save()
    {
        // id пользователя
        $id = $_SESSION['user_id'];
        // id организации
        $organizationSummaryId = $this->dal->GetOrganizationIdByUser($id);
        // если сумарная таблица не установлена
        if ($organizationSummaryId == null) {
            return - 1; // не тот id - попытка взлома
        }
        // данные из сумарной таблици
        $resultOrganizationData = $this->dal->GetOrganizationSummaryData($organizationSummaryId);
        // id тип учереждения
        $idTypeCompany = $_POST['typeCompanyId'];
        // проверить существует ли тип учереждения
        if ($this->dal->GetTypeInstitutionById($selectId) == null) {
            $idTypeCompany = null;
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
            if (! $this->CheckForAmatchCInserompanyDate($_POST['nameCompany']['name'])) { // проверить совпадают ли имена
                $this->dal->UpdateCompanyName($nameCompanyId, $_POST['nameCompany']['name']); // если нет - обновить
            }
        } else {
            return - 1; // не тот id - попытка взлома
        }
        
        // ///////// id улица из суммарной таблицы
        $actualLocationId = $resultOrganizationData['actualLocation'];
        if ($actualLocationId == null) { // если 1 раз сохраняються //начало метода
                                         
            // дом
            $homeId = $this->dal->GetHomeIdByNumber($_POST['home']['name']);
            if ($idHome == null) {
                $this->dal->InsertHome($string);
                $idHome = $this->dal->GetHomeIdByNumber($_POST['home']['name']);
            }
            // город(данные) / проверить id из таблици и проверить по названию города
            // TODO я не буду добовлять проверку на район / область - это нужно внести до использования формы, а не на форме.
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
            $actualLocationId = $this->dal->GetActualLocationIdByStreetHomeCity($streetStr, $homeId, $cityId); // получить таблицу
            if ($actualLocationId == null) {
                return - 1; // ненайдена таблица
            }
            
            //для сокращения кода
            $actualLocationId = null; // 'actual_location_fk',
            $nameCompanyId = null; // 'organization_fk',
            // 'type_works_fk',тип работ
            $idTypeCompany = null; // 'type_institution_fk',тип учереждения
            $dayTimneWorkId = null; // 'day_work_fk',
            $insuranceCompanesId = null; // 'insurance_companies_fk',страховые
            $serviceId = null;
            
            // телефоны $_POST['arrayPhones']; //если существует тут прийдет 2 array( is => array(1 => tel, 2 => tel, 3 => tel), new => array(null-4 => tel)); - новосозданные);
            if ($arrayPhones != null) {
                // найти id телефона из существующих
                foreach ($_POST['arrayPhones']['new'] as $value) {
                    $this->dal->InsertPhone($value, $organizationSummaryId);
                }
            }
            // дни часы$_POST['arrayDayTimeWork']; //array( ['dayWork']=>array(1 => false), ['startWork']=>array(1 => 7), ['endWork']=>array(1 => 19))
            $arrayTimeWorkId = array();
            // $_POST['arrayDayTimeWork']['day'];
            foreach ($_POST['arrayDayTimeWork']['day'] as $key => $value) {
                $timeWorkId = '';
//                 $start = '';
//                 $end = '';
                // $arrayTimeWorkId = array();//проверить $arrayTimeWorkId[] = $timeWorkId;
                if (!$value) {
                    $start = $_POST['arrayDayTimeWork']['startTime'][$key];
                    $end = $_POST['arrayDayTimeWork']['endTime'][$key];
                    // найти id
                    $timeWorkId = $this->dal->FindIdTimeWork($value, $start, $end);
                    if ($timeWorkId == - 1) { // если его нет то сохранить
                        $this->dal->InsertTimeWork($value, $start, $end);
                        $timeWorkId = $this->dal->FindIdTimeWork($value, $start, $end);
                    }
                } else {
                    $timeWorkId = $this->dal->FindIdTimeWork($value);
                }
                $arrayTimeWorkId[] = $timeWorkId;
                // array_push($arrayTimeWorkId, $timeWorkId);//проверить $arrayTimeWorkId[] = $timeWorkId;
            }
            // найти id схожего дня
            $dayTimneWorkId = $this->dal->FindDayId($arrayTimeWorkId);
            if ($dayTimneWorkId == - 1) {
                $this->dal->InsertDay($arrayTimeWorkId);
                $dayTimneWorkId = $this->dal->FindDayId($arrayTimeWorkId);
            }
            
//             $arrayOrganizationData = array(
//                 $actualLocationId, // 'actual_location_fk',
//                 $nameCompanyId, // 'organization_fk',
//                                 // 'type_works_fk',тип работ
//                 $idTypeCompany, // 'type_institution_fk',тип учереждения
//                 $dayTimneWorkId, // 'day_work_fk',
//                 $insuranceCompanesId, // 'insurance_companies_fk',страховые
//                 $serviceId, // 'services_fk',
//                 $_POST['state'] // 'state'
//             );
//             // обновляю, потому, что сумарная таблица должна бы создана и привязана к пользователю до 1 сохранения
//             $this->dal->UpdateOrganizationData($organizationSummaryId, $arrayOrganizationData);
        } // если 1 раз сохраняються //конец метода
        else { // update data //начало метода
            $actualLocationData = $this->dal->GetActualLocation($actualLocationId);
            // проверяю город
            $homeId = null;
            if ($actualLocationData['home'] != null && $_POST['home']['name']) {
                $homeId = $this->dal->GetHomeIdByNumber($_POST['home']['name']); // вернуть id
                if ($homeId == - 1) {
                    $this->dal->InsertHome($_POST['home']['name']);
                    $homeId = $this->dal->GetHomeIdByNumber($_POST['home']['name']);
                }
            }
            // проверяю совпадения по улице
            if ($actualLocationData['actualLocation'] != $_POST['street']['name'] 
                | $actualLocationData['locality'] != $_POST['city']['id'] 
                | $actualLocationData['home'] != $homeId) 
            // если изменился
            {
                $this->dal->UpdateActualLocation($actualLocationData['id'], $_POST['street']['name'], $_POST['city']['id'], $homeId);
            }
            // проверяю телефоны / получаю ассоциативный массив
            $arrayPhones = $this->dal->GetPhonesOrganizationId($organizationSummaryId);
            if ($arrayPhones != null) {
                // найти id телефона из существующих
                if ($_POST['arrayPhones']['exist'] != null) {
                    
                    foreach ($_POST['arrayPhones']['exist'] as $key => $value) {
                        for ($i = 0; $i < count($arrayPhones['id']); $i ++) {
                            if ($key == $arrayPhones['id'][$i]) {
                                if ($arrayPhones['name'][$i] != $value) {
                                    $this->dal->UpdatePhone($key, $value);
                                }
                            }
                        }
                    }
                }
                if ($_POST['arrayPhones']['new'] != null) {
                    foreach ($_POST['arrayPhones']['new'] as $key => $value) {
                        $this->dal->InsertPhone($value, $organizationSummaryId);
                    }
                }
            }
            // дни часы $_POST['arrayDayTimeWork']; //array( ['dayWork']=>array('mondey' => false), ['startWork']=>array(1 => 7), ['endWork']=>array(1 => 19))
            $dayTimneWorkId = $resultOrganizationData['dayWork'];
            $dayWorkData = $this->dal->GetDaysTimeWorkById($dayTimneWorkId);
            
            $dayWorkDataPost = $_POST['arrayDayTimeWork']['dayWork'];
            $startWorkDataPost = $_POST['arrayDayTimeWork']['startWork'];
            $endWorkDataPost = $_POST['arrayDayTimeWork']['endWork'];
            
            $notChanged = true;
            foreach ($dayWorkDataPost as $key => $value) {
                if($dayWorkData['day'][$key] != $value 
                    || $startWorkDataPost[$key] != $dayWorkData['startTime'][$key] 
                    || $endWorkDataPost[$key] != $dayWorkData['endTime'][$key]){ // если хоть кто-то будет е совпадать
                   $notChanged = false;
                   break;
                }
            }
            
            if (!$notChanged) {
                $arrayTimeWorkId = array();
                
                foreach ($dayWorkDataPost as $key => $value) {
                    if (!$value) {
                    $start = $startWorkDataPost[$key];
                    $end = $endWorkDataPost[$key];
                    // найти id
                    $timeWorkId = $this->dal->FindIdTimeWork($value, $start, $end);
                    if ($timeWorkId == - 1) { // если его нет то сохранить
                        $this->dal->InsertTimeWork($value, $start, $end);
                        $timeWorkId = $this->dal->FindIdTimeWork($value, $start, $end);
                    }
                    }
                    else{
                        $timeWorkId = $this->dal->FindIdTimeWork($value);
                    }
                    $arrayTimeWorkId[] = $timeWorkId;//на 7 дней у меня тут только id таблиц med_time_work
                }
                
                $dayTimneWorkId = $this->dal->FindDayId($arrayTimeWorkId);                
                if ($foundDayWorkId != -1) {
                    $this->dal->InsertDay($arrayTimeWorkId);
                    $dayTimneWorkId = $this->dal->FindDayId($arrayTimeWorkId);
                }
            }
               // сохранить организацию
//             $arrayOrganizationData = array(
//                 $actualLocationId, // 'actual_location_fk',
//                 $nameCompanyId, // 'organization_fk',
//                 // 'type_works_fk',тип работ
//                 $idTypeCompany, // 'type_institution_fk',тип учереждения
//                 $dayTimneWorkId, // 'day_work_fk',
//                 $insuranceCompanesId, // 'insurance_companies_fk',страховые
//                 $serviceId, // 'services_fk',
//                 $_POST['state'] // 'state'
//             );
//             // обновляю, потому, что сумарная таблица должна бы создана и привязана к пользователю до 1 сохранения
//             $this->dal->UpdateOrganizationData($organizationSummaryId, $arrayOrganizationData);
        }
        $arrayOrganizationData = array(
            $actualLocationId, // 'actual_location_fk',
            $nameCompanyId, // 'organization_fk',
            // 'type_works_fk',тип работ
            $idTypeCompany, // 'type_institution_fk',тип учереждения
            $dayTimneWorkId, // 'day_work_fk',
            $insuranceCompanesId, // 'insurance_companies_fk',страховые
            $serviceId, // 'services_fk',
            $_POST['state'] // 'state'
        );
        // обновляю, потому, что сумарная таблица должна бы создана и привязана к пользователю до 1 сохранения
        $this->dal->UpdateOrganizationData($organizationSummaryId, $arrayOrganizationData);
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
    
    public function SaveUser($login, $password, $hash, $user_category)
    {
        return $this->dal->SaveUser($login, $password, $hash, $user_category);
    }
    //////Методы по авторизации // конец
    //////Методы удаления // начало
    public function DeletePhone($id){
        $this->dal->DeletePhone($id);
    }
    //////Методы удаления // конец
}
?>