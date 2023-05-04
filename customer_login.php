<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stickers-Center | Login </title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <!--    DO NOT DELETE THESE 4 LINES    -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <link rel="stylesheet" href="./css/style_login.css">
    <script type="text/javascript" href="index.js"></script>
</head>
<body>

<?php
   include_once("functions/functions.php");

   session_start();
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       if(isset($_POST["email"]) && isset($_POST["pass"])){
           if(login($_POST["email"],$_POST["pass"])==1){
               header("location:index.php");
           }
           else if(login($_POST["email"],$_POST["pass"])==2)$error="password not matched";
           else $error="user not exist";
       }                     
   }
?>
<header id="header">
        <!--header-->
        <div class="header_top">
            <!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> +212 622726943</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> ajgagalasmae100@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header_top-->

        <div class="header-middle">
            <!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-md-4 clearfix">
                        <div class="logo pull-left">
                            <a href="index.php"><img src="images/home/logo3.jpg" alt="" /></a>
                        </div>
                    </div>
                    <div class="col-md-8 clearfix">
                        <div class="shop-menu clearfix pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="customer/my_account.php?edit_account"><i class="fa fa-user"></i> Account</a></li>
                                <li><a href="whishlist.php"><i class="fa fa-star"></i> Wishlist</a></li>
                                <li><a href="checkout.php"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                <li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-middle-->
    </header>
    <div class="container">
    <div class="con">
        <h2>Login now</h2>
        <?php
            if(isset($error)){
                echo "<h3 class='error'>$error</h3>";
            }                               
        ?>
        <div class="form">
                <form method="post">
                <label for="email">email</label>
                <input type="email" name="email" placeholder="Enter your email" required>
                <label for="password">password</label>
                <input type="password"  name="pass" placeholder="Enter your password" required>
                <input class="submit" type="submit" value="login">
                <a href="customer_register.php">Register now</a>
                </form>
            
        </div>
    </div>
    </div>
   
</body>
</html>