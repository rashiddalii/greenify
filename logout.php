<?php
    session_start();
    session_destroy();
    
    session_start();
    $_SESSION['logout_msg'] = "Logout Sucessfully";
    header("location:account-RL/sign-in/index.php");
?>