<?php 
require 'action.php';
$HandlingData = new HandlingData();

$HandlingData->SaveMedturismArray($_POST);
echo "Данные сохранены";
?>