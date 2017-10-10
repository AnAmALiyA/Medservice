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
    
    private function FindId($table, $arrayNamesTabelRows, $arrayValuesTabelRows)
    {
        $set = '';
        if(is_array($arrayNamesTabelRows)){
            for ($i = 0; $i < count($arrayNamesTabelRows); $i++) {
                $dot = $i == 0 ? '' : ' AND ';
                $set .= "$dot $arrayNamesTabelRows[$i] = '$arrayValuesTabelRows[$i]'";
            }
        }
        else {
            echo $arrayNamesTabelRows;
            echo $arrayValuesTabelRows;
            $set .= "$arrayNamesTabelRows = '$arrayValuesTabelRows'";
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
     * private function QueryDelete($tabel, $id)
     * {
     * $query = "DELETE FROM $tabel WHERE id=$id";
     * $link = ConnectDB();
     *
     * $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
     *
     * $this->CloseConnectDB($link);
     * return $result;
     * }
     */
    private function QueryUpdate($tabel, $arrayNamesTabelRows, $arrayValuesTabelRows, $id)
    {
        $set = '';
        echo is_array($arrayNamesTabelRows).'<br/>';
        echo count($arrayNamesTabelRows).'<br/>';
        if(is_array($arrayNamesTabelRows)){
            for ($i = 0; $i < count($arrayNamesTabelRows); $i++) {
                $dot = $i != 0 ? ', ' : '';
                $set .= "$dot $arrayNamesTabelRows[$i] = '$arrayValuesTabelRows[$i]'";
            }
        }
        else {
            $set .= "$arrayNamesTabelRows = '$arrayValuesTabelRows'";
        }
        
        $query = "UPDATE $tabel SET $set WHERE id=$id";
        //          $query = "UPDATE $tabel SET $nameTabelRow = '$valueTabelRow' WHERE id=$id";
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
        $arrayNamesTabelRows = array('login', 'password');
        $arrayValuesTabelRows = array("'$login'", "'$passwordmd5'");
        return $this->FindId($table, $arrayNamesTabelRows, $arrayValuesTabelRows);
    }
    public function SaveUser($login, $password, $hash, $user_category)
    {
        $arrayNamesTabelRows = array(
            'login',
            'password',
            'hash',
            'user_category'
        );
        $arrayValuesTabelRows = array(
            "'$login'",
            "'$password'",
            "'$hash'",
            $user_category
        );
        $getResult = $this->QueryInsert('med_users', $arrayNamesTabelRows, $arrayValuesTabelRows);
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
//         $table = 'med_type_institution';
        $result = $this->QuerySelectAll($this->tableTypeInstitution);
        return  $this->GenerateArrayWhithObj($result);
    }
    
    public function GetTypeInstitutionById($selectId)
    {
//         $table = 'med_type_institution';
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
//         $table = 'med_services';
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
//         $table = 'med_insurance_companies';
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
//         $table = 'med_summary_table';
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
//         $table = 'med_organization';
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
//         $table = 'med_region';
        $result = $this->QuerySelectAll($this->tableRegion);
        return $this->GenerateArrayWhithObj($result);
    }
    public function GetRegion($id) {
//         $table = 'med_region';
        $result = $this->SelectById($this->tableRegion, $id);
        return array(
            'id' => $result['id'],
            'region' => $result['region']
        );
    }
    //улица
    public function GetActualLocation($id)
    {
//         $table = 'med_actual_location';
        $result = $this->SelectById($this->$tableActualLocation, $id);
        return array(
            'id' => $result['id'],
            'actualLocation' => $result['actual_location'],
            'locality' => $result['locality_fk']
        );
    }
    //TODO maby error
    public function GetActualLocationArrayByCity($id) {
//         $table = 'med_actual_location';
        $stringSelect = 'locality_fk';
        $selectCol = 'id, actual_location';
        return $this->SelectByIdWhere($this->tableActualLocation, $stringSelect, $id, $selectCol);
    }
    //город
    public function GetCitesArrayByDistrictRegion($id) {
//         $table = 'med_locality';
        $stringSelect = 'district_region_fk';
        $selectCol = 'id, locality';
        return $this->SelectByIdWhere($this->tableLocality, $stringSelect, $id, $selectCol);
    }
    
    public function GetLocationById($id){
//         $table = 'med_locality';
        $result = $this->SelectById($this->tableLocality, $id);
        return array(
            'locality' => $result['locality'],
            'typeLocality' => $result['type_locality_fk'],
            'districtRegion' => $result['district_region_fk']
        );
    }
    //район области
    public function GetDistrictRegion($id) {
//         $table = 'med_district_region';
        $result = $this->SelectById($this->tableDistrictRegion, $id);
        return array(
            'id' => $result['id'],
            'district' => $result['district'],
            'region' => $result['region_fk']
        );
    }
    
    public function GetDistrictRegionArrayByRegion($id){
//         $table = 'med_district_region';
        $stringSelect = 'region_fk';
        $selectCol = 'id, district';
        return $this->SelectByIdWhere($this->tableDistrictRegion, $stringSelect, $id, $selectCol);
    }
    //дом
    public function GetHomeById($id) {
//         $table = 'med_home';
        $stringSelect = 'actual_location_fk';
        $result = $this->QuerySelectWhere($this->tableHome, $stringSelect, $id);
        return array(
            'id' => $result['id'],
            'numberHome' => $result['number_home']
        );
    }
    //телефоны
    public function GetPhonesOrganizationId($organizationId) {
//         $table = 'med_phone';
        $selectCol = 'id, phone';
        $stringSelect = 'summary_table_fk';
        return $this->SelectByIdWhere($this->tablePhone, $stringSelect, $organizationId, $selectCol);
    }
    // выходные дни
    public function GetDaysTimeWork($id)
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
                    //                     $date = new DateTime($value);
                    //                     echo $date->format('H-i').'-----<br/>';
                    //                     echo "Формат: $format; " . $date->format('Y-m-d H:i:s') . "\n";
                }
            }
        }
        return array(
            'day' => $dayWork, 
            'startTime' => $startTimeWork, 
            'endTime' => $endTimeWork);
    }
    
    private function GetDayWork($id) {
//         $table = 'med_day_work';
        return $this->SelectById($this->tableDayWork, $id);
    }
    
    private function GetTimeWork($id) {
//         $table = 'med_time_work';
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
        
//         $table = 'med_services';
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
        
//         $table = 'med_services';
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
//         $table = 'med_services';
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
        
//         $table = 'med_insurance_companies';
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
//         $table = 'med_organization';
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
//         $table = 'med_organization';
        $nameCol = 'name';
        return $this->QueryUpdate($this->tableOrganization, $nameCol, $name, $id);//return поставил проверить
    }
    public function FindActualLocationDataById($id){
//         $table = 'med_actual_location';
        $result = $this->SelectById($this->tableActualLocation, $id);
        return array(
            'id' => $result['id'],
            'actualLocation' => $result['actual_location'],
            'locality' => $result['locality_fk'],
            'home' => $result['home_fk']
        );
    }
    public function FindActualLocationId($select){
//         $table = 'med_actual_location';
        $stringSelect = 'actual_location';
        $selectCol = 'id';
        $result = $this->QuerySelectWhere($this->tableActualLocation, $stringSelect, $select, $selectCol);
        $cast = mysqli_fetch_assoc($result);
        return $cast['id'];
    }
    //дом
    public function GetHomeIdByNumber($number){
//         $table = 'med_home';
        $stringSelect = 'number_home';
        $selectCol = 'id';
        //$dd = $this->QuerySelectWhere($table, $stringSelect, $number, $selectCol);
        $result = $this->SelectByIdWhere($this->tableHome, $stringSelect, $number, $selectCol);
        return $result['id'][0];
    }
    public function UpdateHome($id, $string) {
//         $table = 'med_home';
        $nameCol = 'number_home';
        return $this->QueryUpdate($this->tableHome, $nameCol, $string, $id);//return поставил проверить
    }
    public function InsertHome($string) {
//         $table = 'med_home';
        $namesColumn = 'number_home';
        $valuesColumn = "'$string'";
        return $this->QueryInsert($this->tableHome, $namesColumn, $valuesColumn);
    }
    //улица
    public function InsertActualLocation($streetStr, $homeId, $cityId){
//         $table = 'med_actual_location';
        $namesColumns = array('actual_location', 'locality_fk', 'home_fk');
        $valuesColumns =  array("'$streetStr'", $homeId, $cityId);
        return $this->QueryInsert($this->tableActualLocation, $namesColumns, $valuesColumns);
    }
    public function GetActualLocationIdByStreetHomeCity($street, $homeId, $cityId){
//         $table = 'med_actual_location';
        $arrayNamesTabelRows = array('actual_location', 'locality_fk', 'home_fk');
        $arrayValuesTabelRows = array($street, $homeId, $cityId);
        $result = $this->FindId($this->tableActualLocation, $arrayNamesTabelRows, $arrayValuesTabelRows);
        return $result;
    }

    // телефон
    public function GetPhoneById($id)
    {
//         $table = 'med_phone';
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
//         $table = 'med_phone';
        $nameCol = 'phone';
        return $this->QueryUpdate($this->tablePhone, $nameCol, $phone, $id);
    }

    public function InsertPhone($phone, $organizationId)
    {
//         $table = 'med_phone';
        $arrayNamesColumns = array('phone', 'summary_table_fk');
        $arrayValuesColumns = array($phone, $organizationId);
        return $this->QueryInsert($this->tablePhone, $arrayNamesColumns, $arrayValuesColumns);
    }

    // время
    public function FindIdTimeWork($value, $start = null, $end = null)
    {
//         $table = 'med_time_work';
        if ($value == 1) {//ожидаю что валуе булевское поле
            return $this->FindId($this->tableTimeWork, 'weekend', $value);
        }
        else {
            $arrayNamesTabelRows = array('start_work', 'end_work', 'weekend');
            
//             $startDate = new DateTime("1970-01-01 $start:0:0");
//             $startStr = $startDate->format('Y-m-d H:i:s');
            $startStr = "1970-01-01 $start:0:0";
            
//             $endDate = new DateTime('1970-01-01');
//             $endDate->setTime($end, 0, 0);
//             $endStr = $endDate->format('Y-m-d H:i:s');

//             $endDate = new DateTime("1970-01-01 $end:0:0");
//             $endStr = $endDate->format('Y-m-d H:i:s');
            $endStr = "1970-01-01 $end:0:0";
            
            $arrayValuesTabelRows = array($startStr, $endStr, $value);//вэлуэ не выходной
            return $this->FindId($table, $arrayNamesTabelRows, $arrayValuesTabelRows);
        }
    }
    public function InsertTimeWork($value, $start, $end){
//         $table = 'med_time_work';
        $arrayNamesColumns = array('start_work', 'end_work', 'weekend');
        
        $startDate = "1970-01-01 $start:0:0";
        $endDate = "1970-01-01 $end:0:0";
        $arrayValuesColumns = array("'$startDate'", "'$endDate'", $value);
        
        $this->QueryInsert($this->tableTimeWork, $arrayNamesColumns, $arrayValuesColumns);
    }
    public function FindDayId($arrayTimeWorkId){
//         $table = 'med_day_work';
        $arrayNamesTabelRows = array();
        foreach ($this->arrayDay as $key => $value) {
            $arrayNamesTabelRows[] = $key;
        }
        $arrayValuesTabelRows = array();
        for ($i = 0; $i < count($arrayTimeWorkId); $i++) {
            $arrayValuesTabelRows[] = $arrayTimeWorkId[$i];
        }
        return $this->FindId($this->tableDayWork, $arrayNamesTabelRows, $arrayValuesTabelRows);
    }
    public function InsertDay($arrayTimeWorkId){
//         $table = 'med_day_work';
        $arrayNamesTabelRows = array();
        foreach ($this->arrayDay as $key => $value) {
            $arrayNamesTabelRows[] = $key;
        }
        $arrayValuesTabelRows = array();
        for ($i = 0; $i < count($arrayTimeWorkId); $i++) {
            $arrayValuesTabelRows[] = $arrayTimeWorkId[$i];
        }
        return $this->QueryInsert($this->tableDayWork, $arrayNamesTabelRows, $arrayValuesTabelRows);
    }
    public function UpdateOrganizationData($organizationId, $arrayOrganizationData) {
//         $table = 'med_summary_table';
        $arrayNamesTabelRows = array(
            'actual_location_fk',
            'organization_fk',
//             'type_works_fk',
            'type_institution_fk',
            'day_work_fk',
            'insurance_companies_fk',
            'services_fk',
            'state'
        );
        $arrayValuesTabelRows = array($organizationId);
        for ($i = 0; $i < count($arrayOrganizationData); $i++) {
            $arrayValuesTabelRows[] = $arrayOrganizationData[$i];
        }
        return $this->QueryUpdate($this->tableSummaryTable, $arrayNamesTabelRows, $arrayValuesTabelRows, $organizationId);
    }
    //обновить улицу
    public function UpdateActualLocation($id, $nameStreet, $localityId, $homeId){
        //         $table = 'med_actual_location';$tableActualLocation
        $arrayNamesTabelRows = array(
            'actual_location',
            'locality_fk',
            'home_fk'
        );
        $arrayValuesTabelRows = array(
            "'$nameStreet'", 
            $localityId, 
            $homeId
        );
        return $this->QueryUpdate($this->tableActualLocation, $arrayNamesTabelRows, $arrayValuesTabelRows, $id)
    }
    ///////////////Сохранение данных/////////конец//////////////
}
?>