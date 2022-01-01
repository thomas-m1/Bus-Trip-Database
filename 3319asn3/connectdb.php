<!-- 
	Programmer Name: 32
    connects to MySQL database
-->
<?php
//here we will connect to the database
$dbhost = "localhost";
$dbuser= "root";
$dbpass = "cs3319";
$dbname = "32_assign2db";
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);// connects to mysql database using the provided info
if (mysqli_connect_errno()){//error message if connection fails
    die("Database connection failed :" .
    mysqli_connect_error() . " (" . mysqli_connect_errno() . ")" );
    }
?>
