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
              <li class="nav-item"><a class="nav-link" href="index2.php">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="index2.php#features">Services</a></li>
              <li class="nav-item"><a class="nav-link" href="#footer">Contact</a></li>
            </ul>
          </div>
        </nav>

<!-- Title -->
        <div class="row">
          <div class="col-lg-6">
            <h1 class="big-heading logout-h1">Log out</h1>
            
            <?php // Script 13.5 - login.php
		 // Destroy the cookie, but only if it already exists:
		 if (isset($_COOKIE['Samuel'])) {
		 setcookie('Samuel', FALSE, time()-300);
		 }		
		 // Print a message:
		 echo '<p class="error-msg signout-heading">You are now logged out.</p>';		
	   ?>
            
          </div>
          <div class="col-lg-6"><img id="logout-img" src="images/logout.png" alt="login-mockup"/></div>
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