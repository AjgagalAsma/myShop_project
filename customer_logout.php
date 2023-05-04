<?php 

session_start(); 
unset($_SESSION["id"]);
unset($_SESSION["cus_id"]);
session_destroy(); 


echo "<script>window.open('index.php','_self')</script>";


?>