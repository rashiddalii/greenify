<?php
    session_start();

    if(isset($_SESSION['logged_in_admin']) && $_SESSION['logged_in_admin'] == "admin")
    {
  
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>ADMIN</title>
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css" />
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css" />
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="shortcut icon" href="assets/images/logo.png" />
  </head>
  <body>
    <?php
                if(isset($_SESSION['logged_in_admin']) && $_SESSION['logged_in_admin'] == "admin")
                {
                    $con = mysqli_connect("localhost","root","","product_listing");
                    $profile = $_GET['profile'] - 10201211 ;
                    $user_id =  $profile;

                    $qry = "SELECT * FROM register_users WHERE id = '$user_id'";
                    $res = mysqli_query($con,$qry);

                    if(mysqli_num_rows($res) == 1)
                    {
                        $arr = mysqli_fetch_array($res);
                
    ?>
    <div class="container-scroller">
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
          <?php
            $profile =  $arr['id'] + 10201211;
            echo "<a class='sidebar-brand brand-logo' href='../../index.php?profile=$profile'><img src='assets/images/greenify.webp' alt='logo' /></a>";
            echo "<a class='sidebar-brand brand-logo-mini pl-4 pt-3' href='../../index.php?profile=$profile'><img src='assets/images/greenify.webp' alt='logo'/></a>";
          ?>
        </div>
        <ul class="nav">
          <li class="nav-item nav-profile mt-2">
            <a href="#" class="nav-link">
              <div class="nav-profile-image">
                <img src="assets/images/faces/face9.jpg" alt="profile" />
                <span class="login-status online"></span>
                <!--change to offline or busy as needed-->
              </div>
              <div class="nav-profile-text d-flex flex-column pr-3">
              <span class="font-weight-medium" style="font-size:20px"> <?php echo $arr['firstName']." ".$arr['lastName'] ?></span>
                <!-- <span class="font-weight-normal">$8,753.00</span> -->
              </div>
              <!-- <span class="badge badge-danger text-white ml-3 rounded">3</span> -->
            </a>
          </li>
          <li class="nav-item">
          <?php
            $profile =  $arr['id'] + 10201211;
            echo "<a class='nav-link' href='index.php?profile=$profile'>
                  <i class='mdi mdi-home menu-icon'></i>
                  <span class='menu-title'>Dashboard</span>
                  </a>"
          ?>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#my-form" aria-expanded="false" aria-controls="my-form">
              <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              <span class="menu-title">Manage Products</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="my-form">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                <?php
                  $profile =  $arr['id'] + 10201211;
                  echo "<a class='nav-link' href='pages/manage-products/add_product.php?profile=$profile'>Add Product</a>";
                ?>
                </li>
                <li class="nav-item">
                <?php
                  $profile =  $arr['id'] + 10201211;
                  echo "<a class='nav-link' href='pages/manage-products/edit_product.php?profile=$profile'>Edit Product</a>";
                ?>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item sidebar-actions">
            <div class="nav-link">
              <div class="mt-4">
                <!-- <div class="border-none">
                  <p class="text-black">Notification</p>
                </div>
                <ul class="mt-4 pl-0">
                <li> <a href="../logout.php">Sign Out</a> </li>
                </ul> -->
              </div>
            </div>
          </li>
        </ul>
      </nav>
      <div class="container-fluid page-body-wrapper">
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close mdi mdi-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-default-theme">
            <div class="img-ss rounded-circle bg-light border mr-3"></div> Default
          </div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border mr-3"></div> Dark
          </div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles light"></div>
            <div class="tiles dark"></div>
          </div>
        </div>
        <nav class="navbar col-lg-12 col-12 p-lg-0 fixed-top d-flex flex-row">
          <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
            <a class="navbar-brand brand-logo-mini align-self-center d-lg-none" href="index.php"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
            <button class="navbar-toggler navbar-toggler align-self-center mr-2" type="button" data-toggle="minimize">
              <i class="mdi mdi-menu"></i>
            </button>
            <ul class="navbar-nav navbar-nav-right ml-lg-auto">
              <li class="nav-item dropdown d-none d-xl-flex border-0">
                <a class="nav-link " id="languageDropdown" href="#" data-toggle="dropdown">
                  <i class="mdi mdi-earth"></i> English </a>
                <!-- <div class="dropdown-menu navbar-dropdown" aria-labelledby="languageDropdown">
                  <a class="dropdown-item" href="#"> French </a>
                  <a class="dropdown-item" href="#"> Spain </a>
                  <a class="dropdown-item" href="#"> Latin </a>
                  <a class="dropdown-item" href="#"> Japanese </a>
                </div> -->
              </li>
              <li class="nav-item nav-profile dropdown border-0">
                <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown">
                  <img class="nav-profile-img mr-2" alt="" src="assets/images/faces/face9.jpg" />
                  <span class="profile-name"> <?php echo $arr['firstName']." ".$arr['lastName'] ?></span>
                </a>
                <div class="dropdown-menu navbar-dropdown w-100" aria-labelledby="profileDropdown">
                  <!-- <a class="dropdown-item" href="#">
                    <i class="mdi mdi-cached mr-2 text-success"></i> Activity Log </a> -->
                  <a class="dropdown-item" href="../logout.php">
                    <i class="mdi mdi-logout mr-2 text-primary"></i> Signout </a>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        </nav>
        <div class="main-panel">
          <div class="content-wrapper pb-0">
            <div class="page-header flex-wrap">
              <h3 class="mb-0"> Hi, welcome back! <span class="pl-0 h6 pl-sm-2 text-muted d-inline-block">Your web analytics dashboard.</span>
              </h3>
            </div>
            <div class="row">
              <div class="col-xl-3 col-lg-12 grid-margin">
                <div class="row">
                  <!-- <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
                    <div class="card bg-warning">
                      <div class="card-body px-3 py-4">
                        <div class="d-flex justify-content-between align-items-start">
                          <div class="color-card">
                            <p class="mb-0 color-card-head">Users</p>
                            <h2 class="text-white"> 
                              <?php
                                $qry_users = "SELECT *  FROM register_users";
                                $res_users = mysqli_query($con,$qry_users);
                                echo mysqli_num_rows($res_users) - 1 ;
                              ?>
                            </h2>
                          </div>
                          <i class="card-icon-indicator mdi mdi-account-circle bg-inverse-icon-warning"></i>
                          
                        </div>
                      </div>
                    </div>
                  </div> -->
                  <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
                    <div class="card bg-danger">
                      <div class="card-body px-3 py-4">
                        <div class="d-flex justify-content-between align-items-start">
                          <div class="color-card">
                            <p class="mb-0 color-card-head">Products</p>
                            <h2 class="text-white"> 
                            <?php
                              $qry_products = "SELECT *  FROM add_product";
                              $res_products = mysqli_query($con,$qry_products);
                              echo mysqli_num_rows($res_products);
                            ?>
                            </h2>
                          </div>
                          <i class="card-icon-indicator mdi mdi-cube-outline bg-inverse-icon-danger"></i>
                        </div>
                        <!-- <h6 class="text-white">13.21% Since last month</h6> -->
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
                    <div class="card bg-primary">
                      <div class="card-body px-3 py-4">
                        <div class="d-flex justify-content-between align-items-start">
                          <div class="color-card">
                            <p class="mb-0 color-card-head">Orders</p>
                            <h2 class="text-white"> 
                            <?php
                              $qry_checkout = "SELECT *  FROM checkout";
                              $res_checkout = mysqli_query($con,$qry_checkout);
                              echo mysqli_num_rows($res_checkout);
                            ?>
                            </h2>
                          </div>
                          <i class="card-icon-indicator mdi mdi-briefcase-outline bg-inverse-icon-primary"></i>
                        </div>
                        <!-- <h6 class="text-white">67.98% Since last month</h6> -->
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-12 col-md-6 stretch-card pb-sm-3 pb-lg-0">
                    <div class="card bg-success">
                      <div class="card-body px-3 py-4">
                        <div class="d-flex justify-content-between align-items-start">
                          <div class="color-card">
                            <p class="mb-0 color-card-head">Revenue</p>
                            <h2 class="text-white">Rs 
                            <?php
                              $qry_rev = "SELECT sum(amount) as total FROM checkout";
                              $res_rev = mysqli_query($con,$qry_rev);
                              $data =  mysqli_fetch_assoc($res_rev);
                              echo $data['total'];
                            ?>
                            </h2>
                          </div>
                          <i class="card-icon-indicator mdi mdi-basket bg-inverse-icon-success"></i>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-9 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body px-0 overflow-auto">
                    <h4 class="card-title pl-4">Order History</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead class="bg-light">
                          <tr>
                            <th>Customer</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Amount</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php

                          $qry = "SELECT * FROM checkout ORDER BY id DESC";
                          $res = mysqli_query($con,$qry);

                          if(mysqli_num_rows($res) > 0)
                          {
                              while($arr = mysqli_fetch_array($res))
                              {

                              
                          ?>
                          <tr>
                            <td>
                              <div class="d-flex align-items-start">
                                <div class="table-user-name ">
                                  <p class="mb-0 font-weight-medium"> <?php echo $arr['fname']." ".$arr['lname']?></p>
                                  <small> Verified</small>
                                </div>
                              </div>
                            </td>
                            <td><?php echo $arr['email']?></td>
                            <td>
                              <div class="badge badge-inverse-success"> <?php echo $arr['order_status']?> </div>
                            </td>
                            <td>Rs <?php echo $arr['amount']?></td>
                          </tr>
                        <?php

                            }
                          }
                        ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <!-- <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard template</a> from Bootstrapdash.com</span> -->
            </div>
          </footer>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="assets/vendors/flot/jquery.flot.js"></script>
    <script src="assets/vendors/flot/jquery.flot.resize.js"></script>
    <script src="assets/vendors/flot/jquery.flot.categories.js"></script>
    <script src="assets/vendors/flot/jquery.flot.fillbetween.js"></script>
    <script src="assets/vendors/flot/jquery.flot.stack.js"></script>
    <script src="assets/vendors/flot/jquery.flot.pie.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
    <?php
                    }
                  }
    ?>
  </body>
</html>
<?php
    } else {
        $_SESSION['error_login'] = "Need to login First";
        header("location:../account-RL/sign-in/index.php");
    }
?>