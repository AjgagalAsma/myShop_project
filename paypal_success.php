<?php 
session_start(); 
$id= $_SESSION["id"];
?>



<html>

<head>
    <title>Payment Successful!</title>
</head>

<body>
    <?php 
		include("includes/db.php");
		include("functions/functions.php");
		
		//this is all for product details
		
		$total = 0;

        global $con;

        $sel_price = "select * from cart where cust_id=$id";

        $run_price = mysqli_query($con, $sel_price);

        while ($p_price = mysqli_fetch_array($run_price)) {

                        $pro_id = $p_price['prod_id'];
						$qty=$p_price['qty'];

                        $pro_price = "select * from products where prod_id='$pro_id'";

                        $run_pro_price = mysqli_query($con, $pro_price);

                        while ($pp_price = mysqli_fetch_array($run_pro_price)) {
                            $product_title = $pp_price['prod_title'];
                            $single_price = $pp_price['price'];
                            $values = $single_price*$p_price['qty'];
                            $total += $values;
                        
			
	
			
			// this is about the customer
			$user = $_SESSION['email'];
				
			$get_c = "select * from customers where cus_id='$id'";
				
			$run_c = mysqli_query($con, $get_c); 
				
			$row_c = mysqli_fetch_array($run_c); 
				
			$c_id = $id;
			$c_email = $row_c['cus_email'];
			$c_name = $row_c['cus_name']; 
			
			//payment details from paypal
			
			// the payment amount
			$amount = $_GET['amt']; 
			// the currency code (e.g., USD, EUR)
			$currency = $_GET['cc']; 
			// the transaction ID
			$trx_id = $_GET['tx']; 
			// invoice number
			$invoice = mt_rand();

				
			//inserting the payment to table 
			$insert_payment = "insert into payments (product_id,amount,customer_id,trx_id,currency) values ('$pro_id','$amount','$c_id','$trx_id','$currency')";
			$run_payment = mysqli_query($con, $insert_payment); 
			
				
				// inserting the order into table
				$insert_order = "insert into orders (p_id, c_id, qty, invoice_no,status) values ('$pro_id','$c_id','$qty','$invoice','in Progress')";
				$run_order = mysqli_query($con, $insert_order); 
				
				//removing the products from cart
				$empty_cart = "delete from cart where prod_id='$pro_id' and cust_id='$id'";
				$run_cart = mysqli_query($con, $empty_cart);
			}
		}

		//email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: <sales@onlineshoping.com>' . "\r\n";
			
			$subject = "Order Details";
			
			$message = "<html> 
			<p>
			
			Hello dear <b style='color:blue;'>$c_name</b> you have ordered some products on our website onlineshoping.com, please find your order details, your order will be processed shortly. Thank you!</p>
			
				<table width='600' align='center' bgcolor='#FFCC99' border='2'>
			
					<tr align='center'><td colspan='6'><h2>Your Order Details from onlineshoping.com</h2></td></tr>
					
					<tr align='center'>
						<th><b>Quantity</b></th>
						<th><b>Paid Amount</th></th>
						<th>Invoice No</th>
					</tr>
					
					<tr align='center'>
						<td>$qty</td>
						<td>$amount</td>
						<td>$invoice</td>
					</tr>
			
				</table>
				
				<h3>Please go to your account and see your order details!</h3>
				
				<h2> <a href='http://localhost/myshop'>Click here</a> to login to your account</h2>
				
				<h3> Thank you for your order @ - www.onlineshoping.com</h3>
				
			</html>
			
			";
			
			mail($c_email,$subject,$message,$headers);
	
				
			echo "<h2>Welcome:" .$c_name. "<br>" . "Your Payment was successful!</h2>";
			echo "<a href='http://localhost/myshop/customer/my_account.php'>Go to your Account</a>";
			
?>
</body>

</html>