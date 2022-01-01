<!-- 
	Programmer Name: 32
	This file gets all the trips without any bookings and displays it for the user
-->
<!DOCTYPE html>
<html>
<head>
	<meta charset"UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
	<title>List Trips that dont have any bookings</title>
</head>
<body>

	<?php //connect database
	include "connectdb.php";
	?>

	<h1>Listing All Bus Trips That Don't Any Bookings Yet.</h1><br>
	<?php
	//searches for trips without bookings
	$query = "SELECT trip_name FROM bus_trip WHERE trip_id NOT iN (SELECT trip_id FROM books)";
	$result = mysqli_query($connection, $query);
	if (!$result) { 
		die("database query failed.");
	}
	while ($row = mysqli_fetch_assoc($result)) { //lists the results of the search
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