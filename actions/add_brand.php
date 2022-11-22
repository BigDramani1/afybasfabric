<?php
require("../controllers/product_controller.php");
require('../settings/core.php');
check_login();

// check for a POST variable with the name 'addBrand'
if(isset($_POST['add'])){

    // retrieve the brand name from the form
    $brand_name = $_POST['brand_name'];

    $brandInfo = select_one_brandname_controller($brand_name);    
    $existingBrand = $brandInfo['brand_name']; 
    
    if ($existingBrand) {
      session_start();
		$_SESSION['error'] = "Sorry, the brand already exist! Try a different name";		
		header('Location:../admin/add_brand.php');	
	}
   else{

    $result = add_brand_controller($brand_name);
   
     header("Location: ../admin/brands.php"); 

   }
    
}




?>