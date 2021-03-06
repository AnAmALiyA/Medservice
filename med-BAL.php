<?php
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
            
            $arrayOrganizationData['typeCompany'] = null;
            $resultInstitution = $resultOrganizationData['typeInstitution'] != null ? $this->dal->GetTypeInstitutionById($resultOrganizationData['typeInstitution']) : null;
            if ($resultInstitution != null) {
                $arrayOrganizationData['typeCompany'] = array(
                    'id' => $resultInstitution['id'],
                    'name' => $resultInstitution['typeDescription']
                );
            }
            //TODO null возвращается
            $arrayOrganizationData['arrayServices'] = null;
            $resultServicesData = $resultOrganizationData['service'] != null ? $this->dal->GetServicesData($resultOrganizationData['service']) : null;
            if ($resultServicesData != null) {
                $resultServicesId = array();
                $resultServicesNames = array();
                for ($i = 1; $i < count($resultServicesData); $i++) {
                    $resultServicesId[] = $i;
                    $resultServicesNames[] = $resultServicesData[$i];
                }
                $arrayOrganizationData['arrayServices'] = array(
                    'id' => $resultServicesId,
                    'name' => $resultServicesNames
                );
            }
            
            $arrayOrganizationData['arrayInsuranceCompanes'] = null;
            $resultInsuranceCompanesData = $resultOrganizationData['insuranceCompanie'] != null ? $this->dal->GetInsuranceCompanesData($resultOrganizationData['insuranceCompanie']) : null;
            if ($resultInsuranceCompanesData != null) {
                $resultInsuranceCompanesId = array();
                $resultInsuranceCompanesNames = array();
                for ($i = 1; $i < count($resultInsuranceCompanesData); $i++) {
                    $resultInsuranceCompanesId[] = $i;
                    $resultInsuranceCompanesNames[] = $resultInsuranceCompanesData[$i];
                }
                $arrayOrganizationData['arrayInsuranceCompanes'] = array(
                    'id' => $resultInsuranceCompanesId,
                    'name' => $resultInsuranceCompanesNames
                );
            }
