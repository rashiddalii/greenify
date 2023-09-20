<?php
require('config.php');
$profile = $_GET['profile'];
$user_id =  $profile - 10201211;
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Payment</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="shortcut icon" href="../img/logo.png" />
    <style>
        .container{
            margin-top: 20px;
            padding: 70px;
            
        }

        .images{
            display: flex;
            align-items: center;
            justify-content: center;
            justify-items: center;
            padding: 14px;
            margin-bottom: 34px;
        }
        .img1{
            height: 100px;
            width: 194px;
            margin-right: 34px;
        }
        .img2{
            width: 104px;
            margin-right: 34px;
        }
        .img3{
            height: 94px;
            width: 194px;
        }
        h9{
            color: red;
            margin-bottom: 14px;
        }
    </style>
  </head>
  <body>
<center>
<div class="container">

<div class="images">
<img class="img1" src="./stripe-php-master/img/1.jpg" alt="#">
<img class="img2" src="./stripe-php-master/img/2.png" alt="#">
<img class="img3" src="./stripe-php-master/img/3.jpg" alt="#">
</div>
<strong><h1>"SECURE PAYMENT METHOD"</h1></strong> <br> 
<strong><h9>100% SECURE AND TRUSTED BY TRUSTPILOT AND GOOGLE</h9></strong>

  <form action="submit.php?amount=<?php echo $_GET['amount']*100?>&profile=<?php echo $profile?>" method="POST">
    <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="<?php echo $publisKey ?>"
    data-amount="<?php echo $_GET['amount']*100?>"
    data-name="Secure Payment Service"
    data-description=""
    data-image="../img/logo.png"
    data-currency="PKR"
    ></script>
  </form>
</div>
</center>
  </body>
</html>