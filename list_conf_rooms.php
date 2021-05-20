<?php // Script 13.10 - delete_info.php
 /* This script to list the conference rooms information. */

 // Define a page title and include the header:
 define('TITLE', 'List of the Conference Room'); // Title of the Page
 include('templates/header.html');
 print '<h2>List of the Conference Room</h2>';

 // Restrict access to administrators only:
 if (!is_administrator()) {
    print '<h2>Access Denied!</h2><p class="error">You do not have permission to access this page.</p>';
    include('templates/footer.html');
    exit();
 }
 
 // Need the database connection:
 include('includes/mysqli_connect.php');

  $query = 'SELECT roomNo, hotel_name, street, city, state, zipcode FROM roomConference ORDER BY roomNo';
    
    // Run the query:
    if ($result = mysqli_query($dbc, $query)) {
       echo '<table class="table">';
         echo '<thead class="thead-light">';
           echo "<tr>";
           print '<th scope="col">Room No.</th> 
	          <th scope="col">Hotel Name</th> 
	          <th scope="col">Street</th> 
	          <th scope="col">City</th>
	          <th scope="col">State</th>
	          <th scope="col">Zipcode</th> 
	          <th scope="col"></th> ';
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
                  <td>{$row['hotel_name']}</td> 
                  <td>{$row['street']}</td> 	
                  <td>{$row['city']}</td> 
                  <td>{$row['state']}</td>                  
                  <td>{$row['zipcode']}</td>";		       
		  print "<td>
		  	    		  	    
 			    <a class='btn btn-dark' href=\"delete_room.php?roomNo={$row['roomNo']}\">Delete</a>&nbsp;
 		 	    <a class='btn btn-warning' href=\"edit_info.php?roomNo={$row['roomNo']}\">Edit</a></p>
 		 	 </td>";            
          echo "</tr>";
        echo "</tbody>";  
        }; 
      echo "</table>";  	    	
    }; 

 print "<p><a class='btn btn-primary' href=\"add_room.php?roomNo={$row['roomNo']}\">Add Conference Room</a>&nbsp";
           
 mysqli_close($dbc); // Close the connection.

 ?>
 <p><button type="submit" class="btn btn btn-success btn-lg three-button">
      <a class="black-btn" href="list_conf_rooms.php">Conference Room</button></a>
    <button type="submit" class="btn btn btn-success btn-lg three-button">
      <a class="black-btn" href="list_reservation.php">Reservation Room</button></a></p>
 <?php include('templates/footer.html'); ?>