<?php // Script 13.10 - delete_info.php
 /* This script deletes a student information. */

 // Define a page title and include the header:
define('TITLE', 'Book A Conference Room');
include('templates/header.html');

 print '<h2>Book A Conference Room</h2>';

 // Restrict access to administrators only:
 /*if (!is_administrator()) {
 print '<h2>Access Denied!</h2><p class="error">You do not have permission to access this page.</p>';
 include('templates/footer.html');
 exit();
 }*/
// Need the database connection:
 include('includes/mysqli_connect.php');

 if (isset($_GET['roomNo']) && is_numeric($_GET['roomNo']) && ($_GET['roomNo'] > 0) ) { // Display the Rooms information in a form:

 // Define the query:
 $query = "SELECT roomNo, capacity, start_date, end_date, start_time, reserved FROM roomReservation WHERE roomNo={$_GET['roomNo']}";
 if ($result = mysqli_query($dbc, $query)) { // Run the query.

 $row = mysqli_fetch_array($result); // Retrieve the information.

 // Make the form:
/* print '<form action="make_reservation.php" method="post">
 	<p class="paragraph">Do you want to book this room?</p>
 	    <p class="col-sm-12"><label class="col-md-3">Room Number</label>
      	       <input class="btn btn-light" type="number" name="roomNo" value="' .htmlentities($row['roomNo']) . '"></p>
            <p class="col-sm-12"><label class="col-sm-3">Capacity</label>
               <input class="btn btn-light" type="number" name="capacity" min="0" max="100"  value="' .htmlentities($row['capacity']) . '"></p>
            <p class="col-sm-12"><label class="col-sm-3">Start Date</label>
               <input class="btn btn-light" type="date" name="start_date" value="' .htmlentities($row['start_date']) . '"></p>
            <p class="col-sm-12"><label class="col-sm-3">End Date</label>
               <input class="btn btn-light" type="date" name="end_date" value="' .htmlentities($row['end_date']) . '"></p>
	    <p class="col-sm-12"><label class="col-sm-3">Start Time</label>
	       <input class="btn btn-light" type="time" name="start_time" value="' .htmlentities($row['start_time']) . '"></p>
	    <p class="col-sm-12"><label class="col-sm-3">End Time</label>
	       <input class="btn btn-light" type="time" name="end_time" pattern="^(?(^00000(|-0000))|(\d{5}(|-\d{4})))$" value="' .htmlentities($row['end_time']) . '"></p>
            
            <input type="hidden" name="roomNo" value="' . $_GET['roomNo'] . '">
            <p class="col-sm-12"><input class="btn btn-dark" type="submit" name="submit" value="Book A Room"></p>
         </form>'; */

 } else { // Couldn't get the information.
         print '<p class="error">Could not retrieve the room because:<br>' . mysqli_error($dbc) . '.</p><p class="error">The query being run was: ' . $query . '</p>';
 }

 } elseif (isset($_POST['roomNo']) && is_numeric($_POST['roomNo']) && ($_POST['roomNo'] > 0) ) { // Handle the form.

  if ( !empty($_POST['start_date']) || !empty($_POST['end_date']) || !empty($_POST['start_time']) || !empty($_POST['end_time']) ) {
    // Need the database connection:
    include('includes/mysqli_connect.php');
    
     // Prepare the values for storing:         
     $start_date= mysqli_real_escape_string($dbc, trim(strip_tags($_POST['start_date'])));
     $end_date= mysqli_real_escape_string($dbc, trim(strip_tags($_POST['end_date'])));
     $start_time= mysqli_real_escape_string($dbc, trim(strip_tags($_POST['start_time'])));
     $end_time= mysqli_real_escape_string($dbc, trim(strip_tags($_POST['end_time'])));
 	// Define the query:         
 	$query = " INSERT INTO roomReservation 
 		start_date= '$start_date' 
 		end_date= '$end_date' 
 		start_time= '$start_time' 
 		end_time= '$end_time'      		
     		reserved ='reserved' 
     		WHERE roomNo ={$_POST['roomNo']}";
 	$result = mysqli_query($dbc, $query); // Execute the query.

     // Report on the result:
 	if (mysqli_affected_rows($dbc) == 1) {
 	print '<p>The Room has been booked.</p>';
 	} else {
 	print '<p class="error">Could not book the conference room because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
 	}

 	} else { // No ID received.
 	print '<p class="error">This page has been accessed in error.</p>';
 	} // End of main IF.
   }
 
 print '<p><button type="submit" class="btn btn btn-success btn-lg three-button">
           <a class="black-btn" href="list_reservation.php">Reservation Room</button></a></p>';
 mysqli_close($dbc); // Close the connection.

 include('templates/footer.html');
 ?>