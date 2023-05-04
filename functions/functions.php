<?php
// After uploading to online server, change this connection accordingly
$con = mysqli_connect("localhost", "root", "", "ecommerce");
if (mysqli_connect_errno()) {
    echo "The Connection was not established: " . mysqli_connect_error();
}

//Login
function login($email,$password){
    try {
        $db = new PDO('mysql:host=localhost;dbname=ecommerce', 'root', '');

        $req = $db->prepare('SELECT cus_id ,cus_name, cus_email, cus_password FROM customers WHERE cus_email=:email');
        $req->execute(['email'=>$email]);
        //return un element
        $res = $req->fetch();
        if(isset($res["cus_email"])){
            if($password!=$res["cus_password"]){
                return 2;
            }
            else{
                session_start();
                $_SESSION["id"]=$res["cus_id"];
                $_SESSION["cus_id"]=$res["cus_id"];
                $_SESSION["name"]=$res["cus_name"];
                $_SESSION["email"]=$res["cus_email"];
                $_SESSION["password"]=$res["cus_password"];
                return 1;
            } 
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    return 0;
}
//register
function register($user,$email,$password,$country,$city,$phone,$address){
    try {
        $db = new PDO('mysql:host=localhost;dbname=ecommerce', 'root', '');

        $req = $db->prepare('SELECT cus_name, cus_email, cus_password FROM customers WHERE cus_email=:email');
        $req->execute(['email'=>$email]);
        $res = $req->fetch();
        if($res[0]){
            return 0;
        }
        $sql = 'INSERT INTO  customers(cus_name, cus_email, cus_password,cus_country,cus_city,cus_phone,cus_address) VALUES (:n, :e, :p,:co,:ci,:cp,:ad)';
        $req = $db->prepare($sql);
        $req->execute(['n'=>$user,'e'=>$email,'p'=>$password,'co'=>$country,'ci'=>$city,'cp'=>$phone,'ad'=>$address]);

        // select customer id
        $req = $db->prepare('SELECT cus_id,cus_name, cus_email, cus_password FROM customers WHERE cus_email=:email');
        $req->execute(['email'=>$email]);
        $res = $req->fetch();
        session_start();
                $_SESSION["id"]=$res["cus_id"];
                $_SESSION["name"]=$res["cus_name"];
                $_SESSION["email"]=$res["cus_email"];
                $_SESSION["password"]=$res["cus_password"];
        return 1;
    }catch(Exception $e){
        echo $e->getMessage();
    }
}


//start creating the shopping cart
function add_to_cart($cust_id,$pro_id)
{
        global $con;
        $check_pro = "select * from cart where cust_id='$cust_id'  and prod_id='$pro_id'";
        $run_check = mysqli_query($con, $check_pro);
        if (mysqli_num_rows($run_check) > 0) { 
            if(isset($_GET["cat"]))header("location: index.php?cat=$_GET[cat]");
            elseif (isset($_GET["theme"]))header("location: index.php?theme=$_GET[theme]");
            else echo "<script>window.open('index.php','_self')</script>";
        } else {
            $insert_pro = "insert into cart (prod_id,cust_id,qty) values ('$pro_id','$cust_id',1)";
            mysqli_query($con, $insert_pro);
            if(isset($_GET["cat"]))header("location: index.php?cat=$_GET[cat]");
            elseif (isset($_GET["theme"]))header("location: index.php?theme=$_GET[theme]");
            else echo "<script>window.open('index.php','_self')</script>";
        }
}

function add_to_cart_with_qty($cust_id,$pro_id,$qty){
        global $con;
        $check_pro = "select * from cart where cust_id='$cust_id'  and prod_id='$pro_id'";
        $run_check = mysqli_query($con, $check_pro);
        if (mysqli_num_rows($run_check) > 0) { 
            $update_qty = "update cart set qty='$qty' where prod_id='$pro_id' and cust_id='$cust_id'";
            $run_qty = mysqli_query($con, $update_qty);
        } else {
            $insert_pro = "insert into cart (prod_id,cust_id,qty) values ('$pro_id','$cust_id','$qty')";
            mysqli_query($con, $insert_pro);
        }
}

function update_qty($id,$prod_id,$qty){
    global $con;
    $update_qty = "update cart set qty='$qty' where prod_id='$prod_id' and cust_id='$id'";
    $run_qty = mysqli_query($con, $update_qty);
}

function delete_from_cart($id,$prod_id){
    global $con;
    $delete = "delete from cart where prod_id='$prod_id' and cust_id='$id'";
    $run_qty = mysqli_query($con, $delete);
}
//end creating the shopping cart


// wishlist
function add_to_wish($cust_id,$pro_id)
{
        global $con;
        $check_pro = "select * from wishlist where cust_id='$cust_id'  and prod_id='$pro_id'";
        $run_check = mysqli_query($con, $check_pro);
        if (mysqli_num_rows($run_check) > 0) { 
           
            
            if(isset($_GET["cat"]))header("location: index.php?cat=$_GET[cat]");
            elseif (isset($_GET["theme"]))header("location: index.php?theme=$_GET[theme]");
            else echo "<script>window.open('index.php','_self')</script>";
        } else {
            $insert_pro = "insert into wishlist (prod_id,cust_id) values ('$pro_id','$cust_id')";
            mysqli_query($con, $insert_pro);
            if(isset($_GET["cat"]))header("location: index.php?cat=$_GET[cat]");
            elseif (isset($_GET["theme"]))header("location: index.php?theme=$_GET[theme]");
            else echo "<script>window.open('index.php','_self')</script>";
        }
}
function delete_from_wish($id,$prod_id){
    global $con;
    $delete = "delete from wishlist where prod_id='$prod_id' and cust_id='$id'";
    $run_qty = mysqli_query($con, $delete);
}
// end wishlist




// getting the total added items
function total_items($id)
{
        global $con;
        $get_items = "select * from cart where cust_id='$id'";
        $run_items = mysqli_query($con, $get_items);
        $count_items = mysqli_num_rows($run_items);
    
    echo $count_items;
}

// Getting the total price of the items in the cart
function total_price($id)
{
    $total = 0;
    global $con;
    $sel_price = "select * from cart where cust_id='$id'";
    $run_price = mysqli_query($con, $sel_price);
    while ($p_price = mysqli_fetch_array($run_price)) {
        $pro_id = $p_price['prod_id'];
        $pro_price = "select * from products where prod_id='$pro_id'";
        $run_pro_price = mysqli_query($con, $pro_price);
        while ($pp_price = mysqli_fetch_array($run_pro_price)) {
            $single_price = $pp_price['price'];
            $values = $single_price*$p_price['qty'];
            $total += $values;
        }
    }
    echo "$" . $total;
}


function getCategories()
{
    try{
        $db = new PDO('mysql:host=localhost;dbname=ecommerce', 'root', '');
        $query="select * from categories";
        $stm=$db->prepare($query);
        $res=$stm->execute();
        $res=$stm->fetchAll();
        foreach($res as $ca){
            $cat_id = $ca['cat_id'];
            $cat_title = $ca['cat_title'];
            echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

function getThemes()
{
    global $con;
    $get_themes = "select * from themes";
    $run_themes = mysqli_query($con, $get_themes);
    while ($row_themes = mysqli_fetch_array($run_themes)) {
        $theme_id = $row_themes['theme_id'];
        $theme_title = $row_themes['theme_title'];
        echo "<li><a href='index.php?theme=$theme_id'>$theme_title</a></li>";
    }
}

function getColors()
{
    global $con;
    $get_colors = "select * from colors";
    $run_colors = mysqli_query($con, $get_colors);
    while ($row_colors = mysqli_fetch_array($run_colors)) {
        $color_id = $row_colors['color_id'];
        $color_title = $row_colors['color_title'];
        echo "<li><a href='index.php?color=$color_title'>$color_title</a></li>";
    }
}


function getProducts()
{
    if (!isset($_GET['cat'])) {
        if (!isset($_GET['theme']) && !isset($_GET['color'])) {
            global $con;
            $get_pro = "select * from products order by RAND() LIMIT 0,9";
            $run_pro = mysqli_query($con, $get_pro);
            while ($row_pro = mysqli_fetch_array($run_pro)) {
                $pro_id = $row_pro['prod_id'];
                $pro_cat = $row_pro['prod_cat'];
                $pro_theme = $row_pro['prod_theme'];
                $pro_title = $row_pro['prod_title'];
                $pro_price = $row_pro['price'];
                $pro_image = $row_pro['prod_img'];

                echo "
				<div class='col-sm-4'>
					<div class='product-image-wrapper'>
						<div class='single-products'>
							<div class='productinfo text-center'>
								<img src='./images/product_image/themes/$pro_theme/$pro_image' class='size200x300' alt='jjjjjj' />
								<h2 style='font-size: medium'>$pro_title</h2>
								<p>$ $pro_price</p>
								<a href='cart.php?add_cart=$pro_id' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Add
								to cart</a>
							</div>
						</div>
					    <div class='choose'>
					        <ul class='nav nav-pills nav-justified'>
						        <li><a href='whishlist.php?add_wish=$pro_id'><i class='fa fa-plus-square'></i>Add to wishlist</a></li>
						        <li><a href='details.php?pro_id=$pro_id'><i class='fa fa-plus-square'></i>View Details</a></li>
					        </ul>
					    </div>	
				    </div>
			    </div>
		";
            }
        }
    }
}

function getRecommendedProducts()
{
    if (!isset($_GET['cat'])) {
        if (!isset($_GET['theme'])) {
            global $con;
            $get_pro = "select * from products order by RAND() LIMIT 0,3";
            $run_pro = mysqli_query($con, $get_pro);
            while ($row_pro = mysqli_fetch_array($run_pro)) {
                $pro_id = $row_pro['prod_id'];
                $pro_cat = $row_pro['prod_cat'];
                $pro_theme = $row_pro['prod_theme'];
                $pro_title = $row_pro['prod_title'];
                $pro_price = $row_pro['price'];
                $pro_image = $row_pro['prod_img'];

                echo "
				<div class='col-sm-4'>
					<div class='product-image-wrapper'>
						<div class='single-products'>
							<div class='productinfo text-center'>
								<img src='./images/product_image/themes/$pro_theme/$pro_image' class='size200' alt='' />
								<h2 style='color: #3D0859; font-size: medium;'>$pro_title</h2>
								<p>$ $pro_price</p>
								<a href='cart.php?add_cart=$pro_id' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Add to cart</a>
							</div>
						</div>
                        
				</div>
			</div>
		";
            }
        }
    }
}


function getCategoryProducts()
{
    if (isset($_GET['cat']) && !isset($_GET['theme']) && !isset($_GET['color'])) {

        $cat_id = $_GET['cat'];
        global $con;
        $get_cat_pro = "select * from products where prod_cat='$cat_id'";
        $run_cat_pro = mysqli_query($con, $get_cat_pro);
        $count_cats = mysqli_num_rows($run_cat_pro);
        if ($count_cats == 0) {
            echo "<h2 style='padding:20px;'>No products where found in this category.</h2>";
        }
        while ($row_cat_pro = mysqli_fetch_array($run_cat_pro)) {
            $pro_id = $row_cat_pro['prod_id'];
            $pro_cat = $row_cat_pro['prod_cat'];
            $pro_theme = $row_cat_pro['prod_theme'];
            $pro_title = $row_cat_pro['prod_title'];
            $pro_price = $row_cat_pro['price'];
            $pro_image = $row_cat_pro['prod_img'];

                echo "
				<div class='col-sm-4'>
					<div class='product-image-wrapper'>
						<div class='single-products'>
							<div class='productinfo text-center'>
								<img src='./images/product_image/categories/$pro_cat/$pro_image' class='size200x300' alt='jjjjjj' />
								<h2 style='font-size: medium'>$pro_title</h2>
								<p>$ $pro_price</p>
								<a href='cart.php?add_cart=$pro_id&cat=$pro_cat' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Add
								to cart</a>
							</div>
						</div>
					    <div class='choose'>
					        <ul class='nav nav-pills nav-justified'>
                            
						        <li><a href='whishlist.php?add_wish=$pro_id&cat=$pro_cat'><i class='fa fa-plus-square'></i>Add to wishlist</a></li>
						        <li><a href='details.php?pro_id=$pro_id'><i class='fa fa-plus-square'></i>View Details</a></li>
					        </ul>
					    </div>	
				    </div>
			    </div>
		";
        }
    }
}


function getThemeProducts()
{
    if (isset($_GET['theme']) && !isset($_GET['cat']) && !isset($_GET['color'])) {
        $theme_id = $_GET['theme'];
        global $con;
        $get_theme_pro = "select * from products where prod_theme='$theme_id'";
        $run_theme_pro = mysqli_query($con, $get_theme_pro);
        $count_themes = mysqli_num_rows($run_theme_pro);
        if ($count_themes == 0) {
            echo "<h2 style='padding:20px;'>No products were found associated with this theme.</h2>";
        }
        while ($row_theme_pro = mysqli_fetch_array($run_theme_pro)) {
            $pro_id = $row_theme_pro['prod_id'];
            $pro_cat = $row_theme_pro['prod_cat'];
            $pro_theme = $row_theme_pro['prod_theme'];
            $pro_title = $row_theme_pro['prod_title'];
            $pro_price = $row_theme_pro['price'];
            $pro_image = $row_theme_pro['prod_img'];

                echo "
				<div class='col-sm-4'>
					<div class='product-image-wrapper'>
						<div class='single-products'>
							<div class='productinfo text-center'>
								<img src='./images/product_image/themes/$pro_theme/$pro_image' class='size200x300' alt='jjjjjj' />
								<h2 style='font-size: medium'>$pro_title</h2>
								<p>$ $pro_price</p>
								<a href='cart.php?add_cart=$pro_id&theme=$pro_theme' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Add
								to cart</a>
							</div>
						</div>
					    <div class='choose'>
					        <ul class='nav nav-pills nav-justified'>
						        <li><a href='whishlist.php?add_wish=$pro_id&theme=$pro_theme'><i class='fa fa-plus-square'></i>Add to wishlist</a></li>
						        <li><a href='details.php?pro_id=$pro_id'><i class='fa fa-plus-square'></i>View Details</a></li>
					        </ul>
					    </div>	
				    </div>
			    </div>
		";
        }
    }
}


function getColorProducts()
{
    if (!isset($_GET['cat']) && !isset($_GET['theme']) && isset($_GET['color']) ) {
        global $con;
        $color = strtolower($_GET['color']);
        
        $get_cat_pro = "select * from products";
        $run_cat_pro = mysqli_query($con, $get_cat_pro);
        $count_cats = mysqli_num_rows($run_cat_pro);
        while ($row_cat_pro = mysqli_fetch_array($run_cat_pro)) {
            $pro_colors = $row_cat_pro['prod_colors'];
            if (strpos($pro_colors, $color) !== false){
                $pro_id = $row_cat_pro['prod_id'];
                $pro_cat = $row_cat_pro['prod_cat'];
                $pro_theme = $row_cat_pro['prod_theme'];
                $pro_title = $row_cat_pro['prod_title'];
                $pro_price = $row_cat_pro['price'];
                $pro_image = $row_cat_pro['prod_img'];

                echo "
				<div class='col-sm-4'>
					<div class='product-image-wrapper'>
						<div class='single-products'>
							<div class='productinfo text-center'>
								<img src='./images/product_image/categories/$pro_cat/$pro_image' class='size200x300' alt='jjjjjj' />
								<h2 style='font-size: medium'>$pro_title</h2>
								<p>$ $pro_price</p>
								<a href='cart.php?add_cart=$pro_id&cat=$pro_cat' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Add
								to cart</a>
							</div>
						</div>
					    <div class='choose'>
					        <ul class='nav nav-pills nav-justified'>
                            
						        <li><a href='whishlist.php?add_wish=$pro_id&cat=$pro_cat'><i class='fa fa-plus-square'></i>Add to wishlist</a></li>
						        <li><a href='details.php?pro_id=$pro_id'><i class='fa fa-plus-square'></i>View Details</a></li>
					        </ul>
					    </div>	
				    </div>
			    </div>
		";
            }
        }
    }
}



// product details
function getSelectedProduct()
{
    if (isset($_GET['pro_id'])) {
        global $con;
        $prod_id = $_GET['pro_id'];
        $get_pro = "select * from products where prod_id='$prod_id'";
        $run_pro = mysqli_query($con, $get_pro);
        while ($row_pro = mysqli_fetch_array($run_pro)) {
            $pro_id = $row_pro['prod_id'];
            $pro_title = $row_pro['prod_title'];
            $pro_price = $row_pro['price'];
            $pro_desc = $row_pro['prod_desc'];
            echo "<h2>$pro_title</h2>
            <br><p>sku:  $pro_id</p>
            <br><p>$pro_desc</p>
            <form method='post' action='cart.php?add_cart=$pro_id'>
            <span>
                <h2>$ $pro_price</h2>
                <br><label>Quantity: </label>
                <input type='text' name='quantity' value='1'/>
                <br><br>
                <button type=\"submit\" class=\"btn btn-fefault cart\">
                <i class=\"fa fa-shopping-cart\"></i>Add to cart
                </button>
            </span>
            </form>";
        }
    }
}

function getProductImage($img)
{
    $pro_id = $_GET['pro_id'];
    global $con;
    $get_pro = "select * from products where prod_id='$pro_id'";
    $run_pro = mysqli_query($con, $get_pro);
    $count = mysqli_num_rows($run_pro);
    if ($count == 0) {
        echo "<h2 style='padding:20px;'>No products were found.</h2>";
    }
    while ($row_pro = mysqli_fetch_array($run_pro)) {
        $pro_image = $row_pro['prod_img'];
        $pro_theme = $row_pro['prod_theme'];

        echo "            
            <img src='./images/product_image/themes/$pro_theme/$pro_image' class='size350' alt='' >
		";
    }
}

?>