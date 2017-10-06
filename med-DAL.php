<?php

class MedDB
{

    private $host = 'localhost';

    private $user = 'root';

    private $password = '';

    private $database = 'uh347272_med24';

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

    private function QuerySelectId($table, $selectId)
    {
        $query = "SELECT * FROM $table WHERE id = $selectId";
        $link = $this->ConnectDB();
        
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
        
        $this->CloseConnectDB($link);
        return $result;
    }

    private function FindId($table, $nameRow, $select)
    {
        $query = "SELECT 'id' FROM $table WHERE $nameRow = $select";
        $link = $this->ConnectDB();
        
        $queryResult = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
        
        $this->CloseConnectDB($link);
        
        // вернуть 1 результат массива
        $result = mysqli_fetch_assoc($query);
        if (count($result) == 1) {
            return $result['id'];
        }
        
        // /список результатов
        // while ($result = mysqli_fetch_assoc($query)) {
        // if ($select == $result[$nameRow]) {
        // return $result['id'];
        // }
        // }
        return - 1;
    }

    /*
     * Функции для генерации стоки из имен столбцов и значений
     * function GetStrNames($arrayNamesTabelRows)
     * {
     * $strNamesTabelRows = '';
     * for($i=0;$i<=count($arrayNamesTabelRows);$i++)
     * {
     * $strNamesTabelRows .=$arrayNamesTabelRows[i];
     * if(i!=count($arrayNamesTabelRows))
     * {
     * $strNamesTabelRows .=',';
     * }
     * }
     * return $strNamesTabelRows;
     * }
     *
     * function GetStrValues($arrayValuesTabelRows)
     * {
     * $strValuesTabelRows = '';
     * for($j=0;$j<=count($arrayValuesTabelRows);$j++)
     * {
     * $strValuesTabelRows = $arrayValuesTabelRows[j];
     * if (j!=count($arrayValuesTabelRows)) {
     * $strValuesTabelRows .=',';
     * }
     * }
     * return $strValuesTabelRows;
     * }
     */
    private function QueryInsert($table, $arrayNamesColumns, $arrayValuesColumns)
    {
        /*
         * $arrayNamesTabelRows и $arrayValuesTabelRows принемаемые массивы имен столбцов и значений
         * $strNamesTabelRows = GetStrNames($arrayNamesTabelRows);
         * $strValuesTabelRows = GetStrValues($arrayValuesTabelRows);
         */
        $query = "INSERT INTO $table($arrayNamesColumns) VALUES ($arrayValuesColumns)";
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
    private function GetArrayOneCol($table, $nameFilldArray)
    {
        $obj = $this->QuerySelectAll($table);
        
        $arr = array();
        while ($result = mysqli_fetch_assoc($obj)) {
            $arr[$result['id']] = $result[$nameFilldArray]; // 'type_description'
        }
        return $arr;
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

    // Название(Компания) 2 колонка
    public function GetOrganizationOneCol()
    {
        $table = 'med_organization';
        $nameFilldArray = 'name';
        return $this->GetArrayOneCol($table, $nameFilldArray);
    }

    // Область 2 колонка
    public function GetRegionOneCol()
    {
        $table = 'med_region';
        $nameFilldArray = 'region';
        return $this->GetArrayOneCol($table, $nameFilldArray);
    }

    // Районы 3 колонки
    public function GetDistrictRegionAllCol()
    {
        $table = 'med_district_region';
        return $this->GetArrayAllCol($table);
    }

    // Город 4 колонки
    public function GetLocalityAllCol()
    {
        $table = 'med_locality';
        return $this->GetArrayAllCol($table);
    }

    // улица 3 колонки
    public function GetActualLocationAllCol()
    {
        $table = 'med_actual_location';
        return $this->GetArrayAllCol($table);
    }

    // дом 3 колонки
    public function GetHomeAllCol()
    {
        $table = 'med_home';
        return $this->GetArrayAllCol($table);
    }

    // телефон 2 колонки
    public function GetPhoneOneCol()
    {
        $table = 'med_phone';
        $nameFilldArray = 'phone';
        return $this->GetArrayOneCol($table, $nameFilldArray);
    }

    // время работы 3 колонки
    public function GetTimeWorkAllCol()
    {
        $table = 'med_time_work';
        return $this->GetArrayAllCol($table);
    }

    // дни работы 3 колонки
    public function GetDayWorkOneCol()
    {
        $table = 'med_day_work';
        $nameFilldArray = 'day_work';
        return $this->GetArrayOneCol($table, $nameFilldArray);
    }

    // сервисы 34 колонки
    public function GetServiceAllCol()
    {
        $table = 'med_services';
        return $this->GetArrayAllCol($table);
    }

    // Тип учереждения
    public function GetTypeInstitutionOneCol()
    {
        $table = 'med_type_institution';
        $nameFilldArray = 'type_description';
        return $this->GetArrayOneCol($table, $nameFilldArray);
    }

    // страховая компания
    public function GetInsuranceCompanyOneCol()
    {
        $arrayInsuranceCompanyes = array(
            'usk' => 'УСК',
            'aska' => 'АСКА'
        );
        // $table = 'med_insurance_companies';
        // $nameFilldArray='name_companie';
        // return $this->GetArrayOneCol($table, $nameFilldArray);
        return $arrayInsuranceCompanyes;
    }

    // суммарную таблицу 10 колонки
    public function GetSummaryTableAllCol()
    {
        $table = 'med_summary_table';
        return $this->GetArrayAllCol($table);
    }

    private function GetLastId($query)
    {
        $lastId = '';
        while ($result = mysqli_fetch_assoc($query)) {
            
            $lastId = $result['id'];
        }
        return $lastId;
    }

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

    public function FindIdLogin($login)
    {
        return $this->FindId('med_users', 'login', $login);
        // function GetIdByData($query, $data, $nameTable)
    }

    public function GetLastLoginId()
    {
        $query = $this->QuerySelectAll('med_users', 'id');
        return $this->GetLastId($query);
    }

    public function SaveLogin($id, $login, $password, $hash)
    {
        $arrayNamesTabelRows = array(
            'id',
            'login',
            'password',
            'hash'
        );
        $arrayValuesTabelRows = array(
            $id,
            $login,
            $password,
            $hash
        );
        $getResult = $this->QueryInsert('med_users', $arrayNamesTabelRows, $arrayValuesTabelRows);
        if ($getResult) {
            return $lastId;
        } else {
            return - 1;
        }
    }

    public function IsAuthorize($id, $hash)
    {
        $query = $this->QuerySelectId('med_users', $id);
        if ($query == null) {
            return false;
        }
        $result = mysqli_fetch_assoc($query);
        if ($result['hash'] == $hash) {
            return true;
        }
        return false;
    }

    //
    public function GetNewsAllCol()
    {
        $table = 'med_news';
        return $this->GetArrayAllCol($table);
    }

    public function SaveNews($news_title, $med_user_fk, $news_descripion)
    {
        $arrayNamesTabelRows = array(
            'news_title',
            'med_user_fk',
            'news_descripion'
        );
        $arrayValuesTabelRows = array(
            $news_title,
            $med_user_fk,
            $news_descripion
        );
        $getResult = $this->QueryInsertGetId('med_news', $arrayNamesTabelRows, $arrayValuesTabelRows);
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

    public function SavePromo($promo_title, $med_user_fk, $promo_descripion)
    {
        $arrayNamesTabelRows = array(
            'promo_title',
            'med_user_fk',
            'promo_descripion'
        );
        $arrayValuesTabelRows = array(
            $promo_title,
            $med_user_fk,
            $promo_descripion
        );
        $getResult = $this->QueryInsertGetId('med_promo', $arrayNamesTabelRows, $arrayValuesTabelRows);
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

    public function SaveSpecial($special_title, $med_user_fk, $special_descripion)
    {
        $arrayNamesTabelRows = array(
            'special_title',
            'med_user_fk',
            'special_descripion'
        );
        $arrayValuesTabelRows = array(
            $special_title,
            $med_user_fk,
            $special_descripion
        );
        $getResult = $this->QueryInsert('med_special', $arrayNamesTabelRows, $arrayValuesTabelRows);
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

    public function SaveMedturism($medturism_title, $med_user_fk, $medturism_descripion)
    {
        $arrayNamesTabelRows = array(
            'medturism_title',
            'med_user_fk',
            'medturism_descripion'
        );
        $arrayValuesTabelRows = array(
            $medturism_title,
            $med_user_fk,
            $medturism_descripion
        );
        $getResult = $this->QueryInsert('med_medturism', $arrayNamesTabelRows, $arrayValuesTabelRows);
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
            $name
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
            $name
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
        $table = 'med_image';
        
        $arrayNamesTabelRows = array(
            'image_userId',
            'image_path'
        );
        $arrayValuesTabelRows = array(
            $id,
            $name
        );
        $getResult = $this->QueryInsert($table, $arrayNamesTabelRows, $arrayValuesTabelRows);
        if ($getResult) {
            return true;
        }
        
        return false;
    }

    // findout your expected id
    private function QueryInsertGetId($table, $arrayNamesColumns, $arrayValuesColumns)
    {
        $query = "INSERT INTO $table ($arrayNamesColumns[0],$arrayNamesColumns[1],$arrayNamesColumns[2]) VALUES ('$arrayValuesColumns[0]' , '$arrayValuesColumns[1]' , '$arrayValuesColumns[2]')";
        echo $query." <br>";
        $link = $this->ConnectDB();
        
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
        
        $id = mysqli_insert_id($link);
        
        $this->CloseConnectDB($link);
        return $id;
    }
    
    //testcase seems to be completed
   private function FindExistedGetID($table, $indexDB , $indexCheck){
       
       $query = "SELECT id FROM $table WHERE $indexDB = '$indexCheck'";
       echo $query."<br/>"; //TODO: unwrite text
       $link = $this->ConnectDB();
 //      var_dump(mysqli_query($link, $query) );
 //      echo "<br/>";
       $result = mysqli_query($link, $query) /*nah nenuzhon  or die("Ошибка " . mysqli_error($link)) */;
     //  echo $result." vivod  <br>";
       $this->CloseConnectDB($link);
      
       if($result != null){
           //cal of sql result
           $row = $result->fetch_array(MYSQLI_ASSOC);
           echo $row." <br>";
           echo $row['id']." <br>";
           return $row['id'];
         
       
       }
      else return false;
   }
   
   
   public  function FindExistedNews($indexChek){
       
       $table = 'med_news';
       $indexDB = 'news_title';
       
       $result = $this->FindExistedGetID($table, $indexDB, $indexChek);
       return $result;
       
   }
   
   public  function FindExistedPromo($indexChek){
       
       $table = 'med_promo';
       $indexDB = 'promo_title';
       
       $result = $this->FindExistedGetID($table, $indexDB, $indexChek);
       return $result;
       
   }
   public  function FindExistedSpecial($indexChek){
       
       $table = 'med_special';
       $indexDB = 'special_title';
       
       $result = $this->FindExistedGetID($table, $indexDB, $indexChek);
       return $result;
       
   }
   public  function FindExistedMedturism($indexChek){
       
       $table = 'med_medturism';
       $indexDB = 'medturism_title';
       
       $result = $this->FindExistedGetID($table, $indexDB, $indexChek);
       return $result;
       
   }
   
   //TODO: in progress of macking individual funct for each category
   public function UpdateNews($arrayUpdatedData, $id_post){
       $table = 'med_news';
       //TODO: constant place
       $arrayDBCollums = array('news_title', 'med_user_fk', 'news_descripion');
  
       $result = $this->UpdateTable($table, $arrayDBCollums , $arrayUpdatedData, $id_post);
       
   }
   
   //TODO: make it multipurpose  
   //sql example 
   // UPDATE Customers
 //  SET ContactName = 'Alfred Schmidt', City= 'Frankfurt'
   //  WHERE CustomerID = 1;
   
   
   // $id is row`s id of the particular table
   private function UpdateTable($table, $arrayDBCollums , $arrayUpdatedData, $id){
       $query = "UPDATE $table SET $arrayDBCollums[0] = '$arrayUpdatedData[0]', $arrayDBCollums[1] = $arrayUpdatedData[1], $arrayDBCollums[2] = '$arrayUpdatedData[2]' WHERE id = $id";
       
       $link = $this->ConnectDB();
       
       $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
       
        $this->CloseConnectDB($link);
        return $result;
   }
   
}

?>
