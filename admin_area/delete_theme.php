<?php 
	include("includes/db.php"); 
	
	if(isset($_GET['delete_theme'])){
	
	$delete_id = $_GET['delete_theme'];
	
	$delete_theme = "delete from themes where theme_id='$delete_id'"; 
	
	$run_delete = mysqli_query($con, $delete_theme); 
	
	if($run_delete){
	
	echo "<script>alert('A theme has been deleted!')</script>";
	echo "<script>window.open('index.php?view_themes','_self')</script>";
	}
	
	}





?>