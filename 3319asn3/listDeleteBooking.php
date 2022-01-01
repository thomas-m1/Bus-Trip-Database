<!-- 
	Programmer Name: 32
	This file lists the passenger and trip info in a dropdown for the user to select a passenger and their corresponding trip to delete
-->
<?php
// get all the passengers and their corrisponding trips and disply it in a dropdown for the user to choose which booking to delete
$query = "SELECT * FROM books 
JOIN passenger ON books.passenger_id = passenger.passenger_id
JOIN bus_trip ON books.trip_id = bus_trip.trip_id";
$result = mysqli_query($connection, $query);
if (!$result) { 
	die("database query failed."); 
}
while ($row = mysqli_fetch_assoc($result)) { // value is set to trip_id and passenger_id seperated by a comma so it can later be split
	echo "<option value='" . $row[trip_id] . ",". $row[passenger_id] . "'>Passenger: " . $row[passenger_id] . " - " . $row[first_name] . " " . $row[last_name] . "   ||   Trip: " . $row[trip_id] . " - " . $row[trip_name] . "</option>";
}
mysqli_free_result($result);
?>
