<?php
session_start();
if (!isset($_SESSION['user_email'])) {
    echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
} else {
    $title = "Admin | View_orders";
    $metaD = "Stickers Center Admin View_orders";
    include("admin_header.php");
	include("includes/db.php");}
    ?>
    <style>
    table {
        width: 80%;
        border-collapse: collapse;
        margin: 20px auto;
        box-shadow: 2px 2px 3px gray;
    }

    td,
    th {
        border: 1px solid gray;
        padding: 10px;
        text-align: center;
        width: 12.5%;
        /* or any other width you want */
    }

    h2 {
        color: #3D0859;
    }

	#orders{
		color:#3D0859;
	}
    </style>
    <table align="center">


        <tr align="center">
            <td colspan="8">
                <h2>View all orders here</h2>
            </td>
        </tr>

        <tr align="center" bgcolor="#cb8beeb7">
            <th>S.N</th>
            <th>Customer</th>
            <th>Product</th>
            <th>Image</th>
            <th>Quantity</th>
            <th>Invoice No</th>
            <th>Order Date</th>
            <th>Status</th>
        </tr>
        <?php 
	
	$get_order = "select * from orders";
	
	$run_order = mysqli_query($con, $get_order); 
	
	$i = 0;
	
	while ($row_order=mysqli_fetch_array($run_order)){
		
		$order_id = $row_order['order_id'];
		$qty = $row_order['qty'];
		$pro_id = $row_order['prod_id'];
		$c_id = $row_order['cust_id'];
		$invoice_no = $row_order['invoice_no'];
		$order_date = $row_order['order_date'];
		$status= $row_order['status'];
		$i++;
		
		$get_pro = "select * from products where prod_id='$pro_id'";
		$run_pro = mysqli_query($con, $get_pro); 
		
		$row_pro=mysqli_fetch_array($run_pro); 
		
		$pro_image = $row_pro['prod_img']; 
		$pro_title = $row_pro['prod_title'];
		$pro_theme = $row_pro['prod_theme'];
		
		$get_c = "select * from customers where cus_id='$c_id'";
		$run_c = mysqli_query($con, $get_c); 
		
		$row_c=mysqli_fetch_array($run_c); 
		
		$c_email = $row_c['cus_email'];

		// Determine the display text and link based on the order status
		$display_text = '';
		$link = '';
		if ($status == 'in Progress') {
			$display_text = 'In Progress';
			$link = '<a href="index.php?confirm_order=' . $order_id . '">Complete Order</a>';
		} else {
			$display_text = 'Completed';
		}
	
	?>
        <tr align="center">
            <td><?php echo $i;?></td>
            <td><?php echo $c_email; ?></td>
            <td><?php echo $pro_title; ?></td>
            <td><img src='../images/product_image/themes/<?php echo "$pro_theme/$pro_image"?>' width="100" height="100" /></td>
            <td><?php echo $qty;?></td>
            <td><?php echo $invoice_no;?></td>
            <td><?php echo $order_date;?></td>
            <td><?php echo  '<div>' . $display_text . '</div><div>' . $link . '</div>';?></td>

        </tr>
        <?php } ?>
    </table>
</body>

</html>