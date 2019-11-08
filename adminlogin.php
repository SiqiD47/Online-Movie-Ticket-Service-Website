<!DOCTYPE html>
<html>
<head>
<link href="firstPage.css" type="text/css" rel="stylesheet" />
</head>
<body>
<center>
<br><br>
<div id= "admin">
<br>
<table>
<tr>
    <th>Account Number</th><th>First Name</th><th>Last Name</th></tr>

<?php
$admin = $_POST["administratorid"];  
$pw = $_POST["password2"];                     

if( isset($_POST["administratorid"]) && isset($_POST["password2"]) ){
    $con = mysqli_connect("localhost", "root", "");
    mysqli_select_db($con, "Project_team11");

    $check = mysqli_query($con, "Select * from Admin 
        WHERE adid = '{$admin}' AND adpassword = '{$pw}'");
    $result = mysqli_num_rows($check);
    if($result == 1){
        echo "<h3>Hello Administrator</h3>";
    }
    else{
        header("Location: ./adminfail.php");
    }
}
else{
    header("Location: ./adminfail.php");
}



$dbh = new PDO('mysql:host=localhost;dbname=Project_team11', "root", "");
$rows = $dbh->query("SELECT account_number, first_name, last_name from Customer");
foreach($rows as $row) {
		echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td></tr>";
    }
    $dbh = null;

?>

</table>


<form action="deleteCustomer.php" method="post">
<h2>Delete a customer:</h2>
<p>Account Number:</p>
<input type="text" name="account_number"><br>
<br>
<input type="submit" value = "delete"></form>



<form action="addComplex.php" method="post">
<h2>Add a theatre complex:</h2>
<p>Theatre Complex Name:</p>
<input type="text" name="complex_name"><br>
<br>
<p>Number of Theatre:</p>
<input type="text" name="theatre_num"><br>
<br>
<p>Street Number:</p>
<input type="text" name="street_num"><br>
<br>
<p>Street Name:</p>
<input type="text" name="street_name"><br>
<br>
<p>City:</p>
<input type="text" name="city"><br>
<br>
<p>Province:</p>
<input type="text" name="province"><br>
<br>
<p>Zip:</p>
<input type="text" name="zip"><br>
<br>
<p>Phone Number:</p>
<input type="text" name="phone"><br>
<br>
<input type="submit" value = "add"></form>


<form action="addTheatre.php" method="post">
<h2>Add a theatre:</h2>
<p>Theatre Number:</p>
<input type="text" name="theatre_num"><br>
<br>
<p>Theatre Complex Name:</p>
<input type="text" name="complex_name"><br>
<br>
<p>Max Number of Seats:</p>
<input type="text" name="seats"><br>
<br>
<p>Screen Size:</p>
<input type="text" name="screen_size"><br>
<br>
<input type="submit" value = "add"></form>


<form action="updateComplex.php" method="post">
<h2>Update a theatre complex:</h2>
<p>Theatre Complex Name:</p>
<input type="text" name="complex_name"><br>
<br>
<p>Number of Theatre:</p>
<input type="text" name="theatre_num"><br>
<br>
<p>Street Number:</p>
<input type="text" name="street_num"><br>
<br>
<p>Street Name:</p>
<input type="text" name="street_name"><br>
<br>
<p>City:</p>
<input type="text" name="city"><br>
<br>
<p>Province:</p>
<input type="text" name="province"><br>
<br>
<p>Zip:</p>
<input type="text" name="zip"><br>
<br>
<p>Phone Number:</p>
<input type="text" name="phone"><br>
<br>
<input type="submit" value = "update"></form>


<form action="updateTheatre.php" method="post">
<h2>Update a theatre:</h2>
<p>Theatre Number:</p>
<input type="text" name="theatre_num"><br>
<br>
<p>Theatre Complex Name:</p>
<input type="text" name="complex_name"><br>
<br>
<p>Max Number of Seats:</p>
<input type="text" name="seats"><br>
<br>
<p>Screen Size:</p>
<input type="text" name="screen_size"><br>
<br>
<input type="submit" value = "update"></form>


<form action="addMovie.php" method="post">
<h2>Add a movie:</h2>
<p>Title:</p>
<input type="text" name="title"><br>
<br>
<p>Movie Supplier Company Name:</p>
<input type="text" name="company"><br>
<br>
<p>Running Time:</p>
<input type="text" name="running_time"><br>
<br>
<p>Rating:</p>
<input type="text" name="rating"><br>
<br>
<p>Plot Synopsis:</p>
<input type="text" name="plot"><br>
<br>
<p>Director:</p>
<input type="text" name="director"><br>
<br>
<p>Production Company:</p>
<input type="text" name="production"><br>
<br>
<p>Start Date:</p>
<input type="text" name="start"><br>
<br>
<p>End Date:</p>
<input type="text" name="end"><br>
<br>
<p>Main Actor's First Name:</p>
<input type="text" name="first"><br>
<br>
<p>Main Actor's Last Name::</p>
<input type="text" name="last"><br>
<br>
<input type="submit" value = "add"></form>

<form action="updatedDailyShowingTime.php" method="post">
<h2>Update start time of a daily showing:</h2>
<p>Movie Title:</p>
<input type="text" name="title"><br>
<br>
<p>Old Start Time:</p>
<input type="text" name="oldstart"><br>
<br>
<p>New Start Time:</p>
<input type="text" name="newstart"><br>
<br>
<p>Theatre Number:</p>
<input type="text" name="theatre_num"><br>
<br>
<input type="submit" value = "update"></form>

<form action="updatedDailyShowingTheatre.php" method="post">
<h2>Update theatre number of a daily showing:</h2>
<p>Movie Title:</p>
<input type="text" name="title"><br>
<br>
<p>Start Time:</p>
<input type="text" name="start"><br>
<br>
<p>Theatre Number:</p>
<input type="text" name="theatre_num"><br>
<br>
<input type="submit" value = "update"></form>


<form action="customerpastrentals.php" method="post">
<h2>Browse the customer's rentals:</h2>
<p>Type in account number:</p>
<input type="text" name="account_number">
<br><br>
<input type="submit" value = "submit"></form>

<br>

<h2>Most popular movie:</h2>
<table>
<tr>
    <th>Movie Title</th><th>Number of Tickets</th></tr>

<?php

$dbh = new PDO('mysql:host=localhost;dbname=Project_team11', "root", "");
$rows = $dbh->query("SELECT
    D.movie_title, C.cMax
FROM
    (
    SELECT
        MAX(B.sumval) AS cMAX
    FROM
        (
        SELECT
            A.movie_title,
            SUM(A.num_of_tickets) AS sumval
        FROM
            Reserves AS A
        GROUP BY
            A.movie_title
    ) AS B
) AS C
JOIN(
    SELECT A.movie_title,
        SUM(A.num_of_tickets) AS sumval
    FROM
        Reserves AS A
    GROUP BY
        A.movie_title
) AS D
ON
    D.sumval = C.cMax");

foreach($rows as $row) {
		echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td></tr>";
    }
    $dbh = null;
?>

</table>



<br>
<h2>Most popular theatre complex:</h2>
<table>
<tr>
    <th>Theatre Complex</th><th>Number of Tickets Sold</th></tr>

<?php

$dbh = new PDO('mysql:host=localhost;dbname=Project_team11', "root", "");
$rows = $dbh->query("SELECT
    Theatre.theatre_complex_name,
    D.sumtickets
FROM
    (
    SELECT
        B.theatre_num,
        B.sumtickets
    FROM
        (
            (
            SELECT
                MAX(B.sumtickets) AS sum2
            FROM
                (
                SELECT
                    Daily_Showing.theatre_num,
                    SUM(Reserves.num_of_tickets) AS sumtickets
                FROM
                    Reserves,
                    Daily_Showing
                WHERE
                    Reserves.movie_title = Daily_Showing.movie_title AND Reserves.start_time = Daily_Showing.start_time
                GROUP BY
                    Daily_Showing.theatre_num
            ) AS B
        ) AS C
        )
    JOIN(
        SELECT
            Daily_Showing.theatre_num,
            SUM(Reserves.num_of_tickets) AS sumtickets
        FROM
            Reserves,
            Daily_Showing
        WHERE
            Reserves.movie_title = Daily_Showing.movie_title AND Reserves.start_time = Daily_Showing.start_time
        GROUP BY
            Daily_Showing.theatre_num
    ) AS B
ON
    B.sumtickets = C.sum2
) AS D
JOIN Theatre ON Theatre.theatre_num = D.theatre_num");

foreach($rows as $row) {
        echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td></tr>";
    }
    $dbh = null;
?>

</table>
</div>
<br><br>
</center>

</body>
</html>