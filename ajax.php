<?php
require_once 'authorize.php';

$data = array();
$auth = new Authorization();

if (empty($_POST['login'])){
    $data['login'] = $auth->IsLogin($_POST['login']);
    echo json_encode($data);
}


?>