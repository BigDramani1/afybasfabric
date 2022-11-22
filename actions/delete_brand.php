<?php

require("../controllers/product_controller.php");
require('../settings/core.php');

if(isset($_GET['brand_id'])){
    $brand_id = $_GET['brand_id'];
    

    // call the delete_one_brand_controller
    $result = delete_one_brand_controller($brand_id);

    if($result){
        header('Location: ../admin/brands.php');

    }
     else {
         echo ("<script>alert('Could not delete brand, try again.'); window.location.href = '../admin/brands.php';</script>");
     }

}
?>