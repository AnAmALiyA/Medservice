<?php
class DAL
{
    // офицыальный сайт медсервиса
    // private $host='10.0.0.10';
    // private $user='uh347272_med24';
    // private $password='a6qxcqaby';
    // private $database='uh347272_med24';
    
    // локальное подключение
     private $host = 'localhost';
     private $user = 'root';
     private $password = '';
     private $database = 'uh347272_med24';
//     webspectrum
//    private $host='localhost';
//    private $user='andrew19_med';
//    private $password='a6qxcqabymed';
//    private $database='andrew19_uh347272_med24';

    private $arrayNamesServices;
    private $arrayNamesInsuranceCompany;
    private $arrayDay;
    
    private $tableActualLocation = 'med_actual_location';
    private $tableTypeInstitution = 'med_type_institution';
    private $tableServices = 'med_services';
    private $tableInsuranceCompanies = 'med_insurance_companies';
    private $tableOrganization = 'med_organization';
    private $tableTimeWork = 'med_time_work';
    private $tableDayWork = 'med_day_work';
    private $tablePhone = 'med_phone';
    private $tableHome = 'med_home';
    private $tableDistrictRegion = 'med_district_region';
    private $tableLocality = 'med_locality';
    private $tableRegion = 'med_region';
    private $tableSummaryTable = 'med_summary_table';
    private $tableUsers = 'med_users';
    private $tableImage = 'med_image';
    
    public function __construct()
    {
        $this->arrayNamesServices = array(
            'dentistry' => 'Стоматологія',
            'childrens_dentistry' => 'Дитяча стоматологія',
            'therapeutic_dentistry' => 'Терапевтична стоматологія',
            'aesthetic_dentistry' => 'Естетична стоматологія',
            'orthodontics' => 'Ортодонтія',
            'dental_othopedics' => 'Стоматологічна ортопедія (протезування)',
            'dental_surgery' => 'Стоматологічна хірургія',
            'dental_Implantology' => 'Стоматологічна імплантологія',
            'periodontology' => 'Пародонтологія',
            'dental_prophylaxis' => 'Стоматологічна профілактика',
            'dentistry_pregnant_women' => 'Стоматологія для вагітних',
            'tooth_whitening' => 'Відбілювання зубів',
            'gnathology' => 'Гнатологія',
            'dental_bone_plastics' => 'Стоматологічна кістяна пластика',
            'dentistry_at_home' => 'Стоматологія на дому',
            'allergy' => 'Алергіологія',
            'alcoholism' => 'Алкоголізм',
            'gastroenterology' => 'Гастроентерологія',
            'childrens_consultation' => 'Дитяча консультація',
            'ecg' => 'ЕКГ',
            'ct' => 'КТ',
            'mammography' => 'Мамографія',
            'mri' => 'МРТ',
            'oncology' => 'Онкологія',
            'wounded' => 'Опікове',
            'otorhinolaryngology' => 'Оториноларингологія (ЛОР)',
            'radiology' => 'Рентгенологія',
            'sports_medicine' => 'Спортивна медицина',
            'surgery' => 'Сурдологія',
            'ultrasound_diagnosis' => 'Ультразвукова діагностика',
            'call_doctor_home' => 'Виклик лікаря додому',
            'family_medicine' => 'Сімейна медицина',
            'timpanometry' => 'Тімпанометрія'
        );
        $this->arrayNamesInsuranceCompany = array(
            'usk' =>'УСК',
            'aska' =>'АСКА'
        );
        $this->arrayDay = array(
            'monday_fk' => 'monday',
            'tuesday_fk' => 'tuesday',
            'wednesday_fk' => 'wednesday',
            'thursday_fk' => 'thursday',
            'friday_fk' => 'friday',
            'saturday_fk' => 'saturday',
            'sunday_fk' => 'sunday'
        );
    }
    ///////////////////// методы запросов до БД // начало //////////////////////////
    private function ConnectDB()
    {
        $link = mysqli_connect($this->host, $this->user, $this->password, $this->database) or die("Ошибка " . mysqli_error($link));
        return $link;
    }
    
    private function CloseConnectDB($link)
    {
        mysqli_close($link);
    }
     private function GetArrayAllCol($table)
    {
        $obj = $this->QuerySelectAll($table);
        
        $arr = array();
        $i = 1;
        while ($result = mysqli_fetch_assoc($obj)) {
            $arrTemp = array();
            foreach ($result as $key => $value) {
                $arrTemp[$key] = $value;
            }
            $arr[$i] = $arrTemp;
            $i ++;
        }
        return $arr;
    }
	
    private function QuerySelectAll($table, $select = "*")
    {
        $query = "SELECT $select FROM $table";
        $link = $this->ConnectDB();
        
        $result = mysqli_query($link, $query);
        //         $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
        
        $this->CloseConnectDB($link);
        return $result;
    }
    
    private function QuerySelectById($table, $selectId)
    {
        $query = "SELECT * FROM $table WHERE id = $selectId";
        $link = $this->ConnectDB();
        
        $result = mysqli_query($link, $query);
        //         $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
        
        $this->CloseConnectDB($link);
        return $result;
    }
    
    private function QuerySelectWhere($table, $stringSelect, $select, $selectCol = '*')
    {
        $query = "SELECT $selectCol FROM $table WHERE $stringSelect = '$select'";
        echo $query.'<br/>';
        $link = $this->ConnectDB();
        
        $result = mysqli_query($link, $query);
//         $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
        
        $this->CloseConnectDB($link);
        return $result;
    }
    
