<?php
$t = $_POST["title"];                    
$c = $_POST["company"];
$rt = $_POST["running_time"];                    
$ra = $_POST["rating"];
$plot = $_POST["plot"];                    
$d = $_POST["director"];
$prod = $_POST["production"];                    
$start = $_POST["start"];
$end = $_POST["end"];
$first = $_POST["first"];
$last = $_POST["last"];


$dbh = new PDO('mysql:host=localhost;dbname=Project_team11', "root", "");

$insert = "INSERT INTO Movie VALUES ('{$t}','{$c}','$rt','{$ra}','{$plot}','{$d}','{$prod}','{$start}','{$end}');
INSERT INTO Movie_Main_Actor VALUES ('{$t}','{$first}','{$last}')";
$exc = $dbh->exec($insert);

if ($exc>0) echo "Success!";
else echo "Fail to insert.";
$dbh = null;

?>