<?php
    session_start();
    $con = mysqli_connect("localhost","root","","product_listing");
    if(isset($_POST['submit_add']) && $_POST['submit_add']!="Add Product"){
        $_SESSION['msg'] = "Not Submitted";
        header("location:../add_product.php");
    } else {
        

        $profile = $_POST['profile'] ;
        $vendor_id = $profile - 10201211;
        $itemTitle = $_POST['itemTitle'];
        $itemSubtitle = $_POST['itemSubtitle'];
        $itemLabel = $_POST['itemLabel'];
        $itemCategory = $_POST['itemCategory'];
        $itemDescription = $_POST['itemDescription'];
        $itemPrice = $_POST['itemPrice'];
        $itemQuantity = $_POST['itemQuantity'];

        //UPLOADIG FILE CODE STARTS
         $fileName = basename($_FILES['itemPhoto']['name']);
        $tmp = $_FILES['itemPhoto']['tmp_name']; 
        $size = $_FILES['itemPhoto']['size']; 

        
        
        $type = $_FILES['itemPhoto']['type'];
        $typeArr = explode("/",$type);
        $newFileName = $typeArr[0].date("Ymdhsi").".".$typeArr[1];
        $arrAllowedTypes = array("jpg","png","jpeg","gif","webp","avif");
        //UPLOADIG FILE CODE END

        //CONDITIONS FOR THE UPLOADING FILE
        if($size > 2097152){
            $_SESSION['msg'] = "File size exceeds the limit";   
            header("location:../add_product.php");
        } 
        else if(!in_array($typeArr[1],$arrAllowedTypes)){ 
            $_SESSION['msg'] = "Only Images Allowed";   
            header("location:../add_product.php");
        } 
        else if(!move_uploaded_file($tmp,"../../../uploaded-images/".$newFileName)){
            $_SESSION['msg'] = "Error While Uploading your file";   
            header("location:../add_product.php");

        } else {
            //WHEN CONDITIONS FULFILLED STORED THE NAME OF FILE IN DATABASE
            $itemPhoto = $newFileName;
            
            
        
            $qry = "INSERT INTO add_product(itemPhoto,itemTitle,itemSubtitle,itemLabel,itemCategory,itemDescription,itemPrice,itemQuantity) 
                    VALUES('$itemPhoto','$itemTitle','$itemSubtitle','$itemLabel','$itemCategory','$itemDescription','$itemPrice','$itemQuantity')"; 
            
            $res = mysqli_query($con,$qry);
            
            if(isset($res) && $res != ""){
                $_SESSION['msg'] = "Product added successfully";
            } else{
                $_SESSION['msg'] = "Some error occured";
            }
            
            header("location:../add_product.php?profile=$profile");
        }

    }
?>