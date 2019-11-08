<?php
$tn = $_POST["theatre_num"];                    
$cn = $_POST["complex_name"];
$s = $_POST["seats"];                    
$ss = $_POST["screen_size"];


$dbh = new PDO('mysql:host=localhost;dbname=Project_team11', "root", "");

$insert = "INSERT INTO Theatre VALUES ('$tn','{$cn}','$s','{$ss}')";
$exc = $dbh->exec($insert);

if ($exc>0) echo "Success!";
else echo "Fail to insert.";
$dbh = null;

?>