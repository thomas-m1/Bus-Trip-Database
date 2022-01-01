<!-- 
	Programmer Name: 32
	This file deletes a booking selected by the user
-->
<!DOCTYPE html>
<html>
<head>
	<meta charset"UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
	<title>delete booking</title>
</head>
<body>
	<?php //connect database
	include "connectdb.php";
	?>

    <?php
	// split the 2 foreign keys into an array and convert to string
    $string = $_POST["listBooking"]; 
    $str_arr = explode(",", $string);
    $tripID = $str_arr[0];
    $passengerID = $str_arr[1];
	$stringTripID=(string)$tripID;
	$stringpassengerID=(string)$passengerID;

    $query = "DELETE FROM books WHERE trip_id = $stringTripID AND passenger_id = $stringpassengerID";// deletes the corrisponding query
	$result = mysqli_query($connection, $query);
	if (!$result) { 
		die("database deletion failed."); 
	}
	echo "<h4>Deleted  trip id: " . $tripID . " successfully!</h4>";
	?>

	<!-- Lets the user go back to the home page -->
    <form action="index.php" method="post">
		<input type="submit" value="Go Home">
	</form>
</body>
</html>