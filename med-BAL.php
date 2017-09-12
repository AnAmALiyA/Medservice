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
'timpanometry'=>'Тімпанометрія'
);

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
    
    private function GetStrPhones(){
        $stringPhones = null;
        for ($i = 1; $i <= 10; $i++) {
            if ($_POST[$i]!=null) {
                $stringPhones .= $_POST[$i];
            }
        }
        return $stringPhones;
    }
    
    private function GetArrayInsuranceCompany(){
        $arr=array();
        $_POST['usk']!=null?array_push($arr, $_POST['usk']):array_push($arr, null);
        $_POST['aska']!=null?array_push($arr, $_POST['aska']):array_push($arr, null);
        return $arr;
    }
    
//     private function GetStrDayWork(){
//         $stringDayWork = null;
//         $arr = array(
//             $_POST['monday'] ? "Пн" : null,
//             $_POST['tuesday'] ? "Вт" : null,
//             $_POST['wednesday'] ? "Ср" : null,
//             $_POST['thursday'] ? "Чт" : null,
//             $_POST['friday'] ? "Пт" : null,
//             $_POST['saturday'] ? "Сб" : null,
//             $_POST['sunday'] ? "Вс" : null
//         );
//         $start = false;
//         for ($i = 1; $i <= 7; $i++) {
//             if ($arr[$i] != null) {
//                 if ($i == 1) 
//                 {
//                     $stringDayWork .= $arr[$i];
//                 } 
//                 elseif ($i == 7) 
//                 {
//                     if ($arr[$i-1] != null) {
//                         $stringDayWork .= '-'.$arr[$i];
//                     }
//                     elseif ($stringDayWork == null)
//                     {
//                         $stringDayWork .= $arr[$i];
//                     }
//                     else {
//                         $stringDayWork .= ','.$arr[$i];
//                     }
//                 }
//                 elseif ($i == 2 || $i == 6)
//                 {
//                     if ($arr[$i-1] != null && $arr[$i+1] == null) {
//                         $stringDayWork .= '-'.$arr[$i];
//                     }elseif ($arr[$i-1] == null && $arr[$i+1] == null) {
//                         $stringDayWork .= $arr[$i];
//                     }
//                 }
//                 else {
//                     if ($arr[$i-1] != null && $arr[$i+1] == null) 
//                     {
//                         $stringDayWork .= '-'.$arr[$i];
//                     }
//                     elseif ($arr[$i-1] == null) 
//                     {
//                         if ($stringDayWork == null) {
//                             $stringDayWork .= $arr[$i];
//                         }
//                         else 
//                         {
//                             $stringDayWork .= ','.$arr[$i];
//                         }
//                     }
//                 }                
//             }
//         }
//         return $stringDayWork;
//     }
    
    private function GetArrayWeekEnd(){
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
    
//     function GetStringWeekEnd($arrWeekEndDay) {
//         $stringWeekEnd ='';
//         $gap = false;
//         for ($i = 1; $i <= 7; $i++) {
//             if ($arrWeekEndDay[$i] != null) {
//                 if ($stringWeekEnd == null) {
//                     $stringWeekEnd .= $arrWeekEndDay[$i];
//                 } 
//                 elseif ($gap) 
//                 {
//                     $stringWeekEnd .= ','.$arrWeekEndDay[$i];
//                 }
//                 elseif ($i == 7) {
//                     if ($arrWeekEndDay[$i-1] != null) {
//                         $stringWeekEnd .= '-'.$arrWeekEndDay[$i];
//                     }
//                     else 
//                     {
//                         $stringWeekEnd .= ','.$arrWeekEndDay[$i];
//                     }
//                 }
//                 else
//                 {
//                     if ($arrWeekEndDay[$i+1] == null) {
//                         $stringWeekEnd .= '-'.$arrWeekEndDay[$i];
//                     }
//                 }
//             }
//             else 
//             {
//                 $gap = false;
//             }
//         }
//     }
function GetStringWorkDay($arrWeekEndDay, $arrayNameDays)
    {
        $stringWorkDay = null;
        for ($i = 1; $i <= count($arrWeekEndDay); $i++) {
            if($arrWeekEndDay[$i] == null && $stringWorkDay == null)
            {
                $stringWorkDay = $arrayNameDays[$i];
            }
            elseif ($i == count($arrWeekEndDay))// 7
            {
                if($stringWorkDay == null && $arrWeekEndDay[$i] == null)
                {
                    return $stringWorkDay;//вернуть пустую строку
                }
                elseif ($arrWeekEndDay[$i-1] != null) 
                {
                    $stringWorkDay .= '-'.$arrayNameDays[$i];
                }
                else
                {
                    $stringWeekEnd .= ','.$arrayNameDays[$i];
                }
            }
            elseif ($arrWeekEndDay[$i] != null) // если отмечено не выходной
            {
                if ($arrWeekEndDay[$i-1] == null) {
                    $stringWorkDay .= '-'.$arrayNameDays[$i-1];
                }
            }
        }
        return $stringWorkDay;
    }

    private function GetArrayTimeWorkStart(){
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
    private function GetArrayTimeWorkEnd(){
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
    
    private function GetArrayNameDays() {
//         $arrDay = array(
//             'monday' => "Пн",
//             'tuesday' => "Вт",
//             'wednesday' => "Ср",
//             'thursday' => "Чт",
//             'friday' => "Пт",
//             'saturday' => "Сб",
//             'sunday' => "Вс"
//         );
        $arrDay = array("Пн", "Вт", "Ср", "Чт", "Пт", "Сб", "Вс");
        return $arrDay;
    }
    
    private function GetArrayTimeWork($arrWeekEndDay, $arrayNameDays, $arrTimeWorkStart, $arrTimeWorkEnd)
    {
        //для выходных
        $strWeekEnd = null;
        if($arrWeekEndDay[6] != null && $arrWeekEndDay[7] != null)
        {
            if($arrTimeWorkStart[6] == $arrTimeWorkStart[7]
                && $arrTimeWorkEnd[6] == $arrTimeWorkEnd[7])
            {
                $strWeekEnd = $arrTimeWorkStart[6].'-'.$arrTimeWorkEnd[6];
            }
            else {
                $strWeekEnd = $arrayNameDays[6].' '.$arrTimeWorkStart[6].'-'.$arrTimeWorkEnd[6].','.$arrayNameDays[7].' '.$arrTimeWorkStart[7].'-'.$arrTimeWorkEnd[7];
            }
        }
        else {
            if ($arrWeekEndDay[6] != null) {
                $strWeekEnd = $arrayNameDays[6].' '.$arrTimeWorkStart[6].'-'.$arrTimeWorkEnd[6];
            }
            elseif ($arrWeekEndDay[7] != null) {
                $strWeekEnd = $arrayNameDays[7].' '.$arrTimeWorkStart[7].'-'.$arrTimeWorkEnd[7];
            }
        }
        //для будних
        $strWorkDay = null;
        $workDayStart = null;
        $workDayEnd = null;
        $flag = true;
        for($i = 1; $i <= 5; $i++) 
        {
            if($arrWeekEndDay[$i] == null)
            {
                if($workDayStart == null || $workDayEnd == null)
                {
                    $workDayStart = $arrTimeWorkStart[$i];
                    $workDayEnd = $arrTimeWorkEnd[$i];
                }
                
                if($workDayStart != $arrTimeWorkStart[$i] || $workDayEnd != $arrTimeWorkEnd[$i])
                {
                    $flag = false;
                    break;
                }
            }
        }
        
        if ($flag)
        {
            $strWorkDay = $workDayStart.'-'.$workDayEnd;
            return $strWorkDay;
        }
        
        $workDayStart = null;
        $workDayEnd = null;
        for ($i = 1; $i <= 5; $i++) {
            if ($arrWeekEndDay[$i] == null)
            {
                if ($workDayStart == null && $workDayEnd == null) {
                    $workDayStart = $arrTimeWorkStart[$i]; 
                    $workDayEnd = $arrTimeWorkEnd[$i];
                    $strWorkDay = $arrayNameDays[$i];
                }
                elseif ($arrWeekEndDay[$i-1] != null && $workDayStart == $arrTimeWorkStart[$i] && $workDayEnd == $arrTimeWorkEnd[$i])
                {
                    $strWorkDay = ', '.$arrayNameDays[$i];
                }
                elseif($arrWeekEndDay[$i-1] == null && $workDayStart == $arrTimeWorkStart[$i] && $workDayEnd == $arrTimeWorkEnd[$i])
                {
                    $strWorkDay = '-'.$arrayNameDays[$i].' '.$workDayStart.'-'.$workDayEnd;
                }
                elseif ($arrWeekEndDay[$i-1] != null && ($workDayStart != $arrTimeWorkStart[$i] || $workDayEnd != $arrTimeWorkEnd[$i]))
                {
                    $strWorkDay = ', '.$arrayNameDays[$i];
                    $workDayStart = $arrTimeWorkStart[$i];
                    $workDayEnd = $arrTimeWorkEnd[$i];
                }
                elseif ($arrWeekEndDay[$i-1] == null && ($workDayStart != $arrTimeWorkStart[$i] || $workDayEnd != $arrTimeWorkEnd[$i]))
                {
                    $strWorkDay = '-'.$arrayNameDays[$i];
                    $workDayStart = $arrTimeWorkStart[$i];
                    $workDayEnd = $arrTimeWorkEnd[$i];
                }
            }
            else
            {
                if ($workDayStart != null && $workDayEnd != null) {
                    
                    if ($i == 1)
                    {
                        continue;
                    }
                    elseif($arrWeekEndDay[$i-1] == null) 
                    {
                        continue;
                    }
                    else
                    {
                        if ($i == 2) {
                            $strWorkDay .= $workDayStart.'-'.$workDayEnd;
                        }
                        else
                        {
                            $strWorkDay .= '-'.$arrayNameDays[$i-1].' '.$workDayStart.'-'.$workDayEnd;
                        }
                    }
                }
            }
            
            
            if ($i == 5)
            {
                $strWorkDay.' '.$workDayStart.'-'.$workDayEnd;
            }
        }
        
    }
//     private function GetStringWeekEnd($arrWeekEndDay){
        
//     }
    
//     private function GetArrayTimeWorkData(){
//         $arrayTimeWork = array();
//         $arrDay = $this->GetArrayNameDays();
//         $arrTimeStart = $this->GetArrayTimeWorkStart();
//         $arrTimeEnd = $this->GetArrayTimeWorkEnd();
//         $arrWeekEndDay = $this->GetArrayWeekEnd();
                
//         for ($i = 1; $i <= 7; $i++) {
//             if ($arrWeekEndDay[$i] == null) 
//             {
//                 $arrTimeStart[$i] = null;
//                 $arrTimeEnd[$i] = null;
//             }
//         }
        
//         $strgWeekEnd = $this->GetStringWeekEnd($arrWeekEndDay);
// //         $workDayStart = $arrTimeStart[1];
// //         $workDayEnd = $arrTimeEnd[1];
// //         $same = true;
// //         for ($i = 1; $i <= 5; $i++) {
// //             if ($arrTimeStart[$i] != null && $arrTimeEnd[$i] != null 
// //                 && $arrTimeStart[$i] != $workDayStart || $arrTimeEnd[$i] != $workDayEnd)
// //             {
// //                 $same = false;
// //             }
// //         }
        
// //         if ($same) {
// //             $strWeekEnd = null;
// //             if ($arrWeekEndDay[6] != null) {
// //                 $strWeekEnd .= $arrTimeStart[$i].'-'.$arrTimeEnd[$i];
// //             }
// //             return array_push($arrayTimeWork, $start.'-'.$end, $strWeekEnd);
// //         }
//     }
    private function GetArrayServices($arrayNamesServices)
    {
        $arrayCheckServices = array();
        for ($i = 1; $i <= count($arrayNamesServices); $i++) 
        {
            array_push($arrayCheckServices, $_POST[$i.'-service']);
        }
        return $arrayCheckServices;
    }

    private function SaveError($arrayParam) {
        for ($i = 1; $i < count($arrayParam); $i++) {
            if ($arrayParam[$i] == -1) {
                return false;
            }
        }
        return true;
    }
    
//начать сохранение --- для рефакторинга разбить метод на 2 действия - GetIdInsert
    function Save() {
        //проверить существование организации(Название)
        $idOrganization = $this->medDB->GetIdInsertOrganization($_POST['nameCompany']);
        //область
        $idRegion = $this->medDB->GetIdInsertGetRegion($_POST['region']);
        //город
        $idTown = $this->medDB->GetIdInsertGetDistrictCity($_POST['town'], $idRegion);
        //район области
        $idDistrictRegion = $this->medDB->GetIdInsertGetDistrictRegion($_POST['districtCity'], $idTown);
        //улица
        $idStreet = $this->medDB->GetIdInsertActualLocation($_POST['street'], $idTown);
        
        $idHome = null;
        if(!isset($_POST['home']) || !empty($_POST['home']))
        {
            //дом
            $idHome = $this->medDB->GetIdInsertHome($_POST['home'], $idStreet);
        }
        
        $idPhone = null;
        if(GetStrPhones() != null)
        {
            //телефон        
            $idPhone = $this->medDB->GetIdInsertPhone($this->GetStrPhones());
        }
        //типу учереждение
        $idTypeCompany = $this->medDB->GetIdInsertTypeInstitution($_POST['typeCompany']);
        //страховаые компании - тут непонятки т.к. тут чекбоксы из 1 таблицы
        $idInsuranceCompany = $this->medDB->GetIdInsertInsuranceCompany($this->GetArrayInsuranceCompany());
       
        //дни работы(определить рабочие дни)
        $arrWeekEndDay = $this->GetArrayWeekEnd();
        $arrayNameDays = $this->GetArrayNameDays();
        $idDayWork = $this->medDB->GetIdInsertDayWork($this->GetStringWorkDay($arrWeekEndDay, $arrayNameDays));
        
        //время работы(определить дни работы)
        $arrTimeWorkStart = $this->GetArrayTimeWorkStart();
        $arrTimeWorkEnd = $this->GetArrayTimeWorkEnd();
        $idTimeWork = $this->medDB->GetIdInsertTimeWork($this->GetArrayTimeWork($arrWeekEndDay, $arrayNameDays, $arrTimeWorkStart, $arrTimeWorkEnd));
        //Направления/услуги
        $idServices = $this->medDB->GetIdInsertServices($this->GetArrayServices($arrayNamesServices));
        
        $arraySaveError = array($idOrganization, $idRegion, $idTown, $idDistrictRegion, $idStreet, $idHome, $idPhone, $idTypeCompany, $idInsuranceCompany, $idDayWork, $idTimeWork, $idServices);
        if($this->SaveError($arrayParam))
        {
            echo 'Error save.';
        }
        //сохранить все в одной таблие
        $idSummaryTable = $this->medDB->GetIdInsertSummaryTable();
        return  $idSummaryTable;
    }
}
?>
