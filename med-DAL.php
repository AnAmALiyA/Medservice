<?php
class MedDB
{

  private $host='localhost';
  private $user='root';
  private $password='';
  private $database='uh347272_med24';

  private function ConnectDB()
  {
    $link = mysqli_connect($this->host, $this->user, $this->password, $this->database) or die("Ошибка " . mysqli_error($link));
    return $link;
  }

  private function CloseConnectDB($link)
  {
    mysqli_close($link);
  }

  private function QuerySelectAll($table, $select="*")
  {
    $query = "SELECT $select FROM $table";
    $link = $this->ConnectDB();

    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

    $this->CloseConnectDB($link);
    return $result;
  }
  
  private function QuerySelectId($table, $selectId)
  {
      $query = "SELECT * FROM $table WHERE id=$selectId";
      $link = $this->ConnectDB();
      
      $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
      
      $this->CloseConnectDB($link);
      return $result;
  }

/* Функции для генерации стоки из имен столбцов и значений
  function GetStrNames($arrayNamesTabelRows)
  {
    $strNamesTabelRows = '';
    for($i=0;$i<=count($arrayNamesTabelRows);$i++)
    {
      $strNamesTabelRows .=$arrayNamesTabelRows[i];
      if(i!=count($arrayNamesTabelRows))
      {
        $strNamesTabelRows .=',';
      }
    }
    return $strNamesTabelRows;
  }

  function GetStrValues($arrayValuesTabelRows)
  {
    $strValuesTabelRows = '';
    for($j=0;$j<=count($arrayValuesTabelRows);$j++)
    {
      $strValuesTabelRows = $arrayValuesTabelRows[j];
      if (j!=count($arrayValuesTabelRows)) {
        $strValuesTabelRows .=',';
      }
    }
    return $strValuesTabelRows;
  }
*/

  private function QueryInsert($table, $strNamesTabelRows, $strValuesTabelRows)
  {
/*  $arrayNamesTabelRows и $arrayValuesTabelRows принемаемые массивы имен столбцов и значений
    $strNamesTabelRows = GetStrNames($arrayNamesTabelRows);
    $strValuesTabelRows = GetStrValues($arrayValuesTabelRows);
*/
    $query = "INSERT INTO $table($strNamesTabelRows) VALUES($strValuesTabelRows)";
    $link = ConnectDB();

    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

    $this->CloseConnectDB($link);
    return $result;
  }

  private function QueryDelete($tabel, $id)
  {
    $query = "DELETE FROM $tabel WHERE id=$id";
    $link = ConnectDB();

    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

    $this->CloseConnectDB($link);
    return $result;
  }

  private function QueryUpdateOne($tabel, $nameTabelRow, $valueTabelRow, $id)
  {
    $query = "UPDATE $tabel SET $nameTabelRow = '$valueTabelRow' WHERE id=$id";
    $link = $this->ConnectDB();

    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

    $this->CloseConnectDB($link);
    return $result;
  }

  private function QueryUpdateMany($tabel, $arrayNamesTabelRows, $arrayValuesTabelRows, $id)
  {
    $strNamesTabelRows = GetStrNames($arrayNamesTabelRows);
    $strValuesTabelRows = GetStrValues($arrayValuesTabelRows);

    $query = "UPDATE $tabel SET $nameTabelRow = '$valueTabelRow' WHERE id=$id";
    $link = $this->ConnectDB();

    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

    $this->CloseConnectDB($link);
    return $result;
  }
 
  private function GetArrayOneCol($table, $nameFilldArray){
      $obj = $this->QuerySelectAll($table);
      
      $arr = array();
      while ($result = mysqli_fetch_assoc($obj))
      {
          $arr[$result['id']] = $result[$nameFilldArray];//'type_description'
      }
      return $arr;
  }
  
  private function GetArrayAllCol($table){
      $obj = $this->medDB->QuerySelectAll($table);
      
      $arr = array();
      $i=1;
      while ($result = mysqli_fetch_assoc($obj)) {
          $arrTemp = array();
          foreach ($result as $key => $value) {
              $arrTemp[$key]=$value;
          }
          $arr[$i]=$arrTemp;
          $i++;
      }
      return $arr;
  }
  
  //Название(Компания) 2 колонка
  function GetOrganizationOneCol(){
      $table = 'med_organization';
      $nameFilldArray = 'name';
      return $this->GetArrayOneCol($table, $nameFilldArray);
  }
  
