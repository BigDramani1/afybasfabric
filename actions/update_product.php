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
    $product_yards = $_POST['product_yards'];
    $product_keywords = $_POST['product_keywords'];

        $result = update_one_product_controller($product_id, $product_cat, $product_brand, $product_title, $product_price, $product_desc, $product_keywords, $product_yards);
        
        if($result) {
            header('Location: ../admin/products.php');
        }

        else{
            echo ("<script>alert('Could not update the product, try again.'); window.location.href = '../admin/products.php';</script>");
    } 

    

}