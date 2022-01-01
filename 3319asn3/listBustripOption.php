<!-- 
	Programmer Name: 32
	This file lists the available bus trips in a dropdown for the user
-->
<?php
// get all the bus trips available and disply it for the user to choose a trip
$query = "SELECT * FROM bus_trip";
$result = mysqli_query($connection, $query);
if (!$result) { 
	die("database query failed."); 
}
while ($row = mysqli_fetch_assoc($result)) {// lets value be the trip id
	echo "<option value='" . $row[trip_id] . "'>" . $row[trip_id] . " - " . $row[trip_name] . "</option>";
}
mysqli_free_result($result);
?>