<?php // Script 13.9 - edit_info.php

 // Define a page title and include the header:
 define('TITLE', 'Edit Conference Room Information');
 include('templates/header.html');
 print '<h2>Edit Conference Room Information</h2>';

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
      $query = "SELECT roomNo, hotel_name, street, city, state, zipcode FROM roomConference WHERE roomNo={$_GET['roomNo']}";
   if ($result = mysqli_query($dbc, $query)) { // Run the query.
      $row = mysqli_fetch_array($result); // Retrieve the information.

      // Make the form:
      print '<form action="edit_info.php" method="post">
      	    <p class="col-sm-12"><label class="col-md-3">Room Number</label>
      	       <input class="btn btn-light" type="number" name="roomNo" value="' .htmlentities($row['roomNo']) . '"></p>
            <p class="col-sm-12"><label class="col-sm-3">Hotel Name</label>
               <input class="btn btn-light" type="text" name="hotel_name" min="0"  value="' .htmlentities($row['hotel_name']) . '"></p>
            <p class="col-sm-12"><label class="col-sm-3">Street</label>
               <input class="btn btn-light" type="text" name="street" value="' .htmlentities($row['street']) . '"></p>
            <p class="col-sm-12"><label class="col-sm-3">City</label>
               <input class="btn btn-light" type="text" name="city" value="' .htmlentities($row['city']) . '"></p>
	    <p class="col-sm-12"><label class="col-sm-3">State</label>
	       <input class="btn btn-light" type="text" name="state" value="' .htmlentities($row['state']) . '"></p>
	    <p class="col-sm-12"><label class="col-sm-3">Zipcode</label>
	       <input class="btn btn-light" type="number" name="zipcode" pattern="^(?(^00000(|-0000))|(\d{5}(|-\d{4})))$" value="' .htmlentities($row['zipcode']) . '"></p>
            
            <input type="hidden" name="roomNo" value="' . $_GET['roomNo'] . '">
            <p class="col-sm-12"><input class="btn btn-dark" type="submit" name="submit" value="Update Room Info."></p>
         </form>';
    } else { // Couldn't get the information.
     print '<p class="error">Could not retrieve the Room information.<br>' . mysqli_error($dbc) . '.</p>';
    }
    
} elseif (isset($_POST['roomNo']) && is_numeric($_POST['roomNo']) && ($_POST['roomNo'] > 0)) { // Handle the form.    
      // Validate and secure the form data:
      $problem = FALSE; 
    
     // Prepare the values for storing:     
     $roomNo= mysqli_real_escape_string($dbc, trim(strip_tags($_POST['roomNo'])));
     $hotel_name= mysqli_real_escape_string($dbc, trim(strip_tags($_POST['hotel_name'])));
     $street= mysqli_real_escape_string($dbc, trim(strip_tags($_POST['street'])));
     $city= mysqli_real_escape_string($dbc, trim(strip_tags($_POST['city'])));
     $state= mysqli_real_escape_string($dbc, trim(strip_tags($_POST['state'])));
     $zipcode= mysqli_real_escape_string($dbc, trim(strip_tags($_POST['zipcode'])));
      
     if (!$problem) {    
       // Define the query.
       $query = "UPDATE roomConference SET      		
     		roomNo ='$roomNo', 
     		hotel_name ='$hotel_name', 
     		street ='$street', 
     		city ='$city', 
     		state ='$state', 
     		zipcode ='$zipcode' 
     		WHERE roomNo ={$_POST['roomNo']}";
     		
        if ($result = mysqli_query($dbc, $query)) {
         print '<p>The Room information has been updated.</p>';
        } else {
         print '<p class="error-msg">Could not update the Room information.<br>' . mysqli_error($dbc) . '.</p>';
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