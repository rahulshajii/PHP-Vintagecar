<?php
include("../authentication/config.php");
session_start(); // Start the session

if(!isset($_SESSION['userdata'])) {
	?>
    <script>    
	alert("You must be logged in to access this feature. Please login now.")
	window.location="../authentication/index.html";

		</script>
		<?php
    //echo "User ID: $uid"; // Output the value of the session variable
}
else{
	$uid = $_SESSION['userdata'];

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>.</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


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

	<!-- newlink -->

	<!-- jQuery -->

	 
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
	          <!-- <li class="nav-item"><a href="pricing.php" class="nav-link">Pricing</a></li> -->
	          <li class="nav-item active"><a href="car.php" class="nav-link">Cars</a></li>
	          <!-- <li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li> -->
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
			  <?php
            if($uid)
            {
            ?>
            <li class="nav-item"><a href="userprofile.php" class="nav-link">profile</a></li>
          
                        
            
           
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

	 
	<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	
    include("../authentication/config.php");

    if(isset($_GET['id'])) {
        // Sanitize the input to prevent SQL injection
        $carid = intval($_GET['id']); // Convert to integer for safety
        
        $cardata = '';
        $pic = '';

        // SQL query to get the car details
        $cars = "SELECT * FROM tbl_cars WHERE id = $carid";
        $result = mysqli_query($connect, $cars);
        
		if(mysqli_num_rows($result) > 0) {
            $cardata = mysqli_fetch_array($result);
            
            // Fetch the car photo
			$query = "SELECT photo FROM tbl_carphoto WHERE car_id = '$carid'";
			$photo_result = mysqli_query($connect, $query);
			
			$photos = [];
			while ($row1 = mysqli_fetch_assoc($photo_result)) {
				$photos[] = $row1['photo']; // Store all photos in an array
			}
			
			// Now, you can print the photos
		
			
        
?>

		
		
		  
    
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url(../admin/car_images/singlecar.png);" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="../">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Car details <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Car Details</h1>
          </div>
        </div>
      </div>
    </section>
		

	<section class="ftco-section ftco-car-details">
      <div class="container">
      	<div class="row justify-content-center">
      		<div class="col-md-12">
      			<div class="car-details">
					<?php
						foreach ($photos as $pic) {
							//echo '<img src="' . $pic . '" alt="Car Photo">';
						
					?>
      				<div class="img rounded" style="background-image: url('../admin/car_img/<?php echo $pic; ?>');"></div>
					<?php
						}
						?>
      				<div class="text text-center">
      					<span class="subheading"><?php echo $cardata['carmodel']; ?></span>
      					<h2><?php echo $cardata['carname']; ?></h2>
      				</div>
      			</div>
      		</div>
      	</div>
		<div class="row" >
	
	<?php
	include("../authentication/config.php");
	if(isset($_POST['book_session'])){

		$date=$_POST['date'];
		$time=$_POST['time'];
		$carId=intval($_GET['id']);

	$qry="INSERT INTO tbl_session (user_id,car_id,session_time,session_date) VALUES ('$uid','$carId','$time','$date') ";
	$sql=mysqli_query($connect,$qry);
	if($sql) {
		echo '
        <script>
            alert("Your Booking is Pending!! Please wait and check again.");
            window.location = "../";
        </script>
        ';
	}

  
	else{
		echo '
        <script>
            alert("Something went wrong. Please try again later.");
            window.location = "../";
        </script>
        ';
	}
}

	?>
	<form  method="post">
      <!-- Hidden input to pass the car ID -->
      <input type="hidden" name="id" value="<?php echo $cardata['id']; ?>">

      <!-- Date Picker -->
      <div class="form-group">
        <label for="datePicker">Select Date:</label>
        <input type="date" class="form-control" id="datePicker" name="date" required>
      </div>
	  <!-- Date Picker -->
      <div class="form-group">
        <label for="datePicker">Select Time:</label>
        <input type="time" class="form-control" id="datePicker" name="time" required>
      </div>

     
      <!-- Submit Button -->
      <button type="submit" name="book_session" class="btn btn-primary mt-2">Book Session</button>
    </form>
		</div>
      	<div class="row">
      		<div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><span class="fas fa-dollar-sign"></span></div>
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3">
		                	Price:
		                	<span><?php echo $cardata['price']; ?>₹</span>
		                </h3>
	                </div>
                </div>
              </div>
            </div>      
          </div>
          <div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><span class="fas fa-car"></span></div>
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3">
		                	Cartype
		                	<span><?php echo $cardata['cartype']; ?></span>
		                </h3>
	                </div>
                </div>
              </div>
            </div>      
          </div>
          <div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><span class="fas fa-calendar-alt"></span></div>
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3">
		                	Year
		                	<span><?php echo $cardata['year']; ?></span>
		                </h3>
	                </div>
                </div>
              </div>
            </div>      
          </div>
          <div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-backpack"></span></div>
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3">
		                	VIN
		                	<span><?php echo $cardata['vin']; ?></span>
		                </h3>
	                </div>
                </div>
              </div>
            </div>      
          </div>
          <div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><span class="fas fa-barcode"></span></div>
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3">
		                	Color
		                	<span><?php echo $cardata['color']; ?></span>
		                </h3>
	                </div>
                </div>
              </div>
            </div>      
          </div>
      	</div>
		  <div class="row">
      		<div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-dashboard"></span></div>
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3">
		                	Mileage:
		                	<span><?php echo $cardata['mileage']; ?></span>
		                </h3>
	                </div>
                </div>
				<!-- <a href="booksession.php?id= <?php //echo $carid?>"  class="btn btn-success py-2 mr-1">Book Session</a> -->
	


              </div>
			
            </div>  
			<div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><span class="fas fa-user-check"></span></div>
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3">
						originalowner
		                	<span><?php echo $cardata['originalowner']; ?></span>
		                </h3>
	                </div>
                </div>
				
              </div>
		
            </div> 
		
          </div>
		 
		  
		  

      	<div class="row">
			
      		<div class="col-md-18 pills">
						<div class="bd-example bd-example-tabs">
							<div class="d-flex justify-content-center">
							  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

							    <li class="nav-item">
							      <a class="nav-link active" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description" aria-expanded="true">Features</a>
							    </li>
							    <li class="nav-item">
							      <a class="nav-link" id="pills-manufacturer-tab" data-toggle="pill" href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer" aria-expanded="true">Description</a>
							    </li>
							    <li class="nav-item">
							      <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-expanded="true">Review</a>
							    </li>
							  </ul>
							</div>

						  <div class="tab-content" id="pills-tabContent">
						    <div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
						    	<div class="row">
						    		<div class="col-md-4">
						    			<ul class="features">
						    				<li class="check"><span class="ion-ios-checkmark"></span>Airconditions</li>
						    				<li class="check"><span class="ion-ios-checkmark"></span>Child Seat</li>
						    				<li class="check"><span class="ion-ios-checkmark"></span>GPS</li>
						    				<li class="check"><span class="ion-ios-checkmark"></span>Luggage</li>
						    				<li class="check"><span class="ion-ios-checkmark"></span>Music</li>
						    			</ul>
						    		</div>
						    		<div class="col-md-4">
						    			<ul class="features">
						    				<li class="check"><span class="ion-ios-checkmark"></span>Seat Belt</li>
						    				<li class="remove"><span class="ion-ios-close"></span>Sleeping Bed</li>
						    				<li class="check"><span class="ion-ios-checkmark"></span>Water</li>
						    				<li class="check"><span class="ion-ios-checkmark"></span>Bluetooth</li>
						    				<li class="remove"><span class="ion-ios-close"></span>Onboard computer</li>
						    			</ul>
						    		</div>
						    		<div class="col-md-4">
						    			<ul class="features">
						    				<li class="check"><span class="ion-ios-checkmark"></span>Audio input</li>
						    				<li class="check"><span class="ion-ios-checkmark"></span>Long Term Trips</li>
						    				<li class="check"><span class="ion-ios-checkmark"></span>Car Kit</li>
						    				<li class="check"><span class="ion-ios-checkmark"></span>Remote central locking</li>
						    				<li class="remove"><span class="ion-ios-close"></span>Climate control</li>
						    			</ul>
						    		</div>
						    	</div>
						    </div>

						    <div class="tab-pane fade" id="pills-manufacturer" role="tabpanel" aria-labelledby="pills-manufacturer-tab">
							<?php echo $cardata['description']; ?>
						      
						    </div>

						    <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
						      <div class="row">
							   		<div class="col-md-7">
							   			<h3 class="head">23 Reviews</h3>
							   			<div class="review d-flex">
									   		<div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
									   		<div class="desc">
									   			<h4>
									   				<span class="text-left">Jacob Webb</span>
									   				<span class="text-right">14 March 2018</span>
									   			</h4>
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
								   					</span>
								   					<span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
									   			</p>
									   			<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
									   		</div>
									   	</div>
									   	<div class="review d-flex">
									   		<div class="user-img" style="background-image: url(images/person_2.jpg)"></div>
									   		<div class="desc">
									   			<h4>
									   				<span class="text-left">Jacob Webb</span>
									   				<span class="text-right">14 March 2018</span>
									   			</h4>
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
								   					</span>
								   					<span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
									   			</p>
									   			<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
									   		</div>
									   	</div>
									   	<div class="review d-flex">
									   		<div class="user-img" style="background-image: url(images/person_3.jpg)"></div>
									   		<div class="desc">
									   			<h4>
									   				<span class="text-left">Jacob Webb</span>
									   				<span class="text-right">14 March 2018</span>
									   			</h4>
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
								   					</span>
								   					<span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
									   			</p>
									   			<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
									   		</div>
									   	</div>
							   		</div>
							   		<div class="col-md-5">
							   			<div class="rating-wrap">
								   			<h3 class="head">Give a Review</h3>
								   			<div class="wrap">
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					(98%)
								   					</span>
								   					<span>20 Reviews</span>
									   			</p>
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					(85%)
								   					</span>
								   					<span>10 Reviews</span>
									   			</p>
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					(70%)
								   					</span>
								   					<span>5 Reviews</span>
									   			</p>
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					(10%)
								   					</span>
								   					<span>0 Reviews</span>
									   			</p>
									   			<p class="star">
									   				<span>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					<i class="ion-ios-star"></i>
									   					(0%)
								   					</span>
								   					<span>0 Reviews</span>
									   			</p>
									   		</div>
								   		</div>
							   		</div>
							   	</div>
						      </div>
						    </div>
				          </div>
		             </div>
				</div>
      </div>
    



    </section>
<!-- Text line before the date and time picker -->
<p style="color:green;">Book session to visit car:</p>
<!-- <a href="booksession.php?id=<?php // echo $cardata['id']?>" class="btn btn-primary py-2 mr-1">Book Session</a> -->
 <!-- Dropdown Button for Booking Session -->
<div class="dropdown">
  
  <div class="dropdown-menu p-3" aria-labelledby="dropdownMenuButton">
    <!-- Form for Selecting Date and Time -->
   
  </div>
</div>

<!-- Include Bootstrap JS (if not already included in your project) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>







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
                    include("../authentication/config.php");

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
                                    <div class="img rounded d-flex align-items-end" style="background-image: url('../admin/car_img/<?php echo $pic; ?>');">
                                    </div>
                                    <div class="text">
                                        <h2 class="mb-0"><a href="#"><?php echo $row['carmodel']; ?></a></h2>
                                        <div class="d-flex mb-3">
                                            <span class="cat"><?php echo $row['carname']; ?></span>
                                            <p class="price ml-auto"><?php echo $row['price']; ?> ₹</p>
                                        </div>
                                        
                                        <p class="d-flex mb-0 d-block">
                                            <!-- <a href="#" class="btn btn-primary py-2 mr-1">Book now</a> -->
                                           
                                            <a href="car-single.php?id=<?php echo $car_id?>" class="btn btn-info" style="width:100%">Details</a>
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
			
              <!-- <a href="./user/car.php" class="btn btn-danger py-2 mr-1">Back</a> -->
              <!-- <a href="./user/test.php" class="btn btn-primary py-2 mr-1">View All</a> -->
        </div>
    </div>
</section>

<!-- Text line before the date and time picker -->


	<?php 
	}
		 else {
            echo "No car found with the provided ID.";
            exit;
        }
    } else {
        echo "No car ID provided.";
        exit;
    }
    ?>

    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2"><a href="#" class="logo">Car<span>book</span></a></h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
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
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
       
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>
<?php
}
?>