    private function FindId($table, $arrayNamesTableRows, $arrayValuesTableRows)
    {
        $set = '';
        if(is_array($arrayNamesTableRows)){
            for ($i = 0; $i < count($arrayNamesTableRows); $i++) {
                $dot = $i == 0 ? '' : ' AND ';
                $set .= "$dot $arrayNamesTableRows[$i] = '$arrayValuesTableRows[$i]'";
            }
        }
        else {
            echo $arrayNamesTableRows;
            echo $arrayValuesTableRows;
            $set .= "$arrayNamesTableRows = '$arrayValuesTableRows'";
        }
        $query = "SELECT id FROM $table WHERE $set";
        
        //         $query = "SELECT id FROM med_actual_location WHERE actual_location = 'вул. петропавлівська' AND locality_fk = 3 AND home_fk = 2";
                echo  $query.'<br/>';
        $link = $this->ConnectDB();
        
        $result = mysqli_query($link, $query);
        //         $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
        
        $this->CloseConnectDB($link);
        var_dump($result).'<br/>';
        $resultObj = mysqli_fetch_assoc($result);
        
        if (count($resultObj) == 1) {
            return $resultObj['id'];
        }
        return - 1;
    }
    
    private function FindLastId($table)
    {
        $query = "SELECT id FROM $table ORDER BY id DESC LIMIT 1";
        $link = $this->ConnectDB();
        
        $result = mysqli_query($link, $query);
        //         $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
        
        $this->CloseConnectDB($link);
        
        $resultObj = mysqli_fetch_assoc($result);
        if (count($resultObj) == 1) {
            return $resultObj['id'];
        }
        return - 1;
    }
  /*  
    private function QueryInsert($table, $arrayNamesColumns, $arrayValuesColumns)
    {
        $query = "INSERT INTO $table($arrayNamesColumns) VALUES($arrayValuesColumns)";
        echo $query.'<br/>';
        $link = $this->ConnectDB();
        
        //$result = mysqli_query($link, $query);
                 $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
        
        $this->CloseConnectDB($link);
        return $result;
    }
    */
    private function QueryInsert($table, $arrayNamesColumns, $arrayValuesColumns)
    {
        $namesColumns = '';
        $valuesColumns = '';
        if(is_array($arrayNamesColumns)){
            for ($i = 0; $i < count($arrayNamesColumns); $i++) {
                $dot = $i != 0 ? ', ' : '';
                $namesColumns .= "$dot $arrayNamesColumns[$i]";
                $valuesColumns .= "$dot $arrayValuesColumns[$i]";
            }
        }
        else {
            $namesColumns = $arrayNamesColumns;
            $valuesColumns = $arrayValuesColumns;
        }
        $query = "INSERT INTO $table($namesColumns) VALUES($valuesColumns)";
        echo $query.'<br/>';
        $link = $this->ConnectDB();
        
        //$result = mysqli_query($link, $query);
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
        
        $this->CloseConnectDB($link);
        return $result;
    }
    

     private function QueryDelete($table, $id)
     {
         $query = "DELETE FROM $table WHERE id=$id";
         $link = ConnectDB();
         
         $result = mysqli_query($link, $query);
//          $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
         
         $this->CloseConnectDB($link);
         return $result;
     }
     
    private function QueryUpdate($table, $arrayNamesTableRows, $arrayValuesTableRows, $id)
    {
        $set = '';
        echo is_array($arrayNamesTableRows).'<br/>';
        echo count($arrayNamesTableRows).'<br/>';
        if(is_array($arrayNamesTableRows)){
            for ($i = 0; $i < count($arrayNamesTableRows); $i++) {
                $dot = $i != 0 ? ', ' : '';
                $set .= "$dot $arrayNamesTableRows[$i] = '$arrayValuesTableRows[$i]'";
            }
        }
        else {
            $set .= "$arrayNamesTableRows = '$arrayValuesTableRows'";
        }
        
        $query = "UPDATE $table SET $set WHERE id=$id";
        //          $query = "UPDATE $Table SET $nameTableRow = '$valueTableRow' WHERE id=$id";
        echo $query;
        $link = $this->ConnectDB();
        
        $result = mysqli_query($link, $query);
        //          $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
        
        $this->CloseConnectDB($link);
        return $result;
    }
    // /////////////////// методы запросов до БД // конец //////////////////////////
    // /////////////////// методы авторизации // начало //////////////////////////
    public function GetUserById($id)
    {
        return $this->SelectById($this->tableUsers, $id);
    }
    
    public function FindIdByLogin($login)
    {
        return $this->FindId('med_users', 'login', $login);
    }
    
    public function GetIdByLoginPassword($login, $passwordmd5)
    {
        $arrayNamesTableRows = array('login', 'password');
        $arrayValuesTableRows = array("'$login'", "'$passwordmd5'");
        return $this->FindId($table, $arrayNamesTableRows, $arrayValuesTableRows);
    }
    
    public function SaveUser($login, $password, $hash, $user_category)
    {
        $arrayNamesTableRows = array(
            'login',
            'password',
            'hash',
            'user_category'
        );
        $arrayValuesTableRows = array(
            "'$login'",
            "'$password'",
            "'$hash'",
            $user_category
        );
        $getResult = $this->QueryInsert('med_users', $arrayNamesTableRows, $arrayValuesTableRows);
        return $getResult; // вернуть результат сохранения
    }
// ///////////////////// методы авторизации // конец //////////////////////////
// ///////////// методы получения данных в форму // начало ///////////////////
    private function SelectById($table, $id)
    {
        $result = $this->QuerySelectById($table, $id);
        foreach ($result as $key => $value) {
            return $value;
        }
    }
    