//             имя организации и id
            $arrayOrganizationData['nameCompany'] = null;
            $resultCompany =$resultOrganizationData['organization'] != null ? $this->dal->GetOrganization($resultOrganizationData['organization']) : null;
            if ($resultCompany != null) {
                $arrayOrganizationData['nameCompany'] = array(
                    'id' => $resultCompany['id'],
                    'name' => $resultCompany['name']
                );
            }
            
            $actualLocationData = null;
            $resultActualLocation = $resultOrganizationData['actualLocation'] != null ? $this->dal->GetActualLocation($resultOrganizationData['actualLocation']) : null;
            if ($resultActualLocation != null) { 
                $actualLocationData = array(
                        'id' => $resultActualLocation['id'],
                        'name' => $resultActualLocation['actualLocation']
                );
            }
            
            $locationData = null;
            $resultLocation = $resultActualLocation['locality'] != null ? $this->dal->GetLocationById($resultActualLocation['locality']) : null;
            if ($resultLocation != null) {
                $locationData = array(
                    'id' => $resultLocation['id'],
                    'name' => $resultLocation['locality']
                );
            }
            
            $districtRegionData = null;
            $resultDistrictRegion = $resultLocation['districtRegion'] != null ? $this->dal->GetDistrictRegion($resultLocation['districtRegion']) : null;
            if ($resultDistrictRegion != null) {
                $districtRegionData = array(
                        'id' => $resultDistrictRegion['id'],
                        'name' => $resultDistrictRegion['district']
                );
            }
            
            $regionData = null;           
            $resultRegion = $resultDistrictRegion['region'] != null ? $this->dal->GetRegion($resultDistrictRegion['region']) : null;
            if ($resultRegion != null) {
                $regionData = array(
                        'id' => $resultRegion['id'],
                        'name' => $resultRegion['region']
                );
            }
            
            $homeData = null;
            $resultHome = $resultActualLocation['home'] != null ? $this->dal->GetHomeById($resultActualLocation['home']) : null;
            if ($resultHome != null) {
                $homeData = array(
                        'id' => $resultHome['id'],
                        'name' => $resultHome['numberHome']
                );
            }
            //не работает и я незнаю почему
            //$arrayOrganizationData['phone'] = $this->GetPhones($organizationId);

            $arrayOrganizationData['daysTimes'] = $resultOrganizationData['dayWork'] != null ? $this->GetDaysTimesWork($resultOrganizationData['dayWork']) : null;

            $arrayOrganizationData['logo'] = $this->GetLogo();
            
            $arrayOrganizationData['arrayLocation'] = array(
                'street' => $actualLocationData,
                'city' => $locationData,
                'district' => $districtRegionData,
                'region' => $regionData,
                'home' => $homeData
            );
            return $arrayOrganizationData;
        }
        else {
            //TODO тут проверить что вернуть в ответ пользователю когда он первый раз заходит в кабинет
            return 'проверить на существующие';
        }
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
    public function GetDistrictRegionByRegion($id){
        return $this->dal->GetDistrictRegionArrayByRegion($id);
    }
    //город
    public function GetCitesByDistrictRegion($id){
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
    public function GetPhones($user_id) {
        $organizationId = $this->dal->GetOrganizationIdByUser($user_id);
        return $this->dal->GetPhonesOrganizationId($organizationId);
    }
    //дни время работы
//     public function GetDaysTimesWork(){
    private function GetDaysTimesWork($idDayWork){
        return $this->dal->GetDaysTimeWorkById($idDayWork);
    }
    //TODO логотип в BAL
    private function GetLogo(){
        return 'get logo';
    }
    
    private function Upload_file($file, $upload_dir = 'images', $allowed_types= array('image/png','image/x-png','image/jpeg','image/webp','image/gif')){
        
        $blacklist = array(".php", ".phtml", ".php3", ".php4");
        $ext = substr($filename, strrpos($filename,'.'), strlen($filename)-1); // В переменную $ext заносим расширение загруженного файла.
        if(in_array($ext, $blacklist)){
            return array('error' => 'Запрещено загружать исполняемые файлы');
        }
            
        $upload_dir = dirname(__FILE__).DIRECTORY_SEPARATOR.$upload_dir.DIRECTORY_SEPARATOR; // Место, куда будут загружаться файлы.
        $max_filesize = 5 * 1024 * 1024;//8388608; // Максимальный размер загружаемого файла в байтах (в данном случае он равен 8 Мб).
        $prefix = date('Ymd-is_');
        $filename = $file['name']; // В переменную $filename заносим точное имя файла.
            
        if(!is_writable($upload_dir))  // Проверяем, доступна ли на запись папка, определенная нами под загрузку файлов.
            return array('error' => 'Невозможно загрузить файл в папку "'.$upload_dir.'". Установите права доступа - 777.');
                
        if(!in_array($file['type'], $allowed_types))
            return array('error' => 'Данный тип файла не поддерживается.');
                    
        if(filesize($file['tmp_name']) > $max_filesize)
            return array('error' => 'файл слишком большой. максимальный размер '.intval($max_filesize/(1024*1024)).'мб');
        
        @mkdir($upload_dir, 0777);
            
        if(!move_uploaded_file($file['tmp_name'],$upload_dir.$prefix.$filename)) // Загружаем файл в указанную папку.
            return array('error' => 'При загрузке возникли ошибки. Попробуйте ещё раз.');
                            
        //return Array('filename' => $prefix.$filename);
        return Array('filename' => $upload_dir.$prefix.$filename);
    }
    ///////// получить данные организации// конец /////////
    ///////// сохранить данные форм// старт /////////
    public function SaveMain()
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
    
    public function SaveCompany(){
        // id пользователя
        $id = $_SESSION['user_id'];
        
        $strCompany = $_POST['mf-form_of_ownership'].' "'.$_POST['mf-title'].'"';
        $idCompany = $this->dal->FindCompanyByName($strCompany);
        if($idCompany == -1){
            $this->dal->SaveCompany($strCompany);
            $idCompany = $this->dal->FindCompanyByName($strCompany);
        }
        //med_type_institution summary table
        $idTypeInstitution = $this->dal->FindTypeInstitutionByName($_POST['mf-type']);
        if($idTypeInstitution == -1){
            $this->dall->SaveTypeInstitution($_POST['mf-type']);
            $idTypeInstitution = $this->dal->FindTypeInstitutionByName($_POST['mf-type']);
        }
        
        $fioUser = $_POST['mf-contact_person-company'];
        
        $position = null;
        if (!empty($_POST['mf-contact_person-position'])) {
            $position = $_POST['mf-contact_person-position'];
        }
        
        //save телефон и самари табицу
        $idsummary = $this->dal->CreateSummTable($idCompany, $idTypeInstitution);
        $idPhone = $this->dal->FindPhone($_POST['mf-contact_company-tel-number']);
        if ($idPhone > -1){
//             throw new Exception('Такой телефон уже есть');
            return -1;
        }
        $this->dal->SavePhone($idsummary, $_POST['mf-contact_company-tel-number']);
        
        $pathImageLogo = $this->Upload_file($_FILES['mf-photo-company'], 'logo');

        $this->dal->SaveUserCompanyData($id, $fioUser, $position, $idSummary, $pathImageLogo);
    }
    //TODO написать метод
    public function SaveClient(){
        // id пользователя
        $id = $_SESSION['user_id'];
        
        $fioUser = $_POST['mf-contact_person'];
        
        $mail = $_POST['mf-contact_person-email'];
        
        $phone = $_POST['mf-contact_person-tel-number'];
        
        $pathImageLogo = $this->Upload_file($_FILES['mf_photo'], 'logo');
        
        $this->dal->SaveUserClientData($id, $fioUser, $mail, $phone, $pathImageLogo);
    }
    ///////// сохранить данные форм// конец /////////
    ////////Методы для перенаправления // начало////////
    public function RedirectBack()
    {
        if (! empty($_SERVER['HTTP_REFERER'])) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        } else {
            $this->RedirectHome();
        }
    }
    
    public function RedirectHome()
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
    
    public function RedirectMain()
    {
        header('Location: main.php');
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
    
    public function DeleteImage($id){
        $this->dal->DeleteImage($id);
    }
    //////Методы удаления // конец
    //////Методы регистрации /// начало ////

    //////Методы регистрации /// конец ////
    ///////////////////////Сергей///////////начало///////////
    ////v/v/v/v/v/v/v/v/v/v/v/v/v/v/v/v////
    
    //fetch from DB all news
    public function GetNewsAll(){
        return $this->dal->GetNewsAllCol();
    }
    //fetch from DB all promo
    public function GetPromoAll(){
        return $this->dal->GetPromoAllCol();
    }
    public function GetSpecialAll(){
        return $this->dal->GetSpecialAllCol();
    }
    public function GetMedturismAll(){
        return $this->dal->GetMedturismAllCol();
    }
    public function SaveNews($title, $user, $description,$date_show , $date_news ){
        
        $result =    $this->dal->SaveNews($title,$user, $description,$date_show , $date_news );
        return $result;
    }
    
    public  function  SavePromo($title, $description, $user ,$date_show , $date_promo ){
        
        $result =  $this->dal->SavePromo($title, $description, $user ,$date_show , $date_promo );
        return $result;
    }
    
    public function SaveSpecial($title, $description, $user){
        
        $this->dal->SaveSpecial($title, $description, $user);
        return true;
    }
    
    public function SaveMedturism($title, $description, $user){
        
        $this->dal->SaveMedturism($title, $description, $user);
        return true;
    }
    
    public  function  SavePicsNews($id , $news_id , $name){
        
        $result =  $this->dal->SavePicsNews($id , $news_id , $name);
        
        if($result){
            return true;
        }
        else return false;
    }
    public  function  SavePicsPromo($id , $promo_id , $name){
        
        $result =  $this->dal->SavePicsPromo($id , $promo_id , $name);
        
        if($result){
            return true;
        }
        else return false;
    }
    public  function  SavePics($id , $name){
        
        $result =  $this->dal->SavePics($id  , $name);
        
        if($result){
            return true;
        }
        else return false;
    }
    
    //works updating
    public  function UpdateNews($title, $id_user, $description, $find_id ,$date_show , $date_news ) {
        
        $arrayUpdatedData = array($title,  $id_user, $description,$date_show , $date_news) ;
        $result = $this->dal->UpdateNews($arrayUpdatedData,  $find_id  );
        return $result;
    }
    public  function UpdatePromo($title, $id_user, $description, $find_id ,$date_show , $date_promo ) {
        
        $arrayUpdatedData = array($title,  $id_user, $description, $date_show , $date_promo );
        $result = $this->dal->UpdatePromo($arrayUpdatedData,  $find_id  );
        return $result;
    }
    
    public  function UpdateSpecial($title, $description, $id_user, $find_id  ) {
        
        $arrayUpdatedData = array($id_user, $title, $description   );
        $result = $this->dal->UpdateSpecial($arrayUpdatedData,  $find_id  );
        return $result;
    }
    public  function UpdateMedturism($title, $description, $id_user, $find_id  ) {
        
        $arrayUpdatedData = array($id_user, $title, $description )  ;
        $result = $this->dal->UpdateMedturism($arrayUpdatedData,  $find_id  );
        return $result;
    }
    public  function UpdatePicPromo($id , $promo_id , $name , $pic_id) {
        
        $arrayUpdatedData = array($id , $promo_id , $name,  $pic_id )  ;
        $result = $this->dal->UpdatePicPromo($arrayUpdatedData,  $pic_id  );
        return $result;
    }
    public  function UpdatePicNews($id , $news_id , $name , $pic_id) {
        
        $arrayUpdatedData = array($id , $news_id , $name,  $pic_id )  ;
        $result = $this->dal->UpdatePicNews($arrayUpdatedData,  $pic_id  );
        return $result;
    }
    public function FindPicPromo($indexCheck){
        return $this->dal->FindPicPromo($indexCheck);
    }
    public function FindPicNews($indexCheck){
        return $this->dal->FindPicNews($indexCheck);
    }
    public function GetPicsPromo(){
        
        return $this->dal->GetPicsPromo();
        
    }
	public function GetPics(){
		 return $this->dal->GetPics();
	}
    public function GetPicsNews(){
        
        return $this->dal->GetPicsNews();
        
    }
    /////////////////////Сергей///////////конец///////////
}
?>