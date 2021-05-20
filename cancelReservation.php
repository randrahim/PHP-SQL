<?php // Script 13.10 - delete_info.php

    // Define a page title and include the header:
    define('TITLE', 'Cancel the Reservation');
    include('templates/header.html');
    print '<h2>Cancel the Reservation</h2>';

    // Restrict access to administrators only:
    if (!is_administrator()) {
      print '<h2>Access Denied!</h2><p class="error">You do not have permission to access this page.</p>';
      include('templates/footer.html');
      exit();
    }
 
    // Need the database connection:
    include('includes/mysqli_connect.php');

    if (isset($_GET['roomNo']) && is_numeric($_GET['roomNo']) && ($_GET['roomNo'] > 0) ) { // Display the Rooms information in a form:        
        $query = "SELECT roomNo, capacity, start_date, end_date, start_time, reserved FROM roomReservation WHERE roomNo={$_GET['roomNo']}"; // Define the query:
        if ($result = mysqli_query($dbc, $query)) { // Run the query.
            $row = mysqli_fetch_array($result); // Retrieve the information.

            // Make the form:
            //Cancel the Room Reservation
            print '<form action="cancelReservation.php" method="post"> 
            <p class="paragraph">Are you sure you want to cancel this room reservation?</p>
            <div><p><b>Room Number: </b></p>' . $row['roomNo']; 
            
            // Cancel buttom to submit the cancelation of the reservation
            print '</div><br><input type="hidden" name="roomNo" value="' . $_GET['roomNo'] . '">
                <p><input class="btn btn-dark" type="submit" name="submit" value="Cancel"></p>
            </form>';

        } else { // Couldn't get the information.
            print '<p class="error">Could not retrieve the quote.<br>' . mysqli_error($dbc) . '.</p>';
        }
    } elseif (isset($_POST['roomNo']) && is_numeric($_POST['roomNo']) && ($_POST['roomNo'] > 0) ) { // Handle the form.
        // Define the query:
        $query = "UPDATE roomReservation SET
                    start_date = Null, 
                    end_date = Null, 
                    start_time = Null, 
                    end_time = Null, 
                    reserved = Null
                    WHERE roomNo ={$_POST['roomNo']}";
        $result = mysqli_query($dbc, $query); // Execute the query.

        // Report on the result:
        if (mysqli_affected_rows($dbc) == 1) {
            print '<p>This Room Reservation has been canceled.</p>'; 
        } else {
            print '<p class="error">Could not cancel the room reservation.<br>' . mysqli_error($dbc) . '.</p>';
        }
    } else { 
      print '<p class="error">This page has been accessed in error.</p>';
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