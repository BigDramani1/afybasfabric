<?php 
require('../settings/core.php');
require('../controllers/cart_controller.php');

if(isset($_POST['quantity'])){
    $product_id = $_POST['product_id'];
    $ip_address = $_SERVER['REMOTE_ADDR'];
    $customer_id = $_SESSION['id'];
    $quantity = $_POST['quantity'];

    $each_item = select_one_item_controller($customer_id, $product_id);{

        //call the update quantity controller
        $update_qty = update_quantity_controller($product_id, $customer_id, $quantity);

        if($update_quty){
            header("Location: ../view/cart.php");
        }
        else{
            echo "<script>alert('Sorry could not update the product in the cart'); windows.location.href = '../view/cart.php';</script>";
        }
    }
}


?>