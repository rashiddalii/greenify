<?php
   session_start();

   if(isset($_POST["submit_signup"] ) && $_POST["submit_signup"]=="signup"){

   
        

   //Step 1: Grab all the data from $_post array and save it in variables
    $userEmail = $_POST['userEmail'];
    $userPassword = $_POST['userPassword'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];



    //Step 2: Connect to the server
    $con = mysqli_connect("localhost","root","","product_listing");

    $qry_check = "SELECT * FROM register_users WHERE userEmail = '$userEmail'";
    $res_check = mysqli_query($con,$qry_check);

    if(mysqli_num_rows($res_check)==1){
         $_SESSION['rmsg'] = "Email Already Exists";
         header("location:index.php");
    } else {
          //step 3: write your query
         $qry = "INSERT INTO register_users(userEmail,userPassword,firstName,lastName,gender,address) 
         VALUES('$userEmail','$userPassword','$firstName','$lastName','$gender','$address')";


         //step4: execute your query
         $res = mysqli_query($con,$qry);

         if(isset($res) && $res != ""){
            $_SESSION['rmsg'] = "Registered Sucessfully";
            header("location:../sign-in/index.php");
         } else{
            $_SESSION['rmsg'] = "Some Error occured";
            header("location:index.php");
         }

    }

   } else {
      $_SESSION['ua_msg'] = "Unsual Activity";
      header("location:index.php");
   }


?>