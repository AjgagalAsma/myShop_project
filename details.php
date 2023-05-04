<?php
session_start();
include("functions/functions.php");
$page = "product-details";
$title = "Product Details";
$metaD = "Stickers Center Product Details";
include("header.php");
?>

    <!--page starts here-->
    <section>
        <div class="container">
            <div class="row">
                <?php
                include("left_menu.php");
                ?>

                <div class="col-sm-9 padding-right">
                    <div class="product-details"><!--product-details-->
                        <div class="col-sm-5">
                            <div class="view-product">
                                <?php getProductImage("0"); ?>
                            </div>
                        </div>

                        <!--/product-information-->
                        <div class="col-sm-7">
                            <div class="product-information">
                                <img src="images/product-details/new.jpg" class="newarrival" alt=""/>
                                <?php getSelectedProduct(); ?>
                            </div><!--/product-information-->
                        </div>
                    </div><!--/product-details-->

                </div> <!--class="col-sm-9 padding-right"-->

            </div> <!--class="row"-->
        </div> <!--class="container"-->
    </section>
    <!--page ends here-->


<?php
include("footer.php");
?>