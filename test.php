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
echo "---<br>";
echo true && false; //false
echo "---<br>";
echo true || false; //true
echo "<hr/>";

// $result = mysqli_query(mysqli_connect('127.0.0.1:3306', 'root', '', 'uh347272_med24'), "SELECT * FROM med_locality");
// var_dump($result);

//   function GetCastArrayAll($obj){
//       $arr = array();
//       echo "<br><br>";
//       $result = mysqli_fetch_assoc($obj);
//       var_dump($result);
//       echo "<br><br>";
      
//       while ($result = mysqli_fetch_assoc($obj)) {
//           echo $result["id"]."----".$result["district"]."----".$result["region_fk"];          
//       }      
//   }
function GetStrNames($arrayNamesTabelRows)
{
    $strNamesTabelRows = '';
    for($i=0;$i<=count($arrayNamesTabelRows);$i++)
    {
        $strNamesTabelRows .=$arrayNamesTabelRows[i];
        if(i!=count($arrayNamesTabelRows))
        {
            $strNamesTabelRows .=',';
        }
    }
    return $strNamesTabelRows;
}

function GetStrValues($arrayValuesTabelRows)
{
    $strValuesTabelRows = '';
    for($j=0;$j<count($arrayValuesTabelRows);$j++)
    {
        $strValuesTabelRows .= $arrayValuesTabelRows[j];
        if (j!=count($arrayValuesTabelRows)) {
            $strValuesTabelRows .=',';
        }
    }
    return $strValuesTabelRows;
}

function QueryInsert()
{
    $table = 'med_organization';
    $strNamesTabelRows = "id, short_name, type_ownership_fk, name, edrpou_code";//GetStrNames($arrayNamesTabelRows);
    $strValuesTabelRows = "46, NULL, 1, 'тестовая', NULL";//GetStrValues($arrayValuesTabelRows);
    
    $query = "INSERT INTO $table($strNamesTabelRows) VALUES($strValuesTabelRows)";
    var_dump($query);
    echo "<br>------select<br>";
    foreach (mysqli_fetch_assoc(mysqli_query(mysqli_connect('127.0.0.1:3306', 'root', '', 'uh347272_med24'), "SELECT id FROM med_organization WHERE id = 45")) as $key => $value) {
        echo "<br>".$key." -- ".$value."<br>";
    }

    $query = "INSERT INTO $table($strNamesTabelRows) VALUES($strValuesTabelRows)";
    $link = mysqli_connect('127.0.0.1:3306', 'root', '', 'uh347272_med24');
    
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    
    mysqli_close($link);
    return $result;
}

// QueryInsert();

//код для тестированиея БД
var_dump(mysqli_query(mysqli_connect('127.0.0.1:3306', 'root', '', 'uh347272_med24'), "SELECT * FROM med_district_region WHERE id=12"));
echo "<hr/>";
$query = mysqli_query(mysqli_connect('127.0.0.1:3306', 'root', '', 'uh347272_med24'), "SELECT * FROM med_district_region WHERE id=12");

echo $resultAssoc.":  ";
$resultAssoc = mysqli_fetch_assoc($query);
var_dump($resultAssoc);
echo "<br>----------------<br>";

// while ($result = mysqli_fetch_assoc($query)) {
//     if ('ТОВ "МДЦ ЕКСПЕРТ-КІРОВОГРАД"' == $result['name']) {
// //         echo $result['id'];
//         echo true;
//     }
// }
// $result = mysqli_fetch_assoc($query);
// foreach ($result as $key => $value) {
//     echo $key ."=>". $value;
// }


echo $resultAssoc["id"]."<br>";
echo $resultAssoc['region_fk'];
    
    
/* вывод данных из объекта
function GetCastArrayAll($obj){
    $arr = array();
    $i=1;
    while ($result = mysqli_fetch_assoc($obj)) {
        //echo $result["id"]."----".$result["district"]."----".$result["region_fk"];
        $arrTemp = array();
        foreach ($result as $key => $value) {
            $arrTemp[$key]=$value;
        }
        $arr[$i]=$arrTemp;
        $i++;
    }
    return $arr;
}

  $dd = GetCastArrayAll($result);
    
  foreach ($dd as $key => $value) {
      echo "<br>".$key."--ключ / значение --".$value."<br>";
      foreach ($value as $key2 => $value2) {
          echo "<br>".$key2."--ключ /вложеное/ значение --".$value2."<br>";
     }
 }
  */
?>
</body>
</html>
