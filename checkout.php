<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="Stickers Center Homepage">
    <title>My Online Shop</title>
    <link rel="shortcut icon" href="images/ico/favicon.ico">
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/prettyPhoto.css" rel="stylesheet">
	<link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="css/payment.css">
</head>

<body>
    <?php 
	session_start();
	if(!isset($_SESSION["id"])) echo "<script>window.open('customer_login.php','_self')</script>";
	else $id= $_SESSION["id"];
	include("functions/functions.php");

	?>
   
        <div class="header_bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 clearfix">
                        <div class="shop-menu clearfix pull-left">
                            <ul class="nav navbar-nav">
                                <li><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
								<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Shopping Cart</a></li>
                                <li><a href="customer/my_account.php?edit_account"><i class="fa fa-user"></i> My Account</a></li>
                                <li><a href="#"><i class="fa fa-comment" aria-hidden="true"></i> Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
	<!--end header-->

    <!--Content wrapper starts-->
    <div class="content_wrapper">
		<div id="products_box">

                <?php 
				
				include("payment.php");
				
				?>

        </div>
    </div>
    <!--Content wrapper ends-->

</body>

</html>