    private function SelectByIdWhere($table, $stringSelect, $id, $selectCol = '*')
    {
        $result = $this->QuerySelectWhere($table, $stringSelect, $id, $selectCol);
        return $this->GenerateArrayWhithObj($result);
    }
    
    private function GenerateArrayWhithObj($obj)
    {
        $id = array();
        $name = array();
        foreach ($obj as $value) {
            foreach ($value as $keyIn => $valueIn) {
                if ($keyIn == 'id') {
                    array_push($id, $valueIn);
                    continue;
                }
                array_push($name, $valueIn);
            }
        }
        return $summ = array(
            'id' => $id,
            'name' => $name
        );
    }
    // Тип учереждения
    public function GetTypeInstitutions()
    {
        $result = $this->QuerySelectAll($this->tableTypeInstitution);
        return  $this->GenerateArrayWhithObj($result);
    }
    
    public function GetTypeInstitutionById($selectId)
    {
        $result = $this->SelectById($this->tableTypeInstitution, $selectId);
        return array(
            'id' => $result['id'],
            'typeDescription' => $result['type_description']
        );
    }
    // сервисы - имена
    public function GetNamesServices()
    {
        $summ = array();
        foreach ($this->arrayNamesServices as $value) {
            array_push($summ, $value);
        }
        return $summ;
    }
    // формирую массив сервисов только тех, которые есть
    public function GetServicesData($servicesId){
        $result = $this->SelectById($this->tableServices, $servicesId);
        $arrayServices = array();
        foreach ($result as $key => $value) {
            if ($value != null) {
               $arrayServices[] = $this->arrayNamesServices[$key];
            }
        }
        return $arrayServices;
    }
    // страховая компания - имена
    public function GetNamesInsuranceCompanes()
    {
        $arrayNames = array();
        for ($i = 0; $i < count($this->arrayNamesInsuranceCompany); $i++) {
            array_push($arrayNames, $this->arrayNamesInsuranceCompany[$i]);
        }
        return $arrayNames;
    }
    //получить данные по id и вывести
    public function GetInsuranceCompanesData($id){
        $result = $this->SelectById($this->tableInsuranceCompanies, $id);
        $arrayInsuranceCompanes = array();
        foreach ($result as $key => $value) {
            if ($value != null) {
                $arrayServices[] = $this->arrayNamesInsuranceCompany[$key];
            }
        }
        return $arrayServices;
    }
    // получить данные связанные с организацией
    public function GetOrganizationSummaryData($id)
    {
        $result = $this->SelectById($this->tableSummaryTable, $id);
        return array(
            'id' => $result['id'],
            'actualLocation' => $result['actual_location_fk'],
            'organization' => $result['organization_fk'],
            'typeWork' => $result['type_works_fk'],
            'typeInstitution' => $result['type_institution_fk'],
            'dayWork' => $result['day_work_fk'],
            'insuranceCompanie' => $result['insurance_companies_fk'],
            'service' => $result['services_fk'],
            'state' => $result['state']
        );
    }
    //получить данные организации //имя фирмы
    public function GetOrganization($id) {
        $result = $this->SelectById($this->tableOrganization, $id);
        return array(
            'id' => $result['id'],
            'shortName' => $result['short_name'],
            'typeOwnership' => $result['type_ownership_fk'],
            'name' => $result['name'],
            'edrpouCode' => $result['edrpou_code']
        );
    }
    //получить id таблицу с организациями из таблицы юзер
    public function GetOrganizationIdByUser($id) {
        $result = $this->GetUserById($id);
        return $result['summary_table_fk'];
    }
    //область
    public function GetRegionsArray(){
        $result = $this->QuerySelectAll($this->tableRegion);
        return $this->GenerateArrayWhithObj($result);
    }
    
    public function GetRegion($id) {
        $result = $this->SelectById($this->tableRegion, $id);
        return array(
            'id' => $result['id'],
            'region' => $result['region']
        );
    }
    //улица
    public function GetActualLocation($id)
    {
        $result = $this->SelectById($this->tableActualLocation, $id);
        return array(
            'id' => $result['id'],
            'actualLocation' => $result['actual_location'],
            'locality' => $result['locality_fk']
        );
    }
    //TODO maby error
    public function GetActualLocationArrayByCity($id) {
        $stringSelect = 'locality_fk';
        $selectCol = 'id, actual_location';
        return $this->SelectByIdWhere($this->tableActualLocation, $stringSelect, $id, $selectCol);
    }
    //город
    public function GetCitesArrayByDistrictRegion($id) {
        $stringSelect = 'district_region_fk';
        $selectCol = 'id, locality';
        return $this->SelectByIdWhere($this->tableLocality, $stringSelect, $id, $selectCol);
    }
    
    public function GetLocationById($id){
        $result = $this->SelectById($this->tableLocality, $id);
        return array(
            'id' => $result['id'],
            'locality' => $result['locality'],
            'typeLocality' => $result['type_locality_fk'],
            'districtRegion' => $result['district_region_fk']
        );
    }
    //район области
    public function GetDistrictRegion($id) {
        $result = $this->SelectById($this->tableDistrictRegion, $id);
        return array(
            'id' => $result['id'],
            'district' => $result['district'],
            'region' => $result['region_fk']
        );
    }
    
