<?php
    session_start();
    include("../common/connect.php");

    if((isset($_POST['product_id'])) && $_POST['product_id'] != ''){
        $product_id = $_POST['product_id'];
        $profile = $_GET['profile'];
        $user_id =  $profile - 10201211;

        $qry = "DELETE FROM add_to_cart WHERE product_id = '$product_id'";

        $res = mysqli_query($con,$qry);

        if(isset($res) && $res!= null){
            $_SESSION['ct_msg'] = "Removed Sucessfully";
            header("location:../src/cart.php?profile=$profile");
        } else {
            $_SESSION['ct_msg'] = "Some error occured";
            header("location:../src/cart.php?profile=$profile");
        }
    } else {
        $_SESSION['error_login'] = "Unusual Attempt";
        header("location:../src/cart.php?profile=$profile");
    }

    
?>