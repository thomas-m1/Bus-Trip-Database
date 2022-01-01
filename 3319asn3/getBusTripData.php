<!-- 
	Programmer Name: 32
	This file gets bus trip data and displays it for the user
-->
<!DOCTYPE html>
<html>
<head>
	<meta charset"UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
	<title>List all the Bus Trip Data</title>
</head>
<body>

	<?php //connect database
	include "connectdb.php";
	?>

	<h1>Listing all the Bus Trip Data</h1>
	<table>

    <!-- create table headers -->
		<tr>
			<th>Trip ID</th>
			<th>Trip Name</th>
			<th>Start Date</th>
			<th>End Date</th>
            <th>Country Visited</th>
            <th>License Plate Number</th>
            <th>Image</th>
		<tr>

		<?php
		$SortBusTrip = $_POST["SortBusTrip"];
		$OrderBusTrip = $_POST["OrderBusTrip"];
        echo "<h4>The Bus Trip Data is currently being sorted by " . $SortBusTrip . " in " . $OrderBusTrip . " order.</h4><br>";
		$query = "SELECT * FROM bus_trip ORDER BY $SortBusTrip $OrderBusTrip";
		$result = mysqli_query($connection, $query);
		if (!$result) { 
            die("databases query failed.");
        }
		while ($row = mysqli_fetch_assoc($result)) {//puts results in a table
			echo "<tr><td>" . $row[trip_id] . "</td><td>" . $row[trip_name] . "</td><td>" . $row[start_date] . "</td><td>" . $row[end_date] . "</td><td>" . $row[country_visited] . "</td><td>" . $row[license_plate_num] . "</td><td><img src='" . $row[urlimage] . "'/></td></tr>";
		}
		mysqli_free_result($result);
		?>
	</table>

		<!-- Lets the user go back to the home page -->
	<form action="index.php" method="post">
		<input type="submit" value="Go Home">
	</form>
</body>
</html>