    public function GetDistrictRegionArrayByRegion($id){
        $stringSelect = 'region_fk';
        $selectCol = 'id, district';
        return $this->SelectByIdWhere($this->tableDistrictRegion, $stringSelect, $id, $selectCol);
    }
    //дом
    public function GetHomeById($id) {
        $stringSelect = 'id';
        $result = $this->QuerySelectWhere($this->tableHome, $stringSelect, $id);
        foreach ($result as $value) {
            return array(
                'id' => $value['id'],
                'numberHome' => $value['number_home']
            );
        }
    }
    //телефоны
    public function GetPhonesOrganizationId($organizationId) {
        $selectCol = 'id, phone';
        $stringSelect = 'summary_table_fk';
        //TODO дебилизм PHP
//         return $this->SelectByIdWhere($this->tablePhone, $stringSelect, $organizationId, $selectCol);
        return array("id"=> array(11, 12, 13),
            "name" => array('0442228802', '0504441575', "0672396918"));
    }
    // выходные дни
    public function GetDaysTimeWorkById($id)
    {
        $resultDay = $this->GetDayWork($id);
        
        $dayWork = array();
        $startTimeWork = array();
        $endTimeWork = array();
        
        foreach ($resultDay as $key => $value) {
            if ($key != 'id') {
                $resultTimeWork = $this->GetTimeWork($value);
                if ($resultTimeWork['weekend']) {
                    $dayWork[$this->arrayDay[$key]] = true;
                } else {
                    $dayWork[$this->arrayDay[$key]] = false;
                    
                    $startTime = new DateTime($resultTimeWork['start_work']);
                    $startTimeWork[$this->arrayDay[$key]] = $startTime->format('H')*1;
                    
                    $endTime = new DateTime($resultTimeWork['end_work']);
                    $endTimeWork[$this->arrayDay[$key]] = $endTime->format('H')*1;
                }
            }
        }
        return array(
            'day' => $dayWork, 
            'startTime' => $startTimeWork, 
            'endTime' => $endTimeWork);
    }
    
    private function GetDayWork($id) {
        return $this->SelectById($this->tableDayWork, $id);
    }
    
    private function GetTimeWork($id) {
        return $this->SelectById($this->tableTimeWork, $id);
    }
// ///////////// методы получения данных в форму // конец ///////////////////
    // TODO логотип DAL
//////////////Сохранение данных/////////начало//////////////
    private function GenerateNamesService($arrayData){
        $arrayKey = array();
        foreach ($this->arrayNamesServices as $key1 => $value1) {
            foreach ($arrayData as $key2 => $value2) {
                if ($value1 == $value2) {
                    $arrayKey[$key1] = $value2;
                }
            }
        }
        return $arrayKey;
    }
    // ищу совпадение сервисов в таблице для получения id строки
    public function FindServiceId($arrayData)
    {
        $arrayKey = $this->GenerateNamesService($arrayData);
        
        $result = $this->QuerySelectAll($this->tableServices);
        foreach ($result as $valueServ1) { // получаю строку из таблицы
            $flag = true;
            $rowId = '';
            foreach ($valueServ1 as $keyServ2 => $valueServ2) { // перебираю строку по имени столбца и данных
                if ($keyServ2 == 'id') {
                    $rowId = $valueServ2;
                    continue;
                }
                if ($valueServ2 != null && $arrayKey[$keyServ2] == null) {
                    $flag = false;
                }
            }
            if ($flag) {
                return $flagId;
            }
        }
        return -1;
    }
    //сохранить новые сервисы
    public function InsertService($arrayData){
        $arrayKey = $this->GenerateNamesService($arrayData);
        
        $arrayNamesColumns[] = 'id';
        foreach ($this->arrayNamesServices as $key => $value) {
//             $arrayNamesColumns .= ', '.$key;
            $arrayNamesColumns[] = $key;
        }
        
        $arrayValuesColumns[] = 'null';
for ($i = 0; $i < count($arrayNamesColumns); $i++) {//перебираю массив пришедших данных
    if ($arrayKey[$arrayNamesColumns[$i]] == null) {
                $arrayValuesColumns[] = 'null';
            }
            $arrayValuesColumns[] = 1;
        }
        $this->QueryInsert($this->tableServices, $arrayNamesColumns, $arrayValuesColumns);
    }
    public function FindLastServiceId() {
        return $this->FindLastId($this->tableServices);
    }
    //страхование
    public function GenerateNamesInsuranceCompany($arrayData){
        $arrayKey = array();
        foreach ($this->arrayNamesInsuranceCompany as $key1 => $value1) {
            foreach ($arrayData as $key2 => $value2) {
                if ($value1 == $value2) {
                    $arrayKey[$key1] = $value2;
                }
            }
        }
        return $arrayKey;
    }
    
    public function FindInsuranceCompanyId($arrayData){
        $arrayKey = $this->GenerateNamesInsuranceCompany($arrayData);
        
        $result = $this->QuerySelectAll($this->tableInsuranceCompanies);
        foreach ($result as $valueServ1) { // получаю строку из таблицы
            $flag = true;
            $rowId = '';
            foreach ($valueServ1 as $keyServ2 => $valueServ2) { // перебираю строку по имени столбца и данных
                if ($keyServ2 == 'id') {
                    $rowId = $valueServ2;
                    continue;
                }
                if ($valueServ2 != null && $arrayKey[$keyServ2] == null) {
                    $flag = false;
                }
            }
            if ($flag) {
                return $flagId;
            }
        }
        return -1;
    }
    //найти компанию
    private function FindCompanyById($id){
        return $this->SelectById($this->tableOrganization, $id);
    }
    
    public function CheckForAmatchCompanyDateId($id){
        $result = $this->FindCompanyById($id);
        return $result['id'];
    }
    
    public function CheckForAmatchCompanyDate($name){
        $result = $this->FindCompanyById($id);
        if ($result['name'] == $name) {
            return true;
        }
        return false;
    }
    
    public function UpdateCompanyName($id, $name){
        $nameCol = 'name';
        return $this->QueryUpdate($this->tableOrganization, $nameCol, $name, $id);//return поставил проверить
    }
    
