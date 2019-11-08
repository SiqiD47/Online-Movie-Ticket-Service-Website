<?php
$an = $_POST["account_number"];


$dbh = new PDO('mysql:host=localhost;dbname=Project_team11', "root", "");

$delete = "DELETE FROM Reserves WHERE account_number = '{$an}';
DELETE FROM Wrote WHERE account_number = '{$an}';
DELETE FROM Customer WHERE account_number = '{$an}'";
$result = $dbh->query($delete);

if ($result==TRUE) echo "Success!";
else echo "Fail to delete.";
$dbh = null;
?>