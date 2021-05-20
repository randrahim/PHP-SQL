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
          <div class="col-lg-6">
            <h1 class="big-heading">Login</h1>
            <?php // Script 13.5 - login.php
		 /* This page lets people log into the site. */		
		 // Set two variables with default values:
		 $loggedin = false;
		 $error = false;
		
		 // Check if the form has been submitted:
		 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		 // Handle the form:
		 if (!empty($_POST['email']) && !empty($_POST['password'])) {		
		 if ( (strtolower($_POST['email']) == 'me@example.com') && ($_POST['password'] == 'testpass') ) { // Correct!
		
		 // Create the cookie:
		 setcookie('Samuel', 'Clemens', time()+3600);
		
		 // Indicate they are logged in:
		 $loggedin = true;		
		 } else { // Incorrect! 
		    $error = '<span class="error-msg">The submitted email address and password do not match those on file!</span>'; }		
		 } else { // Forgot a field. 
		    $error = '<span class="error-msg">Please make sure you enter both an email address and a password!</span>'; }
		 }		
		
		 // Print an error if one exists:
		 if ($error) {
		     print '<p class="error">' . $error . '</p>';}
		
		 // Indicate the user is logged in, or show the form:
		 if ($loggedin) {
		    print '<p class="error-msg">You are now logged in!</p>
		    <button type="submit" class="btn btn-dark btn-lg three-button">
		    <i class="fab fa-google-play"></i><a class="black-btn" href="list_conf_rooms.php"> Conference Room List</button></a>
		    
		    <button type="submit" class="btn btn-dark btn-lg three-button">
		    	<i class="fab fa-google-play"></i><a class="black-btn" href="list_reservation.php"> Reservation Room List</button></a>'; } 
		 else { print 
		    '<form action="login.php" method="post">
		        <p><label>Email Address <br><input type="email" name="email" class="form-control"></label></p>
		        <p><label>Password <br><input type="password" name="password" class="form-control"></label></p>
		        <button type="submit" class="btn btn-outline-light btn-lg download-button"><i class="fab fa-google-play"></i> Log In</button>
		    </form>'; }		 
		 ?>
            
          </div>
          <div class="col-lg-6"><img id="login-img" src="images/login.svg" alt="login-mockup"/></div>
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