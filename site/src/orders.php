<?php
    session_start();  
    require('../common/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ORDERS - GREENIFY</title>
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
    <div class="container-fluid ">
        <?php
            $profile = $_GET['profile'];
            $user_id =  $profile - 10201211;
        ?>
    
            <div class="row px-xl-5">
                <div class="col-lg-6">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">My orders</span></h5>
                    
                    <?php

                            $qry = "SELECT * FROM checkout WHERE user_id = '$user_id' ORDER BY id DESC";
                            $res = mysqli_query($con,$qry);
                    
                            if(mysqli_num_rows($res) > 0)
                            {
                                while($arr = mysqli_fetch_array($res))
                                {

                                
                        ?>
                        
                            <div class="bg-light p-30 mb-5">
                                <div class="border-bottom pt-3 pb-2">
                                    <div class="d-flex justify-content-between">
                                        <h5>Order Id</h5>
                                        <p><?php echo $arr['id']?></p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <h5>Order status</h5>
                                        <p><?php echo $arr['order_status']?></p>
                                    </div>
                                    <div class="d-flex justify-content-between ">
                                        <h5>Full Name</h5>
                                        <p><?php echo $arr['fname']." ".$arr['lname']?></p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <h5>Email</h5>
                                        <p><?php echo $arr['email']?></p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <h5>Address</h5>
                                        <p><?php echo $arr['address']?></p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <h5>Mobile</h5>
                                        <p><?php echo $arr['mobile']?></p>
                                    </div>
                                </div>
                                <div class="pt-2">
                                    <div class="d-flex justify-content-between mt-2">
                                        <h5>Amount</h5>
                                        <h5>Rs <?php echo $arr['amount']?>.00</h5>
                                    </div>
                                </div>
                            </div>
                        <?php
                                }
                            }else{
                        ?>
                            <div class="pt-2">
                                <div class="d-flex justify-content-between mt-2">
                                    <h5>Nothing ordered yet!</h5>
                                </div>
                            </div>
                        <?php

                            }
                        ?>
                    

                </div>
            </div>
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