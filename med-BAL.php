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
        if ($organizationId > 0) {
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
            $resultLocation = $this->dal->GetLocation($localityId);
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
            
            $resultHome = $this->dal->GetHome($actualLocationId);
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
    public function GetHome($id){
        return $this->dal->GetHome($id);
    }
    //телефоны
    public function GetPhones() {
        $id = $_SESSION['user_id'];
        $organizationId = $this->dal->GetOrganizationIdByUser($id);
        if ($organizationId != null) {
            return $this->dal->GetPhones($organizationId);
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
    
    // ------------разобраться
    private function GetStrPhones()
    {
        $stringPhones = null;
        for ($i = 1; $i <= 10; $i ++) {
            if ($_POST[$i] != null) {
                $stringPhones .= $_POST[$i];
            }
        }
        return $stringPhones;
    }

    // private function GetStrDayWork(){
    // $stringDayWork = null;
    // $arr = array(
    // $_POST['monday'] ? "Пн" : null,
    // $_POST['tuesday'] ? "Вт" : null,
    // $_POST['wednesday'] ? "Ср" : null,
    // $_POST['thursday'] ? "Чт" : null,
    // $_POST['friday'] ? "Пт" : null,
    // $_POST['saturday'] ? "Сб" : null,
    // $_POST['sunday'] ? "Вс" : null
    // );
    // $start = false;
    // for ($i = 1; $i <= 7; $i++) {
    // if ($arr[$i] != null) {
    // if ($i == 1)
    // {
    // $stringDayWork .= $arr[$i];
    // }
    // elseif ($i == 7)
    // {
    // if ($arr[$i-1] != null) {
    // $stringDayWork .= '-'.$arr[$i];
    // }
    // elseif ($stringDayWork == null)
    // {
    // $stringDayWork .= $arr[$i];
    // }
    // else {
    // $stringDayWork .= ','.$arr[$i];
    // }
    // }
    // elseif ($i == 2 || $i == 6)
    // {
    // if ($arr[$i-1] != null && $arr[$i+1] == null) {
    // $stringDayWork .= '-'.$arr[$i];
    // }elseif ($arr[$i-1] == null && $arr[$i+1] == null) {
    // $stringDayWork .= $arr[$i];
    // }
    // }
    // else {
    // if ($arr[$i-1] != null && $arr[$i+1] == null)
    // {
    // $stringDayWork .= '-'.$arr[$i];
    // }
    // elseif ($arr[$i-1] == null)
    // {
    // if ($stringDayWork == null) {
    // $stringDayWork .= $arr[$i];
    // }
    // else
    // {
    // $stringDayWork .= ','.$arr[$i];
    // }
    // }
    // }
    // }
    // }
    // return $stringDayWork;
    // }
    private function GetArrayWeekEnd()
    {
        $arrWeekEndDay = array(
            $_POST['monday'] ? "Пн" : null,
            $_POST['tuesday'] ? "Вт" : null,
            $_POST['wednesday'] ? "Ср" : null,
            $_POST['thursday'] ? "Чт" : null,
            $_POST['friday'] ? "Пт" : null,
            $_POST['saturday'] ? "Сб" : null,
            $_POST['sunday'] ? "Вс" : null
        );
        return $arrWeekEndDay;
    }

    // function GetStringWeekEnd($arrWeekEndDay) {
    // $stringWeekEnd ='';
    // $gap = false;
    // for ($i = 1; $i <= 7; $i++) {
    // if ($arrWeekEndDay[$i] != null) {
    // if ($stringWeekEnd == null) {
    // $stringWeekEnd .= $arrWeekEndDay[$i];
    // }
    // elseif ($gap)
    // {
    // $stringWeekEnd .= ','.$arrWeekEndDay[$i];
    // }
    // elseif ($i == 7) {
    // if ($arrWeekEndDay[$i-1] != null) {
    // $stringWeekEnd .= '-'.$arrWeekEndDay[$i];
    // }
    // else
    // {
    // $stringWeekEnd .= ','.$arrWeekEndDay[$i];
    // }
    // }
    // else
    // {
    // if ($arrWeekEndDay[$i+1] == null) {
    // $stringWeekEnd .= '-'.$arrWeekEndDay[$i];
    // }
    // }
    // }
    // else
    // {
    // $gap = false;
    // }
    // }
    // }
    public function GetStringWorkDay($arrWeekEndDay, $arrayNameDays)
    {
        $stringWorkDay = null;
        for ($i = 1; $i <= count($arrWeekEndDay); $i ++) {
            if ($arrWeekEndDay[$i] == null && $stringWorkDay == null) {
                $stringWorkDay = $arrayNameDays[$i];
            } elseif ($i == count($arrWeekEndDay)) // 7
{
                if ($stringWorkDay == null && $arrWeekEndDay[$i] == null) {
                    return $stringWorkDay; // вернуть пустую строку
                } elseif ($arrWeekEndDay[$i - 1] != null) {
                    $stringWorkDay .= '-' . $arrayNameDays[$i];
                } else {
                    $stringWeekEnd .= ',' . $arrayNameDays[$i];
                }
            } elseif ($arrWeekEndDay[$i] != null) // если отмечено не выходной
{
                if ($arrWeekEndDay[$i - 1] == null) {
                    $stringWorkDay .= '-' . $arrayNameDays[$i - 1];
                }
            }
        }
        return $stringWorkDay;
    }

    private function GetArrayTimeWorkStart()
    {
        $arrTime = array(
            'mondayStart' => $_POST['mondayStart'],
            'mondayEnd' => $_POST['mondayEnd'],
            'tuesdayStart' => $_POST['tuesdayStart'],
            'tuesdayEnd' => $_POST['tuesdayEnd'],
            'wednesdayStart' => $_POST['wednesdayStart'],
            'wednesdayEnd' => $_POST['wednesdayEnd'],
            'thursdayStart' => $_POST['thursdayStart'],
            'thursdayEnd' => $_POST['thursdayEnd'],
            'fridayStart' => $_POST['fridayStart'],
            'fridayEnd' => $_POST['fridayEnd'],
            'saturdayStart' => $_POST['saturdayStart'],
            'saturdayEnd' => $_POST['saturdayEnd'],
            'sundayStart' => $_POST['sundayStart'],
            'sundayEnd' => $_POST['sundayEnd']
        );
        return $arrTime;
    }

    private function GetArrayTimeWorkEnd()
    {
        $arrTime = array(
            'mondayStart' => $_POST['mondayStart'],
            'mondayEnd' => $_POST['mondayEnd'],
            'tuesdayStart' => $_POST['tuesdayStart'],
            'tuesdayEnd' => $_POST['tuesdayEnd'],
            'wednesdayStart' => $_POST['wednesdayStart'],
            'wednesdayEnd' => $_POST['wednesdayEnd'],
            'thursdayStart' => $_POST['thursdayStart'],
            'thursdayEnd' => $_POST['thursdayEnd'],
            'fridayStart' => $_POST['fridayStart'],
            'fridayEnd' => $_POST['fridayEnd'],
            'saturdayStart' => $_POST['saturdayStart'],
            'saturdayEnd' => $_POST['saturdayEnd'],
            'sundayStart' => $_POST['sundayStart'],
            'sundayEnd' => $_POST['sundayEnd']
        );
        return $arrTime;
    }

    private function GetArrayNameDays()
    {
        // $arrDay = array(
        // 'monday' => "Пн",
        // 'tuesday' => "Вт",
        // 'wednesday' => "Ср",
        // 'thursday' => "Чт",
        // 'friday' => "Пт",
        // 'saturday' => "Сб",
        // 'sunday' => "Вс"
        // );
        $arrDay = array(
            "Пн",
            "Вт",
            "Ср",
            "Чт",
            "Пт",
            "Сб",
            "Вс"
        );
        return $arrDay;
    }

    private function GetArrayTimeWork($arrWeekEndDay, $arrayNameDays, $arrTimeWorkStart, $arrTimeWorkEnd)
    {
        // для выходных
        $strWeekEnd = null;
        if ($arrWeekEndDay[6] != null && $arrWeekEndDay[7] != null) {
            if ($arrTimeWorkStart[6] == $arrTimeWorkStart[7] && $arrTimeWorkEnd[6] == $arrTimeWorkEnd[7]) {
                $strWeekEnd = $arrTimeWorkStart[6] . '-' . $arrTimeWorkEnd[6];
            } else {
                $strWeekEnd = $arrayNameDays[6] . ' ' . $arrTimeWorkStart[6] . '-' . $arrTimeWorkEnd[6] . ',' . $arrayNameDays[7] . ' ' . $arrTimeWorkStart[7] . '-' . $arrTimeWorkEnd[7];
            }
        } else {
            if ($arrWeekEndDay[6] != null) {
                $strWeekEnd = $arrayNameDays[6] . ' ' . $arrTimeWorkStart[6] . '-' . $arrTimeWorkEnd[6];
            } elseif ($arrWeekEndDay[7] != null) {
                $strWeekEnd = $arrayNameDays[7] . ' ' . $arrTimeWorkStart[7] . '-' . $arrTimeWorkEnd[7];
            }
        }
        // для будних
        $strWorkDay = null;
        $workDayStart = null;
        $workDayEnd = null;
        $flag = true;
        for ($i = 1; $i <= 5; $i ++) {
            if ($arrWeekEndDay[$i] == null) {
                if ($workDayStart == null || $workDayEnd == null) {
                    $workDayStart = $arrTimeWorkStart[$i];
                    $workDayEnd = $arrTimeWorkEnd[$i];
                }
                
                if ($workDayStart != $arrTimeWorkStart[$i] || $workDayEnd != $arrTimeWorkEnd[$i]) {
                    $flag = false;
                    break;
                }
            }
        }
        
        if ($flag) {
            $strWorkDay = $workDayStart . '-' . $workDayEnd;
            return $strWorkDay;
        }
        
        $workDayStart = null;
        $workDayEnd = null;
        for ($i = 1; $i <= 5; $i ++) {
            if ($arrWeekEndDay[$i] == null) {
                if ($workDayStart == null && $workDayEnd == null) {
                    $workDayStart = $arrTimeWorkStart[$i];
                    $workDayEnd = $arrTimeWorkEnd[$i];
                    $strWorkDay = $arrayNameDays[$i];
                } elseif ($arrWeekEndDay[$i - 1] != null && $workDayStart == $arrTimeWorkStart[$i] && $workDayEnd == $arrTimeWorkEnd[$i]) {
                    $strWorkDay = ', ' . $arrayNameDays[$i];
                } elseif ($arrWeekEndDay[$i - 1] == null && $workDayStart == $arrTimeWorkStart[$i] && $workDayEnd == $arrTimeWorkEnd[$i]) {
                    $strWorkDay = '-' . $arrayNameDays[$i] . ' ' . $workDayStart . '-' . $workDayEnd;
                } elseif ($arrWeekEndDay[$i - 1] != null && ($workDayStart != $arrTimeWorkStart[$i] || $workDayEnd != $arrTimeWorkEnd[$i])) {
                    $strWorkDay = ', ' . $arrayNameDays[$i];
                    $workDayStart = $arrTimeWorkStart[$i];
                    $workDayEnd = $arrTimeWorkEnd[$i];
                } elseif ($arrWeekEndDay[$i - 1] == null && ($workDayStart != $arrTimeWorkStart[$i] || $workDayEnd != $arrTimeWorkEnd[$i])) {
                    $strWorkDay = '-' . $arrayNameDays[$i];
                    $workDayStart = $arrTimeWorkStart[$i];
                    $workDayEnd = $arrTimeWorkEnd[$i];
                }
            } else {
                if ($workDayStart != null && $workDayEnd != null) {
                    
                    if ($i == 1) {
                        continue;
                    } elseif ($arrWeekEndDay[$i - 1] == null) {
                        continue;
                    } else {
                        if ($i == 2) {
                            $strWorkDay .= $workDayStart . '-' . $workDayEnd;
                        } else {
                            $strWorkDay .= '-' . $arrayNameDays[$i - 1] . ' ' . $workDayStart . '-' . $workDayEnd;
                        }
                    }
                }
            }
            
            if ($i == 5) {
                $strWorkDay . ' ' . $workDayStart . '-' . $workDayEnd;
            }
        }
    }

    // private function GetStringWeekEnd($arrWeekEndDay){
    
    // }
    
    // private function GetArrayTimeWorkData(){
    // $arrayTimeWork = array();
    // $arrDay = $this->GetArrayNameDays();
    // $arrTimeStart = $this->GetArrayTimeWorkStart();
    // $arrTimeEnd = $this->GetArrayTimeWorkEnd();
    // $arrWeekEndDay = $this->GetArrayWeekEnd();
    
    // for ($i = 1; $i <= 7; $i++) {
    // if ($arrWeekEndDay[$i] == null)
    // {
    // $arrTimeStart[$i] = null;
    // $arrTimeEnd[$i] = null;
    // }
    // }
    
    // $strgWeekEnd = $this->GetStringWeekEnd($arrWeekEndDay);
    // // $workDayStart = $arrTimeStart[1];
    // // $workDayEnd = $arrTimeEnd[1];
    // // $same = true;
    // // for ($i = 1; $i <= 5; $i++) {
    // // if ($arrTimeStart[$i] != null && $arrTimeEnd[$i] != null
    // // && $arrTimeStart[$i] != $workDayStart || $arrTimeEnd[$i] != $workDayEnd)
    // // {
    // // $same = false;
    // // }
    // // }
    
    // // if ($same) {
    // // $strWeekEnd = null;
    // // if ($arrWeekEndDay[6] != null) {
    // // $strWeekEnd .= $arrTimeStart[$i].'-'.$arrTimeEnd[$i];
    // // }
    // // return array_push($arrayTimeWork, $start.'-'.$end, $strWeekEnd);
    // // }
    // }
    private function GetArrayServices($arrayNamesServices)
    {
        $arrayCheckServices = array();
        for ($i = 1; $i <= count($arrayNamesServices); $i ++) {
            array_push($arrayCheckServices, $_POST[$i . '-service']);
        }
        return $arrayCheckServices;
    }

    private function SaveError($arrayParam)
    {
        for ($i = 1; $i < count($arrayParam); $i ++) {
            if ($arrayParam[$i] == - 1) {
                return false;
            }
        }
        return true;
    }

    //проверка на существование сохраняемых данных в таблице
//     public function IsExistData($post){
//         $typeCompanyId = $_POST['typeCompanyId'];
//         if(empty($this->dal->GetTypeInstitutionById($typeCompanyId))){
//             return false;
//         }
        
//         $arrayServicesId = $_POST['arrayServicesId'];
//         for ($i = 0; $i < count($arrayServicesId); $i++) {
//             if (empty($this->dal->$arrayServicesId[$i])) {
//                 return false;
//             }
//         }
//     }
    
    // начать сохранение --- для рефакторинга разбить метод на 2 действия - GetIdInsert
    public function Save($post)
    {
        $id = $_SESSION['user_id'];
        $organizationId = $this->dal->GetOrganizationIdByUser($id);
        $resultOrganizationSummaryData = $this->dal->GetOrganizationSummaryData($organizationId);
        if ($organizationId == null || $resultOrganizationSummaryData['actualLocation'] == null) {
            $this->InsertData($post);
        }
        else {
            $this->UpdateData($post);
        }
    }
    
    public function InsertData($post){
        $id = $_SESSION['user_id'];
        $organizationId = $this->dal->GetOrganizationIdByUser($id);
        $resultOrganizationSummaryData = $this->dal->GetOrganizationSummaryData($organizationId);
        
    }
    
    public function UpdateData($post){
        $id = $_SESSION['user_id'];
        $organizationId = $this->dal->GetOrganizationIdByUser($id);
        $resultOrganizationSummaryData = $this->dal->GetOrganizationSummaryData($organizationId);
    }
    function test($param) {
        
    
        if ($organizationId != null && $this->IsExistData($post)) {
//             $_POST['typeCompanyId']; //тип учереждения
            
//             $_POST['arrayServices']; // тут прийдет ассоциативный массив
            $serviceId = $this->dal->FindServiceId($_POST['arrayServices']);
            if ($serviceId == -1) {
                $this->dal->InsertService($_POST['arrayServices']);//если не нахожу то создаю
                $serviceId = $this->dal->FindLastServiceId();//получить id
            }
            
//             $_POST['arrayInsuranceCompanes'];  //тут прийдет array(1,2,3)
            $insuranceCompanesId = $this->dal->FindInsuranceCompanyId($_POST['arrayInsuranceCompanes']);
            // тут тоже нужно будет добовлять код для добовления данных если разрастутся страхования
            
//             $_POST['nameCompany'];
            $nameCompanyId = $this->dal->CheckForAmatchCompanyDateId($_POST['nameCompany']['id']);
            if($nameCompanyId != -1){ // если найду по id //проверить на совпадание
                if (!$this->CheckForAmatchCompanyDate($_POST['nameCompany']['name'])) {
                    $this->dal->UpdateCompanyName($nameCompanyId, $_POST['nameCompany']['name']);
                } 
            }
            else {
                return -1;
            }
            
            //1
            $resultOrganizationSummaryData = $this->dal->GetOrganizationSummaryData($organizationId);
            $actualLocationId = $resultOrganizationData['actualLocation'];//улица id - $resultOrganizationData['actualLocation'];
            
            //поднимаю данные об улице из юзера
                //если у пользователя нет улици, то создаю новую //привязываю город, район, область, дом 
            //найти улицуи её id
            $streetId = $this->FindActualLocationId($_POST['street']);
            if ($streetId == null) {
                
                $streetId = 
            }
            if ($actualLocationId != $streetId) { //если равно, то продолжаем работу
//                 //2
//                 $resultActualLocationData = $this->dal->GetActualLocation($actualLocationId);
//                 $townId = $resultActualLocationData['locality'];
//                 if ($resultActualLocationData['locality'] != $_POST['town']) {//город id - $resultActualLocationData['locality']
                    
//                 }
//             }
            
            
//             $resultLocationData = $this->dal->GetLocation($resultActualLocationData['locality']);
//             if ($resultLocationData['districtRegion'] == $_POST['district']) {
//                 $resultDistrictData = $this->dal->GetDistrictRegion($resultLocationData['districtRegion']);
//                 if ($resultDistrictData['region'] = $_POST['region']) {
                    
//                 }
//             }
            
//             if ($this->dal->FindActualLocationId($actualLocationId)) {
//                 ;
            }
            //проверить дом
            
            $_POST['town'];
            
            
            $_POST['home']; //если существует
            $_POST['arrayPhones']; //если существует тут прийдет array(1 => tel, 2 => tel, 3 => tel);
            $_POST['arrayDayTimeWork']; //array( ['dayWork']=>array(1 => false), ['startWork']=>array(1 => 7), ['endWork']=>array(1 => 19))
        }
            
            
//+             id
//             actual_location_fk
//             organization_fk
//+             type_works_fk
//             type_institution_fk
//             day_work_fk
//             insurance_companies_fk
//             services_fk
//             state

            
        
        // организации(Название)
        $idOrganization = $this->dal->GetIdInsertOrganization($post['nameCompanyId']);
        // область
        $idRegion = $this->dal->GetIdInsertGetRegion($post['region']);
        // город
        $idTown = $this->dal->GetIdInsertGetDistrictCity($post['town'], $idRegion);
        // район области
        $idDistrictRegion = $this->dal->GetIdInsertGetDistrictRegion($post['districtCity'], $idTown);
        // улица
        $idStreet = $this->dal->GetIdInsertActualLocation($post['street'], $idTown);
        
        $idHome = null;
        if (! isset($post['home']) || ! empty($post['home'])) {
            // дом
            $idHome = $this->dal->GetIdInsertHome($post['home'], $idStreet);
        }
        
        $idPhone = null;
        if (GetStrPhones() != null) {
            // телефон
            $idPhone = $this->dal->GetIdInsertPhone($this->GetStrPhones());
        }
        // типу учереждение
        $idTypeCompany = $this->dal->GetIdInsertTypeInstitution($post['typeCompany']);
        // страховаые компании - тут непонятки т.к. тут чекбоксы из 1 таблицы
        $idInsuranceCompany = $this->dal->GetIdInsertInsuranceCompany($this->GetArrayInsuranceCompany());
        
        // дни работы(определить рабочие дни)
        $arrWeekEndDay = $this->GetArrayWeekEnd();
        $arrayNameDays = $this->GetArrayNameDays();
        $idDayWork = $this->dal->GetIdInsertDayWork($this->GetStringWorkDay($arrWeekEndDay, $arrayNameDays));
        
        // время работы(определить дни работы)
        $arrTimeWorkStart = $this->GetArrayTimeWorkStart();
        $arrTimeWorkEnd = $this->GetArrayTimeWorkEnd();
        $idTimeWork = $this->dal->GetIdInsertTimeWork($this->GetArrayTimeWork($arrWeekEndDay, $arrayNameDays, $arrTimeWorkStart, $arrTimeWorkEnd));
        // Направления/услуги
        $idServices = $this->dal->GetIdInsertServices($this->GetArrayServices($arrayNamesServices));
        
        $arraySaveError = array(
            $idOrganization,
            $idRegion,
            $idTown,
            $idDistrictRegion,
            $idStreet,
            $idHome,
            $idPhone,
            $idTypeCompany,
            $idInsuranceCompany,
            $idDayWork,
            $idTimeWork,
            $idServices
        );
        if ($this->SaveError($arrayParam)) {
            echo 'Error save.';
        }
        // сохранить все в одной таблие
        $idSummaryTable = $this->dal->GetIdInsertSummaryTable();
        return $idSummaryTable;
    }
    //TODO Обновление данных
    public function Update($post){
        // проверить существование организации(Название)
        $idOrganization = $this->dal->GetIdInsertOrganization($post['nameCompanyId']);
        // область
        $idRegion = $this->dal->GetIdInsertGetRegion($post['region']);
        // город
        $idTown = $this->dal->GetIdInsertGetDistrictCity($post['town'], $idRegion);
        // район области
        $idDistrictRegion = $this->dal->GetIdInsertGetDistrictRegion($post['districtCity'], $idTown);
        // улица
        $idStreet = $this->dal->GetIdInsertActualLocation($post['street'], $idTown);
        
        $idHome = null;
        if (! isset($post['home']) || ! empty($post['home'])) {
            // дом
            $idHome = $this->dal->GetIdInsertHome($post['home'], $idStreet);
        }
        
        $idPhone = null;
        if (GetStrPhones() != null) {
            // телефон
            $idPhone = $this->dal->GetIdInsertPhone($this->GetStrPhones());
        }
        // типу учереждение
        $idTypeCompany = $this->dal->GetIdInsertTypeInstitution($post['typeCompany']);
        // страховаые компании - тут непонятки т.к. тут чекбоксы из 1 таблицы
        $idInsuranceCompany = $this->dal->GetIdInsertInsuranceCompany($this->GetArrayInsuranceCompany());
        
        // дни работы(определить рабочие дни)
        $arrWeekEndDay = $this->GetArrayWeekEnd();
        $arrayNameDays = $this->GetArrayNameDays();
        $idDayWork = $this->dal->GetIdInsertDayWork($this->GetStringWorkDay($arrWeekEndDay, $arrayNameDays));
        
        // время работы(определить дни работы)
        $arrTimeWorkStart = $this->GetArrayTimeWorkStart();
        $arrTimeWorkEnd = $this->GetArrayTimeWorkEnd();
        $idTimeWork = $this->dal->GetIdInsertTimeWork($this->GetArrayTimeWork($arrWeekEndDay, $arrayNameDays, $arrTimeWorkStart, $arrTimeWorkEnd));
        // Направления/услуги
        $idServices = $this->dal->GetIdInsertServices($this->GetArrayServices($arrayNamesServices));
        
        $arraySaveError = array(
            $idOrganization,
            $idRegion,
            $idTown,
            $idDistrictRegion,
            $idStreet,
            $idHome,
            $idPhone,
            $idTypeCompany,
            $idInsuranceCompany,
            $idDayWork,
            $idTimeWork,
            $idServices
        );
        if ($this->SaveError($arrayParam)) {
            echo 'Error save.';
        }
        // сохранить все в одной таблие
        $idSummaryTable = $this->dal->GetIdInsertSummaryTable();
        return $idSummaryTable;
    }
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
