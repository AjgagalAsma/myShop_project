<?php
if (!isset($_SESSION['user_email'])) {

    echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
} else {
    ?>
<!--    <h2 class="title text-center">Store Products</h2>-->
<style>

.scrollable-table {
        height: 500px; /* set the height of the table */
        overflow-y: scroll; /* add a vertical scrollbar if the table height exceeds 500 pixels */
    }
    
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

#Vp {
    color: #3D0859;
    background-color: #cccccc;
}
a{
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
<table class="view_pro_table">
    <tr align="center" >
        <td colspan="6">
            <h2>View All Products Here</h2>
        </td>
    </tr>
    <tr bgcolor="#cccccc">
        <th>S.N</th>
        <th>Title</th>
        <th>Image</th>
        <th>Price</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

    <?php
        include("includes/db.php");
        $get_pro = "select * from products";
        $run_pro = mysqli_query($con, $get_pro);
        $i = 0;
        while ($row_pro = mysqli_fetch_array($run_pro)) {
            $pro_id = $row_pro['prod_id'];
            $pro_title = $row_pro['prod_title'];
            $pro_image = $row_pro['prod_img'];
            $pro_theme= $row_pro['prod_theme'];
//        var_dump($pro_image);
            $pro_price = $row_pro['price'];
            $i++;
            ?>

    <tr>
        <td> <?php echo $i; ?> </td>
        <td> <?php echo $pro_title; ?> </td>
        <td><img src='../images/product_image/themes/<?php echo "$pro_theme/$pro_image"?>' width="100" height="100" />
        </td>
        <td> <?php echo $pro_price; ?> </td>
        <td><a href="index.php?edit_pro=<?php echo $pro_id; ?>">Edit</a></td>
        <td><a href="delete_product.php?delete_pro=<?php echo $pro_id; ?>"><i class="fa fa-trash-o"
                    aria-hidden="true"></i></a></td>
    </tr>
    <?php } ?>
</table>
</div>

<?php } ?>