
<!-- 
	Programmer Name: 32
	This file gets the trips going to a selected country and displays it for the user
-->
<!DOCTYPE html>
<html>
<head>
	<meta charset"UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
	<title>display trips from a country</title>
</head>
<body>
	<?php //connect database
	include "connectdb.php";
	?>

        <?php
        //searches for trips in a country and displays them
        $countryChoice = $_POST["listCountry"];
        echo "<h1>Listing all Bus Trips For: " . $countryChoice . "</h1>";
        $query = "SELECT * FROM bus_trip WHERE country_visited = '$countryChoice'";
        $result = mysqli_query($connection, $query);
        if (!$result) { 
            die("database query failed.");
        }
        while ($row = mysqli_fetch_assoc($result)) {//lists the trips
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