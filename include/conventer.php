<?php
require_once 'DB.php';
session_start();
$connect = DB::getConnection();

$curFrom = $_POST['curFrom'];
$curTo = $_POST['curTo'];
$value = ($_POST['value']);

$valueConventer=0;

if ($curFrom=='RUB'){

    $value_curBD = mysqli_query($connect, "SELECT  `value` FROM `exchange_rates` WHERE `currency` = '$curTo' LIMIT 1");
    foreach ($value_curBD as $valueItem){
        $valueConventer = $value / floatval($valueItem['value']);
    }

    $_SESSION['result'] = $valueConventer;
    header('Location: ../profile.php');

}
elseif ($curTo =='RUB'){
    $value_curBD = mysqli_query($connect, "SELECT  `value` FROM `exchange_rates` WHERE `currency` = '$curFrom' LIMIT 1");
    foreach ($value_curBD as $valueItem){
        $valueConventer = $value * floatval($valueItem['value']);
    }

    $_SESSION['result'] = $valueConventer;
    header('Location: ../profile.php');
}else {
    $valueFrom_curBD = mysqli_query($connect, "SELECT  `value` FROM `exchange_rates` WHERE `currency` = '$curFrom' LIMIT 1");
    $valueTO_curBD = mysqli_query($connect, "SELECT  `value` FROM `exchange_rates` WHERE `currency` = '$curTo' LIMIT 1");
    foreach ($valueFrom_curBD as $valueItem){
        $valueFrom = floatval($valueItem['value']);
    }
    foreach ($valueTO_curBD as $valueItem){
        $valueTo = floatval($valueItem['value']);
    }

    $valueConventer = fdiv($valueFrom,$valueTo) * $value;

    $_SESSION['result'] = $valueConventer;
    header('Location: ../profile.php');
}

