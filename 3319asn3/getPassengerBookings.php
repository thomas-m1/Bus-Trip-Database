<!-- 
	Programmer Name: 32
	This file gets a passengers bookings and displays it for the user
-->
<!DOCTYPE html>
<html>
<head>
	<meta charset"UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
	<title>List all the Passengers trip bookings</title>
</head>
<body>
	<?php //connect database
	include "connectdb.php";
	?>

	<?php
	$listPassenger = $_POST["listPassenger"];
	//query to get the chosen passengers bookings
	echo "<h1>Listing All Bookings For the Passenger ID " . $listPassenger . ":</h1>";
	$query = "SELECT * FROM passenger 
	JOIN books ON passenger.passenger_id = books.passenger_id 
	JOIN bus_trip ON books.trip_id = bus_trip.trip_id 
	WHERE passenger.passenger_id = $listPassenger";
	
	$result = mysqli_query($connection, $query);
	if (!$result) { 
		die("database query failed.");
	}
	while ($row = mysqli_fetch_assoc($result)) {//display their bookings in a list
		echo "<h3><li>" . $row[trip_name] . "</li></h3>";
	}
	mysqli_free_result($result);
	?>


	<!-- Lets the user go back to the home page -->
	<form action="index.php" method="post">
		<input type="submit" value="Go Home">
	</form>
</body>
</html>
