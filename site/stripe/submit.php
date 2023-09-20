<?php
session_start();
require('config.php');

if(isset($_POST['stripeToken'])){

    $profile = $_GET['profile'];
    $user_id =  $profile - 10201211;

    $token = $_POST['stripeToken'];
    $amount = $_GET['amount'];

    $data = \Stripe\Charge::create(array
    (
        "amount"=>$amount,
        "currency"=>"PKR",
        "description"=>"",
        "source"=>$token 
    )
    );
    
    $_SESSION['op_msg'] = "Order Placed Sucessfully";
    header("location:../src/orders.php?profile=$profile");

}else{
    echo"ERROR";
}
?>