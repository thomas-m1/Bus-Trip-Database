<!-- 
	Programmer Name: 32
	This is the home page. Where the main display is, and allows the user to interact with the interface
-->
<!DOCTYPE html>
<html>
    <head>
            <title>3319A - Assignment 3</title>
            <link rel="stylesheet" type="text/css" href="style.css">
            <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet">

            <!-- These functions are for ensuring the user selects a .jpg or a .gif file when entering an image. -->
            <script>
            function updateimgfunc() {//for the update bus trip section
                var updateImage = document.getElementById("updateImage").value;
                var jpg = ".jpg"
                var gif = ".gif"
                if(updateImage.length == 0){
                    return true;
                }
                else{
                    if (updateImage.substring(updateImage.length - jpg.length) === jpg || updateImage.substring(updateImage.length - gif.length) === gif){
                        return true;
                    } else {
                        alert("invalid image format. must be .jpg or .gif");
                        return false;
                    }
                }
            }
            function addimgfunc() {//for the add add trip section
                var addImage = document.getElementById("addImage").value;
                var jpg = ".jpg"
                var gif = ".gif"
                if(addImage.length == 0){
                    return true;
                }
                else{
                    if (addImage.substring(addImage.length - jpg.length) === jpg || addImage.substring(addImage.length - gif.length) === gif){
                        return true;
                    } else {
                        alert("invalid image format. must be .jpg or .gif");
                        return false;
                    }
                }
            }

            </script>
    </head>

    <body>
        <!-- connect to the bustrip database  -->
        <?php
            include "connectdb.php"
        ?>

        <h1 style="text-align:center">3319A - Assignment 3</h1>
        <div class="row">
	    <div class="column">
        <ol>


        <!-- user will select how to order bus trip data and will return table data based off search request -->
            <form action="getBusTripData.php" method="post">  
                <li><h3>List Bus Trip Data</h3></li>
                <p>Select how you would like to order the Bus Trip Data:</p>
                <input type='Radio' name='SortBusTrip' value="trip_name" checked>Trip Name<br>
                <input type='Radio' name='SortBusTrip' value="country_visited">Country<br>
                <p>Select the order you would like to view the data based on the previous selected ordering:</p>
                <input type='Radio' name='OrderBusTrip' value="ASC" checked>Ascending<br>
                <input type='Radio' name='OrderBusTrip' value="DESC">Descending<br><br>
                <input type="submit" value="Show Bus Trip Data"><br>
            </form><br><hr>

            <!-- user will select one of the bustrips from above and will be able to update it -->
            <form action="updateBusTripData.php" method="post" onsubmit="return updateimgfunc();"><!-- confirm('Are you sure you want to Update?'); -->
                <li><h3>Update Bus Trip Data</h3></li>
                <p>Select A Bus Trip To Update: </p>
                <select name="listBusTrip">
                    <?php
                    include "listBusTripOption.php"
                    ?>
                </select><br><br>
                    <label for="updateTripName">Enter New Trip Name: </label>
                    <input type="text" name="updateTripName" placeholder="ex. Canada's Wonderland"><br><br>
                    <label for="updateStartDate">Enter New Start Date: </label>
                    <input type="date" name="updateStartDate" id=updateStart placeholder="yyyy-mm-dd" min="1000-01-01" max="9999-12-31"><br><br>
                    <label for="updateEndDate">Enter New End Date: </label>
                    <input type="date" name="updateEndDate"id=updateEnd placeholder="yyyy-mm-dd" min="1000-01-01" max="9999-12-31"><br><br>
                    <label for="updateImage">Enter New Image URL (Must Be .jpg or .gif): </label>
                    <input type="text" name="updateImage" id=updateImage placeholder="ex. www.abcd/abc.jpg"><br><br>
                    <input type="submit" value="Update Bus Trip Data">
            </form><br><br>
            <hr>

            <script>//For updating a trip: checks if start date is before end date and throws error if end date is before start.
            var updateStart = document.getElementById('updateStart');
            var updateEnd = document.getElementById('updateEnd');
            updateStart.addEventListener('change', function() {
                if (updateStart.value){
                    updateEnd.min = updateStart.value;
                }
            }, false);
            updateEnd.addEventLiseter('change', function() {
                if (updateEnd.value){
                    updateStart.max = updateEnd.value;
                }
            }, false);
            </script>



            <!-- Allows the user to delete a trip. cant be deleted if the trip has bookings -->
            <form action="deleteTrip.php" method="post" onsubmit="return confirm('Are you sure you want to delete this trip?');">
                <li><h3>Delete Trip</h3></li>
                <label for="listBusTrip">Select A Trip To Delete: </label>
                <select name="listBusTrip">
                    <?php
                    include "listBusTripOption.php"
                    ?>
                </select><br><br>
                <input type="submit" value="Delete Trip"><br>
            </form><br><br>
            <hr>




            <!-- ******************make sure its a jpg************************************************************************************************************ -->
            <!-- Allow the user to enter a new trip -->
            <form action="addTrip.php" method="post" onsubmit="return addimgfunc();">
                <li><h3>Add New Trip</h3></li>
                <label for="addTripID">Enter New Trip ID: </label>
                <input type="text" name="addTripID" placeholder="ex. 76" required><br><br>
                <label for="addTripName">Enter New Trip Name: </label>
                <input type="text" name="addTripName" placeholder="ex. Canada's Wonderland" required><br><br>
                <label for="addStartDate">Enter New Start Date: </label>
                <input type="date" name="addStartDate" id=addStart placeholder="yyyy-mm-dd" min="1000-01-01" max="9999-12-31" required><br><br>
                <label for="addEndDate">Enter New End Date: </label>
                <input type="date" name="addEndDate" id=addEnd placeholder="yyyy-mm-dd" min="1000-01-01" max="9999-12-31" required><br><br>
                <label for="addCountry">Enter New Country: </label>
                <input type="text" name="addCountry" placeholder="ex. Canada" required><br><br>
                <label for="listLicensePlate">Select A License Bus License Plate Number: </label>
                <select name="listLicensePlate" required>
                    <?php
                        include "listLicensePlateOption.php"
                    ?>
                </select><br><br>
                <label for="addImage">Enter New Image URL: </label>
                <input type="text" name="addImage" id=addImage placeholder="ex. www.abcd/abc.jpg"><br><br>
                <input type="submit" value="Add Trip">
		    </form><br><br>
            <hr>

            <script>//For adding a trip: checks if start date is before end date and throws error if end date is before start.
            var addStart = document.getElementById('addStart');
            var addEnd = document.getElementById('addEnd');
            addStart.addEventListener('change', function() {
                if (addStart.value){
                    addEnd.min = addStart.value;
                }
            }, false);
            addEnd.addEventLiseter('change', function() {
                if (addEnd.value){
                    addStart.max = addEnd.value;
                }
            }, false);
            </script>



            <!-- Allow the user to select a country and see all the bus trips from that country -->
            <form action="getTripFromCountry.php" method="post">
                <li><h3>View All The Bus Trips From A Country</h3></li>
                <label for="listCountry">Select A Country: </label>
                <select name="listCountry">
                    <?php
                    include "listCountryOption.php"
                    ?>
                </select><br><br>
                <input type="submit" value="View Trips For Country">
            </form><br><br><hr>



            <!-- Allow the user to create a booking for a trip -->
            <form action="addTripBooking.php" method="post">
                <li><h3>Add New Trip Booking</h3></li>
                <label for="listPassenger">Select A Passenger: </label>
                <select name="listPassenger">
                    <?php
                    include "listPassengerOption.php"
                    ?>
                </select><br><br>
                <label for="listBusTrip">Select A Trip: </label>
                <select name="listBusTrip">
                    <?php
                    include "listBusTripOption.php"
                    ?>
                </select><br><br>
                <label for="addPrice">Enter a Price: </label>
                <input type="number" min="0" max="10000000" step="1" name="addPrice" placeholder="ex. 199.98" required><br><br>
                <input type="submit" value="Add Booking">
		    </form><br><br><hr>



            <!-- returns information on all passengers -->
            <form action="getPassengerInfo.php" method="post">
                <li><h3>List All The Info About The Passengers</h3></li>
                <p>Display All Passenger Info:</p>
                <input type="submit" value="Show Passengers Info">
            </form><br><br><hr>




            <!-- Allows user to select a passenger and see all of his/her bookings -->
            <form action="getPassengerBookings.php" method="post">
                <li><h3>Select A Passenger And See All Of His/Her Bookings</h3></li>
                <label for="listPassenger">Select A Passenger To Display Bookings: </label>
                <select name="listPassenger">
                <?php
                    include "listPassengerOption.php"
                ?>
                </select><br><br>
                <input type="submit" value="View Passenger's Bookings">
            </form><br><br><hr>
            
            
            
            <!-- Allow the user to delete a booking -->
            <form action="deleteBooking.php" method="post" onsubmit="return confirm('Are you sure you want to delete this Booking?');">
                <li><h3>Delete Booking</h3></li>
                <label for="listBooking">Select A Booking To Delete: </label>
                <select name="listBooking">
                <?php
                    include "listDeleteBooking.php"
                ?>
                </select><br><br>
                <input type="submit" value="Delete Booking">
            </form><br><br><hr>




            <!-- returns all the bus trips that don't any bookings yet -->
            <form action="getTripsNoBookings.php" method="post">
                <li><h3>List All The Bus Trips That Don't Have Any Bookings Yet</h3></li>
                <p>Show All Trips Without A Booking:</p>
                <input type="submit" value="Show Trips With No Bookings">
            </form><br><br><hr>


        </ol>
        </div>
        </div>
        <?php//close connection
            mysqli_close($connection);
        ?>
    </body>
</html>
