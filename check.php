
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

$dal = new MedDB();
echo '<br/>-----------var_dump($dal->GetInsuranceCompany())-----------<br/>';
var_dump($dal->GetInsuranceCompany());
echo '<br/>';
foreach ($dal->GetInsuranceCompany() as $key => $value) {
    echo $key.' - key => value -'.$value.'<br/>';
    foreach ($value as $key => $value) {
        echo '_____________>'.$key.' - key => value -'.$value.'<br/>';
    }
}
echo '<br/>';
echo '<br/>-----------var_dump(mysqli_fetch_assoc($dal->GetInsuranceCompany()))-----------<br/>';
var_dump(mysqli_fetch_assoc($dal->GetInsuranceCompany()));
echo '<br/>';
foreach ($dal->GetInsuranceCompany() as $key => $value) {
    echo $key.' - key => value -'.$value.'<br/>';
    foreach ($value as $key => $value) {
        echo '_____________>'.$key.' - key => value -'.$value.'<br/>';
    }
}
echo '<br/>';
echo '<br/>-----------ar_dump(mysqli_fetch_array($dal->GetInsuranceCompany())-----------<br/>';
var_dump(mysqli_fetch_array($dal->GetInsuranceCompany()));
echo '<br/>';
// foreach ($dal->GetInsuranceCompany() as $key => $value) {
//     echo $key.' - key => value -'.$value.'<br/>';
//     foreach ($value as $key => $value) {
//         echo '_____________>'.$key.' - key => value -'.$value.'<br/>';
//     }
while ($result = mysqli_fetch_array($dal->GetInsuranceCompany())) {
    echo '<br/>_____________>'.$result['id'].'<br/>';
    echo '<br/>_____________>'.$result['type_description'].'<br/>';
}
?>
</body>
</html>
