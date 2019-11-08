<?php
session_start();
$st = $_POST["start_time"];                    
$mt = $_POST["movie_title"];
$rd = $_POST["res_date"];
$nt = $_POST["num_of_tickets"];
$gl = $_SESSION['glo_member'];

$dbh = new PDO('mysql:host=localhost;dbname=Project_team11', "root", "");

$delete = "DELETE FROM Reserves WHERE start_time = '$st'AND movie_title = '{$mt}'AND account_number = '{$gl} 'AND res_date = '$rd' AND num_of_tickets = $nt";
$result = $dbh->query($delete);

if ($result==TRUE) echo "Success!";
else echo "Fail to delete.";
$dbh = null;
?>