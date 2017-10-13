<?php 
require 'action.php';
$HandlingData = new HandlingData();

$HandlingData->SavePromoArray($_POST, $_FILES);
echo"<br> path> > >  ". $_SERVER["DOCUMENT_ROOT"];
echo "Данные сохранены";
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'promo.php';
header("location: $extra");

?>