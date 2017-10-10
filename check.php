
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
<?php

require_once 'med-DAL.php';
require_once 'med-BAL.php';

 $dal = new DAL();
//  $dal = new BAL();

 $m = $dal->InsertDay(array(1,3,1,3,1,3,3));
//  echo "[$m]-результатt<br/>";
  var_dump($m);
// echo '<br/>-----------foreach ----------------<br/>';
// echo '<br/>';
// foreach ($m as $key => $value) {
//     echo $key.' - key => value -'.$value.'<br/>';
    
// echo '<br/>';
// echo '<br/>-----------foreach ----mysqli_fetch_assoc()-----------<br/>';
// var_dump(mysqli_fetch_assoc($dal->GetTypeInstitutionById(1)));
// echo '<br/>';
// $id = array();
// $name = array();
// foreach ($m as $key => $value) {
//     echo $key.' - key => value -'.$value.'<br/>';
//     foreach ($value as $key2 => $value2) {
//         echo '_____________'.$key2.' - key2 => value2 -'.$value2.'<br/>';
//     }
// }
// echo '<br/>-----<br/>';
// var_dump($id);
// echo '<br/>-----<br/>';
// var_dump($name);


// for ($i = 0; $i < count($arrayData); $i++) {
//     echo '<br/>'.count($arrayData);
//     for ($j = 0; $j < count($arrayData[$i]); $j++) {
//         echo '<br/>'.count($arrayData[$i]);
// //         echo $arrayData[$i].[$j].['id'].' - key => value -'.$arrayData[$i].[$j].['region'].'<br/>';
// //         $tempArray[$arrayData[$i].[$j]['id']] = $arrayData[$i].[$j]['region'];
//     }    
// }
// echo '<br/>';
// echo '<br/>----------------------<br/>';
// var_dump($tempArray);
// echo '<br/>';
// echo '<br/>----------------------<br/>';
// foreach ($tempArray as $key => $value) {
//     echo $key.' - key => value -'.$value.'<br/>';
// }

// echo '<br/>';
// echo '<br/>-----------while ---(mysqli_fetch_array($dal->GetRegion())-----------<br/>';
// var_dump(mysqli_fetch_assoc($dal->GetRegion()));
// echo '<br/>';
// // foreach ($dal->GetInsuranceCompany() as $key => $value) {
// //     echo $key.' - key => value -'.$value.'<br/>';
// //     foreach ($value as $key => $value) {
// //         echo '_____________>'.$key.' - key => value -'.$value.'<br/>';
// //     }
// while ($result = mysqli_fetch_assoc($dal->GetPhones(4))) {
//     echo '<br/>_____________'.$result['id'].'_____________'.$result['region'].'<br/>';
// }

// echo '<br/>';
// echo '<br/>-----------while ---(mysqli_fetch_array($dal->GetRegion())-----------<br/>';
// var_dump(mysqli_fetch_array($dal->GetRegion()));
// echo '<br/>';
// // foreach ($dal->GetInsuranceCompany() as $key => $value) {
// //     echo $key.' - key => value -'.$value.'<br/>';
// //     foreach ($value as $key => $value) {
// //         echo '_____________>'.$key.' - key => value -'.$value.'<br/>';
// //     }
// while ($result = mysqli_fetch_array($dal->GetRegion())) {
//     echo '<br/>_____________'.$result['id'].'<br/>';
//     echo '<br/>_____________'.$result['region'].'<br/>';
// }
?>
</body>
</html>
