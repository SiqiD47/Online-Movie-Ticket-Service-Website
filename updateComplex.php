<?php
$cn = $_POST["complex_name"];                    
$tn = $_POST["theatre_num"];
$sn = $_POST["street_num"];                    
$sna = $_POST["street_name"];
$ct = $_POST["city"];                    
$p = $_POST["province"];
$z = $_POST["zip"];                    
$ph = $_POST["phone"];

$dbh = new PDO('mysql:host=localhost;dbname=Project_team11', "root", "");

$update = "UPDATE Theatre_Complex SET number_of_theatres = '$tn', street_num = '$sn', street_name = '{$sna}', city = '{$ct}', province= '{$p}', zip = '{$z}' WHERE name = '{$cn}';
UPDATE Theatre_Complex_Phone_Number SET phone_number = '{$ph}' WHERE name = '{$cn}'";
$exc = $dbh->query($update);

if ($exc==TRUE) echo "Success!";
else echo "Fail to update.";
$dbh = null;
?>