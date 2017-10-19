<?php
session_start();
require_once 'med-BAL.php';
require_once 'validate.php';
require_once 'authorize.php';

$auth = new Authorization();
$bal = new BAL();
$handling = new HandlingData();

class HandlingData
{

    private $arrHoliday = array(
        'none',
        'monday',
        'tuesday',
        'wednesday',
        'thursday',
        'friday',
        'saturday',
        'sunday'
    );

    private $timeWork = array(
        'Start',
        'End'
    );

    private $bal;
    private $validateData;

    function __construct()
    {        
        $this->bal = new BAL();
        $this->validateData = new ValidateData();
    }

    public function SetError($stringError = null)
    {
        // в ответ пользователю
        $_SESSION['error'] = $stringError == null ? 'Ошибка.' : $stringError;
    }

    private function IsFillField()
    {        
        // Тип учереждения
        $_POST['typeCompany'] = $this->validateData->FilterStringOnHtmlSql($_POST['typeCompany']);
        if (!$validateData->IsExist($_POST['typeCompanyId'])) {
            $this->SetError('Присутствуют пустые поля');
            $bal->RedirectBack();
        }
        // Направления/услуги
        foreach ($_POST['arrayServices'] as $key => $value) {
            $_POST['arrayServices'][$key] = $this->validateData->FilterStringOnHtmlSql($value);
            if (!$validateData->IsExist($_POST['arrayServices'][$key])) {
                $this->SetError('Присутствуют пустые поля');
                $bal->RedirectBack();
            }
        }
        // Страховые компании
        foreach ($_POST['arrayInsuranceCompanes'] as $key => $value) {
            $_POST['arrayInsuranceCompanes'][$key] = $this->validateData->FilterStringOnHtmlSql($value);
            if (!$validateData->IsExist($_POST['arrayInsuranceCompanes'][$key])) {
                $this->SetError('Присутствуют пустые поля');
                $bal->RedirectBack();
            }
        }
        // Название
        $_POST['nameCompany'] = $this->validateData->FilterStringOnHtmlSql($_POST['nameCompany']);
        if (!$validateData->IsExist($_POST['nameCompany'])) {
            $this->SetError('Присутствуют пустые поля');
            $bal->RedirectBack();
        }
        // Область
        $_POST['region'] = $this->validateData->FilterStringOnHtmlSql($_POST['region']);
        if (!$validateData->IsExist($_POST['region'])) {
            $this->SetError('Присутствуют пустые поля');
            $bal->RedirectBack();
        }
        // Город
        $_POST['town'] = $this->validateData->FilterStringOnHtmlSql($_POST['town']);
        if (!$validateData->IsExist($_POST['town'])) {
            $this->SetError('Присутствуют пустые поля');
            $bal->RedirectBack();
        }
        // Район
        $_POST['district'] = $this->validateData->FilterStringOnHtmlSql($_POST['district']);
        if (!$validateData->IsExist($_POST['district'])) {
            $this->SetError('Присутствуют пустые поля');
            $bal->RedirectBack();
        }
        // Улица
        $_POST['street'] = $this->validateData->FilterStringOnHtmlSql($_POST['street']);
        if (!$validateData->IsExist($_POST['street'])) {
            $this->SetError('Присутствуют пустые поля');
            $bal->RedirectBack();
        }
    }

