<?php 
	include("includes/db.php"); 
	
	if(isset($_GET['delete_pro'])){
	
	$delete_id = $_GET['delete_pro'];

	$get_pro = "select * from products where prod_id='$delete_id'";
    $run_pro = mysqli_query($con, $get_pro);
    $row_pro = mysqli_fetch_array($run_pro);
	$pro_image = $row_pro['prod_img'];

	// Delete product from db
	$delete_pro = "delete from products where prod_id='$delete_id'"; 
	$run_delete = mysqli_query($con, $delete_pro); 
	
	if($run_delete){
	echo "<script>alert('A product has been deleted!')</script>";
	echo "<script>window.open('index.php?view_products','_self')</script>";
	}
	
	}





?>