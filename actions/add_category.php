<?php
require("../controllers/product_controller.php");
require('../settings/core.php');
check_login();

if(isset($_POST['add_cat'])){

    // retrieve the category name from the form
    $category = $_POST['category_name'];
    
    //retrieve a category's info and store results 
    $category_insert = select_one_categoryname_controller($category);

    $existingCategory = $category_insert['cat_name']; 

	if ($existingCategory) {
        session_start();
		$_SESSION['error'] = "Sorry, the brand already exist! Try a different name";		
		header('Location:../admin/add_brand.php');		
	}

    else {

        $result = add_category_controller($category);
        header("Location: ../admin/categories.php");

    }
}