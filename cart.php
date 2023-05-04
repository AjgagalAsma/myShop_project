<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="Stickers Center Homepage">
    <title>Cartpage</title>
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link href="css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<?php
session_start();
if(!isset($_SESSION["id"])) echo "<script>window.open('customer_login.php','_self')</script>";
else $id= $_SESSION["id"];

include("functions/functions.php");
// After uploading to online server, change this connection accordingly

if(isset($_GET["add_cart"])){
    if(isset($_POST["quantity"]))add_to_cart_with_qty($id,$_GET["add_cart"],$_POST["quantity"]);
    else add_to_cart($id,$_GET["add_cart"]);
}
if(isset($_GET["delete"],$_GET["cust"])){
    delete_from_cart($_GET["cust"],$_GET["delete"]);
}

$con = mysqli_connect("localhost","root","","ecommerce");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

?>
<style>
table {
  width: 80%;
  border-collapse: collapse;
  margin: 20px auto ;
  box-shadow: 2px 2px 3px gray;
}

td, th {
  border: 1px solid gray;
  padding: 10px;
  text-align: center;
  width: 12.5%; /* or any other width you want */
}

.hhh {
    border-right: 1px solid #00800000;
}

a{
    text-decoration: none;
    color: #3D0859;
}

.tr{
    height: 60px;
}
.shop {
    color: white;
    background-color: green;
    padding: 10px;
    border-radius: 7px;
}

.check{
    color: white;
    background-color: cornflowerblue;
    padding: 10px;
    border-radius: 7px;
}
h2{
    color:#3D0859;
}

a:hover{
    margin:-2px;
    color:black;
}
.fa-trash-o{
    font-size: larger;
}
</style>
<!--Main Container starts here-->
<div class="main_wrapper">


    <!--Content wrapper starts-->
    <div class="content_wrapper">
        <div id="sidebar">
        </div>
    </div>

    <div class="col-sm-9 padding-right">
        <div class="features_items" id="products_box">
            <!--features_items-->
            <!-- <div class="container">
        <div class="col-sm-12" id="products_box"> -->
                <table align="center" width="700">
                    <tr align="center">
                        <th colspan=8 align="right"><h2>Products in your cart</h2></th>  
                    </tr>
                    <tr align="center" bgcolor="#cb8beeb7">
                        <th align="center">ID</th>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Sub Total</th>
                        <th>Save</th>
                        <th>Remove</th>
                    </tr>

                    <?php
                    $total = 0;

                    global $con;

                    $sel_price = "select * from cart where cust_id=$id";

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
                            $single_price = $pp_price['price'];
                            $values = $single_price*$p_price['qty'];
                            $total += $values;
                            ?>
                            <tr align="center">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <td><?php echo $product_id ?></td>
                                <td>
                                    <img src='./images/product_image/themes/<?php echo "$product_theme/$product_image"; ?>' width="70" height="70" />
                                </td>
                                <td><?php echo $product_title; ?></td>
                                <td><?php echo "$" . $single_price; ?></td>
                                <td><input type="text" size="4" name="qty_<?php echo $pro_id; ?>" value="<?php echo $p_price['qty']; ?>" /></td>
                                <td><?php echo "$" . $values; ?></td>
                                <td ><input type="submit" name="update_cart_<?php echo $pro_id; ?>" value="Update Cart" /></td>
                                <td><a href="cart.php?delete=<?php echo $pro_id; ?>&cust=<?php echo $id; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                                
                            </form>
                            </tr>
                        <?php 
                        if (isset($_POST["update_cart_$pro_id"])) {
                            $qty = $_POST["qty_$pro_id"];
                            $total = $total * $qty;
                            update_qty($id,$pro_id,$qty);
                            unset($_POST["update_cart_$pro_id"]);
                            echo "<script>window.open('cart.php','_self')</script>";
                        }
                        }
                    } 
                    ?>

                    <tr class="tr">
                        <td colspan="3" class="hhh "><a href="index.php" class="shop"><i class="fa fa-shopping-cart"></i> Continue Shopping</a></td>
                        <td colspan="3" class="hhh" align="left"><b>Total: <?php echo "$" . $total; ?></b></td>
                        <td colspan="2" >
                            <a href="checkout.php" class="check"><i class="fa fa-id-card" aria-hidden="true"></i>Checkout</a>
                        </td>
                    
                    </tr>
                </table>
        </div>
    </div>
    <?php
    ?>
</div>
<!--Content wrapper ends-->
<!--Main Container ends here-->

</div>

</body>
</html>