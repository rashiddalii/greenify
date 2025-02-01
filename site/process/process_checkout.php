<?php
session_start();
require('../common/connect.php');

$email = $_POST['email'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$address = $_POST['address'];
$amount = $_POST['amount'];
$mobile = $_POST['mobile'];
$payment_method = $_POST['payment'];

$profile = $_GET['profile'];
$user_id = $profile - 10201211;

if ($user_id == 0) {
    $_SESSION['error_login'] = "Please login first!";
    header("location:../../account-RL/sign-in/index.php");
    return;
}

$qry = "INSERT INTO checkout(email, fname, lname, payment_method, address, mobile, amount, user_id, order_status) 
VALUES('$email', '$fname', '$lname', '$payment_method', '$address', '$mobile', '$amount', '$user_id', 'PENDING')";
$res = mysqli_query($con, $qry);

if ($res) {
    // Step 1: Fetch user's cart items
    $cart_qry = "SELECT product_id, quantity FROM add_to_cart WHERE user_id = '$user_id'";
    $cart_res = mysqli_query($con, $cart_qry);

    while ($cart_item = mysqli_fetch_assoc($cart_res)) {
        $product_id = $cart_item['product_id'];
        $cart_quantity = $cart_item['quantity'];

        // Step 2: Reduce the product quantity in add_product table
        $update_qry = "UPDATE add_product 
                       SET itemQuantity = GREATEST(itemQuantity - $cart_quantity, 0) 
                       WHERE id = '$product_id'";
        mysqli_query($con, $update_qry);
    }

    // Step 3: Remove items from cart after order placement
    $delete_cart_qry = "DELETE FROM add_to_cart WHERE user_id = '$user_id'";
    mysqli_query($con, $delete_cart_qry);

    // Step 4: Redirect based on payment method
    if ($payment_method == 1) {
        header("location:../stripe/index.php?amount=$amount&profile=$profile");
    } else {
        $_SESSION['op_msg'] = "Order Placed Successfully";
        header("location:../src/orders.php?profile=$profile");
    }
} else {
    $_SESSION['op_msg'] = "Some Error Occurred";
    header("location:../src/checkout.php?profile=$profile");
}
?>
