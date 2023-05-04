<?php 
include("includes/db.php"); 

if(isset($_GET['edit_theme'])){

	$theme_id = $_GET['edit_theme']; 
	
	$get_theme = "select * from themes where theme_id='$theme_id'";

	$run_theme = mysqli_query($con, $get_theme); 
	
	$row_theme= mysqli_fetch_array($run_theme); 
	
	$theme_id = $row_theme['theme_id'];
	
	$theme_title = $row_theme['theme_title'];
}


?>
<form action="" method="post" style="padding:80px;">

<b>Update theme</b>
<input type="text" name="new_theme" value="<?php echo $theme_title;?>"/> 
<input type="submit" name="update_theme" value="Update theme" /> 

</form>

<?php  

	if(isset($_POST['update_theme'])){
	
	$update_id = $theme_id; 
	
	$new_theme = $_POST['new_theme'];
	
	$update_theme = "update themes set theme_title='$new_theme' where theme_id='$update_id'";

	$run_update = mysqli_query($con, $update_theme); 
	
	if($run_update){
	
	echo "<script>alert('theme has been updated!')</script>";
	echo "<script>window.open('index.php?view_themes','_self')</script>";
	}
	}

?>