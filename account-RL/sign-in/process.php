<?php
    session_start();
    if(isset($_POST['submit_signin'] ) && $_POST["submit_signin"]=="signin"){
        
        $userEmail = $_POST['userEmail'];
        $userPassword = $_POST['userPassword'];

        $con = mysqli_connect("localhost","root","","product_listing");

        $qry = "SELECT * FROM register_users 
        WHERE userEmail = '$userEmail' 
        AND userPassword = '$userPassword'";

        $res = mysqli_query($con,$qry);
        //object have memory cell nmore than one
        //res is object in that case

        if(mysqli_num_rows($res) == 1){
            //login
            $arr = mysqli_fetch_array($res);
            $profile =  $arr['id'] + 10201211;

            if($userEmail=="admin@admin.com")
            {
                $_SESSION['logged_in_admin'] = "admin";
                header("location:../../admin/index.php?profile=$profile");
            } else {
                $_SESSION['logged_in'] = true;
                header("location:../../site/index.php?profile=$profile");
            }
            
        }
        else
        {
            //not login
            $_SESSION['error_login'] = "Invalid email or password";
            header("location:index.php");
        }

    
    } else {
        $_SESSION['ua_msg'] = "Unsual Activity";
        header("location:index.php");
     }
?>