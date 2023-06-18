<?php

require_once  'CBRAgent.php';
require_once 'DB.php';
$connect = DB::getConnection();

$cbr = new CBRAgent();
$curName = array("USD", "AED", "EUR", "KZT", "CNY", "JPY");

if ($cbr->load()){
    foreach ($curName as $item){
        $curs = $cbr->get($item);
        mysqli_query($connect,"UPDATE `exchange_rates` 
        SET `value` = '$curs' WHERE `exchange_rates`.`currency` = '$item'");
    }
}