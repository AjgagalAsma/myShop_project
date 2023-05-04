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

a {
    text-decoration: none;
    color: #3D0859;
}

#order{
    color:#3D0859;
}
</style>
<table width="795" align="center" >


    <tr align="center">
        <td colspan="7">
            <h2>Your Orders details:</h2>
        </td>
    </tr>

    <tr align="center" bgcolor="skyblue">
        <th>S.N</th>
        <th>Product</th>
		<th>Image</th>
        <th>Quantity</th>
        <th>Invoice No</th>
        <th>Order Date</th>
        <th>Status</th>
    </tr>
    <?php 
	include("includes/db.php");
	
	$get_order = "select * from orders";
	
	$run_order = mysqli_query($con, $get_order); 
	
	$i = 0;
	
	while ($row_order=mysqli_fetch_array($run_order)){
		
		$order_id = $row_order['order_id'];
		$qty = $row_order['qty'];
		$pro_id = $row_order['prod_id'];
		$invoice_no = $row_order['invoice_no'];
		$order_date = $row_order['order_date'];
		$status = $row_order['status'];
		$i++;
		
		$get_pro = "select * from products where prod_id='$pro_id'";
		$run_pro = mysqli_query($con, $get_pro); 
		
		$row_pro=mysqli_fetch_array($run_pro); 
		
		$pro_image = $row_pro['prod_img']; 
		$pro_title = $row_pro['prod_title'];
		$pro_theme = $row_pro['prod_theme'];
	
	?>
    <tr align="center">
        <td><?php echo $i;?></td>
        <td><?php echo $pro_title?></td>
        <td>
        <img src="../images/product_image/themes/<?php echo "$pro_theme/$pro_image";?>" width="70" height="70" />
        </td>
        <td><?php echo $qty;?></td>
        <td><?php echo $invoice_no;?></td>
        <td><?php echo $order_date;?></td>
        <td><?php echo $status;?></td>

    </tr>
    <?php } ?>
</table>