<?php
// require_once 'med-dataBAL.php';
require_once 'med-DAL.php'; //записать переменные сюда
$arrayNamesServices = array(
'dentistry'=>'Стоматологія',
'childrens_dentistry'=>'Дитяча стоматологія',
'therapeutic_dentistry'=>'Терапевтична стоматологія',
'aesthetic_dentistry'=>'Естетична стоматологія',
'orthodontics'=>'Ортодонтія',
'dental_othopedics'=>'Стоматологічна ортопедія (протезування)',
'dental_surgery'=>'Стоматологічна хірургія',
'dental_Implantology'=>'Стоматологічна імплантологія',
'periodontology'=>'Пародонтологія',
'dental_prophylaxis'=>'Стоматологічна профілактика',
'dentistry_pregnant_women'=>'Стоматологія для вагітних',
'tooth_whitening'=>'Відбілювання зубів',
'gnathology'=>'Гнатологія',
'dental_bone_plastics'=>'Стоматологічна кістяна пластика',
'dentistry_at_home'=>'Стоматологія на дому',
'allergy'=>'Алергіологія',
'alcoholism'=>'Алкоголізм',
'gastroenterology'=>'Гастроентерологія',
'childrens_consultation'=>'Дитяча консультація',
'ecg'=>'ЕКГ',
'ct'=>'КТ',
'mammography'=>'Мамографія',
'mri'=>'МРТ',
'oncology'=>'Онкологія',
'wounded'=>'Опікове',
'otorhinolaryngology'=>'Оториноларингологія (ЛОР)',
'radiology'=>'Рентгенологія',
'sports_medicine'=>'Спортивна медицина',
'surgery'=>'Сурдологія',
'ultrasound_diagnosis'=>'Ультразвукова діагностика',
'call_doctor_home'=>'Виклик лікаря додому',
'family_medicine'=>'Сімейна медицина',
'timpanometry'=>'Тімпанометрія');

class Controller
{
  private $medDB;
  private $arrayNamesServices;
  private $arrayFilds;  

  public function __construct()
  {
    $this->medDB = new MedDB;
    $this->arrayNamesServices = $arrayNamesServicesBAL;
    $this->arrayFilds = $arrayFilds;
  }

/*
private function QueryMedServices()
{
  $table = "med_services";
  return $this->medDB->QuerySelect($this->selectAll, $table);
  // SELECT COLUMN_NAME FROM {database_name}.INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '{table}'
}

private function GetArrayServices($obj) // метод для получения всех данных и формирование их в массив.
{
  $arr = array();
  $count = 0;

  while ($result = mysqli_fetch_assoc($querySelectResult))
  {
    //echo $result." count = $count";
    $tempArr = array();
    foreach ($result as $key => $value) {
        //echo "key - $key / value - $value<br>";
        $tempArr[$key] = $value;
    }
    $arr[$count] = $tempArr;
    $count++;
  }
  return $arr;
}

function GetMedServices() // метод для получения всех данных и формирование их в массив.
{
  $querySelectResult = $this->QueryMedServices();
  return $this->GetArrayServices($querySelectResult);
}
*/

// private function GetArrayInsuranceCompany($obj)
// {
//   $arr = array();
//   while ($result = mysqli_fetch_assoc($obj))
//   {
//     $arr[$result['id']] = $result['name_companie'];
//   }
//   return $arr;
// }

function GetGenerationTimeFor7($startTime = 7)
{
    $a=$startTime;
    $a++;
    while ($a!=$startTime)
    {
        if ($a<10) {
            echo "<option value=\"$a\">0$a.00</option>";
        }
        else {
            echo "<option value=\"$a\">$a.00</option>";
        }
        if ($a==24) {
            $a=0;
        }
        $a++;
    }
}

function GetGenerationTimeFor19()
{
    $startTime = 19;
    $this->GetGenerationTimeFor7($startTime);
}

//Название(Компания) 2 колонка
function GetOrganizationAll(){
    return $this->medDB->GetOrganizationOneCol();
}

function InsertOrganization($nameCompany){    
    $this->medDB->InsertOrganization($nameCompany);
}

//Область 2 колонка
function GetRegionAll(){
    return $this->medDB->GetRegionOneCol();    
}

//Районы 3 колонки
function GetDistrictRegionAll(){
    return $this->medDB->GetDistrictRegionAllCol();
}

//Город 4 колонки
function GetLocalityAll(){
    return $this->medDB->GetLocalityAllCol();
}

//улица 3 колонки
function GetActualLocationAll(){
    return $this->medDB->GetActualLocationAllCol();
}

//дом 3 колонки
function GetHomeAll(){
    return $this->medDB->GetHomeAllCol();
}

//телефон 2 колонки
function GetPhoneAll(){
    return $this->medDB->GetPhoneOneCol();
}

//время работы 3 колонки
function GetTimeWorkAll(){
    return $this->medDB->GetTimeWorkAllCol();
}

//дни работы 3 колонки
function GetDayWorkOneCol(){
    return $this->medDB->GetDayWorkOneCol();
}

//сервисы 34 колонки
function GetServiceAll(){
    return $this->medDB->GetServiceAllCol();
}

//Тип учереждения
function GetTypeInstitutionAll(){
    return $this->medDB->GetTypeInstitutionOneCol();
}

//страховая компания
function GetInsuranceCompanyAll(){
    return $this->medDB->GetInsuranceCompanyOneCol();
}

//суммарную таблицу 10 колонки
function GetSummaryTableAll(){
    return $this->medDB->GetSummaryTableAllCol();
}

//начать сохранение
}
?>
