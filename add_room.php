<?php // Script 13.7 - add_info.php
 /* This script adds the room information. */

 // Define a page title and include the header:
 define('TITLE', 'Add A Conference Room');
 include('templates/header.html');

 print '<h2>Add A Conference Room</h2>';

 // Restrict access to administrators only:
 if (!is_administrator()) {
    print '<h2>Access Denied!</h2><p class="error">You do not have permission to access this page.</p>';
    include('templates/footer.html');
    exit();
 } 

 // Check for a form submission:
 if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Handle the form.

 if ( !empty($_POST['roomNo']) && !empty($_POST['hotel_name']) ) {
    // Need the database connection:
    include('includes/mysqli_connect.php');

 // Prepare the values for storing:
 $roomNo = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['roomNo'])));
 $hotel_name = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['hotel_name'])));
 $street = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['street']))); 
 $city = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['city'])));
 $state = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['state'])));
 $zipcode= mysqli_real_escape_string($dbc, trim(strip_tags($_POST['zipcode'])));

 $query = "INSERT INTO roomConference (roomNo, hotel_name, street, city, state, zipcode) VALUES ('$roomNo', '$hotel_name', '$street', '$city', '$state', '$zipcode')";
 mysqli_query($dbc, $query);

 if (mysqli_affected_rows($dbc) == 1){
    // Print a message:
    print '<p>The entered information for the conference room has been stored. You can go back to: </p>';       
 } else {
    print '<p class="error">Could not store the conference room information.<br>' . mysqli_error($dbc) . '.</p>';
 }

 // Close the connection:
 mysqli_close($dbc);

 } else { // Failed to enter a quotation.
 print '<p class="error">Please enter the conference room information!</p>';
 }

 } // End of submitted IF.
 // Leave PHP and display the form:
 ?>

 <form action="add_room.php" method="post">       
    <p class="col-sm-12"><label class="col-md-3">Room Number</label><input class="btn btn-light" type="number" name="roomNo" required></p>    
    <p class="col-sm-12"><label class="col-sm-3">Hotel Name</label><input class="btn btn-light" type="text" name="hotel_name" required></p>
    <p class="col-sm-12"><label class="col-sm-3">Street</label><input class="btn btn-light" type="text" name="street" ></p>
    <p class="col-sm-12"><label class="col-sm-3">City</label><input class="btn btn-light" type="text" name="city"></p>
    <p class="col-sm-12"><label class="col-sm-3">State</label><input class="btn btn-light" type="text" name="state"></p>  
    <p class="col-sm-12"><label class="col-sm-3">Zipcode</label><input class="btn btn-light" type="number" name="zipcode" pattern="^(?(^00000(|-0000))|(\d{5}(|-\d{4})))$"></p>  
    <p class="col-sm-12"><input class="btn btn-dark" type="submit" name="submit" value="Submit"></p>    
 </form>
 <!-- Back to Conference Room Page -->
 <p><button type="submit" class="btn btn btn-success btn-lg three-button">
      <a class="black-btn" href="list_conf_rooms.php">Conference Room</button></a>
      
  <!-- Back to Reservation Room Page -->
    <button type="submit" class="btn btn btn-success btn-lg three-button">
      <a class="black-btn" href="list_reservation.php">Reservation Room</button></a></p>
      
  <!-- Include the Footer -->
  <?php  include('templates/footer.html');