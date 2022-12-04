<?php
require("../controllers/cart_controller.php");
require('../settings/core.php');
if(isset($_GET['id'])){
$customer_id = $_GET['id'];

$result = remove_from_receipt_controller($customer_id);
if($result){
    header("Location: ../view/dash/dashboard.php");
} else {
    echo ("<script>alert('Could not delete the product, try again.'); window.location.href = '../view/payment_success.php';</script>");
 }
}

?>