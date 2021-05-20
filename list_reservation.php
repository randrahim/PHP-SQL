<?php // Script 13.10 - delete_info.php
 /* This script to list the reservation rooms information. */

 // Define a page title and include the header:
 define('TITLE', 'List of Reservation Rooms'); // Title of the Page
 include('templates/header.html');
 print '<h2>List of Reservation Rooms</h2>';

 // Restrict access to administrators only:
 if (!is_administrator()) {
    print '<h2>Access Denied!</h2><p class="error">You do not have permission to access this page.</p>';
    include('templates/footer.html');
    exit();
 }

 // Need the database connection:
 include('includes/mysqli_connect.php');
  
  $query = 'SELECT roomNo, capacity, start_date, end_date, start_time, end_time, reserved 
  	    FROM roomReservation
  	    ORDER BY start_date, start_time';
    
    // Run the query:
    if ($result = mysqli_query($dbc, $query)) {
       echo '<table class="table">';
         echo '<thead class="thead-light">';
           echo "<tr>";
           print '<th scope="col">Room No.</th> 
	          <th scope="col">Capacity</th> 
	          <th scope="col">Start Date</th> 
	          <th scope="col">End Date</th>
	          <th scope="col">Start Time</th>
	          <th scope="col">End Time</th>	          
	          <th scope="col">Reserved</th>
	          <th scope="col"></th>';
           echo "</tr>";
        echo "</thead>";      
      /* echo "</table>";  	*/	
      // Retrieve the returned record:
       while ($row = mysqli_fetch_array($result)) { 
        // Print the record:
      /*echo '<table class="table">';   */
        echo "<tbody>";
          echo "<tr>";
            print"<td>{$row['roomNo']}</td> 
                  <td>{$row['capacity']}</td> 
                  <td>{$row['start_date']}</td> 	
                  <td>{$row['end_date']}</td> 
                  <td>{$row['start_time']}</td> 
                  <td>{$row['end_time']}</td>
                  <td>{$row['reserved']}</td>";		       
		  print "<td>
		  	    <p><a class='btn btn-warning' href=\"bookingRoom.php?roomNo={$row['roomNo']}\">Book</a>&nbsp;		  	   
 			    <a class='btn btn-dark' href=\"cancelReservation.php?roomNo={$row['roomNo']}\">Cancel</a></p>
 		 	 </td>";            
          echo "</tr>";
        echo "</tbody>";  
        }; 
      echo "</table>";  	    	
    }; 


 mysqli_close($dbc); // Close the connection.
 
 ?>
 <p><button type="submit" class="btn btn btn-success btn-lg three-button">
      <a class="black-btn" href="list_conf_rooms.php">Conference Room</button></a>
    <button type="submit" class="btn btn btn-success btn-lg three-button">
      <a class="black-btn" href="list_reservation.php">Reservation Room</button></a></p>
 <?php  include('templates/footer.html'); // Need the footer. ?>