  //Область 2 колонка
  function GetRegionOneCol(){
      $table = 'med_region';
      $nameFilldArray = 'region';
      return $this->GetArrayOneCol($table, $nameFilldArray);
  }
  
  //Районы 3 колонки
  function GetDistrictRegionAllCol(){
      $table = 'med_district_region';
      return $this->GetArrayAllCol($table);
  }
  
  //Город 4 колонки
  function GetLocalityAllCol(){
      $table = 'med_locality';
      return $this->GetArrayAllCol($table);
  }
  
  //улица 3 колонки
  function GetActualLocationAllCol(){
      $table = 'med_actual_location';
      return $this->GetArrayAllCol($table);
  }
  
  //дом 3 колонки
  function GetHomeAllCol(){
      $table = 'med_home';
      return $this->GetArrayAllCol($table);
  }
  
  //телефон 2 колонки
  function GetPhoneOneCol(){
      $table = 'med_phone';
      $nameFilldArray = 'phone';
      return $this->GetArrayOneCol($table, $nameFilldArray);
  }
  
  //время работы 3 колонки
  function GetTimeWorkAllCol(){
      $table = 'med_time_work';
      return $this->GetArrayAllCol($table);
  }
  
  //дни работы 3 колонки
  function GetDayWorkOneCol(){
      $table = 'med_day_work';
      $nameFilldArray = 'day_work';
      return $this->GetArrayOneCol($table, $nameFilldArray);
  }
  
  //сервисы 34 колонки
  function GetServiceAllCol(){
      $table = 'med_services';
      return $this->GetArrayAllCol($table);
  }
    
  //Тип учереждения
  function GetTypeInstitutionOneCol()
  {
      $table = 'med_type_institution';
      $nameFilldArray = 'type_description';
      return $this->GetArrayOneCol($table, $nameFilldArray);
  }
  
  //страховая компания
  function GetInsuranceCompanyOneCol()
  {
      $table = 'med_insurance_companies';
      $nameFilldArray='name_companie';
      return $this->GetArrayOneCol($table, $nameFilldArray);
  }
  
  //суммарную таблицу 10 колонки
  function GetSummaryTableAllCol(){
      $table = 'med_summary_table';
      return $this->GetArrayAllCol($table);
  }

  private function GetLastId($query){
      $lastId='';
      while ($result = mysqli_fetch_assoc($query)) {
          
          $lastId = $result['id'];
      }
      return $lastId;
  }
  
  private function GetIdByData($query, $data, $nameTable){
      while ($result = mysqli_fetch_assoc($query)) {
          if ($data == $result[$nameTable]) {
              return $result['id'];
          }
      }
      return -1;
  }
  
  private function GetDataById($table, $selectId){
      $result = $this->QuerySelectAll($table, $selectId);
      return mysqli_fetch_assoc($result);
  }
  
  private function ComparisonData($query, $data, $nameTable){//запрос искомые данные имя таблицы
      while ($result = mysqli_fetch_assoc($query)) {
          if ($data == $result[$nameTable]) {
              return true;
          }
      }
      return false;
  }
  
  private function ComparisonManyData($table, $selectId, $arrayNames, $arrayDatas){
      $result = $this->GetDataById($table, $selectId);      
      $flag = true;
      
      for ($i = 1; $i <= count($arrayNames); $i++) {
          if($result[$arrayNames[$i]] != $arrayDatas[$i]){
              $flag = false;
          }
      }
      return $flag;
  }
  

  
  //вставка Название(Компания) 
  function GetIdInsertOrganization($company){
      $table = 'med_organization';
      $nameTable = 'name';
      $arrayNamesTabelRows = array('id', 'short_name', 'type_ownership_fk', $nameTable, 'edrpou_code');
      $ownership = 1;
      
      $result = QuerySelectAll($table);
      
      $isExist = $this->ComparisonData($query, $company, $nameTable);
      if ($isExist) {
          $idOrganization = $this->GetIdByData($result, $company, $nameTable);
          return $idOrganization;         
      }else{
          $lastId = $this->GetLastId($result);
          $lastId++;   
    
          $arrayValuesTabelRows = array($lastId, '', $ownership, $company, '');
          $getResult = $this->medDB->QueryInsert($table, $arrayNamesTabelRows, $arrayValuesTabelRows);
          if ($getResult) {
              return $lastId;
          }else {
              return -1;
          }
      }
  }
  
