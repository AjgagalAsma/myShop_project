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

#Vc {
    color: #3D0859;
    background-color: #cccccc;
}

a {
    color: #3D0859;
}

.scrollable-table {
    height: 500px;
    overflow-y: scroll;
}

.fa-trash-o {
    font-size: larger;
}
</style>
<div class="scrollable-table">
    <table width="795" align="center" bgcolor="pink">


        <tr align="center">
            <td colspan="6">
                <h2>View All Categories Here</h2>
            </td>
        </tr>

        <tr align="center" bgcolor="#cccccc">
            <th>Category ID</th>
            <th>Category Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php 
	include("includes/db.php");
	
	$get_cat = "select * from categories";
	
	$run_cat = mysqli_query($con, $get_cat);
	
	while ($row_cat=mysqli_fetch_array($run_cat)){
		
		$cat_id = $row_cat['cat_id'];
		$cat_title = $row_cat['cat_title'];
	
	?>
        <tr align="center">
            <td><?php echo $cat_id;?></td>
            <td><?php echo $cat_title;?></td>
            <td><a href="index.php?edit_cat=<?php echo $cat_id; ?>">Edit</a></td>
            <td><a href="delete_category.php?delete_cat=<?php echo $cat_id;?>"><i class="fa fa-trash-o"
                        aria-hidden="true"></i></a></td>

        </tr>
        <?php } ?>




    </table>
</div>