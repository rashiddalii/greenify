<?php
      session_start();      
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
    <link rel="shortcut icon" href="../../assets/images/logo.jpg" />
  </head>
  <body>
    
  <?php
                if(isset($_SESSION['logged_in_admin']) && $_SESSION['logged_in_admin'] == "admin")
                {
                    //$con = mysqli_connect("localhost","root","","product_listing");
                    $profile = $_GET['profile'];
                    // $user_id =  $profile;

                    // $qry = "SELECT * FROM register_users WHERE id = '$user_id'";
                    // $res = mysqli_query($con,$qry);

                    // if(mysqli_num_rows($res) == 1)
                    // {
                    //     $arr = mysqli_fetch_array($res);
                    //     $profile =  $arr['id'] + 10201211;
                
    ?>

    <div class="container-scroller bg-info">
      <div class="container">
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">UPDATE PRODUCT</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Manage Products</a></li>
                  <li class="breadcrumb-item"><a href="#">Edit Product</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Update Product</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <!-- <h4 class="card-title">Complete your Listing</h4> -->
                    <form class="form-sample" method="POST" action="process/process_update.php" enctype="multipart/form-data">
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
                        <?php
                            $con = mysqli_connect("localhost","root","","product_listing");
                            $user_id =  $_GET['id'];
                            $qry = "SELECT * FROM add_product WHERE id = '$user_id'";
                            $res = mysqli_query($con,$qry);

                            if(mysqli_num_rows($res) == 1)
                            {
                                $arr = mysqli_fetch_array($res);
                          ?>
                                <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Item photo</label>
                                        <input type="file" name="itemPhoto" class="file-upload-default" accept="image/*" "/>
                                        <div class="input-group col-xs-12">
                                        <input value="<?php echo $arr['itemPhoto']       ?> " name="photo" type="text" class="form-control file-upload-info" disabled placeholder="Upload Photo" />
                                        <span class="input-group-append">
                                            <button name="Upload" value="upload" class="file-upload-browse btn btn-primary"  type="button">Upload</button>
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
                                        <input value="<?php echo $arr['itemTitle']       ?> "  name="itemTitle" type="text"  class="form-control rounded" id="exampleInputName1" placeholder="" />
                                        <input value="<?php echo $profile       ?> "  name="profile" type="hidden"  class="form-control rounded" id="exampleInputName1" placeholder="" />
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputName1">Subtitle</label>
                                        <input value="<?php echo $arr['itemSubtitle']    ?>" name="itemSubtitle" type="text" class="form-control rounded" id="exampleInputName1" placeholder="" />
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputName1">Custom label (SKU)</label>
                                        <input value="<?php echo $arr['itemLabel']       ?>" name="itemLabel" type="text" class="form-control rounded" id="exampleInputName1" placeholder="" />
                                    </div>
                                    </div>
                                </div>
                                <h5 class="card-title">CATEGORY</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label >Item category</label>
                                        <select name="itemCategory" class="form-control rounded">
                                            <option value="NOT SELECTED" > --SELECT-A-CATEGORY-- </option>
                                            <option value="Trees" <?php if($arr['itemCategory'] == 'Trees'){ ?> selected <?php } ?> >Trees</option>
                                            <option value="Liverworts"  <?php if($arr['itemCategory'] == 'Liverworts'){ ?> selected <?php } ?> >Liverworts</option>
                                            <option value="Flowers" <?php if($arr['itemCategory'] == 'Flowers'){ ?> selected <?php } ?> >Flowers</option>
                                            <option value="Annual Plant" <?php if($arr['itemCategory'] == 'Annual Plant'){ ?> selected <?php } ?> >Annual Plant</option>
                                            <option value="Orchids" <?php if($arr['itemCategory'] == 'Orchids'){ ?> selected <?php } ?> >Orchids</option>
                                            <option value="Seed Plants" <?php if($arr['itemCategory'] == 'Seed Plants'){ ?> selected <?php } ?> >Seed Plants</option>
                                            <option value="Grasses" <?php if($arr['itemCategory'] == 'Grasses'){ ?> selected <?php } ?> >Grasses</option>
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
                                        ><?php echo $arr['itemDescription'] ?></textarea>
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
                                        <input value="<?php echo $arr['itemPrice']       ?>" name="itemPrice" type="number" class="form-control rounded" id="exampleInputName1" placeholder="" />
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputName1">Quantity</label>
                                        <input value="<?php echo $arr['itemQuantity']       ?>" name="itemQuantity" type="number" class="form-control rounded" id="exampleInputName1" placeholder="" />
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
                                        <input name="itemPrice" type="number" class="form-control"  value=" <?php echo $arr['itemPrice']       ?> "/>
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
                                        <input  name="itemQuantity" type="number" class="form-control"  value=" <?php echo $arr['itemQuantity']   ?> "/>
                                        <div class="input-group-append">
                                            <span class="input-group-text">+</span>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div> -->
                                <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="hidden" value="<?php echo $arr['id']?>" name="id"> 
                                    </div>
                                    </div>
                                </div>
                                
                      <?php
                              }
                          ?>
                      <div class="row mt-5">
                        <div class="col-md-12 text-right">
                          <button name="submit_update" value="Update Product" type="submit" class="btn btn-primary mr-2">Update Product</button>
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
            </div>
          </div>
          <!-- <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard template</a> from Bootstrapdash.com</span>
            </div>
          </footer> -->
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
    ?>
  </body>
</html>