  //вставка области - тут либо делаю вставку или нахожу существующую и возвращаю id области
  function GetIdInsertGetRegion($region){
      $table = 'med_region';
      $nameTable = 'region';
      $arrayNamesTabelRows = array('id',$nameTable);
      
      $result = QuerySelectAll($table);
      
      $isExist = $this->ComparisonData($result, $region, $nameTable);
      if ($isExist) {
          $idRegion = $this->GetIdByData($result, $region, $nameTable);
          return $idRegion;          
      }else {
          $lastId = $this->GetLastId($result);
          $lastId++;
          
          $arrayValuesTabelRows = array($lastId, $region);
          
          $getResult = $this->medDB->QueryInsert($table, $arrayNamesTabelRows, $arrayValuesTabelRows);
          if ($getResult) {
              return $lastId;
          }else {
              return -1;
          }
      }
  }
  
  //вставка региона области
  function GetIdInsertGetDistrictRegion ($district, $regionId) {
      $table = 'med_district_region';
      $nameTable = 'district';
      $regionFk = 'region_fk';
      $arrayNamesTabelRows = array('id', $nameTable, $regionFk);
      
      $result = QuerySelectAll($table);
      
      $isExist = $this->ComparisonData($result, $district, $nameTable);//существует
      if ($isExist) {
          $idDistrict = $this->GetIdByData($result, $district, $nameTable);//получаю сущ id
          
          $arrayNames = array($nameTable, $regionFk);
          $arrayDatas = array($district, $regionId);
          
          $isCoincides = $this->ComparisonManyData($table, $idDistrict, $arrayNames, $arrayDatas);
          if ($isCoincides) { //если совпали данные, то возвращаю текущий id
              return $idDistrict;
          }
      }
          //если не совпали, то добовляю
      $lastId = $this->GetLastId($result);
      $lastId++;
          
      $arrayValuesTabelRows = array($lastId, $district, $regionId);
          
      $getResult = $this->medDB->QueryInsert($table, $arrayNamesTabelRows, $arrayValuesTabelRows);
      if ($getResult) {
          return $lastId;
      }else {
          return -1;
      }
  }
    
  //вставка город
  function GetIdInsertLocality($town, $DistrictRegionId){
      $table = 'med_locality';
      $nameTable = 'locality';
      $typeLocalityFk = 'type_locality_fk';
      $districtRegionFk = 'district_region_fk';
      $arrayNamesTabelRows = array('id', $nameTable, $typeLocalityFk, $districtRegionFk);
      $typeLocalityFkData = 1;
      
      $result = QuerySelectAll($table);
      
      $isExist = $this->ComparisonData($result, $town, $nameTable);//существует
      if ($isExist) {//если город существует то ищу район
          $idTown = $this->GetIdByData($result, $town, $nameTable);//получаю сущ id
          
          $arrayNames = array($nameTable, $districtRegionFk);
          $arrayDatas = array($town, $DistrictRegionId);
          
          $isCoincides = $this->ComparisonManyData($table, $idTown, $arrayNames, $arrayDatas);
          if ($isCoincides) { //если совпали данные, то возвращаю текущий id
              return $idTown;
          }
      }
      //если не совпали, то добовляю
      $lastId = $this->GetLastId($result);
      $lastId++;
      
      $arrayValuesTabelRows = array($lastId, $town, $typeLocalityFkData, $DistrictRegionId);
      
      $getResult = $this->medDB->QueryInsert($table, $arrayNamesTabelRows, $arrayValuesTabelRows);
      if ($getResult) {
          return $lastId;
      }else {
          return -1;
      }
  }
  
  function GetIdInsertActualLocation($actualLocation, $townId) {
      $table = 'med_actual_location';
      $nameTable = 'actual_location';
      $localityFk = 'locality_fk';
      $arrayNamesTabelRows = array('id', $nameTable, $localityFk);
      
      $result = QuerySelectAll($table);
      
      $isExist = $this->ComparisonData($result, $actualLocation, $nameTable);//существует
      if ($isExist) {//если город существует то ищу район
          $idActualLocation = $this->GetIdByData($result, $actualLocation, $nameTable);//получаю сущ id
          
          $arrayNames = array($nameTable, $localityFk);
          $arrayDatas = array($actualLocation, $townId);
          
          $isCoincides = $this->ComparisonManyData($table, $idActualLocation, $arrayNames, $arrayDatas);
          if ($isCoincides) { //если совпали данные, то возвращаю текущий id
              return $idActualLocation;
          }
      }
      //если не совпали, то добовляю
      $lastId = $this->GetLastId($result);
      $lastId++;
      
      $arrayValuesTabelRows = array($lastId, $actualLocation, $townId);
      
      $getResult = $this->medDB->QueryInsert($table, $arrayNamesTabelRows, $arrayValuesTabelRows);
      if ($getResult) {
          return $lastId;
      }else {
          return -1;
      }
  }
  
