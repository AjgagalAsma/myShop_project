<?php 
session_start();

?>
<!DOCTYPE>
<html>

<head>
    <title>Login Form</title>
    <link rel="stylesheet" href="styles/login_style.css" />
    <link rel="shortcut icon" href="../images/ico/favicon.ico">

</head>

<body>
    <div class="login">
        <h1>Admin Login</h1>
        <h2 style="color:white; text-align:center;"><?php echo @$_GET['not_admin']; ?></h2>

        <h2 style="color:white; text-align:center;"><?php echo @$_GET['logged_out']; ?></h2>

        <form method="post" action="login.php">
            <input type="text" name="email" placeholder="Email" required="required" />
            <input type="password" name="password" placeholder="Password" required="required" />
            <button type="submit" class="btn btn-primary btn-block btn-large" name="login">Login</button>
        </form>
    </div>


</body>

</html>
<?php 

include("includes/db.php"); 
	
	if(isset($_POST['login'])){
	
		$email = ($_POST['email']);
		$pass = ($_POST['password']);
	
	$sel_user = "select * from admins where user_email='$email' AND user_password='$pass'";
	
	$run_user = mysqli_query($con, $sel_user); 
	
	 $check_user = mysqli_num_rows($run_user); 
	
	if($check_user==1){
	
	$_SESSION['user_email']=$email; 
	
	echo "<script>window.open('index.php?logged_in=You have successfully Logged in!','_self')</script>";
	
	}
	else {
	
	echo "<script>alert('Password or Email is wrong, try again!')</script>";
	
	}
	
	
	}
	
	
	
	
	








?>