    public function FindActualLocationDataById($id){
        $result = $this->SelectById($this->tableActualLocation, $id);
        return array(
            'id' => $result['id'],
            'actualLocation' => $result['actual_location'],
            'locality' => $result['locality_fk'],
            'home' => $result['home_fk']
        );
    }
    
    public function FindActualLocationId($select){
        $stringSelect = 'actual_location';
        $selectCol = 'id';
        $result = $this->QuerySelectWhere($this->tableActualLocation, $stringSelect, $select, $selectCol);
        $cast = mysqli_fetch_assoc($result);
        return $cast['id'];
    }
    //дом
    public function GetHomeIdByNumber($number){
        $stringSelect = 'number_home';
        $selectCol = 'id';
        //$dd = $this->QuerySelectWhere($table, $stringSelect, $number, $selectCol);
        $result = $this->SelectByIdWhere($this->tableHome, $stringSelect, $number, $selectCol);
        return $result['id'][0];
    }
    
    public function UpdateHome($id, $string) {
        $nameCol = 'number_home';
        return $this->QueryUpdate($this->tableHome, $nameCol, $string, $id);//return поставил проверить
    }
    
    public function InsertHome($number) {
        $namesColumn = 'number_home';
        $valuesColumn = "'$number'";
        return $this->QueryInsert($this->tableHome, $namesColumn, $valuesColumn);
    }
    //улица
    public function InsertActualLocation($streetStr, $homeId, $cityId){
        $namesColumns = array('actual_location', 'locality_fk', 'home_fk');
        $valuesColumns =  array("'$streetStr'", $homeId, $cityId);
        return $this->QueryInsert($this->tableActualLocation, $namesColumns, $valuesColumns);
    }
    
    public function GetActualLocationIdByStreetHomeCity($street, $homeId, $cityId){
        $arrayNamesTableRows = array('actual_location', 'locality_fk', 'home_fk');
        $arrayValuesTableRows = array($street, $homeId, $cityId);
        $result = $this->FindId($this->tableActualLocation, $arrayNamesTableRows, $arrayValuesTableRows);
        return $result;
    }
    // телефон
    public function GetPhoneById($id)
    {
        $result = $this->QuerySelectById($this->tablePhone, $id);
        $cast = mysqli_fetch_assoc($result);
        return array(
            'id' => $cast['id'],
            'phone' => $cast['phone'],
            'summaryTable' => $cast['summary_table_fk']
        );
    }

    public function UpdatePhone($id, $phone)
    {
        $nameCol = 'phone';
        return $this->QueryUpdate($this->tablePhone, $nameCol, $phone, $id);
    }

    public function InsertPhone($phone, $organizationId)
    {
        $arrayNamesColumns = array('phone', 'summary_table_fk');
        $arrayValuesColumns = array($phone, $organizationId);
        return $this->QueryInsert($this->tablePhone, $arrayNamesColumns, $arrayValuesColumns);
    }
    // время
    public function FindIdTimeWork($value, $start = null, $end = null)
    {
        if ($value == 1) {//ожидаю что валуе булевское поле
            return $this->FindId($this->tableTimeWork, 'weekend', $value);
        }
        else {
            $arrayNamesTableRows = array('start_work', 'end_work', 'weekend');
            
            $startStr = "1970-01-01 $start:0:0";
            $endStr = "1970-01-01 $end:0:0";            
            $arrayValuesTableRows = array($startStr, $endStr, $value);//вэлуэ не выходной
            
            return $this->FindId($table, $arrayNamesTableRows, $arrayValuesTableRows);
        }
    }
    
    public function InsertTimeWork($value, $start, $end){
        $arrayNamesColumns = array('start_work', 'end_work', 'weekend');
        
        $startDate = "1970-01-01 $start:0:0";
        $endDate = "1970-01-01 $end:0:0";
        $arrayValuesColumns = array("'$startDate'", "'$endDate'", $value);
        
        $this->QueryInsert($this->tableTimeWork, $arrayNamesColumns, $arrayValuesColumns);
    }
    
    public function FindDayId($arrayTimeWorkId){
        $arrayNamesTableRows = array();
        foreach ($this->arrayDay as $key => $value) {
            $arrayNamesTableRows[] = $key;
        }
        $arrayValuesTableRows = array();
        for ($i = 0; $i < count($arrayTimeWorkId); $i++) {
            $arrayValuesTableRows[] = $arrayTimeWorkId[$i];
        }
        return $this->FindId($this->tableDayWork, $arrayNamesTableRows, $arrayValuesTableRows);
    }
    
    public function InsertDay($arrayTimeWorkId){
        $arrayNamesTableRows = array();
        foreach ($this->arrayDay as $key => $value) {
            $arrayNamesTableRows[] = $key;
        }
        $arrayValuesTableRows = array();
        for ($i = 0; $i < count($arrayTimeWorkId); $i++) {
            $arrayValuesTableRows[] = $arrayTimeWorkId[$i];
        }
        return $this->QueryInsert($this->tableDayWork, $arrayNamesTableRows, $arrayValuesTableRows);
    }
    
