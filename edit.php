<?php
require_once 'med-BAL.php';
require_once 'validate.php';

class EditingData
{

    private $controller;
    
    private $validateData;
    
    function __construct()
    {
        $this->controller = new Controller();
        $this->validateData = new ValidateData();
    }
    public function Update()
    {
       
        if (isset($_POST['title']) && isset($_POST['description'])) {
            
            $id = $this->validateData->FilterStringOnHtmlSql( $_POST['id']);
            $name = $this->validateData->FilterStringOnHtmlSql($_POST['name']);
            $company = $this->validateData->FilterStringOnHtmlSql( $_POST['company']);
            
            $query = "UPDATE tovars SET name='$name', company='$company' WHERE id='$id'";
            $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
            
            if ($result)
                echo "<span style='color:blue;'>Данные обновлены</span>";
        }
    }
}
?>