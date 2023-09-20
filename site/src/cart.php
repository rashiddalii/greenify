<?php
    session_start();  
    require('../common/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SHOPPING CART - GREENIFY</title>
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
                    <span class="breadcrumb-item active">Shopping Cart</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <?php  
        if(isset($_SESSION['ct_msg']))
        {
    ?>
            <div class="container-fluid">
                <div class="row px-xl-5">
                    <div class="col-12">
                    <span class="mdi mdi-clipboard-alert bg-success col-md-12 text-white form-control">
    <?php 
            echo $_SESSION['ct_msg'];
            unset($_SESSION['ct_msg']);
        }
    ?>
                    </span>
                    </div>
                </div>
            </div> 
    
            <br>

    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                    <table class="table table-light table-borderless table-hover text-center mb-0">

                        <thead class="thead-dark">
                            <tr>
                                <th class="bg-success">Products</th>
                                <th class="bg-success">Quantity</th>
                                <th class="bg-success">Price</th>
                                <th class="bg-success">Total</th>
                                <th class="bg-success">Remove</th>
                            </tr>
                        </thead>
                        <?php
                                    $profile = $_GET['profile'];
                                    $user_id =  $profile - 10201211;
                                ?>
                        
                        <tbody class="align-middle">
                        <?php
                                $qry = "SELECT * FROM add_to_cart WHERE user_id = '$user_id'";
                                $res = mysqli_query($con,$qry);

                                if(mysqli_num_rows($res) > 0)
                                {
                                while($arr = mysqli_fetch_array($res))
                                {
                                    $product_id = $arr['product_id'];
                                    $qry_info = "SELECT * FROM add_product WHERE id='$product_id'";

                                    $res_info = mysqli_query($con,$qry_info);

                                    if(mysqli_num_rows($res_info) == 1)
                                    {
                                        $arr_info = mysqli_fetch_array($res_info);
                                    

                            ?>
                            <tr>
                                <td class="align-middle" > 
                                    <?php
                                        echo "<img src='../../admin/uploaded-images/".$arr_info['itemPhoto']."' style='width: 50px;' >";
                                        echo $arr_info['itemTitle'];
                                    ?>
                                    
                                </td>


                                <td class="align-middle " >
                                    <div class="input-group quantity mx-auto" style="width: 100px;">
                                        <!-- <div class="input-group-btn">
                                            <button class="btn btn-sm btn-success btn-minus"  onchange="subTotal()" type="button">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div> -->
                                            <input name="quantity" type="number" min="1" max="<?php echo $arr_info['itemQuantity']?>" class="form-control form-control-sm text-center iquantity" onchange="subTotal()" value="<?php echo $arr['quantity'];?>" >
                                        <!-- <div class="input-group-btn" >
                                            <button class="btn btn-sm btn-success btn-plus" type="button" >
                                                <i class="fa fa-plus" ></i>
                                            </button>
                                        </div> -->
                                    </div>
                                </td>
                                    
                                <td class="align-middle ">Rs <?php echo $arr_info['itemPrice'];?>.00
                                    <input type="hidden" class="iprice"  value="<?php echo $arr_info['itemPrice'];?>">
                                </td>
                                
                                </td>
                                    <td class="align-middle">Rs <span class="itotal"></span>.00
                                </td>
                                
                                <form action="../process/process_delete.php?profile=<?php echo $profile?>" method="POST">                    
                                    <td class="align-middle">
                                        <input <input type="hidden" name="product_id"  value="<?php echo $product_id?>">
                                        <button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
                                    </td>
                                </form>
                                
                            </tr>
                        <?php
                                    }
                                }
                                } 
                            ?>
                            </tbody>
                            
                    </table>

            </div>

            
                
            <div class="col-lg-4">
                <?php
                                $profile = $_GET['profile'];
                                $user_id =  $profile - 10201211;
                ?>
            <form action="../process/process_cart?profile=<?php echo $profile ?>" method="POST">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>Rs <span id="stotal"></span>.00</h6>
                            <input name="subTotal" id="subTotal"  type="hidden">
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium" >Rs 100</h6>
                            <input name="shippingAmount" id="shippingAmount" value="10" type="hidden">
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Grand Total</h5>
                            <h5>Rs <span id="gtotal"></span>.00</h5>
                            <input name="grandTotal" id="grandTotal"  type="hidden">
                        </div>
                    </div>
                </div>
                <!-- <?php
                    if(isset($_GET['profile'])){
                        $profile = $_GET['profile'];
                    ?>
                        <input name="profile" id="profile" value="<?php $profile?>" type="hidden">
                <?php                
                    }
                ?> -->
                
                <button type="submit" name="submitted" value="Checkout" class="btn btn-block btn-success font-weight-bold my-3 py-3" >Proceed To Checkout</button>
            </form>
            </div>

        </div>
    </div>

    <!-- Cart End -->


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


<script>
    var st=0;
    var iprice = document.getElementsByClassName('iprice');
    var iquantity = document.getElementsByClassName('iquantity');
    var itotal = document.getElementsByClassName('itotal');
    var stotal = document.getElementById('stotal');
    var gtotal = document.getElementById('gtotal');
    var subTotalInput = document.getElementById('subTotal');
    var grandTotalInput = document.getElementById('grandTotal');

    function subTotal()
    {
        st=0;
        for(i=0;i<iprice.length;i++)
        {
            itotal[i].innerText = (iprice[i].value)*(iquantity[i].value);
            itotal[i].innerText = itotal[i].innerText;
            st=st+(iprice[i].value)*(iquantity[i].value);
        }
        stotal.innerText = st;
        subTotalInput.value = st;

        gtotal.innerText=st+100;
        grandTotalInput.value = st+100;
    }
    subTotal();
</script>

    
</body>
</html>


