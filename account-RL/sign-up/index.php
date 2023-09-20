<!doctype html>
<html lang="en">
  <head>
  	<title>SIGN UP - GREENIFY</title>
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
	<!-- <section class="section"> -->
		<div class="container-12">
			<div class="row w-100">
				<div class="col-md-12 col-lg-12 w-100">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(images/sigin.jpg);"></div>
						<div class="wrap p-4 p-md-5">
			      			<div class="d-flex">
								<div class="w-100">
									<h3 class="mb-4">SIGN UP</h3>
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
                        }
                      ?>
                      </span> <br>
							<form action="process.php" method="POST" class="signin-form">
                            
								<h6 class="text-success" >INFO</h6>
								<div class="row">
									<div class="col-md-6">
									  <div class="form-group ">
										<label class="text-dark">First Name</label>
										<div class="col-md-12">
											<input name="firstName" type="text" class="form-control" required>
										</div>
									  </div>
									</div>
									<div class="col-md-6">
										<div class="form-group ">
										  <label class="text-dark">Last Name</label>
										  <div class="col-md-12">
											  <input name="lastName" type="text" class="form-control" required>
										  </div>
										</div>
									  </div>
								</div>
								<div class="row">
									<div class="col-md-6">
									  <div class="form-group ">
										<label class="text-dark">Gender</label>
										<div class="col-md-12">
											<select name="gender" class="form-control text-gray">
												<option value="NOT SELECTED">select</option>
												<option value="Male">Male</option>
												<option value="Female">Female</option>
												<option value="Custom">Custom</option>
											  </select>
										</div>
									  </div>
									</div>
								</div>
								<h6 class="text-success" >CREDENTIALS</h6>
								<div class="row">
									<div class="col-md-6">
									  <div class="form-group ">
										<label class="text-dark">Email</label>
										<div class="col-md-12">
											<input name="userEmail" type="email" class="form-control" required>
										</div>
									  </div>
									</div>
									<div class="col-md-6">
										<div class="form-group ">
										  <label class="text-dark">Password</label>
										  <div class="col-md-12">
											  <input name="userPassword" type="password" class="form-control" required>
										  </div>
										</div>
									  </div>
								</div>

								<h6 class="text-success" >ADDRESS</h6>
								<!-- <div class="row">
									<div class="col-md-6">
									  <div class="form-group ">
										<label class="text-dark">Country</label>
										<div class="col-md-12">
											<select name="country" class="form-control">
												<option value="NOt SELECTED">select</option>
												<option value="Pakistan">Pakistan</option>
												<option value="USA">USA</option>
												<option value="China">China</option>
												<option value="India">India</option>
											  </select>
										</div>
									  </div>
									</div>
									<div class="col-md-6">
										<div class="form-group ">
										  <label class="text-dark">City</label>
										  <div class="col-md-12">
											  <input name="city" type="text" class="form-control" required>
										  </div>
										</div>
									  </div>
								</div> -->
								<div class="row">
									<div class="col-md-12">
									  <div class="form-group ">
										<label class="text-dark">Local Address</label>
										<div class="col-md-12">
											<input name="address" type="text" class="form-control" required>
										</div>
									  </div>
									</div>
								</div>
								<div class="form-group">
									<button type="submit"  name="submit_signup" value="signup"  class="form-control btn btn-success bg-success text-light rounded submit px-3">Sign Up</button>
								</div>
		          </form>
		          <p class="text-center">Already have an account? <a class="text-success" href="../sign-in/index.php">Sign In</a></p>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	<!-- </section> -->

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

