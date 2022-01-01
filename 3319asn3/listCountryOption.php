<!-- 
	Programmer Name: 32
	This file lists the countries that the trips visit in a dropdown for the user
-->
<?php
// get all the countries that any of the trips are visiting and disply it for the user to choose a trip
$query = "SELECT * FROM bus_trip GROUP BY country_visited";
$result = mysqli_query($connection, $query);
if (!$result) { 
	die("database query failed."); 
}
while ($row = mysqli_fetch_assoc($result)) {//displays country option
	echo "<option value='" . $row[country_visited] . "'>" . $row[country_visited] . "</option>";
}
mysqli_free_result($result);
?>