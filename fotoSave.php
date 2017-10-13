<?php 
require_once 'action.php';

$Handler = new HandlingData();
$Handler->SavePics($_FILES);
echo "  ".$_FILES["img_"]['name'][0];
echo "DAs ist zerr gut method"
?>