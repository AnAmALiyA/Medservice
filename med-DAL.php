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

  private function QuerySelectById($table, $id){
      return $this->QuerySelectAll($table, $id);
  }
  
  private function QuerySelectAll($table, $select="*")
  {
    $query = "SELECT $select FROM $table";
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
  
  //вставка Название(Компания) 
  function InsertOrganization($nameCompany){
      $table = 'med_organization';
      $arrayNamesTabelRows = array('id', 'short_name', 'type_ownership_fk', 'name', 'edrpou_code');
      $select = 'id';
      //найти Id
      $result = QuerySelectAll($table, $select);
      $lastId = $this->GetLastId($result);
      $lastId++;
      $ownership = 1;      

      $arrayValuesTabelRows = array($lastId, '', $ownership, $nameCompany, '');
      $getResult = $this->medDB->QueryInsert($table, $arrayNamesTabelRows, $arrayValuesTabelRows);
      return $getResult;
  }
  
  
  
}
 ?>
