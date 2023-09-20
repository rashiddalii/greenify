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
    <title>Admin</title>
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="../../assets/vendors/flag-icon-css/css/flag-icon.min.css" />
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css" />
    <link rel="stylesheet" href="../../assets/css/style.css" />
    <link rel="shortcut icon" href="../../assets/images/logo.png" />
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
      <nav class="sidebar sidebar-offcanvas pb-5" id="sidebar">
        <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
        <?php
            $profile =  $arr['id'] + 10201211;
            echo "<a class='sidebar-brand brand-logo' href='../../index.php?profile=$profile'><img src='../../assets/images/greenify.webp' alt='logo' /></a>";
            echo "<a class='sidebar-brand brand-logo-mini pl-4 pt-3' href='../../index.php?profile=$profile'><img src='../../assets/images/greenify.webp' alt='logo'/></a>";
          ?>
        </div>
        <ul class="nav">
          <li class="nav-item nav-profile mt-2">
            <a href="#" class="nav-link">
              <div class="nav-profile-image">
                <img src="../../assets/images/faces/face9.jpg" alt="profile" />
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
              echo "<a class='nav-link' href='../../index.php?profile=$profile'>
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
                  echo "<a class='nav-link' href='../../pages/manage-products/add_product.php?profile=$profile'>Add Product</a>";
                ?>
                </li>
                <li class="nav-item">
                <?php
                  $profile =  $arr['id'] + 10201211;
                  echo "<a class='nav-link' href='../../pages/manage-products/edit_product.php?profile=$profile'>Edit Product</a>";
                ?>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item sidebar-actions">
            <div class="nav-link">
              <div class="mt-4">
                <div class="border-none">
                  <!-- <p class="text-black">Notification</p> -->
                </div>
                <ul class="mt-4 pl-0">
                <!-- <li> <a href="../../../logout.php">Sign Out</a> </li> -->
                </ul>
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
            <a class="navbar-brand brand-logo-mini align-self-center d-lg-none" href="../../index.php"><img src="../../assets/images/logo-mini.svg" alt="logo" /></a>
            <button class="navbar-toggler navbar-toggler align-self-center mr-2" type="button" data-toggle="minimize">
              <i class="mdi mdi-menu"></i>
            </button>
            <!-- <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                  <i class="mdi mdi-bell-outline"></i>
                  <span class="count count-varient1">7</span>
                </a>
                <div class="dropdown-menu navbar-dropdown navbar-dropdown-large preview-list" aria-labelledby="notificationDropdown">
                  <h6 class="p-3 mb-0">Notifications</h6>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="../../assets/images/faces/face4.jpg" alt="" class="profile-pic" />
                    </div>
                    <div class="preview-item-content">
                      <p class="mb-0"> Dany Miles <span class="text-small text-muted">commented on your photo</span>
                      </p>
                    </div>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="../../assets/images/faces/face3.jpg" alt="" class="profile-pic" />
                    </div>
                    <div class="preview-item-content">
                      <p class="mb-0"> James <span class="text-small text-muted">posted a photo on your wall</span>
                      </p>
                    </div>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="../../assets/images/faces/face2.jpg" alt="" class="profile-pic" />
                    </div>
                    <div class="preview-item-content">
                      <p class="mb-0"> Alex <span class="text-small text-muted">just mentioned you in his post</span>
                      </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0">View all activities</p>
                </div>
              </li>
              <li class="nav-item dropdown d-none d-sm-flex">
                <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown">
                  <i class="mdi mdi-email-outline"></i>
                  <span class="count count-varient2">5</span>
                </a>
                <div class="dropdown-menu navbar-dropdown navbar-dropdown-large preview-list" aria-labelledby="messageDropdown">
                  <h6 class="p-3 mb-0">Messages</h6>
                  <a class="dropdown-item preview-item">
                    <div class="preview-item-content flex-grow">
                      <span class="badge badge-pill badge-success">Request</span>
                      <p class="text-small text-muted ellipsis mb-0"> Suport needed for user123 </p>
                    </div>
                    <p class="text-small text-muted align-self-start"> 4:10 PM </p>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-item-content flex-grow">
                      <span class="badge badge-pill badge-warning">Invoices</span>
                      <p class="text-small text-muted ellipsis mb-0"> Invoice for order is mailed </p>
                    </div>
                    <p class="text-small text-muted align-self-start"> 4:10 PM </p>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-item-content flex-grow">
                      <span class="badge badge-pill badge-danger">Projects</span>
                      <p class="text-small text-muted ellipsis mb-0"> New project will start tomorrow </p>
                    </div>
                    <p class="text-small text-muted align-self-start"> 4:10 PM </p>
                  </a>
                  <h6 class="p-3 mb-0">See all activity</h6>
                </div>
              </li>
              <li class="nav-item nav-search border-0 ml-1 ml-md-3 ml-lg-5 d-none d-md-flex">
                <form class="nav-link form-inline mt-2 mt-md-0">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" />
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-magnify"></i>
                      </span>
                    </div>
                  </div>
                </form>
              </li>
            </ul> -->
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
                  <img class="nav-profile-img mr-2" alt="" src="../../assets/images/faces/face9.jpg" />
                  <span class="profile-name"> <?php echo $arr['firstName']." ".$arr['lastName'] ?></span>
                </a>
                <div class="dropdown-menu navbar-dropdown w-100" aria-labelledby="profileDropdown">
                  <!-- <a class="dropdown-item" href="#"> -->
                    <!-- <i class="mdi mdi-cached mr-2 text-success"></i> Activity Log </a> -->
                  <a class="dropdown-item" href="../../../logout.php">
                    <i class="mdi mdi-logout mr-2 text-primary"></i> Signout </a>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        </nav>
        <div class="main-panel h-100">
          <div class="content-wrapper h-100 p-4">
            <div class="page-header">
              <h3 class="page-title">EDIT PRODUCT</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Manage Prodcuts</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Edit Product </li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">ADDED PRODUCTS</h4>
                    <?php  
                        if(isset($_SESSION['msg']))
                        {
                      ?>
                      <span class="mdi mdi-clipboard-alert bg-primary col-md-12 text-white form-control">
                      <?php 
                          echo $_SESSION['msg'];
                          unset($_SESSION['msg']);
                        }
                      ?>
                      </span>
                    <div class="table-responsive ">
                      <table class="table  table-hover">
                        <thead >
                          <tr>
                            <th scope="col">Action</th>
                            <th scope="col">Photo</th>
                            <th scope="col">Title</th>
                            <!-- <th scope="col">Subtitle</th>
                            <th scope="col">Label</th> -->
                            <th scope="col">Category</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $profile =  $arr['id'];
                            $con = mysqli_connect("localhost","root","","product_listing");
                            $qry = "SELECT * FROM add_product";
                            $res = mysqli_query($con,$qry);

                            if(mysqli_num_rows($res) > 0)
                            {
                              while($arr = mysqli_fetch_array($res))
                              {
                                
                          ?>
                                <tr>
                                  <td>
                                    <?php
                                      $id =  $arr['id'];
                                      echo "<a href='update_product.php?profile=$profile&id=$id'>Update</a>"." ";
                                      echo "<a href='process/process_delete.php?profile=$profile&id=$id'>Delete</a>";
                                    ?>
                                  </td>
                                  <td>
                                    <div class="nav-profile-image">
                                      <?php
                                        echo "<img src='../../uploaded-images/".$arr['itemPhoto']."' >";
                                      ?>
                                    </div>
                                  </td>
                                  <td> <?php echo $arr['itemTitle']       ?> </td>
                                  <td> <?php echo $arr['itemCategory']    ?> </td>
                                  <td> <?php echo $arr['itemDescription'] ?> </td>
                                  <td> $<?php echo $arr['itemPrice']       ?>.00 </td>
                                  <td> <?php echo $arr['itemQuantity']    ?> </td>
                                </tr>
                          <?php
                                
                              }
                            } else {
                          ?>
                          <span class="mdi mdi-clipboard-alert bg-primary col-md-12 text-white form-control">
                              <?php
                                echo "No Product Added";
                            }
                              ?>
                              </span> <br>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <footer class="footer h-100">
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
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
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