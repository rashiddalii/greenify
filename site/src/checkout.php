<?php
    session_start();  
    require('../common/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CHECKOUT - GREENIFY</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../lib/animate/animate.min.css" rel="stylesheet">
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="../img/logo.png" />
</head>

<body>
    <!-- Topbar Start -->
    <?php require('../common/topbar.php'); ?>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <?php require('../common/navbar.php'); ?>
    <!-- Navbar End -->


    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Checkout</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <?php  
        if(isset($_SESSION['op_msg']))
        {
    ?>
            <div class="container-fluid">
                <div class="row px-xl-5">
                    <div class="col-12">
                    <span class="mdi mdi-clipboard-alert bg-success col-md-12 text-white form-control">
    <?php 
            echo $_SESSION['op_msg'];
            unset($_SESSION['op_msg']);
        }
    ?>
                    </span>
                    </div>
                </div>
            </div> 
    
            <br>


    <!-- Checkout Start -->
    <div class="container-fluid">
        <?php
                                    $profile = $_GET['profile'];
                                    $user_id =  $profile - 10201211;
        ?>
        <form action="../process/process_checkout.php?profile=<?php echo $profile ?>" method="POST">
            <div class="row px-xl-5">
                <div class="col-lg-8">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Billing Address</span></h5>
                    <div class="bg-light p-30 mb-5">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>First Name</label>
                                <input class="form-control" name="fname" type="text" placeholder="Ali" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Last Name</label>
                                <input class="form-control" name="lname" type="text" placeholder="Raza" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>E-mail</label>
                                <input class="form-control" name="email" type="text" placeholder="example@email.com" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Mobile No</label>
                                <input class="form-control" name="mobile" type="text" placeholder="+123 456 789" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <label>Address</label>
                                <input class="form-control" name="address" type="text" placeholder="123 Street" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order Total</span></h5>
                    <div class="bg-light p-30 mb-5">
                    <?php
                        // if(isset($_GET['profile'])){
                        //     $profile = $_GET['profile'];
                        //     ?>
                            <input type="hidden" name="user_id" value="<?php echo $profile?>">
                             <?php
                        // }else{
                        //     $profile = 0;
                        // }



                        $qry = "SELECT * FROM shopping_cart WHERE user_id = '$user_id'";
                        $res = mysqli_query($con,$qry);
                
                        if(mysqli_num_rows($res) == 1)
                        {
                            $arr = mysqli_fetch_array($res);
                    ?>
                        <div class="border-bottom pt-3 pb-2">
                            <div class="d-flex justify-content-between mb-3">
                                <h6>Subtotal</h6>
                                <h6> Rs <?php echo $arr['subTotal']?>.00</h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h6 class="font-weight-medium">Shipping</h6>
                                <h6 class="font-weight-medium">Rs 100.00</h6>
                            </div>
                        </div>
                        <div class="pt-2">
                            <div class="d-flex justify-content-between mt-2">
                                <h5>Total</h5>
                                <h6>Rs <?php echo $arr['grandTotal']?>.00</h6>
                                
                                <input type="hidden" name="amount" value="<?php echo $arr['grandTotal']?>">
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                    </div>
                    <div class="mb-5">
                        <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Payment</span></h5>
                        <div class="bg-light p-30">
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" value="1" id="paypal" checked>
                                    <label class="custom-control-label" for="paypal">Stripe</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" value="2" id="directcheck" >
                                    <label class="custom-control-label" for="directcheck">Cash on delivery</label>
                                </div>
                            </div>
                            <button class="btn btn-block btn-success font-weight-bold py-3">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Checkout End -->


    <!-- Footer Start -->
    <?php require('../common/footer.php'); ?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-success back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="../mail/jqBootstrapValidation.min.js"></script>
    <script src="../mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="../js/main.js"></script>
</body>

</html>