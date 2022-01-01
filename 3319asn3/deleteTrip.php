<!-- 
	Programmer Name: 32
	This file deletes a Trip selected by the user
-->
<!DOCTYPE html>
<html>
<head>
	<meta charset"UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
	<title>Delete Trip</title>
</head>
<body>

	<?php //connect database
	include "connectdb.php";
	?>

    <?php
    $deleteTrip = $_POST["listBusTrip"];
	//checks if there are any current bookings for the trip, throws error if there are.
    $checkBooking = "SELECT * FROM books WHERE trip_id= $deleteTrip";
    $checkBookingResult = mysqli_query($connection, $checkBooking);
	$checkrows=mysqli_num_rows($checkBookingResult);
	
    if ($checkrows>0){// if there are more than one row, means there are bookings, throw error
		echo "<h4>Cannot Delete Trip Because There Are Current Bookings. Please Try Again</h4>";
	} 
	else {//if no existing bookings, delete the trip
		$query = "DELETE FROM bus_trip WHERE trip_id = $deleteTrip";
		$result = mysqli_query($connection, $query);
		if (!$result) { 
			die("Failed to Delete Trip"); 
		}
		echo "<h2>Trip Deleted Successfully</h2>";
	}
	?><br>

	<!-- Lets the user go back to the home page -->
    <form action="index.php" method="post"> 
		<input type="submit" value="Go Home">
	</form>
</body>
</html>