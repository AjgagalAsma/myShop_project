<style>
#content_area {
    margin: auto;
    background-color: #e1bdfb;
    width: fit-content;
    padding: 2px;
    border-radius: 21px;
    box-shadow: 1px 1px 3px gray;
}

#edit{
    color:#3D0859;
}

td{
  padding: 5px;
  margin: 5px;
  width: 50%; /* or any other width you want */
}
</style>
<?php 	
				include("includes/db.php"); 
				
				$get_customer = "select * from customers where cus_id='$id'";
				
				$run_customer = mysqli_query($con, $get_customer); 
				
				$row_customer = mysqli_fetch_array($run_customer); 
				
				$name = $row_customer['cus_name'];
				$email = $row_customer['cus_email'];
				$pass = $row_customer['cus_password'];
				$country = $row_customer['cus_country'];
				$city = $row_customer['cus_city'];
				$contact = $row_customer['cus_phone'];
				$address= $row_customer['cus_address'];
				
				
		?>

<form action="" method="post">

    <table align="center" width="750" text-align="center">

        <tr align="center">
            <td colspan="2">
                <h2>Update your Account</h2>
            </td>
        </tr>

        <tr>
            <td align="right">Customer Name:</td>
            <td><input type="text" name="c_name" value="<?php echo $name;?>" required /></td>
        </tr>

        <tr>
            <td align="right">Customer Email:</td>
            <td><input type="text" name="c_email" value="<?php echo $email;?>" required /></td>
        </tr>

        <tr>
            <td align="right">Customer Password:</td>
            <td><input type="password" name="c_pass" value="<?php echo $pass;?>" required /></td>
        </tr>

        <tr>
            <td align="right">Customer Country:</td>
            <td><input type="country" name="c_country" value="<?php echo $country;?>" /></td>
        </tr>

        <tr>
            <td align="right">Customer City:</td>
            <td><input type="city" name="c_city" value="<?php echo $city;?>" /></td>
        </tr>

        <tr>
            <td align="right">Customer Contact:</td>
            <td><input type="tel" name="c_contact" value="<?php echo $contact;?>" /></td>
        </tr>

        <tr>
            <td align="right">Customer Address</td>
            <td><input type="address" name="c_address" value="<?php echo $address;?>" /></td>
        </tr>


        <tr align="center">
            <td colspan="2"><input type="submit" name="update" value="Update Account" /></td>
        </tr>



    </table>

</form>




<?php 
	if(isset($_POST['update'])){
		
		$customer_id = $id;
		
		$c_name = $_POST['c_name'];
		$c_email = $_POST['c_email'];
		$c_pass = $_POST['c_pass'];
        $c_country = $_POST['c_country'];
		$c_city = $_POST['c_city'];
		$c_contact = $_POST['c_contact'];
		$c_address = $_POST['c_address'];
	
		
		 $update_c = "update customers set cus_name='$c_name', cus_email='$c_email', cus_password='$c_pass',cus_country='$c_country',cus_city='$c_city', cus_phone='$c_contact',cus_address='$c_address' where cus_id='$customer_id'";
	
		$run_update = mysqli_query($con, $update_c); 
		
		if($run_update){
		
		echo "<script>alert('Your account successfully Updated')</script>";
		echo "<script>window.open('my_account.php','_self')</script>";
		
		}
	}





?>