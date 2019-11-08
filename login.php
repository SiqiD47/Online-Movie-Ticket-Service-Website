<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
<link href="firstPage.css" type="text/css" rel="stylesheet" >
</head>
<body>
<center>
<br><br>
<div id="login">
<br>
<table>
<tr>
    <th>Movie Title</th><th>Threatre Number</th><th>Threatre Complex</th><th>Start Date</th><th>End Date</th><th>Start Time</th>
</tr>

<?php
$mb = $_POST["memberid"];                      
$mpw = $_POST["password"];

$_SESSION['glo_member'] = $mb;

if( isset($_POST["memberid"]) && isset($_POST["password"]) ){
	$con = mysqli_connect("localhost", "root", "");
	mysqli_select_db($con, "Project_team11");

	$check = mysqli_query($con, "Select * from Customer 
		WHERE account_number = '{$mb}' AND pw = '{$mpw}'");
	$result = mysqli_num_rows($check);
	if($result == 1){
		echo "<h3>Hello User $mb</h3>";
	}
	else{
		header("Location: ./fail.php");
	}
}
else{
	header("Location: ./enter.php");
}

$dbh = new PDO('mysql:host=localhost;dbname=Project_team11', "root", "");

$rows = $dbh->query("SELECT B.movie_title, B.theatre_num, C.theatre_complex_name, A.start_date, A.end_date, B.start_time
from Movie AS A, Daily_Showing AS B, Theatre AS C
WHERE A.title = B.movie_title AND A.start_date <= '2018-03-23' AND B.theatre_num = C.theatre_num
ORDER BY B.movie_title ");

foreach($rows as $row) {
		echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td></tr>";
    }
    $dbh = null;

?>

</table>
<br>

<br>
<form action="purchasetickets.php" method="post">
<h2>Purchase your tickets:</h2>
<p>Start Time:</p>
<input type="text" name="start_time">
<br>
<p>Movie Title:</p>
<input type="text" name="movie_title"><br>
<br>
<p>Reservation Date:</p>
<input type="text" name="res_date"><br>
<p>Number of Tickets:</p>
<input type="text" name="num_of_tickets"><br>
<br>
<input type="submit" value = "purchase"></form>
<br>

<form action="cancelpurchase.php" method="post">
<h2>Cancel your purchase:</h2>
<p>Start Time:</p>
<input type="text" name="start_time">
<br>
<p>Movie Title:</p>
<input type="text" name="movie_title"><br>
<br>
<p>Reservation Date:</p>
<input type="text" name="res_date"><br>
<p>Number of Tickets:</p>
<input type="text" name="num_of_tickets"><br>
<br>
<input type="submit" value = "cancel purchase"></form>
<br>

<form action="pastrentals.php" method="post">
<h2>Browse your past rentals / View your purchases:</h2>
<input type="submit" value = "browse"></form>
<br>

<form action="review.php" method="post">
<h2>Write your review:</h2>
<p>Movie title:</p>
<input type="text" name="movie_title">
<br>
<p>Type in your review for this movie:</p>
<input type="text" name="review">
<br><br>
<input type="submit" value = "submit"></form>
<br>

<form action="update.php" method="post">
<h2>Update your personal information:</h2>
<p>Password:</p>
<input type="text" name="password">
<br>
<p>First Name:</p>
<input type="text" name="first_name">
<br>
<p>Last Name:</p>
<input type="text" name="last_name">
<br>
<p>Street Number:</p>
<input type="text" name="street_num">
<br>
<p>Street Name:</p>
<input type="text" name="street_name">
<br>
<p>City</p>
<input type="text" name="city">
<br>
<p>Province:</p>
<input type="text" name="province">
<br>
<p>Zip:</p>
<input type="text" name="zip">
<br>
<p>Phone Number:</p>
<input type="text" name="phone_number">
<br>
<p>Email Address:</p>
<input type="text" name="email_address">
<br>
<p>Credit Card Number:</p>
<input type="text" name="credit_card_number">
<br>
<p>Credit Card Expiry Date:</p>
<input type="text" name="credit_card_expiry_date">
<br><br>
<input type="submit" value = "submit"></form>
</div>
<br><br>
</center>
 </body>
</html>



