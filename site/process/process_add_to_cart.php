<?php

//    if(isset($_POST['submitted']) && $_POST['submitted']!="Add Product"){
  //      $_SESSION['msg'] = "Not Submitted";
    ///    header("location:../edit_product.php");
    //} else {
        session_start();
        require('../common/connect.php');

        if(isset($_GET['id']) && $_GET['id'] != ''){
            $product_id = $_GET['id'];
            
            $profile = $_GET['profile'];
            $user_id =  $profile - 10201211;

            if($user_id == 0){
                $_SESSION['error_login'] = "Please login first!";   
                header("location:../../account-RL/sign-in/index.php");
            }else
            {
                $qry_check = "SELECT * FROM add_to_cart WHERE product_id = '$product_id'";
                $res_check = mysqli_query($con,$qry_check);
                
                // echo mysqli_num_rows($res_check) > 0;
                // exit;
                
                if(mysqli_num_rows($res_check) > 0){
                    $_SESSION['shop_msg'] = "Already Added to Cart!";   
                    header("location:../src/shop.php?profile=$profile");
                } else {
            
                    $qry = "INSERT INTO add_to_cart(product_id,user_id,quantity) 
                    VALUES('$product_id','$user_id','1')";

                    $res = mysqli_query($con,$qry);

                    if(isset($res) && $res!=""){
                        $_SESSION['shop_msg'] = "Added To Cart Successfully";   
                        header("location:../src/shop.php?profile=$profile");
                    } else {
                        $_SESSION['shop_msg'] = "Sorry! Some error occured";
                        header("location:../src/shop.php?profile=$profile");   
                    }
                }
            }
        }else{

            if($user_id == 0){
                $_SESSION['error_login'] = "Please login first!";   
                header("location:../../account-RL/sign-in/index.php");
            }else
            {

                $product_id = $_POST['product_id'];
                $quantity = $_POST['quantity'];

                $profile = $_GET['profile'];
                $user_id =  $profile - 10201211;
                
                if($quantity=="0"){
                    $_SESSION['cart_msg'] = "Quantity Cannot Be 0.";   
                    header("location:../src/detail.php?profile=$profile&id=$product_id");
                } else {
                    
                    // $user_id = $_POST['user_id'];
                    
                    
                    $qry_check = "SELECT * FROM add_to_cart WHERE product_id = '$product_id'";
                    $res_check = mysqli_query($con,$qry_check);
                    
                    // echo mysqli_num_rows($res_check) > 0;
                    // exit;
                    
                    if(mysqli_num_rows($res_check) > 0){
                        $_SESSION['cart_msg'] = "Already Added to Cart!";   
                        header("location:../src/detail.php?profile=$profile&id=$product_id");
                    } else {
                        $qry = "INSERT INTO add_to_cart(product_id,user_id,quantity) 
                        VALUES('$product_id','$profile','$quantity')";

                        $res = mysqli_query($con,$qry);

                        if(isset($res) && $res!=""){
                            $_SESSION['cart_msg'] = "Added To Cart Successfully";   
                            header("location:../src/detail.php?profile=$profile&id=$product_id");
                        } else {
                            $_SESSION['cart_msg'] = "Sorry! Some error occured";
                            header("location:../src/detail.php?profile=$profile&id=$product_id");   
                        }
                    }
                }
            }
        }

// }
?>