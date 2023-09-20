<?php
   session_start();
   require('../common/connect.php');

//    if(isset($_POST["submit_signup"] ) && $_POST["submit_signup"]=="signup"){



   //Step 1: Grab all the data from $_post array and save it in variables
    $email = $_POST['email'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $amount = $_POST['amount'];
    $mobile = $_POST['mobile'];
    $payment_method = $_POST['payment'];

    $profile = $_GET['profile'];
    $user_id =  $profile - 10201211;

    if($user_id == 0){
        $_SESSION['error_login'] = "Please login first!";   
        header("location:../../account-RL/sign-in/index.php");
        return;
    }

    
    // if(isset($_POST['user_id'])){
    //     $user_id = $_POST['user_id'];
    // }else{
    //     $user_id = 0;
    // }
    
    //step 3: write your query
    $qry = "INSERT INTO checkout(email,fname,lname,payment_method,address,mobile,amount,user_id,order_status) 
    VALUES('$email','$fname','$lname','$payment_method','$address','$mobile','$amount','$user_id','PENDING')";


    //step4: execute your query
    $res = mysqli_query($con,$qry);

    if(isset($res) && $res != ""){
        if($payment_method==1){
            header("location:../stripe/index.php?amount=$amount&profile=$profile");
        }else{
            $_SESSION['op_msg'] = "Order Placed Sucessfully";
            header("location:../src/orders.php?profile=$profile");
        }
    } else{
        $_SESSION['op_msg'] = "Some Error occured";
        header("location:../src/checkout.php?profile=$profile");
    }



//    } else {
//       $_SESSION['msg'] = "Unsual Activity";
//       header("location:index.php");
//    }


?>