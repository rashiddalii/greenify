<?php
    session_start();  
    require('../common/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SHOP DETIALS - GREENIFY</title>
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
                    <span class="breadcrumb-item active">Shop Detail</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <?php  
        if(isset($_SESSION['cart_msg']))
        {
    ?>
            <div class="container-fluid mb-4">
                <div class="row px-xl-5">
                    <div class="col-12">
                        <span class="mdi mdi-clipboard-alert bg-success col-md-12 text-white form-control">
    <?php 
            echo $_SESSION['cart_msg'];
            unset($_SESSION['cart_msg']);
        
    ?>
                        </span>
                    </div>
                </div>
            </div>
    <?php
        }
    ?>

<?php  
        if(isset($_SESSION['success']))
        {
    ?>
            <div class="container-fluid mb-4">
                <div class="row px-xl-5">
                    <div class="col-12">
                        <span class="mdi mdi-clipboard-alert bg-success col-md-12 text-white form-control">
    <?php 
            echo $_SESSION['success'];
            unset($_SESSION['success']);
        
    ?>
                        </span>
                    </div>
                </div>
            </div>
    <?php
        }
    ?>
                      
    <!-- Shop Detail Start -->
    
    <?php
        $product_id =  $_GET['id'];
        $qry = "SELECT * FROM add_product WHERE id = '$product_id'";
        $res = mysqli_query($con,$qry);

        if(mysqli_num_rows($res) == 1)
        {
            $arr = mysqli_fetch_array($res);
    ?>

            <div class="container-fluid pb-5">
                <div class="row px-xl-5">
                    <div class="col-lg-5 mb-30">
                        <div id="product-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner bg-light">
                                <div class="carousel-item active">
                                    <?php
                                        echo "<img class='w-100 h-100' src='../../admin/uploaded-images/".$arr['itemPhoto']."' >";
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7 h-auto mb-30">
                        <?php
                                        $profile = $_GET['profile'];
                                        $user_id =  $profile - 10201211;
                        ?>

                        <form action="../process/process_add_to_cart.php?profile=<?php echo $profile?>" method="POST">

                            <div class="h-100 bg-light p-30">
                                <h3><?php echo $arr['itemTitle']?></h3>
                                <div class="d-flex mb-3">
                                <div class="text-primary mr-2">
                                <?php
                                    $qry = "SELECT AVG(rating) as avg_rating FROM reviews WHERE product_id = $product_id";
                                    $res = mysqli_query($con, $qry);
                                    $row = mysqli_fetch_assoc($res);
                                    $average_rating = isset($row['avg_rating']) ? round((float) $row['avg_rating'], 1) : 0;
                                    
                                    $fullStars = floor($average_rating); 
                                    $halfStar = ($average_rating - $fullStars) >= 0.5 ? 1 : 0;
                                    $emptyStars = 5 - ($fullStars + $halfStar); 

                                    echo str_repeat("<small class='fas fa-star'></small>", $fullStars); 
                                    echo $halfStar ? "<small class='fas fa-star-half-alt'></small>" : ""; 
                                    echo str_repeat("<small class='far fa-star'></small>", $emptyStars); 
                                ?>
                                </div>
                                    <small class="pt-1">(<?php
                                        $qry = "SELECT *  FROM reviews WHERE product_id = $product_id ";
                                        $res = mysqli_query($con,$qry);
                                        echo mysqli_num_rows($res);
                                    ?> Reviews)</small>
                                </div>
                            
                                <h3 class="font-weight-semi-bold mb-4">$<?php echo $arr['itemPrice']?>.00</h3>
                                
                                <p class="mb-4">CATEGORY / <?php echo strtoupper($arr['itemCategory'])?></p>
                                
                                <input name="product_id" type="hidden" value="<?php echo $arr['id']?>" >
                                
                                <!-- <div class="d-flex mb-3">
                                    <strong class="text-dark mr-3">Sizes:</strong>
                                    <form>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="size-1" name="size">
                                            <label class="custom-control-label" for="size-1">XS</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="size-2" name="size">
                                            <label class="custom-control-label" for="size-2">S</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="size-3" name="size">
                                            <label class="custom-control-label" for="size-3">M</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="size-4" name="size">
                                            <label class="custom-control-label" for="size-4">L</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="size-5" name="size">
                                            <label class="custom-control-label" for="size-5">XL</label>
                                        </div>
                                    </form>
                                </div>
                                
                                <div class="d-flex mb-4">
                                    <strong class="text-dark mr-3">Colors:</strong>
                                    <form>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="color-1" name="color">
                                            <label class="custom-control-label" for="color-1">Black</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="color-2" name="color">
                                            <label class="custom-control-label" for="color-2">White</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="color-3" name="color">
                                            <label class="custom-control-label" for="color-3">Red</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="color-4" name="color">
                                            <label class="custom-control-label" for="color-4">Blue</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" class="custom-control-input" id="color-5" name="color">
                                            <label class="custom-control-label" for="color-5">Green</label>
                                        </div>
                                    </form>
                                </div> -->
                                
                                <div class="d-flex align-items-center mb-4 pt-2">
                                    <div class="input-group quantity mr-3" style="width: 130px;">
                                        <div class="input-group-btn ">
                                            <button class="btn btn-success btn-minus" type="button" min="1">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input name="quantity"  type="text" class="form-control bg-secondary border-0 text-center" value="1" min="1"">
                                        <div class="input-group-btn">
                                            <button class="btn btn-success  btn-plus" type="button" min="1">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <button class="btn btn-success px-3"><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</button>
                                </div>
                                
                                <div class="d-flex pt-2">
                                    <strong class="text-dark mr-2">Share on:</strong>
                                    <div class="d-inline-flex">
                                        <a class="text-dark px-2" href="">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                        <a class="text-dark px-2" href="">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                        <a class="text-dark px-2" href="">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                        <a class="text-dark px-2" href="">
                                            <i class="fab fa-pinterest"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row px-xl-5">
                    <div class="col">
                        <div class="bg-light p-30">
                            <div class="nav nav-tabs mb-4">
                                <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Description</a>
                                <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-2">Information</a>
                                <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-3">
                                    Reviews ( 
                                    <?php
                                        $qry = "SELECT *  FROM reviews WHERE product_id = $product_id ";
                                        $res = mysqli_query($con,$qry);
                                        echo mysqli_num_rows($res);
                                    ?>
                                    )
                                </a>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab-pane-1">
                                    <h4 class="mb-3">Product Description</h4>
                                    <p><?php echo strtoupper($arr['itemDescription'])?></p>
                                </div>
                                <div class="tab-pane fade" id="tab-pane-2">
                                    <h4 class="mb-3">Additional Information</h4>
                                    <p>Eos no lorem eirmod diam diam, eos elitr et gubergren diam sea. Consetetur vero aliquyam invidunt duo dolores et duo sit. Vero diam ea vero et dolore rebum, dolor rebum eirmod consetetur invidunt sed sed et, lorem duo et eos elitr, sadipscing kasd ipsum rebum diam. Dolore diam stet rebum sed tempor kasd eirmod. Takimata kasd ipsum accusam sadipscing, eos dolores sit no ut diam consetetur duo justo est, sit sanctus diam tempor aliquyam eirmod nonumy rebum dolor accusam, ipsum kasd eos consetetur at sit rebum, diam kasd invidunt tempor lorem, ipsum lorem elitr sanctus eirmod takimata dolor ea invidunt.</p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item px-0">
                                                    Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                                                </li>
                                                <li class="list-group-item px-0">
                                                    Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                                                </li>
                                                <li class="list-group-item px-0">
                                                    Duo amet accusam eirmod nonumy stet et et stet eirmod.
                                                </li>
                                                <li class="list-group-item px-0">
                                                    Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                                                </li>
                                            </ul> 
                                        </div>
                                        <div class="col-md-6">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item px-0">
                                                    Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                                                </li>
                                                <li class="list-group-item px-0">
                                                    Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                                                </li>
                                                <li class="list-group-item px-0">
                                                    Duo amet accusam eirmod nonumy stet et et stet eirmod.
                                                </li>
                                                <li class="list-group-item px-0">
                                                    Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                                                </li>
                                            </ul> 
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-pane-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="media mb-4">
                                                <!-- <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;"> -->
                                                <div class="media-body">

                                                <?php
                                                    $stmt = $con->prepare("SELECT u.firstName, u.lastName, r.rating, r.review, r.created_at FROM reviews r JOIN register_users u ON r.user_id = u.id WHERE r.product_id = ? ORDER BY r.created_at DESC");
                                                    $stmt->bind_param("i", $_GET['id']);
                                                    $stmt->execute();
                                                    $result = $stmt->get_result();

                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {
                                                            // echo "<div class='review'>";
                                                            // echo "<h5>" . htmlspecialchars($row['firstName']) . " - <small>" . date("F j, Y", strtotime($row['created_at'])) . "</small></h5>";
                                                            // echo "<p>Rating: " . str_repeat("⭐", $row['rating']) . "</p>";
                                                            // echo "<p>" . htmlspecialchars($row['review']) . "</p>";
                                                            // echo "</div><hr>";
                                                    ?>
                                                        <h6><?php echo $row['firstName'] . ' ' . $row['lastName'] ?><small> - <i><?php echo date("F j, Y", strtotime($row['created_at'])) ?></i></small></h6>
                                                        <div class="text-primary mb-2">
                                                            <?php echo str_repeat("<i class='fas fa-star'></i> ", $row['rating']) ?>
                                                            <?php echo str_repeat("<i class='far fa-star'></i> ", 5 - $row['rating']) ?>
                                                        </div>
                                                        <p><?php echo $row['review'] ?></p>

                                                    <?php
                                                        }
                                                    } else {
                                                        echo "<p>No reviews yet. Be the first to review!</p>";
                                                    }

                                                    $stmt->close();
                                                ?>

                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <h4 class="mb-4">Leave a review</h4>
                                            <div class="d-flex my-3">
                                                <p class="mb-0 mr-2">Your Rating * :</p>
                                                <div class="text-primary">
                                                    <i class="far fa-star star" data-value="1"></i>
                                                    <i class="far fa-star star" data-value="2"></i>
                                                    <i class="far fa-star star" data-value="3"></i>
                                                    <i class="far fa-star star" data-value="4"></i>
                                                    <i class="far fa-star star" data-value="5"></i>
                                                </div>
                                            </div>
                                            <form action="../process/process_review.php" method="POST">
                                                <input type="hidden" name="product_id" value="<?= $_GET['id']; ?>">
                                                <input type="hidden" name="user_id" value="<?= $user_id; ?>">
                                                <input type="hidden" name="rating" id="rating_value" value="0">
                                                <div class="form-group">
                                                    <label for="message">Your Review *</label>
                                                    <textarea name="review" id="message" cols="30" rows="5" class="form-control" required></textarea>
                                                </div>
                                                <div class="form-group mb-0">
                                                    <input type="submit" name="submit_review" value="Leave Your Review" class="btn btn-primary px-3">
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    <?php             
        } else {
            echo "SOMETHING Went WRONG!!";
        }
    ?>
    <!-- Shop Detail End -->


    <!-- Products Start -->
    <div class="container-fluid py-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">You May Also Like</span></h2>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                <?php
                    $qry = "SELECT * FROM add_product";
                    $res = mysqli_query($con, $qry);

                    if (mysqli_num_rows($res) > 0) {
                        while ($arr = mysqli_fetch_array($res)) {
                            $product_id = $arr['id'];

                            // Fetch average rating for the product
                            $rating_qry = "SELECT AVG(rating) as avg_rating, COUNT(*) as total_reviews FROM reviews WHERE product_id = $product_id";
                            $rating_res = mysqli_query($con, $rating_qry);
                            $rating_row = mysqli_fetch_assoc($rating_res);

                            $average_rating = isset($rating_row['avg_rating']) ? round((float) $rating_row['avg_rating'], 1) : 0; // Handle NULL values
                            $total_reviews = $rating_row['total_reviews'];

                            // Generate star ratings
                            $fullStars = floor($average_rating);
                            $halfStar = ($average_rating - $fullStars) >= 0.5 ? 1 : 0;
                            $emptyStars = 5 - ($fullStars + $halfStar);
                    ?>

                        <div class="product-item bg-light">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" style="height:50vh" src="../../admin/uploaded-images/<?php echo $arr['itemPhoto']; ?>">
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href="detail.php?profile=<?php echo $profile ?>&id=<?php echo $arr['id']; ?>"><?php echo $arr['itemTitle']; ?></a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>$<?php echo $arr['itemPrice']; ?>.00</h5>
                                    <h6 class="text-muted ml-2"><del>$<?php echo ($arr['itemPrice'] - 2) * 2; ?>.00</del></h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-center text-primary mb-1">
                                    <?php
                                    echo str_repeat("<small class='fa fa-star text-primary mr-1'></small>", $fullStars);
                                    echo $halfStar ? "<small class='fa fa-star-half-alt text-primary mr-1'></small>" : "";
                                    echo str_repeat("<small class='fa fa-star text-muted mr-1'></small>", $emptyStars);
                                    ?>
                                     <small class="<?php echo ($total_reviews > 0) ? 'text-primary' : 'text-dark'; ?>">
                                                    (<?php echo $total_reviews; ?>)
                                                </small>
                                </div>
                            </div>
                        </div>

                    <?php
                        }
                    } else {
                        echo "No Record Found";
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->


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

    <script>
    document.querySelectorAll(".star").forEach(star => {
        star.addEventListener("click", function() {
            let value = this.getAttribute("data-value");
            document.getElementById("rating_value").value = value;
            document.querySelectorAll(".star").forEach(s => {
                s.classList.remove("fas", "text-warning");
                s.classList.add("far");
            });
            this.classList.add("fas", "text-warning");
            this.previousElementSibling?.classList.add("fas", "text-warning");
            this.previousElementSibling?.previousElementSibling?.classList.add("fas", "text-warning");
            this.previousElementSibling?.previousElementSibling?.previousElementSibling?.classList.add("fas", "text-warning");
            this.previousElementSibling?.previousElementSibling?.previousElementSibling?.previousElementSibling?.classList.add("fas", "text-warning");
        });
    });

    document.querySelectorAll(".star").forEach(star => {
        star.style.cursor = "pointer";
    });
</script>


    <!-- Contact Javascript File -->
    <script src="../mail/jqBootstrapValidation.min.js"></script>
    <script src="../mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="../js/main.js"></script>
</body>

</html>