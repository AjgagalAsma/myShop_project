<?php
session_start();
if (!isset($_SESSION['user_email'])) {
    echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
} else {
    $title = "Admin | View_customers";
    $metaD = "Stickers Center Admin View_customers";
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

#customers {
    color: #3D0859;
}

.fa-trash-o {
    font-size: larger;
}
</style>
<table width="795" align="center">


    <tr align="center">
        <td colspan="9">
            <h2>View All Customers Here</h2>
        </td>
    </tr>

    <tr align="center" bgcolor="#e3a2f7">
        <th>S.N</th>
        <th>Name</th>
        <th>Email</th>
        <th>Country</th>
        <th>City</th>
        <th>Phone</th>
        <th>Address</th>
        <th>the date of join</th>
        <th>Delete</th>
    </tr>
    <?php 
	include("includes/db.php");
	
	$get_c = "select * from customers";
	
	$run_c = mysqli_query($con, $get_c); 
	
	$i = 0;
	
	while ($row_c=mysqli_fetch_array($run_c)){
		
		$c_id = $row_c['cus_id'];
		$c_name = $row_c['cus_name'];
		$c_email = $row_c['cus_email'];
		$c_country = $row_c['cus_country'];
		$c_city = $row_c['cus_city'];
		$c_phone = $row_c['cus_phone'];
		$c_address = $row_c['cus_address'];
		$c_date = $row_c['cus_date'];
		$i++;
	
	?>
    <tr align="center">
        <td><?php echo $i;?></td>
        <td><?php echo $c_name;?></td>
        <td><?php echo $c_email;?></td>
        <td><?php echo $c_country;?></td>
        <td><?php echo $c_city;?></td>
        <td><?php echo $c_phone;?></td>
        <td><?php echo $c_address;?></td>
        <td><?php echo $c_date;?></td>
        <td><a href="delete_c.php?delete_c=<?php echo $c_id;?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
        </td>

    </tr>
    <?php } ?>




</table>