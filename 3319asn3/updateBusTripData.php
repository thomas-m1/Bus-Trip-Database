<!-- 
	Programmer Name: 32
	This file updates the db with the information selected by the user
-->
<!DOCTYPE html>
<html>
<head>
	<meta charset"UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
	<title>Update Bus Trip Data</title>
</head>
<body>
	<?php //connect database
	include "connectdb.php";
	?>

    <?php
	$updateBusTrip = $_POST["listBusTrip"];
	$image = $_POST["updateImage"];
	//below are indidual queries and updates. if the fields are not empty, it will update to the values selected by the user
	if (!empty($_POST["updateTripName"])) {
		$update = $_POST["updateTripName"];
		$query = "UPDATE bus_trip SET trip_name = '" . $update . "' WHERE trip_id = '" . $updateBusTrip . "'";
		$updateName = mysqli_query($connection, $query);
		if (!$updateName) { die("database update failed for trip name"); }
	}
	if (!empty($_POST["updateStartDate"])) {
		$update = $_POST["updateStartDate"];
		$query = "UPDATE bus_trip SET start_date = '" . $update . "' WHERE trip_id = '" . $updateBusTrip . "'";
		$updateWeight = mysqli_query($connection, $query);
		if (!$updateWeight) { die("database update failed for start date"); }
	}
    if (!empty($_POST["updateEndDate"])) {
		$update = $_POST["updateEndDate"];
		$query = "UPDATE bus_trip SET end_date = '" . $update . "' WHERE trip_id = '" . $updateBusTrip . "'";
		$updateWeight = mysqli_query($connection, $query);
		if (!$updateWeight) { die("database update failed for end date"); }
	}
	if (!empty($_POST["updateImage"])) {
		$update = $_POST["updateImage"];
		$query = "UPDATE bus_trip SET urlimage = '" . $update . "' WHERE trip_id = '" . $updateBusTrip . "'";
		$updateSuffix = mysqli_query($connection, $query);
		if (!$updateSuffix) { die("database update failed for image"); }
	}
	if (empty($image)){
		echo "<table>
		No Image selected to update.
		<tr>
			<th style='width:250'; height:'250';>NULL</th>
		<tr>
		</table>";
	}
	else{
	echo "<h4>Updated Trip id: " . $updateBusTrip . " successfully!</h4><br> Below is the selected image<br>";
	echo "<img src='" . $image . "'/>";
	}
	?>

	<form action="index.php" method="post">
		<input type="submit" value="Go Home">
	</form>
</body>
</html>