<?php 
require 'action.php';

echo "DAs ist zerr gut method"

echo "  ".$_FILES["img_"]['name'][0];
$Handler = new HandlingData();
$Handler->SavePics($_FILES);

$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'foto.php';
header("location: $extra");
exit;
?>