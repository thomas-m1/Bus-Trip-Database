<!-- 
	Programmer Name: 32
	This file adds a trip created by the user
-->
<!DOCTYPE html>
<html>
<head>
	<meta charset"UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
	<title>Add Trip</title>
</head>
<body>
	<?php //connect database
	include "connectdb.php";
	?>

	<?php
	//initialize the imputs from the user
	$tripID = "'" . $_POST["addTripID"] . "'";
	$tripName = "'" . $_POST["addTripName"] . "'";
	$startDate = "'" . $_POST["addStartDate"] . "'";
	$endDate = "'" . $_POST["addEndDate"] . "'";
    $country = "'" . $_POST["addCountry"] . "'";
	$licensePlate = "'" . $_POST["listLicensePlate"] . "'";
	$image = "'" . $_POST["addImage"] . "'";

	// check if the trip id already exists, if it exists throw error
	$checkTripID = "SELECT trip_id FROM bus_trip WHERE trip_id = $tripID";
	$resultTripID = mysqli_query($connection, $checkTripID);
	$checkrows=mysqli_num_rows($resultTripID);
	if ($checkrows>0){// if there are more than one row, means there are bookings, throw error
		echo "<h2>Cannot Add Trip Because Trip ID: " . $tripID . " Already Exists. <br>Please Try Again With A New Trip ID</h2>" ;
	}
	else{
		if ($image = "''"){ // if the user left the image blank, it adds inserts NULL
			$query = "INSERT INTO bus_trip VALUES ($tripID, $tripName, $startDate, $endDate, $country, $licensePlate, NULL)";
			$result = mysqli_query($connection, $query);
			if (!$result) { 
				die("database insertion failed.");
			}
			echo "<h2>Added Trip Successfully!</h2>";
		}
		else{ // else it will enter the image url
			$query = "INSERT INTO bus_trip VALUES ($tripID, $tripName, $startDate, $endDate, $country, $licensePlate, $image)";
			$result = mysqli_query($connection, $query);
			if (!$result) { 
				die("database insertion failed.");
			}
			echo "<h2>Added Trip Successfully!</h2>";
		}
	}
	?>

	<!-- Lets the user go back to the home page -->
	<form action="index.php" method="post">
		<input type="submit" value="Go Home">
	</form>
</body>
</html>
