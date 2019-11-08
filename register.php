<?php
$an = $_POST["memberid"];                    
$pw = $_POST["password"];


if( isset($_POST['memberid']) && isset($_POST['password']) ){
	$con = mysqli_connect("localhost", "root", "");
	mysqli_select_db($con, "Project_team11");

	$check = mysqli_query($con, "Select * from Customer 
		WHERE account_number = '{$an}'");
	$result = mysqli_num_rows($check);
	if($result == 1){
		header("Location: ./regisiterfail.php");
	}
}
else{
	header("Location: ./enter.php");
}

$dbh = new PDO('mysql:host=localhost;dbname=Project_team11', "root", "");

if($an && $pw){
	$insert = "INSERT INTO Customer (account_number, pw) VALUES ('{$an}', '{$pw}')";
	$exc = $dbh->exec($insert);

	if ($exc>0) echo "Success!";
	else echo "Fail to insert.";
}
else{
	header("Location: ./enter.php");
}
$dbh = null;

?>