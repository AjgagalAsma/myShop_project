<!DOCTYPE>
<?php 
session_start();
if(!isset($_SESSION["id"])) echo "<script>window.open('../customer_login.php','_self')</script>";
else $id= $_SESSION["id"];

?>
<html>

<head>
    <title>My Online Shop</title>




    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/prettyPhoto.css" rel="stylesheet">
    <link href="../css/price-range.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/responsive.css" rel="stylesheet">

    <link rel="shortcut icon" href="images/favicon.ico">
</head>

<body>

    <!--Main Container starts here-->
    <header id="header">
        <div class="header-middle">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 clearfix">
                        <div class="logo pull-left">
                            <a href="../index.php"><img src="images/logo3.jpg" alt="" /></a>
                        </div>
                    </div>
                    <div class="col-md-8 clearfix">
                        <div class="shop-menu clearfix pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="../index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                                <li><a href="my_account.php?edit_account"><i class="fa fa-user"></i> My Account</a></li>
                                <li><a href="../cart.php"><i class="fa fa-shopping-cart"></i> Shopping Cart</a></li>
                                <li><a href="#"><i class="fa fa-comment" aria-hidden="true"></i> Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <h2 class="title text-center">My Account</h2>

        <div class="header-bottom">
            <!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">

                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a id="edit" href="my_account.php?edit_account">Edit Account</a></li>
                                <li><a id="order" href="my_account.php?my_orders">My Orders</a></li>
                                <li><a id="delete" href="my_account.php?delete_account">Delete Account</a></li>
                                <li><a href="../customer_logout.php">Logout</a></li>
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

    </header>
    <div class="main_wrapper">

        <!--Content wrapper starts-->
        <div class="content_wrapper">
            <div id="content_area">
                <?php 
                if(isset($_GET['my_orders'])){
                    include("my_orders.php");
                }
				if(isset($_GET['edit_account'])){
				    include("edit_account.php");
				}
				if(isset($_GET['delete_account'])){
				    include("delete_account.php");
				}
				
				
				?>
            </div>
        </div>
    </div>
</body>

</html>