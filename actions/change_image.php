<?php
require("../controllers/product_controller.php");
require('../settings/core.php');
check_login();

if (isset($_POST['image'])) {
    $product_id = $_POST['product_id'];
    $product_image = $_FILES['product_image']['name'];
    move_uploaded_file($_FILES["product_image"]["tmp_name"], "../images/products/" . $_FILES["product_image"]["name"]);
    //check if the user uploaded an image to the form
    if (empty($product_image)) {
        $product = select_one_product_controller($product_id);
        $old_image = $product['product_image'];
        $result = update_img_controller($old_image, $product_id);

        if ($result) {
            header('Location: ../admin/products.php');
        } else {
            echo "<script>alert('sorry cannot update');</script>";
        }
    } else {
        // if the user wants to change the image, use the new image instead
        $result = update_img_controller($product_image, $product_id);
    }
    if ($result) {
        header('Location: ../admin/products.php');
    }
}
