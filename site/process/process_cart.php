<?php
   session_start();
   require('../common/connect.php');


   if(isset($_POST['submitted']) && $_POST['submitted']!="Checkout"){
       $_SESSION['msg'] = "Not Submitted";   
       header("location:../src/cart.php");
    } else {

        $profile = $_GET['profile'];
        $user_id =  $profile - 10201211;

        if($user_id == 0){
            $_SESSION['error_login'] = "Please login first!";   
            header("location:../../account-RL/sign-in/index.php");
        }else{


            $shippingAmount = $_POST['shippingAmount'];
            $grandTotal = $_POST['grandTotal'];
            $subTotal =  $_POST['subTotal'];

            if($subTotal == 0){
                $_SESSION['ct_msg'] = "Please add to cart first!";
                header("location:../src/cart.php?profile=$profile");   
                return;
            }

        // if(isset($_POST['profile'])){
        //     $user_id = $_POST['profile'];
        // }else{
        //     $user_id = 0;
        // }

        $qry_check = "SELECT * FROM shopping_cart WHERE user_id = '$user_id'";
        $res_check = mysqli_query($con,$qry_check);

        if(mysqli_num_rows($res_check) == 0){
            
            $qry = "INSERT INTO shopping_cart(subTotal,shippingAmount,grandTotal,user_id) 
                    VALUES('$subTotal','$shippingAmount','$grandTotal','$user_id')";

            $res = mysqli_query($con,$qry);

            
            if(isset($res) && $res!=""){
                header("location:../src/checkout.php?profile=$profile");   
            } else {
                $_SESSION['ct_msg'] = "Sorry! Some error occured";
                header("location:../src/cart.php?profile=$profile");   
            }
        }else{
            $qry = "UPDATE shopping_cart
                    SET grandTotal = '$grandTotal',
                    shippingAmount = '$shippingAmount',
                    subTotal = '$subTotal' 
                    WHERE user_id = '$user_id'";

            $res = mysqli_query($con,$qry);

                        
            if(isset($res) && $res!=""){
                header("location:../src/checkout.php?profile=$profile");   
            } else {
                $_SESSION['ct_msg'] = "Sorry! Some error occured";
                header("location:../src/cart.php?profile=$profile");   
            }
        }
    }  

   }
?>