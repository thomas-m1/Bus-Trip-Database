<!-- 
	Programmer Name: 32
	This file gets all the passengers info and displays it for the user
-->
<!DOCTYPE html>
<html>
<head>
	<meta charset"UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
	<title>List all the info about the passengers</title>
</head>
<body>

	<?php //connect database
	include "connectdb.php";
	?>

	<h1>Listing all the Passenger info</h1>
	<table>

    <!-- create table headers -->
		<tr>
			<th>Passenger ID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Passport Number</th>
            <th>Citizenship</th>
            <th>Passport Expiry Date</th>
            <th>Birth Date</th>
		<tr>

		<?php
		// gets all the info for the passenger including their passport info
		$query = "SELECT * FROM passenger 
		JOIN passport ON passenger.passport_num = passport.passport_num 
		ORDER BY last_name";
		$result = mysqli_query($connection, $query);
		if (!$result) { 
            die("database query failed.");
        }
		while ($row = mysqli_fetch_assoc($result)) { // displays a table of the info
			echo "<tr><td>" . $row[passenger_id] . "</td><td>" . $row[first_name] . "</td><td>" . $row[last_name] . "</td><td>" . $row[passport_num] . "</td><td>" . $row[citizenship] . "</td><td>" . $row[birth_date]. "</td><td>" . $row[expiry_date] . "</td></tr>";
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