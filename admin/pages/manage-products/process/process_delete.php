<?php
    session_start();

    if((isset($_GET['id'])) && $_GET['id'] != ''){
        $user_id = $_GET['id'];
        $profile = $_GET['profile'] + 10201211;

    $con = mysqli_connect("localhost","root","","product_listing");

    $qry = "DELETE FROM add_product WHERE id = '$user_id'";

    $res = mysqli_query($con,$qry);

    if(isset($res) && $res!=null){
        $_SESSION['msg'] = "Product Deleted Sucessfully";
        header("location:../edit_product.php?profile=$profile");
    } else {
        $_SESSION['msg'] = "Some error occured";
        header("location:../edit_product.php?profile=$profile");
    }
    } else {
        header("location:../../../../unusual.php");
    }

    
?>