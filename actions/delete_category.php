<?php

require("../controllers/product_controller.php");
require('../settings/core.php');

if(isset($_GET['cat_id'])){
    $cat_id = $_GET['cat_id'];
    

    // call the delete one category controller
    $result = delete_one_category_controller($cat_id);

    if($result){
        header('Location: ../admin/categories.php');

    }
     else {
        echo ("<script>alert('Could not delete category, try again.'); window.location.href = '../admin/categories.php';</script>");
     }

}
?>