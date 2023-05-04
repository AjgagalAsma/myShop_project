<?php
$page = "edit_pro";
$title = "Admin | Edit-Product";
$metaD = "Stickers Center Admin edit-product page";
include("includes/db.php");

if (isset($_GET['edit_pro'])) {
    $get_id = $_GET['edit_pro'];
    $get_pro = "select * from products where prod_id='$get_id'";
    $run_pro = mysqli_query($con, $get_pro);
    $i = 0;
    $row_pro = mysqli_fetch_array($run_pro);
    $pro_id = $row_pro['prod_id'];
    $pro_title = $row_pro['prod_title'];
    $pro_price = $row_pro['price'];
    $pro_desc = $row_pro['prod_desc'];
    $pro_colors = $row_pro['prod_colors'];
    $pro_cat = $row_pro['prod_cat'];
    $pro_theme = $row_pro['prod_theme'];

    $get_cat = "select * from categories where cat_id='$pro_cat'";
    $run_cat = mysqli_query($con, $get_cat);
    $row_cat = mysqli_fetch_array($run_cat);
    $category_title = $row_cat['cat_title'];
    
    $get_theme = "select * from themes where theme_id='$pro_theme'";
    $run_theme = mysqli_query($con, $get_theme);
    $row_theme = mysqli_fetch_array($run_theme);
    $theme_title = $row_theme['theme_title'];
}
?>

<h2 class="title text-center">Edit Product</h2>

<section>
    <div class="container">
        <div class="row">
            <form action="" method="post" enctype="multipart/form-data">
                <table class="edit_pro_table">
                    <tr>
                        <td>Product Title:</td>
                        <td><label>
                                <input type="text" name="product_title" size="60" value="<?php echo $pro_title; ?>" />
                            </label>
                        </td>
                    </tr>

                    <tr>
                        <td>Product Category:</td>
                        <td>
                            <label>
                                <select name="product_cat">
                                    <option><?php echo $category_title; ?></option>
                                    <?php
                                    $get_cats = "select * from categories";
                                    $run_cats = mysqli_query($con, $get_cats);
                                    while ($row_cats = mysqli_fetch_array($run_cats)) {
                                        $cat_id = $row_cats['cat_id'];
                                        $cat_title = $row_cats['cat_title'];
                                        echo "<option value='$cat_id'>$cat_title</option>";
                                    }
                                    ?>
                                </select>
                            </label>
                        </td>
                    </tr>

                    <tr>
                        <td>Product Theme:</td>
                        <td>

                            <label>
                                <select name="product_theme">
                                    <option><?php echo $theme_title; ?></option>
                                    <?php
                                    $get_themes = "select * from themes";
                                    $run_themes = mysqli_query($con, $get_themes);
                                    while ($row_themes = mysqli_fetch_array($run_themes)) {
                                        $theme_id = $row_themes['theme_id'];
                                        $theme_title = $row_themes['theme_title'];
                                        echo "<option value='$theme_id'>$theme_title</option>";
                                    }
                                    ?>
                                </select>
                            </label>

                        </td>
                    </tr>

                    <tr>
                        <td>Product Price:</td>
                        <td><label class="label_left">
                                <input class="label_left" type="text" name="product_price"
                                    value="<?php echo $pro_price; ?>" />
                            </label>
                        </td>
                    </tr>

                    <tr>
                        <td>Product Description:</td>
                        <td><label>
                                <textarea name="product_desc" cols="30" rows="10"><?php echo $pro_desc; ?></textarea>
                            </label></td>
                    </tr>

                    <tr>
                        <td> Product Colors:</td>
                        <td><label>
                                <input type="text" name="pro_colors" size="60" value="<?php echo $pro_colors; ?>" />
                            </label></td>
                    </tr>

                    <tr>
                        <td colspan="7"><input type="submit" name="update_product" value="Update Product" /></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</section>


<?php
if (isset($_POST['update_product'])) {
    $update_id = $pro_id;
    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $product_theme = $_POST['product_theme'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_desc'];
    $product_colors = $_POST['pro_colors'];
    

    $update_product = "update products set prod_cat='$product_cat',prod_theme='$product_theme',prod_title='$product_title',price='$product_price',prod_desc='$product_desc', prod_colors='$product_colors' where prod_id='$update_id'";
    $run_product = mysqli_query($con, $update_product);

    if ($run_product) {
        echo "<script>alert('Product has been updated!')</script>";
        echo "<script>window.open('index.php?view_products','_self')</script>";
    }
}
?>