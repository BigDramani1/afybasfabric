<?php
require("../controllers/product_controller.php");
require('../settings/core.php');
check_login();

// update category
if(isset($_POST['update_cat'])){
 
    // retreive the data from the update category form
    $cat_id = $_POST['cat_id'];
    $category_name = $_POST['cat_name'];
    
    $result = update_one_category_controller($cat_id, $category_name);
    if($result) {
        header('Location: ../admin/categories.php');

    }
        

}