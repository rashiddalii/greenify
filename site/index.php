<?php
    session_start();  
    require('common/connect.php');
    if(isset($_GET['profile'] )){
        $profile = $_GET['profile']  ;
        $user_id =  $profile - 10201211;
    }else{
        $profile = 10201211;
        $user_id =  $profile;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>HOME - GREENIFY</title>
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
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/logo.png" />
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-1 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center h-100">
                    <a class="text-body mr-3" href="">About</a>
                    <a class="text-body mr-3" href="">Contact</a>
                    <a class="text-body mr-3" href="">Help</a>
                    <a class="text-body mr-3" href="">FAQs</a>
                </div>
            </div>


            <?php
                if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == "true")
                {

                    $qry = "SELECT * FROM register_users WHERE id = '$user_id'";
                    $res = mysqli_query($con,$qry);

                    if(mysqli_num_rows($res) == 1)
                    {
                        $arr = mysqli_fetch_array($res);
                
            ?>
                    <div class="col-lg-6 text-center text-lg-right">
                        <div class="d-inline-flex align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown"> <?php echo $arr['firstName']." ".$arr['lastName']?> </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <?php $profile =  $arr['id'] + 10201211;
                                        // echo "<a href='../vendor/index.php?profile=$profile' class='dropdown-item'>Add Products</a>";
                                        echo "<a href='../logout.php' class='dropdown-item'>Sign out</a>";
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php 

                }}
                else {
                
            ?>    
                    <div class="col-lg-6 text-center text-lg-right">
                        <div class="d-inline-flex align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown"> My Account </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                <a href="../account-RL/sign-in/index.php" class="dropdown-item">Sign in</a>
                                    <a href="../account-RL/sign-up/index.php" class="dropdown-item">Sign up</a>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php  
                    }      
            
            ?>                
        </div>
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="" class="text-decoration-none">
                        <span class="h1 text-uppercase text-light bg-dark px-2">GREEN</span>
                        <span class="h1 text-uppercase text-dark bg-success px-2 ml-n1">IFY</span>
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
                <!-- <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-success">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form> -->
            </div>
            <div class="col-lg-4 col-6 text-right">
                <p class="m-0">Customer Service</p>
                <h5 class="m-0">+012 345 6789</h5>
            </div>
        </div>
    </div>
    <!-- Topbar End -->




    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-success w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-light m-0"><i class="fa fa-bars mr-2"></i>Categories</h6>
                    <i class="fa fa-angle-down text-light"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100">
                        <a href="src/shop.php?profile=<?php echo $profile ?>" class="nav-item nav-link">Trees</a>
                        <a href="src/shop.php?profile=<?php echo $profile ?>" class="nav-item nav-link">Liverworts</a>
                        <a href="src/shop.php?profile=<?php echo $profile ?>" class="nav-item nav-link">Annual Plant</a>
                        <a href="src/shop.php?profile=<?php echo $profile ?>" class="nav-item nav-link">Flowers</a>
                        <a href="src/shop.php?profile=<?php echo $profile ?>" class="nav-item nav-link">Orchids</a>
                        <a href="src/shop.php?profile=<?php echo $profile ?>" class="nav-item nav-link">Grasses</a>
                        <a href="src/shop.php?profile=<?php echo $profile ?>" class="nav-item nav-link">Seed Plants</a>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-dark bg-dark px-2">Style</span>
                        <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Yard</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="" class="nav-item nav-link text-success  active">Home</a>

                            <a href="src/shop.php?profile=<?php echo $profile ?>" class="nav-item nav-link ">Shop</a>
                            <!-- <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle " data-toggle="dropdown">Pages <i class="fa fa-angle-down mt-1"></i></a>
                                <div class="dropdown-menu  rounded-0 border-0 m-0">
                                    <a href="src/cart.php" class="dropdown-item =">Shopping Cart</a>
                                    <a href="src/checkout.php" class="dropdown-item ">Checkout</a>
                                </div>
                            </div> -->
                            <a href="src/orders.php?profile=<?php echo $profile ?>" class="nav-item nav-link ">Orders</a>
                            <a href="src/contact.php?profile=<?php echo $profile ?>" class="nav-item nav-link ">Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <!-- <a href="" class="btn px-0">
                                <i class="fas fa-heart text-success"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                            </a> -->
                            <a href="src/cart.php?profile=<?php echo $profile ?>" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-success"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">
                                    <?php
                                        $qry = "SELECT *  FROM add_to_cart WHERE user_id = '$user_id'";
                                        $res = mysqli_query($con,$qry);
                                        echo mysqli_num_rows($res);
                                    ?>
                                </span>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid mb-3">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                    <ol class=" carousel-indicators">
                        <li data-target="#header-carousel" data-slide-to="0" class="bg-success active"></li>
                        <li data-target="#header-carousel" data-slide-to="1" class="bg-success"></li>
                        <li data-target="#header-carousel" data-slide-to="2" class="bg-success"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item position-relative active" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="img/nurhome4.jpeg" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Best Nursery</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Lorem rebum magna amet lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p>
                                    <a class="btn bg-success btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="src/shop.php?profile=<?php echo $profile ?>">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="img/nurhome13.jpg" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Best Nursery</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Lorem rebum magna amet lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p>
                                    <a class="btn bg-success btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="src/shop.php?profile=<?php echo $profile ?>">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="img/nurhome12.jpg" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Best Nursery</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Lorem rebum magna amet lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam</p>
                                    <a class="btn  bg-success btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="src/shop.php?profile=<?php echo $profile ?>">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="product-offer mb-30" style="width: 100%; height: 200px;">
                    <img class="img-fluid" src="img/pro1.jpeg" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Save 20%</h6>
                        <h3 class="text-white mb-3">Special Offer</h3>
                        <a href="src/shop.php?profile=<?php echo $profile ?>" class="btn btn-success">Shop Now</a>
                    </div>
                </div>
                <div class="product-offer mb-30" style="width: 100%; height: 200px;">
                    <img class="img-fluid" src="img/pro2.jpeg" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Save 20%</h6>
                        <h3 class="text-white mb-3">Special Offer</h3>
                        <a href="src/shop.php?profile=<?php echo $profile ?>" class="btn btn-success">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-success m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-success m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">On Time Delivery</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-success m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">3-Day Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-success m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->


    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Categories</span></h2>
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="src/shop.php?profile=<?php echo $profile ?>">
                    <div class="cat-item d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100%; height: 100px;">
                            <img class="img-fluid" src="img/pro4.jpeg" alt="">
                        </div>
                        <div class="flex-fill pl-4">
                            <h6>Trees</h6>
                            <small class="text-body pr-4">
                                <?php
                                    $qry = "SELECT *  FROM add_product WHERE itemCategory = 'Tress'";
                                    $res = mysqli_query($con,$qry);
                                    echo mysqli_num_rows($res);
                                ?>
                                Products
                            </small>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="src/shop.php?profile=<?php echo $profile ?>">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100%; height: 100px;">
                            <img class="img-fluid" src="img/pro5.jpeg" alt="">
                        </div>
                        <div class="flex-fill pl-4 pr-2">
                            <h6>Liverworts</h6>
                            <small class="text-body pr-4">
                                <?php
                                    $qry = "SELECT *  FROM add_product WHERE itemCategory = 'Liverworts'";
                                    $res = mysqli_query($con,$qry);
                                    echo mysqli_num_rows($res);
                                ?>
                                Products
                            </small>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="src/shop.php?profile=<?php echo $profile ?>">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100%; height: 100px;">
                            <img class="img-fluid" src="img/pro1.jpeg" alt="">
                        </div>
                        <div class="flex-fill pl-4">
                            <h6>Annual Plant</h6>
                            <small class="text-body pr-4">
                                <?php
                                    $qry = "SELECT *  FROM add_product WHERE itemCategory = 'Annual Plant'";
                                    $res = mysqli_query($con,$qry);
                                    echo mysqli_num_rows($res);
                                ?>
                                Products
                            </small>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="src/shop.php?profile=<?php echo $profile ?>">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100%; height: 100px;">
                            <img class="img-fluid" src="img/pro2.jpeg" alt="">
                        </div>
                        <div class="flex-fill pl-4">
                            <h6>Flowers</h6>
                            <small class="text-body pr-4">
                                <?php
                                    $qry = "SELECT *  FROM add_product WHERE itemCategory = 'Flowers'";
                                    $res = mysqli_query($con,$qry);
                                    echo mysqli_num_rows($res);
                                ?>
                                Products
                            </small>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="src/shop.php?profile=<?php echo $profile ?>">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100%; height: 100px;">
                            <img class="img-fluid" src="img/pro3.jpeg" alt="">
                        </div>
                        <div class="flex-fill pl-4">
                            <h6>Orchids</h6>
                            <small class="text-body pr-4">
                                <?php
                                    $qry = "SELECT *  FROM add_product WHERE itemCategory = 'Orchids'";
                                    $res = mysqli_query($con,$qry);
                                    echo mysqli_num_rows($res);
                                ?>
                                Products
                            </small>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="src/shop.php?profile=<?php echo $profile ?>">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100%; height: 100px;">
                            <img class="img-fluid" src="img/pro8.jpeg" alt="">
                        </div>
                        <div class="flex-fill pl-4">
                            <h6>Grasses</h6>
                            <small class="text-body pr-4">
                                <?php
                                    $qry = "SELECT *  FROM add_product WHERE itemCategory = 'Grasses'";
                                    $res = mysqli_query($con,$qry);
                                    echo mysqli_num_rows($res);
                                ?>
                                Products
                            </small>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="src/shop.php?profile=<?php echo $profile ?>">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100%; height: 100px;">
                            <img class="img-fluid" src="img/pro7.jpg" alt="">
                        </div>
                        <div class="flex-fill pl-4">
                            <h6>Seed Plants</h6>
                            <small class="text-body pr-4">
                                <?php
                                    $qry = "SELECT *  FROM add_product WHERE itemCategory = 'Seed Plants'";
                                    $res = mysqli_query($con,$qry);
                                    echo mysqli_num_rows($res);
                                ?>
                                Products
                            </small>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
    <!-- Categories End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Featured Products</span></h2>
        <div class="row px-xl-5">
            
                        <?php
                            $qry = "SELECT * FROM add_product LIMIT 8";
                            $res = mysqli_query($con,$qry);

                            if(mysqli_num_rows($res) > 0)
                            {
                              while($arr = mysqli_fetch_array($res))
                              {
                          ?>

                                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                                    <div class="product-item bg-light mb-4">
                                        <div class="product-img position-relative overflow-hidden">
                                            <?php
                                                echo "<img class='img-fluid w-100' style='height:50vh;' src='../admin/uploaded-images/".$arr['itemPhoto']."' >";
                                            ?>
                                            <!-- <img class="img-fluid w-100" src="'../../uploaded-images/".$arr['itemPhoto']."'" alt=""> -->
                                            <!-- <div class="product-action">
                                                <a class="btn btn-outline-dark btn-square" href="src/cart.php?profile=<?php echo $profile ?>"><i class="fa fa-shopping-cart"></i></a>
                                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                                <a class="btn btn-outline-dark btn-square" href="src/detail.php?profile=<?php echo $profile ?>&id=<?php echo $arr['id']?>"><i class="fa fa-search"></i></a>
                                            </div> -->
                                        </div>
                                        <div class="text-center py-4">
                                            <a class="h6 text-decoration-none text-truncate" href="src/detail.php?profile=<?php echo $profile ?>&id=<?php echo $arr['id']?>"  > <?php echo $arr['itemTitle']       ?> </a>
                                            <div class="d-flex align-items-center justify-content-center mt-2">
                                                <h5> $<?php echo $arr['itemPrice']       ?>.00 </h5>
                                                <h6 class="text-muted ml-2"><del>$<?php echo ($arr['itemPrice']-2)*2?>.00</del></h6>
                                                <!-- <h6 class="text-muted ml-2"><del>$123.00</del></h6> -->
                                            </div>
                                            <!-- <div class="d-flex align-items-center justify-content-center mb-1">
                                                <small class="fa fa-star text-primary mr-1"></small>
                                                <small class="fa fa-star text-primary mr-1"></small>
                                                <small class="fa fa-star text-primary mr-1"></small>
                                                <small class="fa fa-star text-primary mr-1"></small>
                                                <small class="fa fa-star text-primary mr-1"></small>
                                                <small>(99)</small>
                                            </div> -->
                                        </div>
                                    </div>
                                    </div>
                        <?php
                              }
                            } else {
                              echo "No! Record Found";
                            }
                          ?>
        </div>
    </div>
    <!-- Products End -->


    <!-- Offer Start -->
    <div class="container-fluid pt-5 pb-3">
        <div class="row px-xl-5">
            <div class="col-md-6">
                <div class="product-offer mb-30" style="height: 300px;">
                    <img class="img-fluid" src="img/nurhome1.jpeg" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Save 20%</h6>
                        <h3 class="text-white mb-3">Special Offer</h3>
                        <a href="src/shop.php?profile=<?php echo $profile ?>" class="btn btn-success">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="product-offer mb-30" style="height: 300px;">
                    <img class="img-fluid" src="img/nurhome12.jpg" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Save 20%</h6>
                        <h3 class="text-white mb-3">Special Offer</h3>
                        <a href="src/shop.php?profile=<?php echo $profile ?>" class="btn btn-success">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-secondary mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <h5 class="text-secondary text-uppercase mb-4">Get In Touch</h5>
                <p class="mb-4">No dolore ipsum accusam no lorem. Invidunt sed clita kasd clita et et dolor sed dolor. Rebum tempor no vero est magna amet no</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-success mr-3"></i>123 Street, Lahore, Pakistan</p>
                <p class="mb-2"><i class="fa fa-envelope text-success mr-3"></i>greenify@gmail.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-success mr-3"></i>+012 345 67890</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-secondary mb-2" href="src/shop.php?profile=<?php echo $profile ?>"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-secondary mb-2" href="src/cart.php?profile=<?php echo $profile ?>"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-secondary mb-2" href="src/checkout.php?profile=<?php echo $profile ?>"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-secondary" href="src/contact.php?profile=<?php echo $profile ?>"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-1 mb-5">
                        <!-- <h5 class="text-secondary text-uppercase mb-4">My Account</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-secondary" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div> -->
                    </div>
                    <div class="col-md-6 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Newsletter</h5>
                        <p>Duo stet tempor ipsum sit amet magna ipsum tempor est</p>
                        <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Your Email Address">
                                <div class="input-group-append">
                                    <button class="btn btn-success">Sign Up</button>
                                </div>
                            </div>
                        </form>
                        <h6 class="text-secondary text-uppercase mt-4 mb-3">Follow Us</h6>
                        <div class="d-flex">
                            <a class="btn btn-success btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-success btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-success btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-success btn-square" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-secondary"> Copyright
                    &copy; <a class="text-success" href="#">2023</a> Greenify, Inc. All Rights Reserved.
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="img/payments.png" alt="">
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-success back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>