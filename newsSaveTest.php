<?php
require_once 'med-BAL.php';
require_once 'validate.php';
require_once 'med-DAL.php';
// TODO: controlling test flow

//TODO: 1 - 3 tests ---- nothing happened
class HandlingNews
{

    private $controller;

    private $validateData;
    private $dal;
    
    function __construct()
    {
        $this->controller = new Controller();
        $this->validateData = new ValidateData();
        $this->dal = new MedDB();
    }

    public function SaveNewsArray()
    {
       
            
            for ($i = 0; count($_POST['title']) > $i; $i ++) {
                
                // TODO: finding id updating querry
                $find_id = $this->dal->FindExistedNews($_POST["title_$i"]);
                if (empty($find_id)) {
                    
                    $title = $this->validateData->FilterStringOnHtmlSql($_POST["title_$i"]);
                    $description = $this->validateData->FilterStringOnHtmlSql($_POST["description_$i"]);
                    $result = $this->dal->SaveNews($title, $description, $_SESSION['id']);
                    
                    if (isset($_POST["news_img_$i"])) {
                        
                        $result_pic = $this->SavePicNews($news_id = $result);
                        return true;
                        // checking and approving img
                        if ($_FILES['file']['size'] > (5 * 1024 * 1024))
                            die('Размер файла не должен превышать 5Мб');
                            $imageinfo = getimagesize($_FILES['file']['tmp_name']);
                            $arr = array(
                                'image/jpeg',
                                'image/gif',
                                'image/png'
                            );
                            if (! array_search($imageinfo['mime'], $arr))
                                echo ('Картинка должна быть формата JPG, GIF или PNG');
                                else {
                                    $id = 1;
                                    $upload_dir = 'upload/'; // имя папки с картинками
                                    $id_dir = $id . '/';
                                    $news_dir = 'news/';
                                    
                                    $name = $upload_dir . $id_dir . basename($_FILES['file']['name']);
                                    
                                    $mov = move_uploaded_file($_FILES['file']['tmp_name'], $name);
                                    
                                    if ($mov) {
                                        // здесь коннект к БД
                                        $name = htmlentities(stripslashes(strip_tags(trim($name))), ENT_QUOTES, 'UTF-8');
                                        if (! empty($news_id)){
                                            //    $result = $this->controller->SavePicsNews($id, $news_id, $name);
                                            $result = $this->dal->SavePicsNews($id, $news_id, $name);
                                        }
                                        if ($result) {
                                            return true;
                                        } else
                                            return false;
                                    }
                                }
                    }
                    }
                }
                // TODO: confirm rightness
                if (! empty($find_id)) {
                    $title = $this->validateData->FilterStringOnHtmlSql($_POST["title_$i"]);
                    $description = $this->validateData->FilterStringOnHtmlSql($_POST["description_$i"]);
                    
                    $arrayUpdatedData[] = $title ;
                    $arrayUpdatedData[] = $_SESSION['id'] ;
                    $arrayUpdatedData[] = $description ;
                    
                    $result = $this->dal->UpdateNews($find_id, $arrayUpdatedData );
                }
            }
        
        return $this->Redirect();
    }

    public function SavePicNews($news_id)
    {
       
            
           
    }


?>

