<section class="payment-form dark">
    <div class="container">
        <div class="block-heading">
            <h2>Payment</h2>
        </div>
        <div class="form">
            <div class="products">
                <h3 class="title">Checkout</h3>
                <?php 
		include("includes/db.php"); 
                    $total = 0;
                    $i=0;

                    global $con;

                    $sel_price = "select * from cart where cust_id=$id";

                    $run_price = mysqli_query($con, $sel_price);

                    while ($p_price = mysqli_fetch_array($run_price)) {

                        $pro_id = $p_price['prod_id'];
                        $i++;

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
                <div class="item">
                    <span class="price"><?php echo $single_price."$" ;?></span>
                    <p class="item-name"><?php echo "Product ".$i." : ".$product_title;?></p>
                    <p class="item-description"><?php echo "qutity : ".$p_price['qty'] ;?></p>
                </div>
                <?php
                        }
                    }

?>
                <div class="total">Total<span class="price"><?php echo $total."$" ;?></span></div>
            </div>
            <h2 align="center" style="padding:2px;">Pay now with Paypal:</h2>

            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

                <!-- Identify your business so that you can collect the payments. -->
                <input type="hidden" name="business" value="sriniv_1293527277_biz@inbox.com">

                <!-- Specify a Buy Now button. -->
                <input type="hidden" name="cmd" value="_xclick">

                <!-- Specify details about the item that buyers will purchase. -->
                <input type="hidden" name="amount" value="<?php echo $total; ?>">
                <input type="hidden" name="currency_code" value="USD">

                <input type="hidden" name="return" value="http://localhost/myshop/paypal_success.php" />
                <input type="hidden" name="cancel_return"
                    value="http://localhost/myshop/paypal_cancel.php" />

                <!-- Display the payment button. -->
                <input align="center" type="image" name="submit" border="0" src="paypal_button.png"
                    alt="PayPal - The safer, easier way to pay online">
                <img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif">

            </form>
        </div>
    </div>
</section>