  function GetIdInsertHome ($home, $actualLocationId) {
      $table = 'med_home';
      $nameTable = 'number_home';
      $actualLocationFk = 'actual_location_fk';
      $arrayNamesTabelRows = array('id', $nameTable, $actualLocationFk);
      
      $result = QuerySelectAll($table);
      
      $isExist = $this->ComparisonData($result, $home, $nameTable);//существует
      if ($isExist) {//если город существует то ищу район
          $idHome = $this->GetIdByData($result, $home, $nameTable);//получаю сущ id
          
          $arrayNames = array($nameTable, $actualLocationFk);
          $arrayDatas = array($home, $actualLocationId);
          
          $isCoincides = $this->ComparisonManyData($table, $idHome, $arrayNames, $arrayDatas);
          if ($isCoincides) { //если совпали данные, то возвращаю текущий id
              return $idHome;
          }
      }
      //если не совпали, то добовляю
      $lastId = $this->GetLastId($result);
      $lastId++;
      
      $arrayValuesTabelRows = array($lastId, $home, $actualLocationId);
      
      $getResult = $this->medDB->QueryInsert($table, $arrayNamesTabelRows, $arrayValuesTabelRows);
      if ($getResult) {
          return $lastId;
      }else {
          return -1;
      }
  }
  
  function GetIdInsertPhone($phone) {
      $table = 'med_phone';
      $nameTable = 'phone';
      $arrayNamesTabelRows = array('id', $nameTable);
      
      $result = QuerySelectAll($table);

      $isExist = $this->ComparisonData($result, $phone, $nameTable);
      if ($isExist) {
          $idPhone = $this->GetIdByData($result, $phone, $nameTable);
          return $idPhone;
      }else{
          $lastId = $this->GetLastId($result);
          $lastId++;
          
          $arrayValuesTabelRows = array($lastId, $phone);
          $getResult = $this->medDB->QueryInsert($table, $arrayNamesTabelRows, $arrayValuesTabelRows);
          if ($getResult) {
              return $lastId;
          }else {
              return -1;
          }
      }
  }
  
  function GetIdInsertTypeInstitution($typeDescription) {
      $table = 'med_type_institution';
      $nameTable = 'type_description';
      $arrayNamesTabelRows = array('id', $nameTable);
      
      $result = QuerySelectAll($table);
      
      //узнаю уществует ли
      $isExist = $this->ComparisonData($result, $typeDescription, $nameTable);
      if ($isExist) {//если да
          //нахожу id
          $idTypeDescription = $this->GetIdByData($result, $typeDescription, $nameTable);
          return $idTypeDescription;
      }else{
          $lastId = $this->GetLastId($result);
          $lastId++;
          
          $arrayValuesTabelRows = array($lastId, $typeDescription);
          $getResult = $this->medDB->QueryInsert($table, $arrayNamesTabelRows, $arrayValuesTabelRows);
          if ($getResult) {
              return $lastId;
          }else {
              return -1;
          }
      }
  }
  
//   function GetIdInsertServices ($param) {
//       $table = 'med_services';
//       $nameTable = 'type_description';
//       $arrayNamesTabelRows = array('id', $nameTable);
      
//       $result = QuerySelectAll($table);
      
//       //узнаю уществует ли
//       $isExist = $this->ComparisonData($result, $typeDescription, $nameTable);
//       if ($isExist) {//если да
//           //нахожу id
//           $idTypeDescription = $this->GetIdByData($result, $typeDescription, $nameTable);
//           return $idTypeDescription;
//       }else{
//           $lastId = $this->GetLastId($result);
//           $lastId++;
          
//           $arrayValuesTabelRows = array($lastId, $typeDescription);
//           $getResult = $this->medDB->QueryInsert($table, $arrayNamesTabelRows, $arrayValuesTabelRows);
//           if ($getResult) {
//               return $lastId;
//           }else {
//               return -1;
//           }
//       }
//   }
  
//   function InsertInsuranceCompany ($insuranceCompany) {
//       ;
//   }
  
}
 ?>
