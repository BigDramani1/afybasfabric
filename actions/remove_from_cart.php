<?php
require('../settings/core.php');
require('../controllers/cart_controller.php');

if(isset($_GET['product_id'])){
    $product_id = $_GET['product_id'];
    $customer_id = $_SESSION['id'];

    // call the remove cart controller function
    $result = remove_from_cart_controller($product_id, $customer_id);

    if ($result){
        header("location: ../view/cart.php");
    }
    else{
        echo "<script>alert('Sorry product cannot be removed');</script>";
    }

}

?>