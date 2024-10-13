<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration</title>



	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/style.css">

</head>

<body style="background-image: url(images/sigin.png)";>
	<section class="ftco-section" >
		<div class="container" >
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
				</div>
			</div>
			<div class="row justify-content-center" >
				<div class="col-md-7 col-lg-5">
					<div class="wrap">
						<!--<div class="img" style=""></div>-->
						<div class="login-wrap p-4 p-md-5">
							<div class="d-flex">
								<div class="w-100">
									<h3 class="mb-4">Sign Up</h3>
								</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="https://www.instagram.com/"
											class="social-icon d-flex align-items-center justify-content-center"><span
												class="fa fa-instagram"></span></a>
										<a href="https://www.facebook.com/login/"
											class="social-icon d-flex align-items-center justify-content-center"><span
												class="fa fa-facebook"></span></a>
										<a href="https://x.com/"
											class="social-icon d-flex align-items-center justify-content-center"><span
												class="fa fa-twitter"></span></a>
										<a href="https://api.whatsapp.com/send?phone=7594017614"
											class="social-icon d-flex align-items-center justify-content-center"><span
												class="fa fa-whatsapp"></span></a>
									</p>
								</div>
							</div>
							<!-- <form action="insert1.php" method="post">
								<button type="submit"></button>
							</form> -->

							<form action="newMember.php" class="signin-form" method="POST" enctype="multipart/form-data">
								<div class="form-group mt-3">
									<input type="text" class="form-control" name="name" required>
									<label class="form-control-placeholder" for="name">Full Name</label>
								</div><br>
								<div class="form-group mt-3">

									<input type="date" class="form-control" id="datemax" name="age" max="2013-12-31">

								</div><br>
								<div class="form-group mt-3">
									<label for="gender" style="color: #01D28E;">Gender:&nbsp;&nbsp;</label>
									<input type="Radio" name="gender" value="male">&nbsp;&nbsp;Male &nbsp;&nbsp;
									<input type="Radio" name="gender" value="female">&nbsp;&nbsp;Female

								</div><br>
								<div class="form-group mt-3">
									<input type="email" class="form-control" name="email" required>
									<label class="form-control-placeholder" for="email">Email</label>

								</div><br>
								<div class="form-group mt-3">
									<input type="number" class="form-control" name="phone" required>
									<label class="form-control-placeholder" for="phone">Phone Number</label>

								</div><br>
								<div class="form-group mt-3">
									<input type="text" class="form-control" name="address" required>
									<label class="form-control-placeholder" for="address">Address</label>

								</div><br>
								<div class="form-group mt-3">
									<input type="text" class="form-control" name="lsnumber" required>
									<label class="form-control-placeholder" for="lsnumber">License Number</label>

								</div><br>
								<div class="form-group mt-3">
									<label class="form-control-placeholde" style="color: #01D28E;"for="photo">Photo</label>
									<input type="file" id="imag" name="photo" accept="image/*">&nbsp;
								</div><br>

								<div class="form-group ">
									<input id="password-field" type="password" name="password" class="form-control"
										required>
									<label class="form-control-placeholder" for="password">Password</label>
									<span toggle="#password-field"
										class="fa fa-fw fa-eye field-icon toggle-password"></span>
								</div><br>
								<div class="form-group ">
									<input id="password-field" type="password" name="cpassword" class="form-control"
										required>
									<label class="form-control-placeholder" for="cpassword">Confrim Password</label>
									<span toggle="#password-field"
										class="fa fa-fw fa-eye field-icon toggle-password"></span>
								</div>
								<div class="form-group">
									<button type="submit" value="submit" name='submit'
										class="form-control btn btn-primary rounded submit px-3">Sign Up</button>
								</div>
							</form>
							<p class="text-center">Already member? <a href="index.html">&nbsp;&nbsp;Login</a> </p>
							<p class="ocial-media d-flex justify-content-end">
								<a href="market://search?q=pname:com.joelapenna.foursquared" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-phone">&nbsp;+91 759-4017-614</span></a>
							</p>
							<p  class="ocial-media d-flex justify-content-end">
								<a href="https://mail.google.com/mail/u/2/?ogbl#inbox" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-envelope">&nbsp;&nbsp;vintagecarhub69@gmail.com</span></a>
							</p>
							 
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>





</body>

</html>

