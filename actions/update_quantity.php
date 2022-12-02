<?php
require("../controllers/cart_controller.php");
require('../settings/core.php');

if(isset($_POST['updateQty'])){

    check_login(); 
    $product_id = $_POST['product_id'];
    $ip_address = $_SERVER['REMOTE_ADDR']; 
    $customer_id = $_SESSION['id'];
    $quantity = $_POST['quantity'];

    //select an existing product from the database and store results in a variable
    $item = select_one_item_controller($customer_id, $product_id);

    //check if a product is already in the cart. if it is already in the cart,  update its quantity in the database

    if ($item){

        //$call the update quantity controller
        $update_qty = update_quantity_controller($product_id, $customer_id, $quantity);
            
        if($update_qty){
        header("Location:../view/cart.php");

        }
        
        else{
            echo ("<script>alert('Could not update the product in cart'); window.location.href = '../views/cart.php';</script>");
        }

    }
}

   
?>