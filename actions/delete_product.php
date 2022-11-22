<?php

require("../controllers/product_controller.php");
require('../settings/core.php');

if(isset($_GET['product_id'])){
    $product_id = $_GET['product_id'];
    
    // call the delete one product controller
    $result = delete_one_product_controller($product_id);

    if($result){
        header('Location: ../admin/products.php');

    }
    
    else {
        echo ("<script>alert('Could not delete the product, try again.'); window.location.href = '../admin/products.php';</script>");
     }
}
?>