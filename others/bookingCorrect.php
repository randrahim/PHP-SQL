<?php // Script 13.9 - edit_info.php

 // Define a page title and include the header:
 define('TITLE', 'Make a Reservation');
 include('templates/header.html');
 print '<h2>Make a Reservation</h2>';

 // Restrict access to administrators only:
 if (!is_administrator()) {
      print '<h2>Access Denied!</h2><p class="error">You do not have permission to access this page.</p>';
      include('templates/footer.html');
      exit();
 } 

 // Need the database connection:
 include('includes/mysqli_connect.php');

 if (isset($_GET['roomNo']) && is_numeric($_GET['roomNo']) && ($_GET['roomNo'] > 0) ) { // Display the entry in a form:
      // Define the query.
      $query = "SELECT roomNo, capacity, start_date, end_date, start_time, end_time FROM roomReservation WHERE roomNo={$_GET['roomNo']}";
 if ($result = mysqli_query($dbc, $query)) { // Run the query.
      $row = mysqli_fetch_array($result); // Retrieve the information. 
 
   // Make the form:
      print '<form action="bookingRoom.php" method="post">';
   // Room Number 
      print '<p class="col-sm-12"><label class="col-md-3">Room Number</label>
      	       <input class="btn btn-light" type="number" name="roomNo" value="' .htmlentities($row['roomNo']) . '"></p>';
   // Capacity      
      print '<p class="col-sm-12"><label class="col-sm-3">Capacity</label>
               <input class="btn btn-light" type="number" name="capacity" value="' .htmlentities($row['capacity']) . '"></p>';
   // Start Date   
      print '<p class="col-sm-12"><label class="col-sm-3">Start Date</label>
               <input class="btn btn-light" id="DisableWKends1" type="text" name="start_date" value="' .htmlentities($row['start_date']) . '" required></p>';   
            
   // Start Time            
      print '<p class="col-sm-12"><label class="col-sm-3">Start Time</label>
    	<select class="btn btn-light" type="text" id="timepicker" name="start_time" required>
    	     <option value="">Start Time</option>
  		<option value="8:00 AM">8:00 AM</option>
  		<option value="9:00 AM">9:00 AM</option>
  		<option value="10:00 AM">10:00 AM</option>
  		<option value="11:00 AM">11:00 AM</option>
  		<option value="12:00 PM">12:00 PM</option>
  		<option value="1:00 PM">1:00 PM</option>
  		<option value="2:00 PM">2:00 PM</option>
  		<option value="3:00 PM">3:00 PM</option>
  		<option value="4:00 PM">4:00 PM</option>
  		<option value="5:00 PM">5:00 PM</option>
	</select></p>';
   // End Time	       
      print '<p class="col-sm-12"><label class="col-sm-3">End Time</label>   
    	<select class="btn btn-light" type="text" id="timepicker" name="end_time" required>
    	     <option value="">End Time</option>
  		<option value="8:00 AM">8:00 AM</option>
  		<option value="9:00 AM">9:00 AM</option>
  		<option value="10:00 AM">10:00 AM</option>
  		<option value="11:00 AM">11:00 AM</option>
  		<option value="12:00 PM">12:00 PM</option>
  		<option value="1:00 PM">1:00 PM</option>
  		<option value="2:00 PM">2:00 PM</option>
  		<option value="3:00 PM">3:00 PM</option>
  		<option value="4:00 PM">4:00 PM</option>
  		<option value="5:00 PM">5:00 PM</option>
	</select></p>';
      // Submit The Form         
      print '<input type="hidden" name="roomNo" value="' . $_GET['roomNo'] . '">
            <p class="col-sm-12"><input class="btn btn-dark" type="submit" name="submit" value="Book A Room"></p>';
      print '</form>';
    } else { // Couldn't get the information.
     print '<p class="error">Could not retrieve the Room information because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
    }
    
} elseif (isset($_POST['roomNo']) && is_numeric($_POST['roomNo']) && ($_POST['roomNo'] > 0)) { // Handle the form.    
      // Validate and secure the form data:
      $problem = FALSE; 
    
     // Prepare the values for storing:         
     $start_date= mysqli_real_escape_string($dbc, trim(strip_tags($_POST['start_date'])));
     $end_date = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['start_date'])));
     $start_time = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['start_time'])));
     $end_time = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['end_time'])));
      
     if (!$problem) {    
       // Define the query.
       $query = "UPDATE roomReservation SET      		
     		start_date ='$start_date', 
     		end_date ='$end_date', 
     		start_time ='$start_time', 
     		end_time ='$end_time', 
     		reserved = 'reserved'
     		WHERE roomNo ={$_POST['roomNo']}";
     		
        if ($result = mysqli_query($dbc, $query)) {
         print '<p>The Room information has been updated.</p>';
        } else {
         print '<p class="error-msg">Could not update the Room information because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
        }
    
     } // No problem!
    
     } else { // No ID set.
         print '<p class="error-msg">This page has been accessed in error.</p>';
     } // End of main IF. 
     
     mysqli_close($dbc); // Close the connection.  
    // Back to Conference Room Page  
    print '<p><button type="submit" class="btn btn btn-success btn-lg three-button">
           <a class="black-btn" href="list_conf_rooms.php">Conference Room</button></a>';
    // Back to Reservation Room Page 
    print '<button type="submit" class="btn btn btn-success btn-lg three-button">
           <a class="black-btn" href="list_reservation.php">Reservation Room</button></a></p>';
    // Include the Footer 
    include('templates/footer.html'); // Need the footer.  
?>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <link rel="stylesheet" href="https://ajax.aspnetcdn.com/ajax/jquery.ui/1.10.4/themes/blitzer/jquery-ui.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> 
   <script>
      $(document).ready(function() {
         $('#DisableWKends1').datepicker( {
            beforeShowDay: $.datepicker.noWeekends, 
            dateFormat: 'mm/dd/yy',
            minDate: 0                     
         });
      });
    </script>