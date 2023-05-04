<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="
    <?php
    if (isset($metaD)) {
        echo $metaD;
    } else {
        echo "Stickers-Center is a professional online store for home decoration and design.";
    }
    ?>">
    <meta name="author" content="Stickers Center">
    <title>
        <?php
        if (isset($title)) {
            echo $title;
        } else {
            echo "Stickers-Center";
        } ?>
    </title>
    
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
    <script type="text/javascript" href="index.js"></script>
</head>

<body>
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
                                <?php
                                    if(!isset($_SESSION["name"])){
                                        echo "<li><a href='customer_login.php'><i class='fa fa-lock'></i> Login</a></li>";
                                    }
                                    else{
                                        echo "<li><a href='customer_logout.php'><i class='fa fa-lock'></i> Logout</a></li>";
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-middle-->

        <div class="header-bottom">
            <!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">

                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="index.php" class="active">Home</a></li>
                                <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="">Products</a></li>
                                        <li><a href="">Checkout</a></li>
                                        <li><a href="cart.php">Cart</a></li>
                                        <li>
                                            <?php
                                                if(!isset($_SESSION["name"])){
                                                    echo "<li><a href='customer_login.php'>Login</a></li>";
                                                }
                                                else{
                                                    echo "<li><a href='customer_logout.php'>Logout</a></li>";
                                                }
                                            ?>
                                        </li>
                                    </ul>
                                </li> 
                                <li class="dropdown"><a href="#">Blog<i></i></a>
                                </li>
                                <li><a href="">Best Sellers</a></li>
                                <li><a href="">Contact</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="search_box pull-right">
                            <form method="get" action="results.php" enctype="multipart/form-data">
                                <input type="text" name="user_query" placeholder="Enter a keyword" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-bottom-->
    </header>
    <!--/header-->
