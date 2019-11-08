<?php
$t = $_POST["title"];                    
$st = $_POST["start"];
$tn = $_POST["theatre_num"];                    

$dbh = new PDO('mysql:host=localhost;dbname=Project_team11', "root", "");

$update = "UPDATE Daily_Showing SET theatre_num = '$tn' WHERE movie_title = '{$t}' AND start_time = '$st'";
$exc = $dbh->query($update);

if ($exc==TRUE) echo "Success!";
else echo "Fail to update.";
$dbh = null;
?>