<?php

include('./faucetpay.php');
$fp = new FaucetPay('91ce316d24918191129fd331689a56ce31fbac3c');
$method = $_GET['m'];

$fp->$method(
	$_GET,
	true
);

 ?>
