<?php // Script 13.7 - add_info.php
   
   // Define a page title and include the header:
   define('TITLE', 'Book A Conference Room');
   include('templates/header.html');
   print '<h2>Book A Conference Room</h2>';

   // Restrict access to administrators only:
   /*if (!is_administrator()) {
        print '<h2>Access Denied!</h2><p class="error">You do not have permission to access this page.</p>';
        include('templates/footer.html');
     exit();
   } */

   // Check for a form submission:
   if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Handle the form.   
      
    
   if ( !empty($_POST['start_date']) && !empty($_POST['start_time']) ) {
      // Need the database connection:
      include('includes/mysqli_connect.php');

     // Prepare the values for storing:
     $roomNo = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['roomNo'])));
     $hotel_name = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['hotel_name'])));
     $start_date= mysqli_real_escape_string($dbc, trim(strip_tags($_POST['start_date']))); 
     $end_date= mysqli_real_escape_string($dbc, trim(strip_tags($_POST['end_date'])));
     $start_time= mysqli_real_escape_string($dbc, trim(strip_tags($_POST['start_time'])));
     $end_time= mysqli_real_escape_string($dbc, trim(strip_tags($_POST['end_time'])));

     $query = "INSERT INTO roomConference (roomNo, hotel_name, street, city, state, zipcode) VALUES ('$start_time', '$end_time', '$start_time', '$end_time')";
     mysqli_query($dbc, $query);

     if (mysqli_affected_rows($dbc) == 1){
     // Print a message:
        print '<p>The entered information for the conference room has been stored. You can go back to: </p>';       
     } else {
        print '<p class="error">Could not store the conference room information because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
     }
   
     // Close the connection:
     mysqli_close($dbc);
 
     } else { // Failed to enter a quotation.
        print '<p class="error">Please enter the conference room information!</p>';
     }
   } // End of submitted IF.
?>

<form action="add_room.php" method="post">   
 
    <p class="col-sm-12"><label class="col-md-3">Room Number</label>
    	<input class="btn btn-light" type="number" name="roomNo" required></p>    
    <p class="col-sm-12"><label class="col-sm-3">Hotel Name</label>
    	<input class="btn btn-light" type="text" name="hotel_name" required></p>
    <p class="col-sm-12"><label class="col-sm-3">Start Date</label>
    	<select class="btn btn-light" name="date" id="date">
  		<option class="btn btn-light" value="<?php  $today = date('l F dS'); echo $today; ?>"><?php $today = date('l F dS'); echo $today; ?></option>  
	</select></p>    
    <p class="col-sm-12"><label class="col-sm-3">Choose End Date:</label>
	<select class="btn btn-light" name="date" id="date">
  		<option class="btn btn-light" value="<?php  $today = date('l F dS'); echo $today; ?>"><?php $today = date('l F dS'); echo $today; ?></option>  
	</select></p>
    <p class="col-sm-12"><label class="col-sm-3">Start Time</label>
    	<select class="btn btn-light" type="time" name="start_time">
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
	</select></p>
    <p class="col-sm-12"><label class="col-sm-3">End Time</label>   
    	<select class="btn btn-light" type="time" name="end_time">
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
	</select></p> 
    <p class="col-sm-12"><input class="btn btn-dark" type="submit" name="submit" value="Book"></p>    
 </form>
 <p><button type="submit" class="btn btn btn-success btn-lg three-button">
           <a class="black-btn" href="list_conf_rooms.php">Conference Room</button></a></p>
 <?php include('templates/footer.html'); ?>