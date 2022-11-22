<?php
require("../controllers/product_controller.php");
require('../settings/core.php');
check_login();
// add brand
if(isset($_POST['addProduct'])){

    //retrieve product data from the form
    $product_cat = $_POST['product_cat'];
    $product_brand = $_POST['product_brand'];
    $product_title = $_POST['product_title'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_desc'];
    $product_image = $_FILES['product_image']['name'];
    move_uploaded_file($_FILES["product_image"]["tmp_name"],"../images/products/".$_FILES["product_image"]["name"]);
    $product_keywords = $_POST['product_keywords'];

    

    $result = add_product_controller($product_cat, $product_brand, $product_title, $product_price, $product_desc, $product_image, $product_keywords);

    if ($result){
        header("Location: ../admin/products.php");
    }else{
        echo ("<script>alert('Could not add the product, try again.'); window.location.href = '../admin/addproduct.php';</script>");
    }

}

?>