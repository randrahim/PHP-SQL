<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Confernce Room Booking</title>

<!-- CSS only -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="css/styles.css" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;900&family=Ubuntu:wght@300&display=swap" rel="stylesheet"/>
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

<!--load all styles -->
<!-- CSS only -->

<!-- JavaScript Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" 
    	integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- JavaScript Bundle with Popper -->

  </head>

  <body>
    <section class="colored-section" id="title">
      <div class="container-fluid">

<!-- Nav Bar -->
        <nav class="navbar navbar-expand-lg navbar-dark">
          <a class="navbar-brand" href="index.php">BookRoom</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" > <span class="navbar-toggler-icon"></span></button>
          
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="index.php#features">Services</a></li>
              <li class="nav-item"><a class="nav-link" href="#footer">Contact</a></li>
              <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
            </ul>
          </div>
        </nav>

<!-- Title -->
        <div class="row">  
          <div class="col-lg-12">
            <h1 class="big-heading">Edit the Reservation</h1>           
<!-- List of Conference Rooms -->
	    <select class="form-select form-select-lg mb-5 col-lg-12" aria-label=".form-select-lg example">
	        <option selected>List of Conference Rooms</option>
	        
	        <option value="<?php echo $row ['roomNo']; ?>">506</option>
	        <option value="2">Two</option>
	        <option value="3">Three</option>
	    </select>

<!-- Date and time -->
	    <div class="input-group mb-4">
	      <span class="input-group-text col-lg-3 col-sm-6 col-form-label ">Start Date and Time</span><br>        
	      <div class="col-lg-9 col-sm-6 calendar"><input class="form-control " type="datetime-local" value="<?php echo date("Y/m/d"); ?>" id="example-datetime-local-input"/></div>
	    </div><br>	   
      
      <div class="input-group">
          <span class="input-group-text col-lg-3 col-sm-6 col-form-label calendar">End Date and Time</span><br>           
          <div class="col-lg-9 col-sm-6 calendar"><input class="form-control" type="datetime-local" value="<?php echo date("Y/m/d") ?>" id="example-datetime-local-input"/></div>         
      </div><br>

          
        <button type="submit" class="btn btn-dark btn-lg" value="Book A Room"><a class="login-btn" href="add.php">Edit the Reservation</a></button>    
           
            
            <?php // Script 13.9 - edit_info.php
 /* This script edits a student informtion. */

 // Define a page title and include the header:
 //define('TITLE', 'Edit a Student Informtion');
 //include('templates/header.html');

 //print '<h2>Edit the Reservation Informtion</h2>';

 // Restrict access to administrators only:
/* if (!is_administrator()) {
      print '<h2>Access Denied!</h2><p class="error">You do not have permission to access this page.</p>';
      include('templates/footer.html');
      exit();
 } */

 // Need the database connection:
 include('includes/mysqli_connect.php');

 if (isset($_GET['id']) && is_numeric($_GET['id']) && ($_GET['id'] > 0) ) { // Display the entry in a form:
      // Define the query.
      $query = "SELECT id, name, number_grade, start_date, completion_date FROM students WHERE id={$_GET['id']}";
 if ($result = mysqli_query($dbc, $query)) { // Run the query.
      $row = mysqli_fetch_array($result); // Retrieve the information.

      // Make the form:
      print '<form action="edit_info.php" method="post">
      	    <p><label>Name<input type="text" name="name" value="' .htmlentities($row['name']) . '"></label></p>
            <p><label>Number grade<input type="number" name="number_grade" min="0" max="100" size="20" value="' .htmlentities($row['number_grade']) . '"></label></p>
            <p><label>Start Date<input type="date" name="start_date" value="' .htmlentities($row['start_date']) . '"></label></p>
            <p><label>Completion Date<input type="date" name="completion_date" value="' .htmlentities($row['completion_date']) . '"></label></p>

            <input type="hidden" name="id" value="' . $_GET['id'] . '">
            <p><input type="submit" name="submit" value="Update The Student Information!"></p>
         </form>';
} else { // Couldn't get the information.
     print '<p class="error">Could not retrieve the student information because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
   }
    
   } elseif (isset($_POST['id']) && is_numeric($_POST['id']) && ($_POST['id'] > 0)) { // Handle     the form.    
      // Validate and secure the form data:
      $problem = FALSE;

if ( !empty($_POST['name']) && !empty($_POST['number_grade']) ) {
    
     // Prepare the values for storing:     
     $name = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['name'])));
     $number_grade = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['number_grade'])));
     $start_date = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['start_date'])));
     $completion_date = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['completion_date'])));
    
     
     } else {
         print '<p class="error-msg">Please submit both a name, a number grade, and the start date.</p>';
         $problem = TRUE;
     }
    
     if (!$problem) {
    
     // Define the query.
     $query = "UPDATE students SET      		
     		name ='$name', 
     		number_grade ='$number_grade', 
     		start_date ='$start_date', 
     		completion_date ='$completion_date' 
     		WHERE id ={$_POST['id']}";
     		
     if ($result = mysqli_query($dbc, $query)) {
         print '<p>The student information has been updated.</p>';
     } else {
         print '<p class="error-msg">Could not update the student information because:<br>' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
     }
    
     } // No problem!
    
     } else { // No ID set.
         print '<p class="error-msg">This page has been accessed in error.</p>';
     } // End of main IF.
    
     mysqli_close($dbc); // Close the connection.
    
     //include('templates/footer.html'); // Need the footer.
		 ?>
            
          </div>
         
        </div>      
    </section>

    <!-- Footer -->
    <footer class="white-section" id="footer">
      <div class="container-fluid">
        <i class="social-icon fab fa-facebook-f"></i>
        <i class="social-icon fab fa-twitter"></i>
        <i class="social-icon fab fa-instagram"></i>
        <i class="social-icon fas fa-envelope"></i>
        <p>© Copyright 2021 BookRoom</p>
      </div>
    </footer>    
  </body>
</html>