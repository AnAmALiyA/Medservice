<?php 
require 'action.php';
$HandlingData = new HandlingData();

$HandlingData->SaveSpecialArray($_POST);
echo "Данные сохранены";
?>