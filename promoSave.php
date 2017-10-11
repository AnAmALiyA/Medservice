<?php 
require 'action.php';
$HandlingData = new HandlingData();

$HandlingData->SavePromoArray($_POST, $_FILES);
echo "Данные сохранены";
?>