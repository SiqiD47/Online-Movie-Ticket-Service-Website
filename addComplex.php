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

$insert = "INSERT INTO Theatre_Complex VALUES ('{$cn}','$tn','$sn','{$sna}','{$ct}','{$p}','{$z}');
INSERT INTO Theatre_Complex_Phone_Number VALUES ('{$cn}','{$ph}')";
$exc = $dbh->exec($insert);

if ($exc>0) echo "Success!";
else echo "Fail to insert.";
$dbh = null;

?>