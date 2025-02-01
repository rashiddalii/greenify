<!doctype html>
<html lang="en">

<head>
    <title>My Profile - GREENIFY</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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

    <?php
    session_start();
    require('../common/connect.php');
    ?>
    <?php require('../common/topbar.php'); ?>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <?php require('../common/navbar.php'); ?>
    <?php
    $user_id = $_GET['profile'] - 10201211;
    $qry = "SELECT * FROM register_users WHERE id = '$user_id'";
    $res = mysqli_query($con, $qry);

    if (mysqli_num_rows($res) == 1) {
        $arr = mysqli_fetch_array($res);
    ?>

        <div class="container-12">
            <div class="row w-100">
                <div class="col-md-12 col-lg-12 w-100">
                    <div class="wrap">
                        <div class="img" style="background-image: url(images/sigin.jpg);"></div>
                        <div class="wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <?php
                                    if (isset($_SESSION['success'])) {
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
                                    <h3 class="mb-4">My Profile</h3>
                                </div>
                            </div>
                            <form action="../process/process_update_address.php" method="POST" class="signin-form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark">First Name</label>
                                            <div class="col-md-12">
                                                <input name="firstName" value="<?= $arr['firstName'] ?>" type="text" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark">Last Name</label>
                                            <div class="col-md-12">
                                                <input name="lastName" value="<?= $arr['lastName'] ?>" type="text" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="text-dark">Email</label>
                                            <div class="col-md-12">
                                                <input name="userEmail" value="<?= $arr['userEmail'] ?>" type="email" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="text-dark">Local Address</label>
                                            <div class="col-md-12">
                                                <input name="address" value="<?= $arr['address'] ?>" type="text" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="hidden" name="user_id" value="<?= $user_id ?>">
                                    <button type="submit" name="submit_signup" value="signup" class="form-control btn btn-success bg-success text-light rounded submit px-3">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <!-- </section> -->

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="../mail/jqBootstrapValidation.min.js"></script>
    <script src="../mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="../js/main.js"></script>
    <?php require('../common/footer.php'); ?>
</body>

</html>