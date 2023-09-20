<!doctype html>
<html lang="en">
  <head>
  	<title>SIGN IN - GREENIFY</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">
	<link rel="shortcut icon" href="images/logo.png" />

	</head>
	<body>
    <?php
      session_start();      
    ?>
	<section class="ftco-section">
		<div class="container">
			<!-- <div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login #04</h2>
				</div>
			</div> -->
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(images/sigin.jpg);">
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">SIGN IN</h3>
			      		</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
									</p>
								</div>
			      	</div>
					  <?php  
                        if(isset($_SESSION['rmsg']))
                        {
                      ?>
                      <span class="mdi mdi-clipboard-alert bg-success col-md-12 text-white form-control">
                      <?php 
                          echo $_SESSION['rmsg'];
                          unset($_SESSION['rmsg']);
                        } else if(isset($_SESSION['error_login'])){
							?>
							<span class="mdi mdi-clipboard-alert bg-success col-md-12 text-white form-control">
							<?php
							echo $_SESSION['error_login'];
							unset($_SESSION['error_login']);
						} else if(isset($_SESSION['logout_msg'])){
							?>
							<span class="mdi mdi-clipboard-alert bg-success col-md-12 text-white form-control">
							<?php
							echo $_SESSION['logout_msg'];
							unset($_SESSION['logout_msg']);
						}
							?>
                      
                      </span> <br>

							<form action="process.php" class="signin-form" method="POST">
                            
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Email</label>
			      			<input name="userEmail" type="email" class="form-control" required>
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Password</label>
		              <input name="userPassword" type="password" class="form-control"required>
		            </div>
		            <div class="form-group">
		            	<button type="submit" name="submit_signin" value="signin" class="form-control btn bg-success text-light btn-success rounded submit px-3">Sign In</button>
		            </div>
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            	<label class="checkbox-wrap checkbox-success text-success mb-0">Remember Me
									  <input type="checkbox"  checked>
									  <span class="checkmark"></span>
										</label>
									</div>
									<div class="w-50 text-md-right">
										<a href="#">Forgot Password</a>
									</div>
		            </div>
		          </form>
		          <p class="text-center">Not a member? <a class="text-success" href="../sign-up/index.php">Sign Up</a></p>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

