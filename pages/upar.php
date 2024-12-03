<?php

session_start();

include '../dashboard/dashboard/functions_1.php';
include '../funcoes/db.php';

$userID = $_GET['user'];
$cardID = $_GET['card'];
$valor = $_GET['value'];

upgradeCardWithPower($userID, $cardID, $valor);

?>