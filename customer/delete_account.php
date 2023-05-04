<style>
#content_area {
    margin: auto;
    background-color: #e1bdfb;
    width: fit-content;
    padding: 40px;
    border-radius: 21px;
    box-shadow: 1px 1px 3px gray;
    text-align: center;
}
#delete{
    color:#3D0859;
}
.input {
    margin: 30px;
}
</style>

<br>

<h2 style="text-align:center; ">Do you really want to DELETE your account?</h2>

<form class="form" action="" method="post">

    <br>
    <input class="input" type="submit" name="yes" value="Yes I want" />
    <input class="input" type="submit" name="no" value="No I was Joking" />


</form>

<?php 
include("includes/db.php"); 
	
	if(isset($_POST['yes'])){
	
	$delete_customer = "delete from customers where cus_id='$id'";
	
	$run_customer = mysqli_query($con,$delete_customer); 
	
	echo "<script>alert('Your account has been deleted!')</script>";
	echo "<script>window.open('../customer_logout.php','_self')</script>";
	}
	if(isset($_POST['no'])){
	
	echo "<script>alert('oh! Ok!')</script>";
	echo "<script>window.open('my_account.php','_self')</script>";
	
	}
	


?>