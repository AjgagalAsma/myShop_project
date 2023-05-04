<?php
session_start();
if (!isset($_SESSION['user_email'])) {
    echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
} else {
    $title = "Admin | View_payments";
    $metaD = "Stickers Center Admin View_payments";
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
#payments {
    color: #3D0859;
}
</style>
<table width="795" align="center" bgcolor="pink">


    <tr align="center">
        <td colspan="7">
            <h2>View all payments here</h2>
        </td>
    </tr>

    <tr align="center" bgcolor="skyblue">
        <th>S.N</th>
        <th>Customer</th>
        <th>Product</th>
        <th>Image</th>
        <th>Paid Amount</th>
        <th>Transaction ID</th>
        <th>Payment Date</th>
    </tr>
    <?php 
	include("includes/db.php");
	
	$get_payment = "select * from payments";
	
	$run_payment = mysqli_query($con, $get_payment); 
	
	$i = 0;
	
	while ($row_payment=mysqli_fetch_array($run_payment)){
		
		$amount = $row_payment['amount'];
		$trx_id = $row_payment['trx_id']; 
		$payment_date = $row_payment['payment_date'];
		$pro_id = $row_payment['product_id'];
		$c_id = $row_payment['customer_id'];
		
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
	
	?>
    <tr align="center">
        <td><?php echo $i;?></td>
        <td><?php echo $c_email; ?></td>
        <td><?php echo $pro_title; ?></td>
        <td><img src='../images/product_image/themes/<?php echo "$pro_theme/$pro_image"?>' width="100" height="100" /></td>
        <td><?php echo $amount;?></td>
        <td><?php echo $trx_id;?></td>
        <td><?php echo $payment_date;?></td>

    </tr>
    <?php } ?>
</table>