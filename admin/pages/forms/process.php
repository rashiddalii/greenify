<?php

    if(isset($_POST['submitted']) && $_POST['submitted']!="Add Product"){
        $_SESSION['msg'] = "Not Submitted";
        header("location:basic_elements.php");
    } else {
        session_start();

        $itemPhoto = $_POST['itemPhoto'];
        $itemTitle = $_POST['itemTitle'];
        $itemSubtitle = $_POST['itemSubtitle'];
        $itemLabel = $_POST['itemLabel'];
        $itemCategory = $_POST['itemCategory'];
        $itemDescription = $_POST['itemDescription'];
        $itemPrice = $_POST['itemPrice'];
        $itemQuantity = $_POST['itemQuantity'];

        $con = mysqli_connect("localhost","root","","product_listing");
        

        $qry = "INSERT INTO add_product(itemPhoto,itemTitle,itemSubtitle,itemLabel,itemCategory,itemDescription,itemPrice,itemQuantity) 
                VALUES('$itemPhoto','$itemTitle','$itemSubtitle','$itemLabel','$itemCategory','$itemDescription','$itemPrice','$itemQuantity')";
        
        $res = mysqli_query($con,$qry);
        
        if(isset($res) && $res != ""){
            $_SESSION['msg'] = "Product added successfully";
        } else{
            $_SESSION['msg'] = "Some error occured";
        }
        
        header("location:basic_elements.php");

    }
?>