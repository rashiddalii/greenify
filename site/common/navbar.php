<div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-success w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-light m-0"><i class="fa fa-bars mr-2"></i>Categories</h6>
                    <i class="fa fa-angle-down text-light"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100">
                        <a href="../src/shop.php?profile=<?php echo $profile ?>" class="nav-item nav-link">Trees</a>
                        <a href="../src/shop.php?profile=<?php echo $profile ?>" class="nav-item nav-link">Liverworts</a>
                        <a href="../src/shop.php?profile=<?php echo $profile ?>" class="nav-item nav-link">Annual Plant</a>
                        <a href="../src/shop.php?profile=<?php echo $profile ?>" class="nav-item nav-link">Flowers</a>
                        <a href="../src/shop.php?profile=<?php echo $profile ?>" class="nav-item nav-link">Orchids</a>
                        <a href="../src/shop.php?profile=<?php echo $profile ?>" class="nav-item nav-link">Grasses</a>
                        <a href="../src/shop.php?profile=<?php echo $profile ?>" class="nav-item nav-link">Seed Plants</a>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-dark bg-dark px-2">GREEN</span>
                        <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">IFY</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <?php
                                $profile = $_GET['profile'];
                                $user_id =  $profile - 10201211;
                                
                            ?>
                            <a href="../index.php?profile=<?php echo $profile ?>" class="nav-item nav-link ">Home</a>
                            <a href="../src/shop.php?profile=<?php echo $profile ?>" class="nav-item nav-link  ">Shop</a>
                            <!-- <a href="detail.php" class="nav-item nav-link">Shop Detail</a> -->
                            <!-- <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle " data-toggle="dropdown">Pages <i class="fa fa-angle-down mt-1"></i></a>
                                <div class="dropdown-menu  rounded-0 border-0 m-0">
                                    <a href="../src/cart.php" class="dropdown-item =">Shopping Cart</a>
                                    <a href="../src/checkout.php" class="dropdown-item ">Checkout</a>
                                </div>
                            </div> -->
                            <a href="../src/orders.php?profile=<?php echo $profile ?>" class="nav-item nav-link ">Orders</a>
                            <a href="../src/contact.php?profile=<?php echo $profile ?>" class="nav-item nav-link ">Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <!-- <a href="" class="btn px-0">
                                <i class="fas fa-heart text-success"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                            </a> -->
                            <a href="../src/cart.php?profile=<?php echo $profile ?>" class="btn px-0 ml-3">
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