    public function UpdateOrganizationData($organizationId, $arrayOrganizationData) {
        $arrayNamesTableRows = array(
            'actual_location_fk',
            'organization_fk',
//             'type_works_fk',
            'type_institution_fk',
            'day_work_fk',
            'insurance_companies_fk',
            'services_fk',
            'state'
        );
        $arrayValuesTableRows = array($organizationId);
        for ($i = 0; $i < count($arrayOrganizationData); $i++) {
            $arrayValuesTableRows[] = $arrayOrganizationData[$i];
        }
        return $this->QueryUpdate($this->tableSummaryTable, $arrayNamesTableRows, $arrayValuesTableRows, $organizationId);
    }
    //обновить улицу
    public function UpdateActualLocation($id, $nameStreet, $cityId, $homeId){
        $arrayNamesTableRows = array(
            'actual_location',
            'locality_fk',
            'home_fk'
        );
        $arrayValuesTableRows = array(
            "'$nameStreet'", 
            $cityId, 
            $homeId
        );
        return $this->QueryUpdate($this->tableActualLocation, $arrayNamesTableRows, $arrayValuesTableRows, $id);
    }
    ///////////////Сохранение данных/////////конец//////////////
    ///////////////Удаление данных/////////начало//////////////
    public function DeletePhone($id){
        return $this->QueryDelete($this->tablePhone, $id);
    }
    //TODO удаление картинки не написанно
    public function DeleteImage($id){
//         return $this->QueryDelete($this->tablePhone, $id);
    }
    ///////////////Удаление данных/////////конец//////////////
//////////////////Сергей//////////начало//////
    //
    public function GetNewsAllCol()
    {
        $table = 'med_news';
        return $this->GetArrayAllCol($table);
    }
    
    public function SaveNews($news_title, $med_user_fk, $news_descripion ,$date_show , $date_news )
    {
        $arrayNamesTabelRows = array(
            'news_title',
            'med_user_fk',
            'news_descripion',
            'news_show_date',
            'news_data'
        );
        $arrayValuesTabelRows = array(
            $news_title,
            $med_user_fk,
            $news_descripion,
            $date_show ,
            $date_news
        );
        $getResult = $this->QueryInsertNPGetId('med_news', $arrayNamesTabelRows, $arrayValuesTabelRows);
        if ($getResult) {
            return $getResult;
        } else {
            return false;
        }
    }
    
    public function GetPromoAllCol()
    {
        $table = 'med_promo';
        return $this->GetArrayAllCol($table);
    }
    
    public function SavePromo($promo_title, $med_user_fk, $promo_descripion ,$date_show , $date_promo )
    {
        $arrayNamesTabelRows = array(
            'promo_title',
            'med_user_fk',
            'promo_description',
            'promo_show_date',
            'promo_data'
        );
        $arrayValuesTabelRows = array(
            $promo_title,
            $med_user_fk,
            $promo_descripion,
            $date_show ,
            $date_promo
        );
        $getResult = $this->QueryInsertNPGetId('med_promo', $arrayNamesTabelRows, $arrayValuesTabelRows);
        if (isset($getResult)) {
            return $getResult;
        } else {
            return false;
        }
    }
    
    public function GetSpecialAllCol()
    {
        $table = 'med_special';
        return $this->GetArrayAllCol($table);
    }
    
    public function SaveSpecial($special_title, $special_descripion, $med_user_fk)
    {
        $arrayNamesTabelRows = array(
            
            'special_title',
            
            'special_description',
            'med_user_fk'
        );
        $arrayValuesTabelRows = array(
            
            $special_title,
            $special_descripion,
            $med_user_fk
            
        );
        $getResult = $this->QueryInsertNPGetId('med_special', $arrayNamesTabelRows, $arrayValuesTabelRows);
        if ($getResult) {
            return true;
        } else {
            return false;
        }
    }
    
    public function GetMedturismAllCol()
    {
        $table = 'med_medturism';
        return $this->GetArrayAllCol($table);
    }
    
    public function SaveMedturism($medturism_title, $medturism_descripion, $med_user_fk)
    {
        $arrayNamesTabelRows = array(
            'medturism_title',
            'med_user_fk',
            'medturism_description'
        );
        $arrayValuesTabelRows = array(
            $medturism_title,
            $med_user_fk,
            $medturism_descripion
        );
        $getResult = $this->QueryInsertNPGetId('med_medturism', $arrayNamesTabelRows, $arrayValuesTabelRows);
        if ($getResult) {
            return true;
        } else {
            return false;
        }
    }
    
    // TODO: check??? find a significant way to reveal id fro database of the last inserted item
    public function SavePicsNews($id, $news_id, $name)
    {
        $table = 'med_image';
        // TODO: check??? insert id of last item in db here
        
        $arrayNamesTabelRows = array(
            'image_userId',
            'med_news_fk',
            'image_path'
        );
        $arrayValuesTabelRows = array(
            $id,
            $news_id,
            "'$name'"
        );
        $getResult = $this->QueryInsert($table, $arrayNamesTabelRows, $arrayValuesTabelRows);
        if ($getResult) {
            return true;
        }
        
        return false;
    }
    
    public function SavePicsPromo($id, $promo_id, $name)
    {
        $table = 'med_image';
        // TODO: check??? insert id of last item in db here
        $arrayNamesTabelRows = array(
            'image_userId',
            'med_promo_fk',
            'image_path'
        );
        $arrayValuesTabelRows = array(
            $id,
            $promo_id,
            "'$name'"
        );
        $getResult = $this->QueryInsert($table, $arrayNamesTabelRows, $arrayValuesTabelRows);
        if ($getResult) {
            return true;
        }
        
        return false;
    }
    
    // just downloading pictures
    public function SavePics($id, $name)
    {
        $arrayNamesTabelRows = array(
            'image_userId',
            'image_path'
        );
        $arrayValuesTabelRows = array(
            $id,
            $name
        );
        return $this->QueryInsert($this->$tableImage, $arrayNamesTabelRows, $arrayValuesTabelRows);
    }
    
