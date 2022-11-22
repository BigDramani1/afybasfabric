<?php
require("../controllers/product_controller.php");
require('../settings/core.php');
check_login();
// update product

if(isset($_POST['updateProduct'])){
 
    // retreive the data from the form
    $product_id = $_POST['product_id'];
    $product_cat = $_POST['product_cat'];
    $product_brand = $_POST['product_brand'];
    $product_title = $_POST['product_title'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_desc'];
    $product_image = $_FILES['product_image']['name'];
    move_uploaded_file($_FILES["product_image"]["tmp_name"],"../images/products/".$_FILES["product_image"]["name"]);
    $product_keywords = $_POST['product_keywords'];

    
//check if the user uploaded an image to the form
    if (empty($product_image)){
        // call the select one product controller
        $product = select_one_product_controller($product_id);
        $old_image = $product['product_image'];
        //if the user did not change the image, insert the previous image and other data from the form
        $result = update_one_product_controller($product_id, $product_cat, $product_brand, $product_title, $product_price, $product_desc, $old_image, $product_keywords);

        
        if($result) {
            header('Location: ../admin/products.php');
        }

        else{
            echo ("<script>alert('Could not update the product, try again.'); window.location.href = '../admin/products.php';</script>");
        }
    } 


    else{
        // if the user wants to change the image, use the new image instead

        $result = update_one_product_controller($product_id, $product_cat, $product_brand, $product_title, $product_price, $product_desc, $product_image, $product_keywords);

        if($result) {
            header('Location: ../admin/products.php');

        }

    }

    
        

}