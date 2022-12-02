<?php
include_once(dirname(__FILE__)).'/../classes/customer_class.php';

function customer_info_controller($name, $email, $city, $phone, $password, $code, $status){
    $new_customer = new Customer();
    return $new_customer->inputing_user_info($name, $email, $city, $phone, $password, $code, $status);
}

function one_customer_email_controller($email){
    $new_customer = new Customer();
    return $new_customer->one_customer_email($email);
}

// controller for checking otp
function check_otp_controller($code, $email){
    $new_check = new Customer();
    return $new_check->check_otp($code, $email);
}

//updating the otp
function customer_otp_controller($email){
    $new_otp = new Customer();
    return $new_otp->update_otp($email);
}

//updating user password
function new_otp_controller($code, $email){
    $new_pass = new Customer ();
    return $new_pass->new_otp($code, $email);
}

function new_password_controller($email, $password){
    $new_password = new Customer();
    return $new_password->new_password($email, $password);
}

//setting status has not verified when they click on reset
function status_otp_controller($email){
    $new_otp = new Customer();
    return $new_otp->status_otp($email);
}

//selecting all customers
function select_all_customers_controller(){
    $all = new Customer();
    return $all->select_all_customers();
}

 //controller to update customer account
 
 function update_customer_account_ctr($name, $city, $email){
    $update = new customer();
        return $update->update_user_account($name, $city, $email);
 }

?>