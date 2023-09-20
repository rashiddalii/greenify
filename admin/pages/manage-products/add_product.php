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
    <link rel="stylesheet" href="../../assets/vendors/select2/select2.min.css" />
    <link rel="stylesheet" href="../../assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="../../assets/css/style.css" />
    <link rel="stylesheet" href="../../assets/css/mystyle.css" />
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
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
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
                <!-- <div class="border-none">
                  <p class="text-black">Notification</p>
                </div>
                <ul class="mt-4 pl-0">
                <li> <a href="../../../logout.php">Sign Out</a> </li>
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
                  <!-- <a class="dropdown-item" href="#">
                    <i class="mdi mdi-cached mr-2 text-success"></i> Activity Log </a> -->
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
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">ADD PRODUCT</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Manage Products</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add Product</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <!-- <h4 class="card-title">Complete your Listing</h4> -->
                    <form class="form-sample" method="POST" action="process/process_add.php" enctype="multipart/form-data">
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
                    <h5 class="card-title mt-4">PHOTOS</h5>  
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Item photo</label>
                            <input type="file" name="itemPhoto" class="file-upload-default" accept="" />
                            <div class="input-group col-xs-12">
                              <input name="photo" type="text" class="form-control file-upload-info" disabled placeholder="Upload Photo" />
                              <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary"  type="button"> Upload </button>
                              </span>
                            </div>
                          </div>
                        </div>  
                      </div>
                      <h5 class="card-title mt-4">TITLE</h5>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="exampleInputName1 ">Item title</label>
                            <input name="itemTitle" type="text"  class="form-control rounded" id="exampleInputName1" placeholder="" />
                            <input value="<?php echo $profile       ?> "  name="profile" type="hidden"  class="form-control rounded" id="exampleInputName1" placeholder="" />
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleInputName1">Subtitle</label>
                            <input name="itemSubtitle" type="text" class="form-control rounded" id="exampleInputName1" placeholder="" />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleInputName1">Custom label (SKU)</label>
                            <input name="itemLabel" type="text" class="form-control rounded" id="exampleInputName1" placeholder="" />
                          </div>
                        </div>
                      </div>
                      <h5 class="card-title">CATEGORY</h5>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label >Item category</label>
                              <select name="itemCategory" class="form-control rounded">
                                <option value="Not SELECTED" > --SELECT-A-CATEGORY-- </option>
                                <option value="Trees" >Trees</option>
                                <option value="Liverworts" >Liverworts</option>
                                <option value="Flowers" >Flowers</option>
                                <option value="Annual Plant" >Annual Plant</option>
                                <option value="Orchids" >Orchids</option>
                                <option value="Seed Plants" >Seed Plants</option>
                                <option value="Grasses" >Grasses</option>
                              </select>
                          </div>
                        </div>
                      </div>
                      <h5 class="card-title mt-4">DESCRIPTION</h5>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class=" mdi mdi-alert-circle text-primary form-control bg-light" for="exampleTextarea1"> Provide a description for your item.</label>
                            <textarea
                              name="itemDescription"
                              class="form-control rounded"
                              id="exampleTextarea1"
                              rows="12"
                            ></textarea>
                          </div>
                        </div>
                      </div>
                      <h5 class="card-title mt-4">PRICING</h5>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="mdi mdi-alert-circle form-control bg-light text-primary" for="exampleTextarea1" > Enter a price. Buyers can purchase immediately at this price.</label>
                            <h6 class="card-title mt-4" >Buy it now</h6>
                          </div>
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName1">Price (Rs)</label>
                            <input  name="itemPrice" type="number" class="form-control rounded" id="exampleInputName1" placeholder="" />
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputName1">Quantity</label>
                            <input  name="itemQuantity" type="number" class="form-control rounded" id="exampleInputName1" placeholder="" />
                        </div>
                        </div>
                      </div>
                      <!-- <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleInputName1">Price</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text bg-primary text-white">$</span>
                              </div>
                              <input name="itemPrice" type="number" class="form-control" aria-label="Amount (to the nearest dollar)" />
                              <div class="input-group-append">
                                <span class="input-group-text">.00</span>
                              </div>
                            </div>
                          </div>
                        </div>  
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleInputName1">Quantity</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text bg-primary text-white">-</span>
                              </div>
                              <input name="itemQuantity" type="number" class="form-control" aria-label="Amount (to the nearest dollar)" />
                              <div class="input-group-append">
                                <span class="input-group-text">+</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div> -->
                      <div class="row mt-5">
                        <div class="col-md-12 text-right">
                          <button name="submit_add" value="Add Product" type="submit" class="btn btn-primary mr-2">Add Product</button>
                          <!-- <button class="btn btn-light">Cancel</button>  -->
                        </div>
                      </div>
                      <!-- <div class="row">
                        <div class="col-md-12">
                          <div class="file-upload">
                          <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>
                            <div class="image-upload-wrap">
                              <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
                              <div class="drag-text">
                                <h3>Drag and drop a file or select add Image</h3>
                              </div>
                            </div>
                            <div class="file-upload-content">
                              <img class="file-upload-image" src="#" alt="your image" />
                              <div class="image-title-wrap">
                                <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div> -->
                    </form>
                  </div>
                </div>
              </div>
              <!-- <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Select 2</h4>
                    <div class="form-group">
                      <label>Single select box using select 2</label>
                      <select class="js-example-basic-single" style="width: 100%;">
                        <option value="AL">Alabama</option>
                        <option value="WY">Wyoming</option>
                        <option value="AM">America</option>
                        <option value="CA">Canada</option>
                        <option value="RU">Russia</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Multiple select using select 2</label>
                      <select class="js-example-basic-multiple" multiple="multiple" style="width: 100%;">
                        <option value="AL">Alabama</option>
                        <option value="WY">Wyoming</option>
                        <option value="AM">America</option>
                        <option value="CA">Canada</option>
                        <option value="RU">Russia</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div> -->
              <!-- <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Typeahead</h4>
                    <p class="card-description">A simple suggestion engine</p>
                    <div class="form-group row">
                      <div class="col">
                        <label>Basic</label>
                        <div id="the-basics">
                          <input class="typeahead" type="text" placeholder="States of USA" />
                        </div>
                      </div>
                      <div class="col">
                        <label>Bloodhound</label>
                        <div id="bloodhound">
                          <input class="typeahead" type="text" placeholder="States of USA" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> -->
            </div>
          </div>
          <footer class="footer">
            <!-- <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard template</a> from Bootstrapdash.com</span>
            </div> -->
          </footer>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../../assets/vendors/select2/select2.min.js"></script>
    <script src="../../assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/myjs.js"></script>
    <script src="../../assets/js/file-upload.js"></script>
    <script src="../../assets/js/typeahead.js"></script>
    <script src="../../assets/js/select2.js"></script>
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