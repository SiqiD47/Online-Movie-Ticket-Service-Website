<?php
session_start();                    
$mt = $_POST["movie_title"];
$rv = $_POST["review"];
$gl = $_SESSION['glo_member'];

$dbh = new PDO('mysql:host=localhost;dbname=Project_team11', "root", "");

$insert = "INSERT INTO Wrote VALUES ('{$mt}', '{$gl}', '{$rv}')";
$exc = $dbh->exec($insert);

if ($exc>0) echo "Success! Your review for $mt is {$rv}.";
else echo "Fail to insert.";

$dbh = null;

?>