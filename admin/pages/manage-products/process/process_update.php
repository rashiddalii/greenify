<?php
    session_start();
    $con = mysqli_connect("localhost","root","","product_listing");
   if(isset($_POST['submit_update']) && $_POST['submit_update']!="Update Product"){
       $_SESSION['msg'] = "Not Submitted";
        header("location:../edit_product.php");
    } else {
        
        $profile = $_POST['profile'] + 10201211;

        $itemTitle = $_POST['itemTitle'];
        $itemSubtitle = $_POST['itemSubtitle'];
        $itemLabel = $_POST['itemLabel'];
        $itemCategory = $_POST['itemCategory'];
        $itemDescription = $_POST['itemDescription'];
        $itemPrice = $_POST['itemPrice'];
        $itemQuantity = $_POST['itemQuantity'];
        $user_id = $_POST['id'];

        $fileName = basename($_FILES['itemPhoto']['name']);

        if($fileName!=null){
            //UPLOADIG FILE CODE STARTS
            //$fileName = basename($_FILES['itemPhoto']['name']);
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
                header("location:../update_product.php?profile=$profile&id=$user_id");   
            } 
            else if(!in_array($typeArr[1],$arrAllowedTypes)){
                $_SESSION['msg'] = "Only Images Allowed";   
                header("location:../update_product.php?profile=$profile&id=$user_id");  
            } 
            else if(!move_uploaded_file($tmp,"../../../uploaded-images/".$newFileName)){
                $_SESSION['msg'] = "Error While Uploading your file";   
                header("location:../update_product.php?profile=$profile&id=$user_id");  

            } else {

                //WHEN CONDITIONS FULFILLED STORED THE NAME OF FILE IN DATABASE
                $itemPhoto = $newFileName;
                $qry = "UPDATE add_product
                        SET itemPhoto = '$itemPhoto',
                            itemTitle = '$itemTitle',
                            itemSubtitle = '$itemSubtitle',
                            itemCategory = '$itemCategory',
                            itemDescription = '$itemDescription',
                            itemPrice = '$itemPrice',
                            itemQuantity = '$itemQuantity'
                        WHERE id = '$user_id'    ";

                $res = mysqli_query($con,$qry);

                if(isset($res) && $res!=""){
                    $_SESSION['msg'] = "Product Updated Successfully";   
                    header("location:../edit_product.php?profile=$profile");
                } else {
                    $_SESSION['msg'] = "Sorry! Some error occured";
                    header("location:../update_product.php?profile=$profile&id=$user_id");   
                }
            }
        } else{
            
                $qry = "UPDATE add_product
                        SET itemTitle = '$itemTitle',
                            itemSubtitle = '$itemSubtitle',
                            itemCategory = '$itemCategory',
                            itemDescription = '$itemDescription',
                            itemPrice = '$itemPrice',
                            itemQuantity = '$itemQuantity'
                        WHERE id = '$user_id'    ";

                $res = mysqli_query($con,$qry);
                
                if(isset($res) && $res!=""){
                    $_SESSION['msg'] = "Product Updated Successfully";   
                    header("location:../edit_product.php?profile=$profile");
                } else {
                    $_SESSION['msg'] = "Sorry! Some error occured";
                    header("location:../update_product.php?profile=$profile&id=$user_id");   
                }
        }

        

   }
?>