    // findout your expected id
    //TODO: need refactor call toha
    private function QueryInsertNPGetId($table, $arrayNamesColumns, $arrayValuesColumns)
    {
        $namesColumns = '';
        $valuesColumns = '';
        echo is_array($arrayNamesColumns).'<br/>';
        echo count($arrayNamesColumns).'<br/>';
        if(is_array($arrayNamesColumns)){
            for ($i = 0; $i < count($arrayNamesColumns); $i++) {
                $dot = $i != 0 ? ', ' : '';
                $namesColumns .= "$dot $arrayNamesColumns[$i]";
                $valuesColumns .= "$dot '$arrayValuesColumns[$i]'";
            }
        }
        else {
            $namesColumns = $arrayNamesColumns;
            $valuesColumns = $arrayValuesColumns;
        }
        $query = "INSERT INTO $table($namesColumns) VALUES($valuesColumns)";
        echo $query.'<br/>';
        $link = $this->ConnectDB();
        
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
        
        $id = mysqli_insert_id($link);
        
        $this->CloseConnectDB($link);
        return $id;
    }
    
    //for other stuff like medturism
    // findout your expected id
    //     private function QueryInsertGetId($table, $arrayNamesColumns, $arrayValuesColumns)
    //     {
    //         $query = "INSERT INTO $table ($arrayNamesColumns[0],$arrayNamesColumns[1],$arrayNamesColumns[2]) VALUES ('$arrayValuesColumns[0]' , '$arrayValuesColumns[1]' , '$arrayValuesColumns[2]')";
    //         echo $query." <br>";
    //         $link = $this->ConnectDB();
    
    //         $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    
    //         $id = mysqli_insert_id($link);
    
    //         $this->CloseConnectDB($link);
    //         return $id;
    //     }
    
    public function FindPicNews($indexCheck){
        $table= "med_image";
        $indexDB="med_news_fk";
        return $this->FindExistedGetID($table, $indexDB , $indexCheck);
    }
    public function FindPicPromo($indexCheck){
        $table= "med_image";
        $indexDB="med_promo_fk";
        return $this->FindExistedGetID($table, $indexDB , $indexCheck);
    }
    //testcase seems to be completed
    private function FindExistedGetID($table, $indexDB , $indexCheck){
        
        $query = "SELECT id FROM $table WHERE $indexDB = $indexCheck";
        echo $query."<br/>"; //TODO: unwrite text
        $link = $this->ConnectDB();
        //       var_dump(mysqli_query($link, $query) );
        //       echo "<br/>";
        $result = mysqli_query($link, $query) /*nah nenuzhon  or die("Ошибка " . mysqli_error($link)) */;
        //       echo $result." vivod  <br>";
        $this->CloseConnectDB($link);
        
        if($result != null){
            //cal of sql result
            $row = $result->fetch_array(MYSQLI_ASSOC);
            echo $row." <br>";
            echo $row['id']."id for return <br>";
            return $row['id'];
            
            
        }
        else return false;
    }
    
    
    //TODO: in progress of macking individual funct for each category
    public function UpdateNews($arrayUpdatedData, $id_post){
        $table = 'med_news';
        // constant place
        $arrayDBCollums = array('news_title', 'med_user_fk', 'news_descripion', 'news_show_date',
            'news_data');
        
        $result = $this->UpdateTable($table, $arrayDBCollums , $arrayUpdatedData, $id_post);
        return $result;
        
    }
    public function UpdatePromo($arrayUpdatedData, $id_post){
        $table = 'med_promo';
        // constant place
        $arrayDBCollums = array('promo_title', 'med_user_fk', 'promo_description', 'promo_show_date',
            'promo_data');
        
        $result = $this->UpdateTable($table, $arrayDBCollums , $arrayUpdatedData, $id_post);
        return $result;
        
    }
    public function UpdateSpecial($arrayUpdatedData, $id_post){
        $table = 'med_special';
        // constant place
        $arrayDBCollums = array('med_user_fk',	'special_title',	'special_description');
        
        $result = $this->UpdateTable($table, $arrayDBCollums , $arrayUpdatedData, $id_post);
        return $result;
        
    }
    public function UpdateMedturism($arrayUpdatedData, $id_post){
        $table = 'med_medturism';
        // constant place
        $arrayDBCollums = array('med_user_fk',	'medturism_title',	'medturism_description');
        
        $result = $this->UpdateTable($table, $arrayDBCollums , $arrayUpdatedData, $id_post);
        return $result;
        
    }
    public function UpdatePicPromo($arrayUpdatedData, $id_post){
        $table = 'med_image';
        // constant place
        $arrayDBCollums = array('image_userId',	'med_promo_fk', 'image_path',	'id');
        
        $result = $this->UpdateTable($table, $arrayDBCollums , $arrayUpdatedData, $id_post);
        return $result;
        
    }
    public function UpdatePicNews($arrayUpdatedData, $id_post){
        $table = 'med_image';
        // constant place
        $arrayDBCollums = array('image_userId',	'med_news_fk', 'image_path',	'id');
        
        $result = $this->UpdateTable($table, $arrayDBCollums , $arrayUpdatedData, $id_post);
        return $result;
        
    }
    //TODO: make it multipurpose
    //sql example
    // UPDATE Customers
    //  SET ContactName = 'Alfred Schmidt', City= 'Frankfurt'
    //  WHERE CustomerID = 1;
    
    
    // $id is row`s id of the particular table
    private function UpdateTable($table, $arrayNamesTabelRows , $arrayValuesTabelRows, $id){
        $set = '';
        
        if(is_array($arrayNamesTabelRows)){
            for ($i = 0; $i < count($arrayNamesTabelRows); $i++) {
                $dot = $i != 0 ? ', ' : '';
                
                $set .= "$dot $arrayNamesTabelRows[$i] = '$arrayValuesTabelRows[$i]'";
            }
        }
        else {
            $set .= "$arrayNamesTabelRows = '$arrayValuesTabelRows'";
        }
        //  $query = "UPDATE med_news SET news_title = 'blabala', med_user_fk = '1', news_descripion = '11 bla', news_show_date = true, news_data ='1970-10-10' WHERE id=34 ";
        $query = "UPDATE $table SET $set WHERE id=$id";
        // $query = "UPDATE $table SET $arrayDBCollums[0] = '$arrayUpdatedData[0]', $arrayDBCollums[1] = $arrayUpdatedData[1], $arrayDBCollums[2] = '$arrayUpdatedData[2]' WHERE id = $id";
        echo $query;
        $link = $this->ConnectDB();
        
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
        // $id = mysqli_insert_id($link);
        $this->CloseConnectDB($link);
        return $id;
    }
    public function GetPics(){
        $col = "med_promo_fk";
		 $col2 = "med_news_fk";
        return $this->GetArrayAllPicsNonPRorNE($col,$col2);
    }
	
