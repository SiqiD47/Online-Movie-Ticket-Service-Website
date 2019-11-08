<?php
$t = $_POST["title"];                    
$ost = $_POST["oldstart"];
$nst = $_POST["newstart"];
$tn = $_POST["theatre_num"];                    

$dbh = new PDO('mysql:host=localhost;dbname=Project_team11', "root", "");

$update = "DELETE FROM Reserves WHERE start_time = '$ost' AND movie_title =  '{$t}';
DELETE FROM Daily_Showing WHERE start_time = '$ost' AND movie_title =  '{$t}' AND theatre_num = '$tn';
INSERT INTO Daily_Showing VALUES ('$nst', '{$t}', '$tn')";

$exc = $dbh->query($update);

if ($exc==TRUE) echo "Success!";
else echo "Fail to update.";
$dbh = null;
?>