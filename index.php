<?php
session_start(); 

if(isset($_SESSION['userdata'])) {
    
    $uid = $_SESSION['userdata'];
    
   
} else {
   
}

include("./authentication/config.php");

$query = "SELECT car_type FROM tbl_cartype ORDER BY car_type";
$result = mysqli_query($connect, $query);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Home Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    


    <link rel="stylesheet" href="./user/css/bootstrap.min.css">
    <link rel="stylesheet" href="./user/css/animate.css">
    
    <link rel="stylesheet" href="./user/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./user/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="./user/css/magnific-popup.css">

    <link rel="stylesheet" href="./user/css/aos.css">

    <link rel="stylesheet" href="./user/css/ionicons.min.css">

    <link rel="stylesheet" href="./user/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="./user/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="./user/css/flaticon.css">
    <link rel="stylesheet" href="./user/css/icomoon.css">
    <link rel="stylesheet" href="./user/css/style.css">
 
  </head>
  <body>
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">VINTAGE &nbsp;&nbsp;<span>CARS</span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="./user/about.php" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="./user/services.php" class="nav-link">Services</a></li>
	          <li class="nav-item"><a href="./user/car.php" class="nav-link">Cars</a></li>
	          <!-- <li class="nav-item"><a href="./user/blog.php" class="nav-link">Blog</a></li> -->
	          <li class="nav-item"><a href="./user/contact.php" class="nav-link">Contact</a></li>
            <?php
            if($uid)
            {
            ?>
            <li class="nav-item"><a href="user/userprofile.php" class="nav-link">profile</a></li>
          
                        
            
           
            <?php
            }

            else{
            ?>

            <li class="nav-item"><a href="./authentication/index.html" class="nav-link">Login</a></li>

            <?php
            }
            ?>
            
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    <div class="hero-wrap ftco-degree-bg" style="background-image: url('user/images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
          <div class="col-lg-8 ftco-animate">
          	<div class="text w-100 text-center mb-md-5 pb-md-5">
	            <h1 class="mb-4">VINTAGE CAR HUB</h1>
	            <p style="font-size: 18px;"> if  this car doesn't excite you, check your pulse. You may be dead. </p>
            </div>
          </div>
        </div>
      </div>
    </div>

     <section class="ftco-section ftco-no-pt bg-light">
    	<div class="container">
    		<div class="row no-gutters">
    			<div class="col-md-12	featured-top">
    				<div class="row no-gutters">
	  					<div class="col-md-4 d-flex align-items-center">
	  						<form action="searchcar.php" class="request-form ftco-animate bg-primary" method="POST">
		          		<h2>Find Your Car</h2>
			    				<div class="form-group">
			    					<label for="" class="label">Car Name</label>
			    					<input type="text" name="name" class="form-control" >
			    				</div>
			    				<div class="form-group">
			    					<label for="" class="label">Car Model</label>
			    					<input type="text" name="model" class="form-control" >
			    				</div>
			    				<div class="d-flex">
			    					<div class="form-group mr-2">
			                <label for="year" class="label">Year</label>
			    					<input type="text" name="year" class="form-control" >
			              </div>
			              <div class="form-group ml-2">
                      <section>
			                <label for="" class="label">Color</label>
			    					<input type="text" name="color" class="form-control" >
			              </div>
		              </div>
		              <div class="form-group">
                    <label for="" class="label" >Car Type:</label>
                <select id="car_type" style="background-color:#1089ff;" name="cartype" required>
                <option class="btn btn-primary py-2 mr-1"  value="">Select Car Type</option>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['car_type'] . '">' . $row['car_type'] . '</option>';
                    }
                    
                    ?>
                    
                    <option value="Sedan">Sedan</option>
                    <option value="SUV">SUV</option>
                    <option value="Truck">Truck</option>
                    <option value="Coupe">Coupe</option>
                    <option value="Convertible">Convertible</option>
                    <option value="Hatchback">Hatchback</option>
                    <option value="Van">Van</option>
                </select>
		              </div>
			            <div class="form-group">
			              <input type="submit" value="Search" name="submit" class="btn btn-secondary py-3 px-4">
			            </div>
			    			</form>
	  					</div>
	  					<div class="col-md-8 d-flex align-items-center">
  <div class="services-wrap rounded-right w-100">
    <h3 class="heading-section mb-4">Better Way to Find Your Perfect Cars</h3>
    <div class="row d-flex mb-4">
      <div class="col-md-4 d-flex align-self-stretch ftco-animate">
        <div class="services w-100 text-center">
          <div class="justify-content-center">
            <img src="./user/cartype/coupe1.png" alt="Coupe Cars" class="img-fluid"> <!-- Coupe Cars -->
          </div>
          <div class="text w-100">
            <h3 class="heading mb-2">Coupe </h3>
          </div>
        </div>      
      </div>
      <div class="col-md-4 d-flex align-self-stretch ftco-animate">
        <div class="services w-100 text-center">
          <div class="justify-content-center">
            <img src="./user/cartype/sedan1.png" alt="Sedan Cars" class="img-fluid"> <!-- Sedan Cars -->
          </div>
          <div class="text w-100">
            <h3 class="heading mb-2">Sedan </h3>
          </div>
        </div>      
      </div>
      <div class="col-md-4 d-flex align-self-stretch ftco-animate">
        <div class="services w-100 text-center">
          <div class="justify-content-center">
            <img src="./user/cartype/suv.png" alt="SUV Cars" class="img-fluid"> <!-- SUV Cars -->
          </div>
          <div class="text w-100">
            <h3 class="heading mb-2">SUV</h3>
          </div>
        </div>      
      </div>
    </div>
    <p><a href="./user/car.php" class="btn btn-primary py-3 px-4">Buy Your Vintage Dream</a></p>
  </div>