    public function GetPicsPromo(){
        $col = "med_promo_fk";
        return $this->GetArrayAllPics($col);
    }
    public function GetPicsNews(){
        $col = "med_news_fk";
        return $this->GetArrayAllPics($col);
    }
	
 private function	GetArrayAllPicsNonPRorNE($col,$col2){
	 $table = "med_image";
        
        
        $query = "SELECT * FROM $table WHERE NOT $col IS NULL AND  NOT $col2 IS NULL";
		 $link = $this->ConnectDB();
        
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
        
        $this->CloseConnectDB($link);
        $arr = array();
        $i = 1;
        while ($obj = mysqli_fetch_assoc($result)) {
            $arrTemp = array();
            foreach ($obj as $key => $value) {
                $arrTemp[$key] = $value;
            }
            $arr[$i] = $arrTemp;
            $i ++;
        }
        return $arr;
 }
    private function GetArrayAllPics($col){
        $table = "med_image";
        $column = "image_path";
        
        $query = "SELECT * FROM $table WHERE NOT $col IS NULL";
        
        
        
        
        $link = $this->ConnectDB();
        
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
        
        $this->CloseConnectDB($link);
        $arr = array();
        $i = 1;
        while ($obj = mysqli_fetch_assoc($result)) {
            $arrTemp = array();
            foreach ($obj as $key => $value) {
                $arrTemp[$key] = $value;
            }
            $arr[$i] = $arrTemp;
            $i ++;
        }
        return $arr;
        
    }
//////////////////Сергей//////////конец//////
    //для регистрации
    public function FindCompanyByName($name) {
        $arrayNamesTableRows = 'name';
        $arrayValuesTableRows = $name;
        return $this->FindId($tableOrganization, $arrayNamesTableRows, $arrayValuesTableRows);
    }
    
    public function SaveCompany($company){
        $arrayNamesTableRows = 'name';
        $arrayValuesTableRows = $company;
        $this->QueryInsert($tableOrganization, $arrayNamesColumns, $arrayValuesColumns);
    }
    //организация
    public function FindTypeInstitutionByName($name) {
        $arrayNamesTableRows = 'type_description';
        $arrayValuesTableRows = $name;
        return $this->FindId($tableTypeInstitution, $arrayNamesTableRows, $arrayValuesTableRows);
    }

    public function SaveTypeInstitution($typeInstitution){
        $arrayNamesTableRows = 'type_description';
        $arrayValuesTableRows = $typeInstitution;
        $this->QueryInsert($tableOrganization, $arrayNamesColumns, $arrayValuesColumns);
    }
    
    public function FindPhoneByNumber($number){
        $arrayNamesTableRows = 'phone';
        $arrayValuesTableRows = $number;
        return $this->FindId($tablePhone, $arrayNamesTableRows, $arrayValuesTableRows);
    }
    
    public function SavePhone($idSummTable, $number){
        $arrayNamesTableRows = array('summary_table_fk', 'phone');
        $arrayValuesTableRows = array($idSummTable, $number);
        $this->QueryInsert($tableOrganization, $arrayNamesColumns, $arrayValuesColumns);
    }
    
    public function CreateSummTable($idCompany, $idTypeInstitution, $item = 0){
        $idLast = $this->FindLastId($tableSummaryTable);
        
        $arrayNamesTableRows = array('organization_fk', 'type_institution_fk', 'state');
        $arrayValuesTableRows = array($idCompany, $idTypeInstitution, 0);
        try {
            if($this->QueryInsert($tableSummaryTable, $arrayNamesColumns, $arrayValuesColumns < 0)){
                throw new Exception('Id занят');
            }
            
        } catch (Exception $e) {
            if($item < 30){
                $item++;
                $this->CreateSummTable($idCompany, $item);
            }
        }
        return $idLast;
    }
    
    public function SaveserCompanyData($id, $fioUser, $position, $idSummary, $imageLogo){
        $arrayNamesTableRows = array('fio','position','summary_table_fk', 'image_logo');
        $arrayValuesTableRows = array($fioUser, $position, $idSummary, $imageLogo);
        $this->QueryUpdate($tableUsers, $arrayNamesTableRows, $arrayValuesTableRows, $id);        
    }
    //клиент
    public function SaveUserClientData($id, $fioUser, $mail, $phone, $imageLogo){
        $arrayNamesTableRows = array('fio','mail', 'phone_client_fk', 'image_logo');
        $arrayValuesTableRows = array($fioUser, $mail, $phone, $imageLogo);
        $this->QueryUpdate($tableUsers, $arrayNamesTableRows, $arrayValuesTableRows, $id);
    }
}
?>