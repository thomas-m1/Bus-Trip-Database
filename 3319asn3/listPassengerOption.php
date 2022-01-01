<!-- 
	Programmer Name: 32
	This file lists the passengers in a dropdown for the user to choose
-->
<?php
// get all the passengers and disply it in a dropdown for the user to choose a passenger
$query = "SELECT * FROM passenger";
$result = mysqli_query($connection, $query);
if (!$result) { 
	die("database query failed."); 
}
while ($row = mysqli_fetch_assoc($result)) { //value is the passenger id
	echo "<option value='" . $row[passenger_id] . "'>" . $row[passenger_id] . " - " . $row[first_name] . " " . $row[last_name] . "</option>";
}
mysqli_free_result($result);
?>