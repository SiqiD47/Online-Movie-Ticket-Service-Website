<?php
session_start();
$st = $_POST["start_time"];                    
$mt = $_POST["movie_title"];
$rd = $_POST["res_date"];
$nt = $_POST["num_of_tickets"];
$gl = $_SESSION['glo_member'];

$dbh = new PDO('mysql:host=localhost;dbname=Project_team11', "root", "");

$maxnum = $dbh->query("SELECT A.theatre_num, A.max_num_of_seats FROM Theatre AS A, Daily_Showing AS B
WHERE A.theatre_num = B.theatre_num AND B.movie_title = '{$mt}' AND B.start_time = '$st' ");

$purchasedtickets = $dbh->query("SELECT A.movie_title, SUM(A.num_of_tickets) FROM Reserves AS A, Daily_Showing AS B WHERE A.start_time = B.start_time
AND A.movie_title = B.movie_title AND A.start_time = '$st' AND A.movie_title = '{$mt}' AND A.res_date = '$rd' 
GROUP BY B.theatre_num");

$max_num = 0;
$purtic = 0;

foreach($maxnum as $row) {
	$max_num = (int) $row[1];
}

foreach ($purchasedtickets as $roww) {
	$purtic = (int) $roww[1];
}

$avail = $max_num - $purtic;

if ($nt > $avail){
	echo "The number of tickets you would like to purchase exceeds our available tickets. Available tickets : $avail";
}
else{
	$insert = "INSERT INTO Reserves VALUES ('$st', '{$mt}', '{$gl}', '$rd', $nt)";
	$exc = $dbh->exec($insert);

	if ($exc>0) echo "Success!";
	else echo "Fail to insert.";
}

$dbh = null;
?>