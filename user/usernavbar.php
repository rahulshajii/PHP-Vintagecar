<?php
session_start(); // Start the session

if(isset($_SESSION['userdata'])) {
    // If the session variable is defined, assign it to $uid
    $uid = $_SESSION['userdata'];
   // echo "User ID: $uid"; // Output the value of the session variable
} else {
    // If the session variable is not defined, handle the case here
   // echo "User data is not defined.";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>usernavbar</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

<link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
<link rel="stylesheet" href="css/animate.css">

<link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesheet" href="css/owl.theme.default.min.css">
<link rel="stylesheet" href="css/magnific-popup.css">

<link rel="stylesheet" href="css/aos.css">

<link rel="stylesheet" href="css/ionicons.min.css">

<link rel="stylesheet" href="css/bootstrap-datepicker.css">
<link rel="stylesheet" href="css/jquery.timepicker.css">


<link rel="stylesheet" href="css/flaticon.css">
<link rel="stylesheet" href="css/icomoon.css">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
      
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="../">VINTAGE &nbsp;&nbsp;<span>CARS</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="../" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>
	          <!-- <li class="nav-item"><a href="pricing.html" class="nav-link">Pricing</a></li>   -->
	        <li class="nav-item"><a href="car.php" class="nav-link">Cars</a></li>
	          <!-- <li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li> -->
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
			  <?php
            if($uid)
            {
            ?>
            <li class="nav-item active"><a href="userprofile.php" class="nav-link">profile</a></li>
          
                        
            
           
            <?php
            }

            else{
            ?>

            <li class="nav-item"><a href="../authentication/index.html" class="nav-link">Login</a></li>

            <?php
            }
            ?>
            
			  
	        
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
	<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/backiee-109751-landscape.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="../index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Profile <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Profile</h1>
          </div>
        </div>
      </div>
    </section>
          </body>
          </html>