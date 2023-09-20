<?php
    session_start();
    session_destroy();
    
    session_start();
    $_SESSION['error_login'] = "Unusual Attempt";
    header("location:account-RL/sign-in/index.php");
?>
