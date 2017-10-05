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
        $this->arrayNamesInsuranceCompany = array('usk' =>'УСК', 'aska' =>'АСКА');
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
        
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
        
        $this->CloseConnectDB($link);
        return $result;
    }

    private function QuerySelectById($table, $selectId)
    {
        $query = "SELECT * FROM $table WHERE id = $selectId";
        $link = $this->ConnectDB();
        
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
        
        $this->CloseConnectDB($link);
        return $result;
    }
    
    private function QuerySelectWhere($table, $stringSelect, $select, $selectCol = '*')
    {
        $query = "SELECT $selectCol FROM $table WHERE $stringSelect = $select";
        echo  $query.'___ отчет запроса<br>';
        $link = $this->ConnectDB();
        
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
        
        $this->CloseConnectDB($link);
        return $result;
    }

    private function FindId($table, $nameRow, $select)
    {
        $query = "SELECT 'id' FROM $table WHERE $nameRow = $select";
        $link = $this->ConnectDB();
        
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
        
        $this->CloseConnectDB($link);
        
        // вернуть 1 результат массива
        $resultObj = mysqli_fetch_assoc($result);
        if (count($resultObj) == 1) {
            return $resultObj['id'];
        }
        return - 1;
    }
    
    private function GetLastId($table)
    {
        $query = "SELECT id FROM $table ORDER BY id DESC LIMIT 1";
        $link = $this->ConnectDB();
        
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
        
        $this->CloseConnectDB($link);
        
        $resultObj = mysqli_fetch_assoc($result);
        if (count($resultObj) == 1) {
            return $resultObj['id'];
        }
        return - 1;
    }
    
    private function QueryInsert($table, $arrayNamesColumns, $arrayValuesColumns)
    {
        $query = "INSERT INTO $table($arrayNamesColumns) VALUES($arrayValuesColumns)";
        $link = ConnectDB();
        
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
     *
     * private function QueryUpdateOne($tabel, $nameTabelRow, $valueTabelRow, $id)
     * {
     * $query = "UPDATE $tabel SET $nameTabelRow = '$valueTabelRow' WHERE id=$id";
     * $link = $this->ConnectDB();
     *
     * $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
     *
     * $this->CloseConnectDB($link);
     * return $result;
     * }
     *
     * private function QueryUpdateMany($tabel, $arrayNamesTabelRows, $arrayValuesTabelRows, $id)
     * {
     * $strNamesTabelRows = GetStrNames($arrayNamesTabelRows);
     * $strValuesTabelRows = GetStrValues($arrayValuesTabelRows);
     *
     * $query = "UPDATE $tabel SET $nameTabelRow = '$valueTabelRow' WHERE id=$id";
     * $link = $this->ConnectDB();
     *
     * $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
     *
     * $this->CloseConnectDB($link);
     * return $result;
     * }
     */

///////////////////// методы запросов до БД  // конец //////////////////////////
///////////////////// методы авторизации // начало //////////////////////////
    private function GetUserById($id)
    {
        $table = 'med_users';
        return $this->SelectById($table, $id);
    }
    
    public function FindIdByLogin($login)
    {
        return $this->FindId('med_users', 'login', $login);
    }
    
    public function GetLastLoginId()
    {
        $query = "SELECT id FROM med_users ORDER BY id DESC LIMIT 1";
        $link = $this->ConnectDB();
        
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
        
        $this->CloseConnectDB($link);
        return $result;
    }
    
    public function SaveUser($id, $login, $password, $hash, $user_category)
    {
        $arrayNamesTabelRows = array(
            'id',
            'login',
            'password',
            'hash',
            'user_category'
        );
        $arrayValuesTabelRows = array(
            $id,
            $login,
            $password,
            $hash,
            $user_category
        );
        $getResult = $this->QueryInsert('med_users', $arrayNamesTabelRows, $arrayValuesTabelRows);
        return $getResult; // вернуть результат сохранения
    }
/////////////////////// методы авторизации // конец //////////////////////////
/////////////// методы получения данных в форму // начало ///////////////////
    private function SelectById($table, $id){
        $result = $this->QuerySelectById($table, $id);
        foreach ($result as $key => $value) {
            return $value;
        }
    }
    
    private function SelectByIdWhere($table, $stringSelect, $id, $selectCol = '*') {
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
        $table = 'med_type_institution';
        $result = $this->QuerySelectAll($table);
        return  $this->GenerateArrayWhithObj($result);
    }
    
    public function GetTypeInstitutionById($selectId)
    {
        $table = 'med_type_institution';
        $result = $this->SelectById($table, $selectId);
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
    
    public function GetServicesData($servicesId){
        $table = 'med_services';
        $result = $this->SelectById($table, $servicesId);
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
    
    public function GetInsuranceCompanesData($id){
        $table = 'med_insurance_companies';
        $result = $this->SelectById($table, $id);
        $arrayInsuranceCompanes = array();
        foreach ($result as $key => $value) {
            if ($value != null) {
                array_push($arrayServices, $this->arrayNamesInsuranceCompany[$key]);
            }
        }
        return $arrayServices;
    }
    // получить данные связанные с организацией
    public function GetOrganizationData($id)
    {
        $table = 'med_summary_table';
        $result = $this->SelectById($table, $id);
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
    //получить данные организации
    public function GetOrganization($id) {
        $table = 'med_organization';
        $result = $this->SelectById($table, $id);
        return $array = array(
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
        $table = 'med_region';
        $result = $this->QuerySelectAll($table);
        return $this->GenerateArrayWhithObj($result);
    }

    public function GetRegion($id) {
        $table = 'med_region';
        $result = $this->SelectById($table, $id);
        return array(
            'id' => $result['id'],
            'region' => $result['region']
        );
    }
    //улица
    public function GetActualLocation($id)
    {
        $table = 'actual_location_fk';
        $result = $this->SelectById($table, $id);
        return array(
          'id' => $result['id'],            
          'actualLocation' => $result['actual_location'],
          'locality' => $result['locality_fk']
        );
    }
    
    public function GetActualLocationArrayByCity($id) {
        $table = 'med_actual_location';
        $stringSelect = 'locality_fk';
        $selectCol = 'id, actual_location';
        return $this->SelectByIdWhere($table, $stringSelect, $id, $selectCol);
    }
    //город
    public function GetCitesArrayByDistrictRegion($id) {
        $table = 'med_locality';
        $stringSelect = 'district_region_fk';
        $selectCol = 'id, locality';
        return $this->SelectByIdWhere($table, $stringSelect, $id, $selectCol);
    }
    
    public function GetLocation($id){
        $table = 'med_locality';
        $result = $this->SelectById($table, $id);
        return array(
            'locality' => $result['locality'],
            'typeLocality' => $result['type_locality_fk'],
            'districtRegion' => $result['district_region_fk']
        );
    }
    //район области
    public function GetDistrictRegion($id) {
        $table = 'med_district_region';
        $result = $this->SelectById($table, $id);
        return array(
            'id' => $result['id'],
            'district' => $result['district'],
            'region' => $result['region_fk']
        );
    }
    
    public function GetDistrictRegionArrayByRegion($id){
        $table = 'med_district_region';
        $stringSelect = 'region_fk';
        $selectCol = 'id, district';
        return $this->SelectByIdWhere($table, $stringSelect, $id, $selectCol);
    }
    //дом
    public function GetHome($id) {
        $table = 'med_home';
        $stringSelect = 'actual_location_fk';
        $result = $this->QuerySelectWhere($table, $stringSelect, $id);
        return array(
            'id' => $result['id'],
            'numberHome' => $result['number_home']
        );
    }
    //телефоны
    public function GetPhones($organizationId) {
        $table = 'med_phone';
        $selectCol = 'id, phone';
        $stringSelect = 'summary_table_fk';
        return $this->SelectByIdWhere($table, $stringSelect, $organizationId, $selectCol);
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
        return array($dayWork, $startTimeWork, $endTimeWork);
    }
    
    private function GetDayWork($id) {
        $table = 'med_day_work';
        return $this->SelectById($table, $id);
    }
    
    private function GetTimeWork($id) {
        $table = 'med_time_work';
        return $this->SelectById($table, $id);
    }
    //TODO логотип DAL
///////////////Сохранение данных/////////начало//////////////
    public function FindIdService($arrayData){
        $table = 'med_services';
        return $this->QuerySelectAll($table);
         
    }
///////////////Сохранение данных/////////конец//////////////
////////////////////////////////////////////////////////////    
//     private function GetLastId($query)
//     {
//         $lastId = '';
//         while ($result = mysqli_fetch_assoc($query)) {
            
//             $lastId = $result['id'];
//         }
//         return $lastId;
//     }

    private function GetIdByData($query, $data, $nameTable)
    {
        while ($result = mysqli_fetch_assoc($query)) {
            if ($data == $result[$nameTable]) {
                return $result['id'];
            }
        }
        return - 1;
    }

    private function GetDataById($table, $selectId)
    {
        $result = $this->QuerySelectAll($table, $selectId);
        return mysqli_fetch_assoc($result);
    }

    private function GetIdByDataArray($query, $arrayData, $arrayNameTable)
    {
        $flag = true;
        while ($result = mysqli_fetch_assoc($query)) {
            $flag = true;
            for ($i = 1; $i < count($nameTableArray); $i ++) {
                if ($result[$nameTableArray[$i]] != $arrayData[$i]) {
                    return false;
                }
            }
            if ($flag) {
                
                return $result['id'];
            }
        }
        return - 1;
    }

    private function ComparisonData($query, $data, $nameTable)
    { // запрос искомые данные имя таблицы
        while ($result = mysqli_fetch_assoc($query)) {
            if ($data == $result[$nameTable]) {
                return true;
            }
        }
        return false;
    }

    private function ComparisonDataArray($query, $arrayData, $nameTableArray)
    { // запрос искомые данные имя таблицы
        $flag = true;
        while ($result = mysqli_fetch_assoc($query)) {
            $flag = true;
            for ($i = 1; $i < count($nameTableArray); $i ++) {
                if ($result[$nameTableArray[$i]] != $arrayData[$i]) {
                    return false;
                }
            }
            if ($flag) {
                return true;
            }
        }
        return false;
    }

    private function ComparisonManyData($table, $selectId, $arrayNames, $arrayDatas)
    {
        $result = $this->GetDataById($table, $selectId);
        $flag = true;
        
        for ($i = 1; $i <= count($arrayNames); $i ++) {
            if ($result[$arrayNames[$i]] != $arrayDatas[$i]) {
                $flag = false;
            }
        }
        return $flag;
    }

    // ----для рефакторинга разбить метод на 2 действия---
    // получить id
    // вставить данные
    
    // вставка Название(Компания)
    public function GetIdInsertOrganization($company)
    {
        $table = 'med_organization';
        $nameTable = 'name';
        $arrayNamesTabelRows = array(
            'id',
            'short_name',
            'type_ownership_fk',
            $nameTable,
            'edrpou_code'
        );
        $ownership = 1;
        
        $result = QuerySelectAll($table);
        
        $isExist = $this->ComparisonData($query, $company, $nameTable);
        if ($isExist) {
            $idOrganization = $this->GetIdByData($result, $company, $nameTable);
            return $idOrganization;
        } else {
            $lastId = $this->GetLastId($result);
            $lastId ++;
            
            $arrayValuesTabelRows = array(
                $lastId,
                '',
                $ownership,
                $company,
                ''
            );
            $getResult = $this->QueryInsert($table, $arrayNamesTabelRows, $arrayValuesTabelRows);
            if ($getResult) {
                return $lastId;
            } else {
                return - 1;
            }
        }
    }

    public function GetIdInsertInsuranceCompany($arrayInsuranceCompany)
    {
        $table = 'med_insurance_companies';
        $nameTables = array(
            'usk',
            'aska'
        );
        $arrayNamesTabelRows = array(
            'id',
            $nameTable
        );
        
        $result = QuerySelectAll($table);
        
        // узнаю уществует ли
        $isExist = $this->ComparisonDataArray($result, $arrayInsuranceCompany, $nameTables);
        if ($isExist) { // если да
                        // нахожу id
            $idInsuranceCompany = $this->GetIdByDataArray($result, $arrayInsuranceCompany, $nameTables);
            return $idInsuranceCompany;
        } else {
            $lastId = $this->GetLastId($result);
            $lastId ++;
            
            $arrayValuesTabelRows = array(
                $lastId,
                $arrayInsuranceCompany
            );
            $getResult = $this->QueryInsert($table, $arrayNamesTabelRows, $arrayValuesTabelRows);
            if ($getResult) {
                return $lastId;
            } else {
                return - 1;
            }
        }
    }

    // вставка области - тут либо делаю вставку или нахожу существующую и возвращаю id области
    public function GetIdInsertGetRegion($region)
    {
        $table = 'med_region';
        $nameTable = 'region';
        $arrayNamesTabelRows = array(
            'id',
            $nameTable
        );
        
        $result = QuerySelectAll($table);
        
        $isExist = $this->ComparisonData($result, $region, $nameTable);
        if ($isExist) {
            $idRegion = $this->GetIdByData($result, $region, $nameTable);
            return $idRegion;
        } else {
            $lastId = $this->GetLastId($result);
            $lastId ++;
            
            $arrayValuesTabelRows = array(
                $lastId,
                $region
            );
            
            $getResult = $this->QueryInsert($table, $arrayNamesTabelRows, $arrayValuesTabelRows);
            if ($getResult) {
                return $lastId;
            } else {
                return - 1;
            }
        }
    }

    // вставка город
    public function GetIdInsertLocality($town, $DistrictRegionId)
    {
        $table = 'med_locality';
        $nameTable = 'locality';
        $typeLocalityFk = 'type_locality_fk';
        $districtRegionFk = 'district_region_fk';
        $arrayNamesTabelRows = array(
            'id',
            $nameTable,
            $typeLocalityFk,
            $districtRegionFk
        );
        $typeLocalityFkData = 1;
        
        $result = QuerySelectAll($table);
        
        $isExist = $this->ComparisonData($result, $town, $nameTable); // существует
        if ($isExist) { // если город существует то ищу район
            $idTown = $this->GetIdByData($result, $town, $nameTable); // получаю сущ id
            
            $arrayNames = array(
                $nameTable,
                $districtRegionFk
            );
            $arrayDatas = array(
                $town,
                $DistrictRegionId
            );
            
            $isCoincides = $this->ComparisonManyData($table, $idTown, $arrayNames, $arrayDatas);
            if ($isCoincides) { // если совпали данные, то возвращаю текущий id
                return $idTown;
            }
        }
        // если не совпали, то добовляю
        $lastId = $this->GetLastId($result);
        $lastId ++;
        
        $arrayValuesTabelRows = array(
            $lastId,
            $town,
            $typeLocalityFkData,
            $DistrictRegionId
        );
        
        $getResult = $this->QueryInsert($table, $arrayNamesTabelRows, $arrayValuesTabelRows);
        if ($getResult) {
            return $lastId;
        } else {
            return - 1;
        }
    }

    // вставка региона город
    public function GetIdInsertGetDistrictCity($districtCity, $localityId)
    {
        $localityId = 'med_district_region';
        $nameTable = 'district';
        $localityFk = 'region_fk';
        $arrayNamesTabelRows = array(
            'id',
            $nameTable,
            $localityId
        );
        
        $result = QuerySelectAll($table);
        
        $isExist = $this->ComparisonData($result, $districtCity, $nameTable); // существует
        if ($isExist) {
            $idDistrictCity = $this->GetIdByData($result, $districtCity, $nameTable); // получаю сущ id
            
            $arrayNames = array(
                $nameTable,
                $localityFk
            );
            $arrayDatas = array(
                $districtCity,
                $localityId
            );
            
            $isCoincides = $this->ComparisonManyData($table, $idDistrictCity, $arrayNames, $arrayDatas);
            if ($isCoincides) { // если совпали данные, то возвращаю текущий id
                return $idDistrictCity;
            }
        }
        // если не совпали, то добовляю
        $lastId = $this->GetLastId($result);
        $lastId ++;
        
        $arrayValuesTabelRows = array(
            $lastId,
            $districtCity,
            $localityId
        );
        
        $getResult = $this->QueryInsert($table, $arrayNamesTabelRows, $arrayValuesTabelRows);
        if ($getResult) {
            return $lastId;
        } else {
            return - 1;
        }
    }

    // улица
    public function GetIdInsertActualLocation($actualLocation, $townId)
    {
        $table = 'med_actual_location';
        $nameTable = 'actual_location';
        $localityFk = 'locality_fk';
        $arrayNamesTabelRows = array(
            'id',
            $nameTable,
            $localityFk
        );
        
        $result = QuerySelectAll($table);
        
        $isExist = $this->ComparisonData($result, $actualLocation, $nameTable); // существует
        if ($isExist) { // если город существует то ищу район
            $idActualLocation = $this->GetIdByData($result, $actualLocation, $nameTable); // получаю сущ id
            
            $arrayNames = array(
                $nameTable,
                $localityFk
            );
            $arrayDatas = array(
                $actualLocation,
                $townId
            );
            
            $isCoincides = $this->ComparisonManyData($table, $idActualLocation, $arrayNames, $arrayDatas);
            if ($isCoincides) { // если совпали данные, то возвращаю текущий id
                return $idActualLocation;
            }
        }
        // если не совпали, то добовляю
        $lastId = $this->GetLastId($result);
        $lastId ++;
        
        $arrayValuesTabelRows = array(
            $lastId,
            $actualLocation,
            $townId
        );
        
        $getResult = $this->QueryInsert($table, $arrayNamesTabelRows, $arrayValuesTabelRows);
        if ($getResult) {
            return $lastId;
        } else {
            return - 1;
        }
    }

    // дом
    public function GetIdInsertHome($home, $actualLocationId)
    {
        $table = 'med_home';
        $nameTable = 'number_home';
        $actualLocationFk = 'actual_location_fk';
        $arrayNamesTabelRows = array(
            'id',
            $nameTable,
            $actualLocationFk
        );
        
        $result = QuerySelectAll($table);
        
        $isExist = $this->ComparisonData($result, $home, $nameTable); // существует
        if ($isExist) { // если город существует то ищу район
            $idHome = $this->GetIdByData($result, $home, $nameTable); // получаю сущ id
            
            $arrayNames = array(
                $nameTable,
                $actualLocationFk
            );
            $arrayDatas = array(
                $home,
                $actualLocationId
            );
            
            $isCoincides = $this->ComparisonManyData($table, $idHome, $arrayNames, $arrayDatas);
            if ($isCoincides) { // если совпали данные, то возвращаю текущий id
                return $idHome;
            }
        }
        // если не совпали, то добовляю
        $lastId = $this->GetLastId($result);
        $lastId ++;
        
        $arrayValuesTabelRows = array(
            $lastId,
            $home,
            $actualLocationId
        );
        
        $getResult = $this->QueryInsert($table, $arrayNamesTabelRows, $arrayValuesTabelRows);
        if ($getResult) {
            return $lastId;
        } else {
            return - 1;
        }
    }

    // телефон
    public function GetIdInsertPhone($phone)
    {
        $table = 'med_phone';
        $nameTable = 'phone';
        $arrayNamesTabelRows = array(
            'id',
            $nameTable
        );
        
        $result = QuerySelectAll($table);
        
        $isExist = $this->ComparisonData($result, $phone, $nameTable);
        if ($isExist) {
            $idPhone = $this->GetIdByData($result, $phone, $nameTable);
            return $idPhone;
        } else {
            $lastId = $this->GetLastId($result);
            $lastId ++;
            
            $arrayValuesTabelRows = array(
                $lastId,
                $phone
            );
            $getResult = $this->QueryInsert($table, $arrayNamesTabelRows, $arrayValuesTabelRows);
            if ($getResult) {
                return $lastId;
            } else {
                return - 1;
            }
        }
    }

    // тип учереждение
    public function GetIdInsertTypeInstitution($typeCompany)
    {
        $table = 'med_type_institution';
        $nameTable = 'type_description';
        $arrayNamesTabelRows = array(
            'id',
            $nameTable
        );
        
        $result = QuerySelectAll($table);
        
        // узнаю уществует ли
        $isExist = $this->ComparisonData($result, $typeCompany, $nameTable);
        if ($isExist) { // если да
                        // нахожу id
            $idTypeDescription = $this->GetIdByData($result, $typeCompany, $nameTable);
            return $idTypeDescription;
        } else {
            $lastId = $this->GetLastId($result);
            $lastId ++;
            
            $arrayValuesTabelRows = array(
                $lastId,
                $typeCompany
            );
            $getResult = $this->QueryInsert($table, $arrayNamesTabelRows, $arrayValuesTabelRows);
            if ($getResult) {
                return $lastId;
            } else {
                return - 1;
            }
        }
    }

    // сервисы
    public function GetIdInsertServices($arrayServices)
    {
        $table = 'med_services';
        $nameTables = array(
            'dentistry',
            'childrens_dentistry',
            'therapeutic_dentistry',
            'aesthetic_dentistry',
            'orthodontics',
            'dental _othopedics',
            'dental_surgery',
            'dental_Implantology',
            'periodontology',
            'dental_prophylaxis',
            'dentistry_pregnant_women',
            'tooth_whitening',
            'gnathology',
            'dental_bone_plastics',
            'dentistry_at_home',
            'allergy',
            'alcoholism',
            'gastroenterology',
            'childrens_consultation',
            'ecg',
            'ct',
            'mammography',
            'mri',
            'oncology',
            'wounded',
            'otorhinolaryngology',
            'radiology',
            'sports_medicine',
            'surgery',
            'ultrasound_diagnosis',
            'call_doctor_home',
            'family_medicine',
            'timpanometry'
        );
        $arrayNamesTabelRows = array(
            'id',
            $nameTable
        );
        
        $result = QuerySelectAll($table);
        
        // узнаю уществует ли
        $isExist = $this->ComparisonDataArray($result, $arrayServices, $nameTables);
        if ($isExist) { // если да
                        // нахожу id
            $idServices = $this->GetIdByDataArray($result, $arrayServices, $nameTables);
            return $idServices;
        } else {
            $lastId = $this->GetLastId($result);
            $lastId ++;
            
            $arrayValuesTabelRows = array(
                $lastId,
                $arrayServices
            );
            $getResult = $this->QueryInsert($table, $arrayNamesTabelRows, $arrayValuesTabelRows);
            if ($getResult) {
                return $lastId;
            } else {
                return - 1;
            }
        }
    }

    // дени работы
    public function GetIdInsertDayWork($dayWork)
    {
        $table = 'med_day_work';
        $nameTable = 'day_work';
        $arrayNamesTabelRows = array(
            'id',
            $nameTable
        );
        
        $result = QuerySelectAll($table);
        
        // узнаю уществует ли
        $isExist = $this->ComparisonData($result, $typeDescription, $nameTable);
        if ($isExist) { // если да
                        // нахожу id
            $idDayWork = $this->GetIdByData($result, $typeDescription, $nameTable);
            return $idDayWork;
        } else {
            $lastId = $this->GetLastId($result);
            $lastId ++;
            
            $arrayValuesTabelRows = array(
                $lastId,
                $typeDescription
            );
            $getResult = $this->QueryInsert($table, $arrayNamesTabelRows, $arrayValuesTabelRows);
            if ($getResult) {
                return $lastId;
            } else {
                return - 1;
            }
        }
    }

    // время работы
    public function GetIdInsertTimeWork($arraDatas)
    {
        $table = 'med_time_work';
        $nameTables = array(
            'time_work',
            'time_work_weekend'
        );
        // $arraDatas = array($timeWork, $timeWorkWeekend);
        $arrayNamesTabelRows = array(
            'id',
            $workDay,
            $workWeekend
        );
        
        $result = QuerySelectAll($table);
        
        // узнаю уществует ли
        $isExist = $this->ComparisonDataArray($result, $arraDatas, $nameTables);
        if ($isExist) { // если да
                        // нахожу id
            $idTimeWork = GetIdByDataArray($result, $arraDatas, $nameTables);
            return $idTimeWork;
        } else {
            $lastId = $this->GetLastId($result);
            $lastId ++;
            
            $arrayValuesTabelRows = array(
                $lastId,
                $arraDatas
            ); // array_unshift($lastId, $arraDatas);
            $getResult = $this->QueryInsert($table, $arrayNamesTabelRows, $arrayValuesTabelRows);
            if ($getResult) {
                return $lastId;
            } else {
                return - 1;
            }
        }
    }

    public function GetIdInsertSummaryTable($arraDatas)
    { // med_summary_table
        $table = 'med_services';
        $nameTables = array(
            'id',
            'actual_location_fk',
            'organization_fk',
            'type_works_fk',
            'type_institution_fk',
            'phone_fk',
            'day_work_kf',
            'time_work_fk',
            'insurance_companies_fk',
            'services_fk'
        );
        $arrayNamesTabelRows = array(
            'id',
            $nameTable
        );
        
        $result = QuerySelectAll($table);
        
        // узнаю уществует ли
        $isExist = $this->ComparisonDataArray($result, $arraDatas, $nameTables);
        if ($isExist) { // если да
                        // нахожу id
            $idSummaryTable = $this->GetIdByDataArray($result, $arraDatas, $nameTables);
            return $idSummaryTable;
        } else {
            $lastId = $this->GetLastId($result);
            $lastId ++;
            
            $arrayValuesTabelRows = array(
                $lastId,
                $arrayServices
            );
            $getResult = $this->QueryInsert($table, $arrayNamesTabelRows, $arrayValuesTabelRows);
            if ($getResult) {
                return $lastId;
            } else {
                return - 1;
            }
        }
    }
}
?>