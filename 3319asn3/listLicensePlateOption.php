<!-- 
	Programmer Name: 32
	This file lists the license plates in the db in a dropdown for the user
-->
<?php
// get all the license plates and disply it in a dropdown for the user to choose a plate
$query = "SELECT * FROM bus";
$result = mysqli_query($connection, $query);
if (!$result) { 
	die("database query failed."); 
}
while ($row = mysqli_fetch_assoc($result)) { //value will be the license plate number
	echo "<option value='" . $row[license_plate_num] . "'>" . $row[license_plate_num] . "</option>";
}
mysqli_free_result($result);
?>
