


<?php


require 'action.php';
// TODO: controlling test flow

//TODO: 1 - 3 tests ---- nothing happened
$HandlingData = new HandlingData();


echo ($_POST['name']);

foreach ($_POST as $value){
    echo $value['name0'];
    echo ' '; 
    
   // $HandlingData->SaveNewsArray($value);
    
   foreach ($value as $val){
       
      
       echo $val;
       
       foreach ($val as $v){
           
           echo $v;
       }
   }
   
}


?>

