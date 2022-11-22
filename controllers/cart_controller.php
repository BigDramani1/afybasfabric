<?php 

require('../classes/cart_class.php');


function add_to_cart_controller($product_id, $ip_address, $customer_id, $quantity) {
    //create an instance of the cart class
    $cart_instance = new Cart();
    // call the add_to_cart method from the cart class
    return $cart_instance->add_to_cart($product_id, $ip_address, $customer_id, $quantity);
}


function remove_from_cart_controller($product_id, $customer_id){
    //create an instance of the cart class
    $cart_instance = new Cart();
    //call the remove_from_cart method from the cart class
    return $cart_instance->remove_from_cart($product_id, $customer_id);

}

function select_all_from_cart_controller($customer_id){
     //create an instance of the cart class
     $cart_instance = new Cart();
     //call the select_all_from_cart method from the cart class
     return $cart_instance->select_all_from_cart($customer_id);

}

function select_one_item_controller($customer_id, $product_id){
      //create an instance of the cart class
      $cart_instance = new Cart();
      //call the select_one_item method from the cart class
      return $cart_instance->select_one_item($customer_id, $product_id);
}

//update the quantity of one product 
function  update_quantity_controller($product_id, $customer_id, $quantity){
     //create an instance of the cart class
     $cart_instance = new Cart();
     //call the update_quantity method from the cart class
     return $cart_instance->update_quantity($product_id, $customer_id, $quantity);
}


function  total_amount_controller($customer_id){
    //create an instance of the cart class
    $cart_instance = new Cart();
    //call the total_amount method from the cart class
    return $cart_instance->total_amount ($customer_id);
}


function  add_order_controller($customer_id, $invoice_no, $order_date, $order_status){
    //create an instance of the cart class
    $cart_instance = new Cart();
    //call the add_order method from the cart class
    return $cart_instance->add_order($customer_id, $invoice_no, $order_date, $order_status);

}


function add_order_details_controller($order_id, $product_id, $qty){
    //create an instance of the cart class
    $cart_instance = new Cart();
    //call the add_order_details method from the cart class
    return $cart_instance->add_order_details($order_id, $product_id, $qty);

}


function get_recent_order_controller(){
      //create an instance of the cart class
      $cart_instance = new Cart();
      //call the get_recent_order method from the cart class
      return $cart_instance->get_recent_order();

}

function add_payment_controller($amount, $customer_id, $order_id, $currency, $payment_date){
      //create an instance of the cart class
    $payment_instance = new Cart();
     //call the add_payment method from the cart class
    return $payment_instance-> add_payment($amount, $customer_id, $order_id, $currency, $payment_date);
}

function select_all_orderdetails_controller(){
    $order = new Cart();
    return $order->select_all_orderdetails();

}

function show_orders_controller(){
    //create an instance of the cart class
    $payment_instance = new Cart();
    //call the show_orders method from the cart class
   return $payment_instance->show_orders();

}
?>