    private function IsValidFild()
    {
        // Тип учереждения
        if (!$validateData->ValidInteger($_POST['typeCompanyId'])) {
                $this->SetError('Не валидное поле.');
                $bal->RedirectBack();
            }
        // Направления/услуги - чекбоксы (ожидаю в поле только числа) тут прийдет ассоциативный array(1,2,3)
        foreach ($_POST['arrayServices'] as $key => $value){
            if (!$validateData->ValidInteger($_POST['arrayServices'][$key])) {
                $this->SetError('Не валидное поле.');
                $bal->RedirectBack();
            }
        }
        // Страховые компании - чекбоксы //тут прийдет array(1,2,3)
        $arrayInsuranceCompanesId = $_POST['arrayInsuranceCompanes'];
        for ($i = 0; $i < count($arrayInsuranceCompanesId); $i++){
            if (!$validateData->ValidInteger($arrayInsuranceCompanesId[$i])) {
                $this->SetError('Не валидное поле.');
                $bal->RedirectBack();
            }
        }
        // Название
        if (!$this->validateData->ValidIntegerString($_POST['nameCompany'])) {
            $this->SetError('Не валидное поле.');
            $bal->RedirectBack();
        }
        //область
        if (!$this->validateData->ValidString($_POST['region'])) {
            $this->SetError('Не валидное поле.');
            $bal->RedirectBack();
        }
        //город
        if (!$this->validateData->ValidString($_POST['town'])) {
            $this->SetError('Не валидное поле.');
            $bal->RedirectBack();
        }
        //район области
        if (! $this->validateData->ValidString($_POST['district'])) {
            $this->SetError('Не валидное поле.');
            $bal->RedirectBack();
        }
        //улица
        if (! $this->validateData->ValidIntegerString($_POST['street'])) {
            $this->SetError('Не валидное поле.');
            $bal->RedirectBack();
        }
        // необязательные параметры
        //дом
        if ($validateData->IsExist($_POST['home'])) {
            $_POST['home'] = $this->validateData->FilterStringOnHtmlSql($_POST['home']);
            if (!$this->validateData->ValidIntegerString($_POST['home'])) {
                $this->SetError('Не валидное поле.');
                $bal->RedirectBack();
            }
        }
        //телефоны
        if ($this->validateData->IsExist($_POST['arrayPhones'])) {
            foreach ($_POST['arrayPhones'] as $key => $value) {
                if (!$this->validateData->IsExist($value) && !$this->validateData->ValidInteger($value)) {
                    $this->SetError('Не валидное поле.');
                    $bal->RedirectBack();
                }
            }
        }
        //время работы // выходной
        if ($validateData->IsExist($_POST['arrayDayTimeWork'])) {
            $arrayDayTimeWork = $_POST['arrayDayTimeWork'];
            
            foreach ($arrayDayTimeWork['dayWork'] as $key => $value) {
                if($validateData->IsExist($value) && !$value){ //если существует и на false(рабочий день)
                    if(!$validateData->ValidInteger($arrayDayTimeWork['startWork']) ||
                        !$validateData->ValidInteger($arrayDayTimeWork['endWork'])){
                            $this->SetError('Не валидное поле.');
                            $bal->RedirectBack();
                    }
                }
            }
        }
    }

