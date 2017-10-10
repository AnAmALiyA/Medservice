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
    // webspectrum
    // private $host='localhost';
    // private $user='andrew19_med';
    // private $password='a6qxcqabymed';
    // private $database='andrew19_uh347272_med24';
    
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
    /*
     * дополнительные методы
     * private function QueryDelete($Table, $id)
     * {
     * $query = "DELETE FROM $Table WHERE id=$id";
     * $link = ConnectDB();
     *
     * $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
     *
     * $this->CloseConnectDB($link);
     * return $result;
     * }
     */
    private function QueryUpdate($Table, $arrayNamesTableRows, $arrayValuesTableRows, $id)
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
        
        $query = "UPDATE $Table SET $set WHERE id=$id";
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
    private function GetUserById($id)
    {
        $table = 'med_users';
        return $this->SelectById($table, $id);
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
                array_push($arrayServices, $this->arrayNamesServices[$key]);
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
                array_push($arrayServices, $this->arrayNamesInsuranceCompany[$key]);
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
        $result = $this->SelectById($this->$tableActualLocation, $id);
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
        $stringSelect = 'actual_location_fk';
        $result = $this->QuerySelectWhere($this->tableHome, $stringSelect, $id);
        return array(
            'id' => $result['id'],
            'numberHome' => $result['number_home']
        );
    }
    //телефоны
    public function GetPhonesOrganizationId($organizationId) {
        $selectCol = 'id, phone';
        $stringSelect = 'summary_table_fk';
        return $this->SelectByIdWhere($this->tablePhone, $stringSelect, $organizationId, $selectCol);
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
                    $startTimeWork[$this->arrayDay[$key]] = $startTime->format('H');
                    
                    $endTime = new DateTime($resultTimeWork['end_work']);
                    $endTimeWork[$this->arrayDay[$key]] = $endTime->format('H');
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
        
    }
    ///////////////Удаление данных/////////конец//////////////
}
?>