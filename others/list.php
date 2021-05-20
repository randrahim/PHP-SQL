<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="
    sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="
    sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous" ></script>
    <link rel="stylesheet" href="styles.css" />
    <title>Conference Room Reservations</title>
  </head>
  <body>
  
    <?php // view.php    /* This is the home page for this site. It displays all the students information */
    
    // Need the database connection:
    include('includes/mysqli_connect.php');
    
    // Print the data in User Table
    echo "<b>The User Table</b>";
    $query = 'SELECT username, password, firstname, lastname, email, phoneNo, street, city, state, zipcode FROM user';
    
    // Run the query:
    if ($result = mysqli_query($dbc, $query)) {
       echo "<table>";
         echo "<tr>";
      	   print "<th>Username</th> 
             	  <th>Password</th> 
             	  <th>First Name</th> 
              	  <th>Last Name</th>
             	  <th>Email</th>
             	  <th>Phone No.</th>			       
             	  <th>Street</th> 
             	  <th>City</th>
             	  <th>State</th>
             	  <th>Zipcode</th> ";
         echo "</tr>";
       echo "</table>";      
        			
      // Retrieve the returned record:
      while ($row = mysqli_fetch_array($result)) {
        // Print the record:   
        echo "<table>";
          echo "<tr>";
            print"<td>{$row['username']}</td> 
                  <td>{$row['password']}</td> 
                  <td>{$row['firstname']}</td> 	
                  <td>{$row['lastname']}</td> 
                  <td>{$row['email']}</td>
                  <td>{$row['phoneNo']}</td>
                  <td>{$row['street']}</td>
                  <td>{$row['city']}</td>
                  <td>{$row['state']}</td>
                  <td>{$row['zipcode']}</td> ";               
          echo "</tr>";
          echo "</table>";  				
	};	
   };	
echo "</br>";	

    // Print the data in Reservation Table
    echo "<b>The Reservation Table</b>";	
    $query = 'SELECT username, roomNo, hotel_name, street, city, state, zipcode FROM reservation';
    
    // Run the query:
    if ($result = mysqli_query($dbc, $query)) {
       echo "<table>";
         echo "<tr>";
           print "<th>Username</th> 
             	  <th>Room No.</th> 
             	  <th>Hotel Name</th>              		       
	          <th>Street</th> 
	          <th>City</th>
	          <th>State</th>
	          <th>Zipcode</th> ";
         echo "</tr>";
       echo "</table>";
              			
      // Retrieve the returned record:
      while ($row = mysqli_fetch_array($result)) {
        // Print the record:   
        echo "<table>";
          echo "<tr>";
            print"<td>{$row['username']}</td> 
                  <td>{$row['roomNo']}</td> 
                  <td>{$row['hotel_name']}</td>                   
                  <td>{$row['street']}</td>
                  <td>{$row['city']}</td>
                  <td>{$row['state']}</td>
                  <td>{$row['zipcode']}</td> ";               
          echo "</tr>";
          echo "</table>";  				
      };	
    };
echo "</br>";
   
    // Print the data in Conference Room Table	
    echo "<b>The Conference Room Table</b>";	
    $query = 'SELECT roomNo, capacity, start_date, end_date, time, how_many FROM conferenceRoom';
    
    // Run the query:
    if ($result = mysqli_query($dbc, $query)) {
       echo "<table>";
         echo "<tr>";
           print "<th>Room No.</th> 
	          <th>Capacity</th> 
	          <th>Start Date</th> 
	          <th>End Date</th>
	          <th>Time</th>
	          <th>How Many</th> ";
         echo "</tr>";
       echo "</table>";      
        			
      // Retrieve the returned record:
      while ($row = mysqli_fetch_array($result)) {
        // Print the record:   
        echo "<table>";
          echo "<tr>";
            print"<td>{$row['roomNo']}</td> 
                  <td>{$row['capacity']}</td> 
                  <td>{$row['start_date']}</td> 	
                  <td>{$row['end_date']}</td> 
                  <td>{$row['time']}</td>                  
                  <td>{$row['how_many']}</td> ";               
          echo "</tr>";
          echo "</table>";  				
      };	
    };
	
    mysqli_close($dbc); // Close the connection.
  ?>

</body>
</html>