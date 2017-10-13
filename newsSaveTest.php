<?php


require 'action.php';
// TODO: controlling test flow

//TODO: 1 - 3 tests ---- nothing happened
$HandlingData = new HandlingData();

$HandlingData->SaveNewsArray($_POST, $_FILES);

echo"<br> path> > >  ". $_SERVER["DOCUMENT_ROOT"];

echo "<br> Данные сохранены успешно.";
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'news.php';
header("location: $extra");
exit;
// var_dump($_POST);
// echo "<br/>";
// foreach ($_POST as $key => $value) {
//    echo $key."<- Kluch / Value ->".$value."<br>" ;
   
//    foreach ($value as$key2 => $value2) {
//        echo "vvv|".$key2."<- Kluch / Value ->".$value2."<br>" ;
//    }
// }




?>

