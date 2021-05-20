<!DOCTYPE html>
<html>
<!-- -------------------------------------------------          Head Section      -------------------------------------------------------------- -->
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
<!-- -------------------------------------------------         BODY Section      -------------------------------------------------------------- -->
  
  <body>
    <section class="colored-section" id="title">
      <div class="container-fluid">

<!-- -------------------------------------------------         NAVBAR Section      -------------------------------------------------------------- -->
  
        <nav class="navbar navbar-expand-lg navbar-dark">
          <a class="navbar-brand" href="index2.php">BookRoom</a>
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

<!-- -------------------------------------------------         FORM Section      -------------------------------------------------------------- -->  
        <div class="row">  
          <div class="col-lg-12">
            <h1 class="big-heading">Book A Conference Room</h1> 
            <form action="add_info.php" method="post">          
            
<!-- -------------------------------------------------       List of Conference Rooms Form Section -------------------------------------------- -->
	    <select class="form-select form-select-lg mb-5 col-lg-12" aria-label=".form-select-lg example" required >
	        <option selected>List of Conference Rooms</option>
	        <option value="1">201</option>
	        <option value="2">305</option>
	        <option value="3">408</option>
	        <option value="3">222</option>
	        <option value="3">608</option>
	    </select>

<!-- -------------------------------------------------       DATE & TIME Form Section --------------------------------------------------------- -->
	    <div class="input-group mb-4">
	      <span class="input-group-text col-lg-3 col-sm-6 col-form-label ">Start Date and Time</span><br>        
	      <div class="col-lg-9 col-sm-6 calendar">
	      <input class="form-control " type="datetime-local" value="<?php echo date("Y/m/d"); ?>" id="example-datetime-local-input" required/></div>
	    </div><br>	   
      
      <div class="input-group">
          <span class="input-group-text col-lg-3 col-sm-6 col-form-label calendar">End Date and Time</span><br>           
          <div class="col-lg-9 col-sm-6 calendar">
          <input class="form-control" type="datetime-local" value="<?php echo date("Y/m/d") ?>" id="example-datetime-local-input" required /></div>         
      </div><br>

<!-- -------------------------------------------------       SUBMIT Form Section ------------------------------------------------------------- -->        
        <button type="submit" class="btn btn-dark btn-lg" value="Book A Room"><a class="login-btn" href="add.php">Book A Room</a></button>        
      </form> 

<!-- -------------------------------------------------       PHP Section --------------------------------------------------------------------- -->        
   <!--   <?php // Script 13.7 - add_info.php
 	

 
   ?> -->
	 </div>
    </section>
    
<!-- -------------------------------------------------         FOOTER Section      -------------------------------------------------------------- -->
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