    public function SaveDataForm()
    {
        $this->IsFillField();
        $this->IsValidFild();
        $this->IsExistId();
        
        if ($_POST['state'] == 'Save') {
            $this->bal->Save($_POST);
        }
        else {
            $this->bal->Update($_POST);
        }
    }
// }


// if ($auth->IsAuthorized('organization')) {
//     //методы для организации
//     if (isset($_POST['save_form_main']) && empty($_POST['save_form_main'])) {
//         $handling->SaveDataForm();
//         $bal->RedirectBack();
//     }
// }
// elseif ($auth->IsAuthorized('client')) {
// //     методы для клиентов
// }
// elseif($_POST['submit'] == 'Авторизация') {    
//     if ($auth->IsLogin($_POST['login'])) {        
//         $handling->SetError('login', 'notUL');
//         $bal->RedirectBack();
//     }//тут понадобиться отслеживать организацию
//     $handling->SetError('login', 'unset');
//     $success = $auth->SaveUser($login, $password, $user_category);
//     if ($success < 0) {       
//         $handling->SetError('notSafe', 'notUL');
//         $bal->RedirectBack();
//     }
//     $handling->SetError('notSafe', 'unset');
// }
// else {
//     $bal->RedirectBack();
// }
//////////////////////////////Сергей///////////////////////////
public function SaveNewsArray($data, $pictures)
{
    //  if ($this->IsAuthorized($_SESSION['id'], $_SESSION['hash'])) {
    $_SESSION['id'];
    $id_user = 1;//TODO: must be in SESSION
    $p =  20;
    for ($i = 0; count($data['name']) > $i; $i ++) {
        echo $data['name'][$i]."<br>";  //TODO: unwrite text
        echo   $data['id_news'][$i] ;
        
        $date_show = false;
        $date_news = null;
        //if hidden id of DB entry is found
        if(isset($data['id_news'][$i])){
            if(isset($data["check"][$i])) $date_show = true;
            echo  "is date showing".$date_show."<br>";
            
            if($date_show){
                $date_news  = date('Y-m-d');}
                
                $title = $this->validateData->FilterStringOnHtmlSql($data['name'][$i]);
                $description = $this->validateData->FilterStringOnHtmlSql($data['comment'][$i]);
                $result = $this->bal->UpdateNews($title, $id_user, $description, $data['id_news'][$i] , $date_show , $date_news );
                $news_id = $result;
                
                if (!empty($pictures["news_img_"]["name"][$i])) {
                    //   echo "<br> catcha ";echo  $data["news_img_"][$i];
                    $pic_id = $this->bal->FindPicNews($news_id);
                    echo $pic_id." pic id from find picnews ";
                    if(!empty($pic_id) )
                    {
                        $result_pic_upd = $this->UpdatePicNews($news_id ,$i,$pictures,$pic_id);
                    }
                    else{
                        $result_pic = $this->SavePicNews($news_id ,$i,$pictures);
                    }
                    return true;
                }
                
        }
        
        //new entry into DB
        else {
            
            if(isset($data["check"][$p])) $date_show = true;
            
            if($date_show){
                $date_news  = date('Y-m-d');
            }
            
            $title = $this->validateData->FilterStringOnHtmlSql($data['name'][$i]);
            $description = $this->validateData->FilterStringOnHtmlSql($data['comment'][$i]);
            $result = $this->bal->SaveNews($title, $id_user,$description , $date_show , $date_news );
            
            
            if (!empty($pictures["news_img_"]["name"][$i])) {
                
                $news_id = $result;
                $result_pic = $this->SavePicNews($news_id,$i,$pictures);
                return true;
            }
            $p++;
        }
    }
    // }
    //for times when user isn`t authorized
    // return $this->Redirect();
}

public function SavePromoArray($data, $pictures)
{
    
    //  if ($this->IsAuthorized($_SESSION['id'], $_SESSION['hash'])) {
    $_SESSION['id'];
    $id_user = 1;//TODO: must be in SESSION
    $p =  20;
    for ($i = 0; count($data['name']) > $i; $i ++) {
        
        
        $date_show = false;
        $date_promo = null;
        //if hidden id of DB entry is found
        if(isset($data['id_promo'][$i])){
            if(isset($data["check"][$i])) $date_show = true;
            
            
            if($date_show){
                $date_promo  = date('Y-m-d');}
                echo $date_promo;
                $title = $this->validateData->FilterStringOnHtmlSql($data['name'][$i]);
                $description = $this->validateData->FilterStringOnHtmlSql($data['comment'][$i]);
                $result = $this->bal->UpdatePromo($title, $id_user, $description, $data['id_promo'][$i] , $date_show , $date_promo );
                $promo_id = $result;
                echo "<br>descript content ".$description;
                echo"<br>  $promo_id pronmo id";
                if (!empty($pictures["promo_img_"]["name"][$i])) {
                    $pic_id = $this->bal->FindPicPromo($promo_id);
                    echo $pic_id." pic id from find picpromo ";
                    if(!empty($pic_id) )
                    {
                        $result_pic_upd = $this->UpdatePicPromo($promo_id ,$i,$pictures,$pic_id);
                    }
                    else{
                        $result_pic = $this->SavePicPromo($promo_id ,$i,$pictures);
                    }
                    return true;
                }
        }
        //new entry into DB
        else {
            if(isset($data["check"][0])) $date_show = true;
            if(isset($data["check"][$p])) $date_show = true;
            
            if($date_show){
                $date_promo  = date('Y-m-d');
            }
            echo $date_promo;
            $title = $this->validateData->FilterStringOnHtmlSql($data['name'][$i]);
            $description = $this->validateData->FilterStringOnHtmlSql($data['comment'][$i]);
            $result = $this->bal->SavePromo($title, $id_user,$description , $date_show , $date_promo );
            
            
            if (!empty($pictures["promo_img_"]["name"][$i])) {
                
                $promo_id = $result;
                $result_pic = $this->SavePicPromo($promo_id,$i,$pictures);
                return true;
            }
            $p++;
        }
    }
    // }
    //for times when user isn`t authorized
    // return $this->Redirect();
}


public function SaveSpecialArray($data)
{
    // if ($this->IsAuthorized($_SESSION['id'], $_SESSION['hash'])) {
    // $_SESSION['id']
    $user_id = 1;
    
    for ($i = 0; count($data['name']) > $i; $i ++) {
        echo  $data['name'][$i];
        if(isset($data['id_special'][$i])){
            $title = $this->validateData->FilterStringOnHtmlSql($data['name'][$i]);
            $description = $this->validateData->FilterStringOnHtmlSql($data['comment'][$i]);
            $result = $this->bal->UpdateSpecial($title, $description, $user_id, $data['id_special'][$i]);
            echo $title;
            
        }
        
        else{
            $title = $this->validateData->FilterStringOnHtmlSql($data['name'][$i]);
            $description = $this->validateData->FilterStringOnHtmlSql($data['comment'][$i]);
            $result = $this->bal->SaveSpecial($title, $description, $user_id);
        }
        // }
        //  return $this->Redirect();
    }
}
public function SaveMedturismArray($data)
{
    // if ($this->IsAuthorized($_SESSION['id'], $_SESSION['hash'])) {
    // $_SESSION['id']
    $user_id = 1;
    
    for ($i = 0; count($data['name']) > $i; $i ++) {
        if(isset($data['id_medturism'][$i])){
            $title = $this->validateData->FilterStringOnHtmlSql($data['name'][$i]);
            $description = $this->validateData->FilterStringOnHtmlSql($data['comment'][$i]);
            $result = $this->bal->UpdateMedturism($title, $description, $user_id, $data['id_medturism'][$i]);
            
            
        }
        
        else{
            echo "catcha<br>";
            $title = $this->validateData->FilterStringOnHtmlSql($data['name'][$i]);
            $description = $this->validateData->FilterStringOnHtmlSql($data['comment'][$i]);
            $result = $this->bal->SaveMedturism($title, $description, $user_id);
        }
        
    }
    // }
    //  return $this->Redirect();
}

public function SavePicNews($news_id, $i, $pictures)
{
    //TODO: must be activated at the finish
    // if ($this->IsAuthorized($_SESSION['id'], $_SESSION['hash'])) {
    
    // checking and approving img
    echo ($pictures["news_img_"]['name'][$i]);
    if ($pictures["news_img_"]['size'][$i] > (5 * 1024 * 1024))
        die('Размер файла не должен превышать 5Мб');
        $imageinfo = getimagesize($pictures["news_img_"]['tmp_name'][$i]);
        //
        // $id = $_SESSION['id'];
        //TODO: temporary unvailable
        $id = 1;
        $upload_dir = '/upload/'; // имя папки с картинками
        $id_dir = $id . '/';
        $news_dir = 'news/';
        
        
        $name = $upload_dir . $id_dir .$news_dir;
        if (file_exists($name)) {
            echo "Uploading...Saving news";
            $mov = move_uploaded_file($pictures["news_img_"]['tmp_name'][$i], $_SERVER["DOCUMENT_ROOT"].$name.basename($pictures["news_img_"]['name'][$i]));
        } else {
            mkdir($name, 0755, true);
            $mov = move_uploaded_file($pictures["news_img_"]['tmp_name'][$i], $_SERVER["DOCUMENT_ROOT"].$name.basename($pictures["news_img_"]['name'][$i]));
        }
        
        
        if ($mov) {
            // здесь коннект к БД
            $name = htmlentities(stripslashes(strip_tags(trim($name))), ENT_QUOTES, 'UTF-8');
            $name .=basename($pictures["news_img_"]['name'][$i]);
            if (! empty($news_id))
                $result = $this->bal->SavePicsNews($id, $news_id, $name);
                
                if ($result) {
                    return true;
                } else
                    return false;
        }
}

// }

public function SavePicPromo($promo_id ,$i, $pictures)
{
    //TODO: must be activated at the finish
    //  if ($this->IsAuthorized($_SESSION['id'], $_SESSION['hash'])) {
    
    // checking and approving img
    echo ($pictures["promo_img_"]['name'][$i]);
    if ($pictures["promo_img_"]['size'][$i] > (5 * 1024 * 1024))
        die('Размер файла не должен превышать 5Мб');
        $imageinfo = getimagesize($pictures["promo_img_"]['tmp_name'][$i]);
        //
        //  $id = $_SESSION['id'];
        //TODO: temporary unvailable
        $id = 1;
        $upload_dir = '/upload/'; // имя папки с картинками
        $id_dir = $id . '/';
        $promo_dir = 'promo/';
        
        
        $name = $upload_dir . $id_dir .$promo_dir;
        if (file_exists($name)) {
            echo "Uploading...Saving promo";
            $mov = move_uploaded_file($pictures["promo_img_"]['tmp_name'][$i], $_SERVER["DOCUMENT_ROOT"].$name.basename($pictures["promo_img_"]['name'][$i]));
        } else {
            mkdir($name, 0755, true);
            $mov = move_uploaded_file($pictures["promo_img_"]['tmp_name'][$i], $_SERVER["DOCUMENT_ROOT"].$name.basename($pictures["promo_img_"]['name'][$i]));
        }
        
        
        if ($mov) {
            // здесь коннект к БД
            $name = htmlentities(stripslashes(strip_tags(trim($name))), ENT_QUOTES, 'UTF-8');
            $name .=basename($pictures["promo_img_"]['name'][$i]);
            if (! empty($promo_id))
                $result = $this->bal->SavePicsPromo($id, $promo_id, $name);
                
                if ($result) {
                    return true;
                } else
                    return false;
        }
}
// }
public function UpdatePicNews($news_id ,$i, $pictures,$pic_id)
{
    //TODO: must be activated at the finish
    //  if ($this->IsAuthorized($_SESSION['id'], $_SESSION['hash'])) {
    
    // checking and approving img
    echo ($pictures["news_img_"]['name'][$i]);
    if ($pictures["news_img_"]['size'][$i] > (5 * 1024 * 1024))
        die('Размер файла не должен превышать 5Мб');
        $imageinfo = getimagesize($pictures["news_img_"]['tmp_name'][$i]);
        //
        //  $id_user = $_SESSION['id'];
        //TODO: temporary unvailable
        $id_user = 1;
        $upload_dir = '/upload/'; // имя папки с картинками
        $id_user_dir = $id_user . '/';
        $news_dir = 'news/';
        
        
        $name = $upload_dir . $id_user_dir .$news_dir;
        if (file_exists($name)) {
            echo "Uploading... Updating news";
            $mov = move_uploaded_file($pictures["news_img_"]['tmp_name'][$i], $_SERVER["DOCUMENT_ROOT"].$name.basename($pictures["news_img_"]['name'][$i])  );
        } else {
            mkdir($name, 0755, true);
            $mov = move_uploaded_file($pictures["news_img_"]['tmp_name'][$i], $_SERVER["DOCUMENT_ROOT"].$name .basename($pictures["news_img_"]['name'][$i])  );
        }
        
        
        if ($mov) {
            // здесь коннект к БД
            $name = htmlentities(stripslashes(strip_tags(trim($name))), ENT_QUOTES, 'UTF-8');
            $name .=basename($pictures["news_img_"]['name'][$i]);
            if (! empty($news_id))
                $result = $this->bal->UpdatePicNews($id_user, $news_id, $name, $pic_id);
                
                if ($result) {
                    return true;
                } else
                    return false;
        }
}
public function UpdatePicPromo($promo_id ,$i, $pictures,$pic_id)
{
    //TODO: must be activated at the finish
    //  if ($this->IsAuthorized($_SESSION['id'], $_SESSION['hash'])) {
    
    // checking and approving img
    echo ($pictures["promo_img_"]['name'][$i]);
    if ($pictures["promo_img_"]['size'][$i] > (5 * 1024 * 1024))
        die('Размер файла не должен превышать 5Мб');
        $imageinfo = getimagesize($pictures["promo_img_"]['tmp_name'][$i]);
        //
        //  $id_user = $_SESSION['id'];
        //TODO: temporary unvailable
        $id_user = 1;
        $upload_dir = '/upload/'; // имя папки с картинками
        $id_user_dir = $id_user . '/';
        $promo_dir = 'promo/';
        
        
        $name = $upload_dir . $id_user_dir .$promo_dir;
        if (file_exists($name)) {
            echo "Uploading... Updating promo";
            $mov = move_uploaded_file($pictures["promo_img_"]['tmp_name'][$i], $_SERVER["DOCUMENT_ROOT"].$name.basename($pictures["promo_img_"]['name'][$i])  );
        } else {
            mkdir($name, 0700, true);
            $mov = move_uploaded_file($pictures["promo_img_"]['tmp_name'][$i], $_SERVER["DOCUMENT_ROOT"].$name .basename($pictures["promo_img_"]['name'][$i])  );
        }
        
        
        if ($mov) {
            // здесь коннект к БД
            $name = htmlentities(stripslashes(strip_tags(trim($name))), ENT_QUOTES, 'UTF-8');
            $name .=basename($pictures["promo_img_"]['name'][$i]);
            if (! empty($promo_id))
                $result = $this->bal->UpdatePicPromo($id_user, $promo_id, $name, $pic_id);
                
                if ($result) {
                    return true;
                } else
                    return false;
        }
}
// }
private function SavePics($pictures)
{
    //TODO: must be activated at the finish
    //  if ($this->IsAuthorized($_SESSION['id'], $_SESSION['hash'])) {
    
    // checking and approving img
    echo ($pictures["promo_img_"]['name'][$i]);
    if ($pictures["promo_img_"]['size'][$i] > (5 * 1024 * 1024))
        die('Размер файла не должен превышать 5Мб');
        $imageinfo = getimagesize($pictures["promo_img_"]['tmp_name'][$i]);
        //
        $id = $_SESSION['id'];
        //TODO: temporary unvailable
        $id = 1;
        $upload_dir = '/upload/'; // имя папки с картинками
        $id_dir = $id . '/';
        $promo_dir = 'other/';
        
        
        $name = $_SERVER["DOCUMENT_ROOT"].$upload_dir . $id_dir .$promo_dir;
        if (file_exists($name)) {
            echo "Uploading...";
            $mov = move_uploaded_file($pictures["promo_img_"]['tmp_name'][$i], $_SERVER["DOCUMENT_ROOT"].$name. basename($pictures["promo_img_"]['name'][$i]));
        } else {
            mkdir($name, 0700, true);
            $mov = move_uploaded_file($pictures["promo_img_"]['tmp_name'][$i], $_SERVER["DOCUMENT_ROOT"].$name. basename($pictures["promo_img_"]['name'][$i]));
        }
        
        
        if ($mov) {
            // здесь коннект к БД
            $name = htmlentities(stripslashes(strip_tags(trim($name))), ENT_QUOTES, 'UTF-8');
            if (! empty($promo_id))
                $result = $this->bal->SavePicsPromo($id, $promo_id, $name);
                
                if ($result) {
                    return true;
                } else
                    return false;
        }
        //} for authorize check
}
}
////////////////////////////Сергей/////////////////////

if ($auth->IsAuthorized('organization')) {
    //методы для организации
    if (isset($_POST['save_form_main']) && empty($_POST['save_form_main'])) {
        $handling->SaveDataForm();
        $bal->RedirectBack();
    }
}
elseif ($auth->IsAuthorized('client')) {
//     методы для клиентов
}
elseif($_POST['submit'] == 'Авторизация') {
    if ($auth->IsLogin($_POST['login'])) {
        $handling->SetError('login', 'notUL');
        $bal->RedirectBack();
    }//тут понадобиться отслеживать организацию
    $handling->SetError('login', 'unset');
    $success = $auth->SaveUser($login, $password, $user_category);
    if ($success < 0) {
        $handling->SetError('notSafe', 'notUL');
        $bal->RedirectBack();
    }
    $handling->SetError('notSafe', 'unset');
}
else {
    $bal->RedirectBack();
}
?>
