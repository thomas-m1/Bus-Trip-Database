<!-- 
	Programmer Name: 32
	This file adds the bookings selected by the user into the database
-->
<!DOCTYPE html>
<html>
<head>
	<meta charset"UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
	<title>Add a New Trip Booking</title>
</head>
<body>
	<?php //connect database
	include "connectdb.php";
	?>

	<?php
	$passengerID = "'" . $_POST["listPassenger"] . "'";
	$tripID = "'" . $_POST["listBusTrip"] . "'";
	$price = "'" . $_POST["addPrice"] . "'";
	//inserts the booking into books
	$query = "INSERT INTO books VALUES ($tripID, $passengerID, $price)";
	$result = mysqli_query($connection, $query);
	if (!$result) { //throws error if insertion failed
		die("database insertion failed."); 
	}
	echo "<h3>Added New Booking Successfully!</h3><h4>Passenger ID: " . $passengerID . " Trip ID: " . $tripID . " Price: " . $price . "</h4>";
	?>

	<!-- Lets the user go back to the home page -->
	<form action="index.php" method="post">
		<input type="submit" value="Go Home">
	</form>
</body>
</html>
