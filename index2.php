<?php session_start();
// $auth = new Authorization();

// if ($auth->IsAuthorized()) {
//     echo "Результат авторизации: авторизирован";
//     //выпол
// }
// else {
//     echo "Результат авторизации: не авторизирован";
// }
// $_SESSION['user_id'] = 2;
// $_SESSION['user_hash'] = 123123;

// setcookie('user_id', 2, time() + 3600 * 24 * 3);
// setcookie('user_hash', 123123, time() + 3600 * 24 * 3);
?>

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
echo 'вызов index2.php<hr/>';
require_once 'authorize.php';
require_once 'action.php';
require_once 'med_BAL.php';

echo $_SESSION['user_id'].' - SESSION[user_id]<br/>';
echo $_SESSION['user_hash'].' - SESSION[user_hash]<br/>';

echo $_COOKIE['user_id'].' - COOKIE[user_id]<br/>';
echo $_COOKIE['user_hash'].' - COOKIE[user_hash]<br/>';

$auth = new Authorization();
$bal = new Controller();

if ($auth->IsAuthorized('organization')) {
    echo "<hr/>Результат авторизации: авторизирован <br/>
        Возможна дальнейшая работа на этой странице<br/>";
    //выпол
}
else {
    echo "<hr/>Результат авторизации: не авторизирован <br/>
        Редирект назад<br/>";
     $this->bal->RedirectBack();
}
?>
  <form class="" action="action.php" method="post">
    <label for="">Start</label>
    <input type="submit" name="submitName" value="Save">
  </form>
</body>
</html>
