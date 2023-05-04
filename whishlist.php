<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="Stickers Center Homepage">
    <title>Cartpage</title>
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
</head>

<body>
    <?php
session_start();
if(!isset($_SESSION["id"])) echo "<script>window.open('customer_login.php','_self')</script>";
else $id= $_SESSION["id"];

include("functions/functions.php");
// After uploading to online server, change this connection accordingly

if(isset($_GET["add_wish"])){
    add_to_wish($id,$_GET["add_wish"]);
}
if(isset($_GET["delete"],$_GET["cust"])){
    delete_from_wish($_GET["cust"],$_GET["delete"]);
}

$con = mysqli_connect("localhost","root","","ecommerce");

if (mysqli_connect_errno()){
               echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>



    <!--start header-->
    <header id="header">
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
                                <li><a href="#" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                </li>
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
        <!--end header-->

        <section>
            <div class="container">
                <div class="row">


                    <div class="col-sm-12 padding-right">
                        <div class="features_items">
                            <br><h2 class="title text-center wish">My whishlist</h2><br>

                            <?php
                    
                    
                      global $con;

                      $sel_price = "select * from wishlist where cust_id=$id";
  
                      $run_price = mysqli_query($con, $sel_price);
  
                      while ($p_price = mysqli_fetch_array($run_price)) {
  
                          $pro_id = $p_price['prod_id'];
  
                          $pro_price = "select * from products where prod_id='$pro_id'";
  
                          $run_pro_price = mysqli_query($con, $pro_price);
  
                          while ($pp_price = mysqli_fetch_array($run_pro_price)) {
                              $product_id = $pp_price['prod_id'];
                              $product_title = $pp_price['prod_title'];
                              $product_theme = $pp_price['prod_theme'];
                              $product_image = $pp_price['prod_img'];
                              $product_price = $pp_price['price'];
                              echo "
                              <div class='col-sm-3'>
                                  <div class='product-image-wrapper'>
                                      <div class='single-products'>
                                          <div class='productinfo text-center'>
                                              <img src='./images/product_image/themes/$product_theme/$product_image' class='size200x300' alt='jjjjjj' />
                                              <h2 style='font-size: medium'>$product_title</h2>
                                              <p>$ $product_price</p>
                                              <a href='cart.php?add_cart=$product_id' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Add
                                              to cart</a>
                                          </div>
                                      </div>
                                      <div class='choose'>
                                          <ul class='nav nav-pills nav-justified'>
                                              <li><a href='whishlist.php?delete=$product_id&cust=$id '><i class='fa fa-trash-o' aria-hidden='true'></i>Delete</a></li>
                                              <li><a href='details.php?pro_id=$product_id'><i class='fa fa-plus-square'></i>View Details</a></li>
                                          </ul>
                                      </div>	
                                  </div>
                              </div>
                      ";
                          }
                      }
                          
                    
                    
                    
                    ?>
                        </div>


                    </div>
                </div>
            </div>
        </section>

</body>

</html>