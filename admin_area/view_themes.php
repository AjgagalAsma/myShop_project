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
.scrollable-table {
    height: 500px;
    overflow-y: scroll;
}
#Vt {
    color: #3D0859;
    background-color:#cccccc;
}
a{
	color: #3D0859;
}

.fa-trash-o {
    font-size: larger;
}
</style>
<div class="scrollable-table">
<table width="795" align="center" bgcolor="pink"> 

	
	<tr align="center">
		<td colspan="6"><h2>View All Themes Here</h2></td>
	</tr>
	
	<tr align="center" bgcolor="#cccccc">
		<th>Theme ID</th>
		<th>Theme Title</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	<?php 
	include("includes/db.php");
	
	$get_theme = "select * from themes";
	
	$run_theme = mysqli_query($con, $get_theme);
	
	while ($row_theme=mysqli_fetch_array($run_theme)){
		
		$theme_id = $row_theme['theme_id'];
		$theme_title = $row_theme['theme_title'];
	
	?>
	<tr align="center">
		<td><?php echo $theme_id;?></td>
		<td><?php echo $theme_title;?></td>
		<td><a href="index.php?edit_theme=<?php echo $theme_id; ?>">Edit</a></td>
		<td><a href="delete_theme.php?delete_theme=<?php echo $theme_id;?>"><i class="fa fa-trash-o"
                    aria-hidden="true"></i></a></td>
	
	</tr>
	<?php } ?>




</table>
</div>