</div>

	  				</div>
				</div>
  		</div>
    </section>


    <section class="ftco-section ftco-no-pt bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                <span class="subheading">What we offer</span>
                <h2 class="mb-2">Featured Vehicles</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="carousel-car owl-carousel">
                    <?php
                    include("./authentication/config.php");

                    // SQL query to get featured cars
                    $cars = "SELECT * FROM tbl_cars ORDER BY RAND() LIMIT 4";
                    $result = mysqli_query($connect, $cars);

                    if (!$result) {
                        die("Error: " . mysqli_error($connect));
                    }

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            $car_id = $row['id'];
                            $query = "SELECT photo FROM tbl_carphoto WHERE car_id = '$car_id'";
                            $photo_result = mysqli_query($connect, $query);

                            if (!$photo_result) {
                                die("Error: " . mysqli_error($connect));
                            }

                            $pic = '';
                            if ($row1 = mysqli_fetch_assoc($photo_result)) {
                                $pic = $row1['photo'];
                            }
                    ?>
                            <div class="item">
                            
                                <div class="car-wrap rounded ftco-animate">
                                    <div class="img rounded d-flex align-items-end" style="background-image: url('./admin/car_img/<?php echo $pic; ?>');">
                                    </div>
                                    <div class="text">
                                        <h2 class="mb-0"><a href="#"><?php echo $row['carmodel']; ?></a></h2>
                                        <div class="d-flex mb-3">
                                            <span class="cat"><?php echo $row['carname']; ?></span>
                                            <p class="price ml-auto"><?php echo $row['price']; ?> ₹</p>
                                        </div>
                                        
                                        <p class="d-flex mb-0 d-block">
                                            <!-- <a href="#" class="btn btn-primary py-2 mr-1">Book now</a> -->
                                           
                                            <a href="./user/car-single.php?id=<?php echo $car_id?>" class="btn btn-info" style="width:100%">Details</a>
                                       </p>
                                        
                                    </div>
                                </div>

                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
              <a href="./user/car.php" class="btn btn-primary py-2 mr-1">View All</a>
              <!-- <a href="./user/test.php" class="btn btn-primary py-2 mr-1">View All</a> -->
        </div>
    </div>
