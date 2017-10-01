<?php
// require_once 'med-dataBAL.php';
require_once 'med-DAL.php'; // записать переменные сюда
// $arrayNamesServices = array(
//     'dentistry' => 'Стоматологія',
//     'childrens_dentistry' => 'Дитяча стоматологія',
//     'therapeutic_dentistry' => 'Терапевтична стоматологія',
//     'aesthetic_dentistry' => 'Естетична стоматологія',
//     'orthodontics' => 'Ортодонтія',
//     'dental_othopedics' => 'Стоматологічна ортопедія (протезування)',
//     'dental_surgery' => 'Стоматологічна хірургія',
//     'dental_Implantology' => 'Стоматологічна імплантологія',
//     'periodontology' => 'Пародонтологія',
//     'dental_prophylaxis' => 'Стоматологічна профілактика',
//     'dentistry_pregnant_women' => 'Стоматологія для вагітних',
//     'tooth_whitening' => 'Відбілювання зубів',
//     'gnathology' => 'Гнатологія',
//     'dental_bone_plastics' => 'Стоматологічна кістяна пластика',
//     'dentistry_at_home' => 'Стоматологія на дому',
//     'allergy' => 'Алергіологія',
//     'alcoholism' => 'Алкоголізм',
//     'gastroenterology' => 'Гастроентерологія',
//     'childrens_consultation' => 'Дитяча консультація',
//     'ecg' => 'ЕКГ',
//     'ct' => 'КТ',
//     'mammography' => 'Мамографія',
//     'mri' => 'МРТ',
//     'oncology' => 'Онкологія',
//     'wounded' => 'Опікове',
//     'otorhinolaryngology' => 'Оториноларингологія (ЛОР)',
//     'radiology' => 'Рентгенологія',
//     'sports_medicine' => 'Спортивна медицина',
//     'surgery' => 'Сурдологія',
//     'ultrasound_diagnosis' => 'Ультразвукова діагностика',
//     'call_doctor_home' => 'Виклик лікаря додому',
//     'family_medicine' => 'Сімейна медицина',
//     'timpanometry' => 'Тімпанометрія'
// );



class Controller
{
    private $medDB;
    private $arrayNamesServices;
    private $arrayFilds;   

    public function __construct()
    {
        $this->medDB = new MedDB();
        $this->arrayNamesServices = $arrayNamesServicesBAL;
        $this->arrayFilds = $arrayFilds;
    }

    // Название(Компания) 2 колонка
    public function GetOrganizationAll()
    {
        return $this->medDB->GetOrganizationOneCol();
    }


    // Районы 3 колонки
    public function GetDistrictRegionAll()
    {
        return $this->medDB->GetDistrictRegionAllCol();
    }

    // Город 4 колонки
    public function GetLocalityAll()
    {
        return $this->medDB->GetLocalityAllCol();
    }

    // улица 3 колонки
    public function GetActualLocationAll()
    {
        return $this->medDB->GetActualLocationAllCol();
    }

    // дом 3 колонки
    public function GetHomeAll()
    {
        return $this->medDB->GetHomeAllCol();
    }

    // телефон 2 колонки
    public function GetPhoneAll()
    {
        return $this->medDB->GetPhoneOneCol();
    }

    // время работы 3 колонки
    public function GetTimeWorkAll()
    {
        return $this->medDB->GetTimeWorkAllCol();
    }

    // дни работы 3 колонки
    public function GetDayWorkOneCol()
    {
        return $this->medDB->GetDayWorkOneCol();
    }

    // сервисы 34 колонки
    public function GetServiceAll()
    {
        return $this->medDB->GetServiceAllCol();
    }
/////////////////////////////////////////////////////////////
    //получить данные организации
    public function GetOrganizationData(){
        return GetOrganizationData();
    }
    
    // Тип учереждения
    public function GetTypeInstitution()
    {
        $id = array();
        $name = array();
        foreach ($this->medDB->GetTypeInstitution() as $key => $value) {
            foreach ($value as $key => $value2) {
                array_push($id, $key);
                array_push($name, $value2);
            }
        }
        
        $summ = array();
        $summ['id'] = $id;
        $summ['name'] = $name;
        return $summ;
    }
    // сервис
    public function GetNamesServices()
    {
        return $this->medDB->GetNamesServices();
    }
    // страховая компания
    public function GetNamesInsuranceCompanes()
    {
        return $this->medDB->GetNamesInsuranceCompanes();
    }
    
    // Область
    public function GetRegion()
    {
        $arrayData = mysqli_fetch_assoc($this->medDB->GetRegion());
        $id = array();
        $name = array();
        foreach ($this->medDB->GetRegion()as $key => $value) {
            foreach ($value as $key2 => $value2) {
                array_push($id, $key2);
                array_push($name, $value2);
            }
        }
        
        $summ = array();
        $summ['id'] = $id;
        $summ['name'] = $name;
        return $summ;
    }
    ////////////////////////////////////////
    // суммарную таблицу 10 колонки
    public function GetSummaryTableAll()
    {
        return $this->medDB->GetSummaryTableAllCol();
    }

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

    // начать сохранение --- для рефакторинга разбить метод на 2 действия - GetIdInsert
    public function Save($post)
    {
        // проверить существование организации(Название)
        $idOrganization = $this->medDB->GetIdInsertOrganization($post['nameCompany']);
        // область
        $idRegion = $this->medDB->GetIdInsertGetRegion($post['region']);
        // город
        $idTown = $this->medDB->GetIdInsertGetDistrictCity($post['town'], $idRegion);
        // район области
        $idDistrictRegion = $this->medDB->GetIdInsertGetDistrictRegion($post['districtCity'], $idTown);
        // улица
        $idStreet = $this->medDB->GetIdInsertActualLocation($post['street'], $idTown);
        
        $idHome = null;
        if (! isset($post['home']) || ! empty($post['home'])) {
            // дом
            $idHome = $this->medDB->GetIdInsertHome($post['home'], $idStreet);
        }
        
        $idPhone = null;
        if (GetStrPhones() != null) {
            // телефон
            $idPhone = $this->medDB->GetIdInsertPhone($this->GetStrPhones());
        }
        // типу учереждение
        $idTypeCompany = $this->medDB->GetIdInsertTypeInstitution($post['typeCompany']);
        // страховаые компании - тут непонятки т.к. тут чекбоксы из 1 таблицы
        $idInsuranceCompany = $this->medDB->GetIdInsertInsuranceCompany($this->GetArrayInsuranceCompany());
        
        // дни работы(определить рабочие дни)
        $arrWeekEndDay = $this->GetArrayWeekEnd();
        $arrayNameDays = $this->GetArrayNameDays();
        $idDayWork = $this->medDB->GetIdInsertDayWork($this->GetStringWorkDay($arrWeekEndDay, $arrayNameDays));
        
        // время работы(определить дни работы)
        $arrTimeWorkStart = $this->GetArrayTimeWorkStart();
        $arrTimeWorkEnd = $this->GetArrayTimeWorkEnd();
        $idTimeWork = $this->medDB->GetIdInsertTimeWork($this->GetArrayTimeWork($arrWeekEndDay, $arrayNameDays, $arrTimeWorkStart, $arrTimeWorkEnd));
        // Направления/услуги
        $idServices = $this->medDB->GetIdInsertServices($this->GetArrayServices($arrayNamesServices));
        
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
        $idSummaryTable = $this->medDB->GetIdInsertSummaryTable();
        return $idSummaryTable;
    }

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
}
?>
