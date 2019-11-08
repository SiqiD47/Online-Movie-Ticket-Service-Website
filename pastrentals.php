<!DOCTYPE html>
<html>
<head>
<link href="firstPage.css" type="text/css" rel="stylesheet" >
</head>
<body>

<table>
<tr>
    <th>Start Time</th><th>Movie Title</th><th>Account Number</th><th>Reservation Date</th><th>Number of Tickets</th>
</tr>

<?php
session_start();
$gl = $_SESSION['glo_member'];

$dbh = new PDO('mysql:host=localhost;dbname=Project_team11', "root", "");
$rows = $dbh->query("SELECT * FROM Reserves WHERE account_number = '{$gl}' ");

foreach($rows as $row) {
		echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td></tr>";
    }
    $dbh = null;
?>

</table>

</body>
</html>