</section>


    <section class="ftco-section ftco-about">
			<div class="container">
				<div class="row no-gutters">
					<div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/about.jpg);">
					</div>
					<div class="col-md-6 wrap-about ftco-animate">
	          <div class="heading-section heading-section-white pl-md-5">
	          	<span class="subheading">About us</span>
	            <h2 class="mb-4">Welcome to Carhub</h2>

	            <p>CarHub is your ultimate destination for buying and selling vintage cars. Nestled in a quaint area, our platform is inspired by the charming flow of a small river named Duden, which symbolizes the seamless and enriching experience we aim to provide our users. Here, in our paradisiacal realm, you’ll find everything you need for a fulfilling vintage car journey.</p>
	            <p>One day, while navigating her path, the Little Blind Text encountered a wise copy. The copy cautioned her about the dangers of losing her essence through countless rewrites, where all that remained of her original form was the word "and." Heeding this advice, the Little Blind Text decided to return to her homeland, where authenticity and originality are cherished. Similarly, CarHub prides itself on maintaining the true spirit of classic automobiles, ensuring that each vehicle retains its unique history and charm..</p>

	            <p><a href="./user/car.php" class="btn btn-info py-3 px-4">Search Vehicle</a></p>
	          </div>
					</div>
				</div>
			</div>
		</section>

		<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-7 text-center heading-section ftco-animate">
        <span class="subheading">Services</span>
        <h2 class="mb-3">Our Latest Services</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <div class="services services-2 w-100 text-center">
          <div class="icon d-flex align-items-center justify-content-center">
            <span class="fas fa-car"></span> <!-- Font Awesome icon -->
          </div>
          <div class="text w-100">
            <h3 class="heading mb-2">Classic Car Sales</h3>
            <p>Browse our extensive collection of meticulously restored vintage cars, each with its own unique history and charm. Find your dream classic car today.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="services services-2 w-100 text-center">
          <div class="icon d-flex align-items-center justify-content-center">
            <span class="fas fa-tools"></span> <!-- Font Awesome icon -->
          </div>
          <div class="text w-100">
            <h3 class="heading mb-2">Custom Restoration</h3>
            <p>Our team of experts will bring your vintage car back to life with custom restoration services, ensuring it looks and runs as good as new.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="services services-2 w-100 text-center">
          <div class="icon d-flex align-items-center justify-content-center">
            <span class="fas fa-dollar-sign"></span> <!-- Font Awesome icon -->
          </div>
          <div class="text w-100">
            <h3 class="heading mb-2">Appraisal Services</h3>
            <p>Get a professional appraisal of your vintage car's value, whether you're looking to sell, insure, or simply understand its worth.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="services services-2 w-100 text-center">
          <div class="icon d-flex align-items-center justify-content-center">
            <span class="fas fa-cogs"></span> <!-- Font Awesome icon -->
          </div>
          <div class="text w-100">
            <h3 class="heading mb-2">Parts and Accessories</h3>
            <p>Find rare and original parts for your vintage car, along with custom accessories to enhance its look and performance.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


		<section class="ftco-section ftco-intro" style="background-image: url(user/images/indexshort.jpeg);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row justify-content-end">
					<div class="col-md-6 heading-section heading-section-white ftco-animate">
            <h2 class="mb-3">Capturing the essence of automotive history.</h2>
            <!-- <a href="#" class="btn btn-primary btn-lg">Become A Driver</a> -->
          </div>
				</div>
			</div>
		</section>


    <section class="ftco-section testimony-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
          	<span class="subheading">Testimonial</span>
            <h2 class="mb-3">Happy Clients</h2>
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel ftco-owl">
              <div class="item">
                <div class="testimony-wrap rounded text-center py-4 pb-5">
                  <div class="user-img mb-2" style="background-image: url(./user/images/person_1.jpg)">
                  </div>
                  <div class="text pt-4">
                    <p class="mb-4">I had an amazing experience buying my vintage car from this dealership. The quality and service were top-notch!.</p>
                    <p class="name">Roger Scott</p>
                    <span class="position">Marketing Manager</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap rounded text-center py-4 pb-5">
                  <div class="user-img mb-2" style="background-image: url(./user/images/person_2.jpg)">
                  </div>
                  <div class="text pt-4">
                    <p class="mb-4">Excellent service and a fantastic selection of vintage cars. I found the perfect classic car for my collection.</p>
                    <p class="name">Jane Doe</p>
                    <span class="position">Interface Designer</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap rounded text-center py-4 pb-5">
                  <div class="user-img mb-2" style="background-image: url(./user/images/person_3.jpg)">
                  </div>
                  <div class="text pt-4">
                    <p class="mb-4">The buying process was smooth, and the team was very knowledgeable about vintage cars. Highly recommend!</p>
                    <p class="name">Alex Smith</p>
                    <span class="position">UI Designer</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap rounded text-center py-4 pb-5">
                  <div class="user-img mb-2" style="background-image: url(./user/images/person_2.jpg)">
                  </div>
                  <div class="text pt-4">
                  <p class="mb-4">"I was thrilled with my purchase. The vintage car exceeded my expectations, and the service was exceptional."</p>
                <p class="name">Emily Johnson</p>
                    <span class="position">Web Developer</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap rounded text-center py-4 pb-5">
                  <div class="user-img mb-2" style="background-image: url(./user/images/person_1.jpg)">
                  </div>
                  <div class="text pt-4">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Roger Scott</p>
                    <span class="position">System Analyst</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <section class="ftco-counter ftco-section img bg-light" id="section-counter">
			<div class="overlay"></div>
    	<div class="container">
    		<div class="row">
          <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
              <div class="text text-border d-flex align-items-center">
                <strong class="number" data-number="69">0</strong>
                <span>Year <br>Experienced</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
              <div class="text text-border d-flex align-items-center">
                <strong class="number" data-number="2090">0</strong>
                <span>Total <br>Cars</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
              <div class="text text-border d-flex align-items-center">
                <strong class="number" data-number="1990">0</strong>
                <span>Happy <br>Customers</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
            <div class="block-18">
              <div class="text d-flex align-items-center">
                <strong class="number" data-number="67">0</strong>
                <span>Total <br>Branches</span>
              </div>
            </div>
          </div>
        </div>
    	</div>
    </section>	

    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2"><a href="#" class="logo">Car<span>hub</span></a></h2>
              <p>CarHub is not just a marketplace; it’s a community where the love for vintage cars comes alive. Join us, and let’s celebrate the timeless elegance and enduring legacy of classic automobiles together.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Information</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">About</a></li>
                <li><a href="#" class="py-2 d-block">Services</a></li>
                <li><a href="#" class="py-2 d-block">Term and Conditions</a></li>
                <li><a href="#" class="py-2 d-block">Best Price Guarantee</a></li>
                <li><a href="#" class="py-2 d-block">Privacy &amp; Cookies Policy</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Customer Support</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">FAQ</a></li>  
                <li><a href="#" class="py-2 d-block">Payment Option</a></li>
                <li><a href="#" class="py-2 d-block">Booking Tips</a></li>
                <li><a href="#" class="py-2 d-block">How it works</a></li>
                <li><a href="#" class="py-2 d-block">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Marian Village, Puthuppady P.O, Kothamangalam, Highway, Muvattupuzha, Kochi, Kerala 686673</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+91 759 4017 614</span></a></li>
	                <li><a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox"><span class="icon icon-envelope"></span><span class="text">rahulshaji520@gmail.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  <!--Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> -->
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="./user/js/jquery.min.js"></script>
  <script src="./user/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="./user/js/popper.min.js"></script>
  <script src="./user/js/bootstrap.min.js"></script>
  <script src="./user/js/jquery.easing.1.3.js"></script>
  <script src="./user/js/jquery.waypoints.min.js"></script>
  <script src="./user/js/jquery.stellar.min.js"></script>
  <script src="./user/js/owl.carousel.min.js"></script>
  <script src="./user/js/jquery.magnific-popup.min.js"></script>
  <script src="./user/js/aos.js"></script>
  <script src="./user/js/jquery.animateNumber.min.js"></script>
  <script src="./user/js/bootstrap-datepicker.js"></script>
  <script src="./user/js/jquery.timepicker.min.js"></script>
  <script src="./user/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="./user/js/google-map.js"></script>
  <script src="./user/js/main.js"></script>
    
  </body>
</html>