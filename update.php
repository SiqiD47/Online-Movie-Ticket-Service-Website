<?php
session_start();
$gl = $_SESSION['glo_member'];                  
$pw = $_POST["password"];
$fn = $_POST["first_name"];
$ln = $_POST["last_name"];
$sn = $_POST["street_num"];
$sna = $_POST["street_name"];
$ct = $_POST["city"];
$pv = $_POST["province"];
$zip = $_POST["zip"];
$pn = $_POST["phone_number"];
$ea = $_POST["email_address"];
$ccn = $_POST["credit_card_number"];
$cced = $_POST["credit_card_expiry_date"];

$dbh = new PDO('mysql:host=localhost;dbname=Project_team11', "root", "");

$update = " UPDATE Customer SET pw = '{$pw}', first_name = '{$fn}', last_name = '{$ln}', street_num = $sn, street_name = '{$sna}', city = '{$ct}', 
province = '{$pv}', zip = '{$zip}', phone_number = '{$pn}', email_address = '{$ea}', credit_card_number = '{$ccn}', credit_card_expiry_date = '{$cced}'
WHERE account_number = '{$gl}'";
$exc = $dbh->query($update);

if ($exc==TRUE) echo "Success!";
else echo "Fail to update.";
$dbh = null;
?>