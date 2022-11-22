<?php
require ('../settings/connection.php');

/// inherit the method from the connection file
class Customer extends Connection{
    function inputing_user_info($name, $email, $city, $phone, $password, $code){
        return $this->query("insert into customer(customer_name, customer_email, customer_city, customer_contact, customer_pass, code, status, user_role) values ('$name', '$email', '$city', '$phone','$password', '$code', 'notverified', 2)");
    }


    function one_customer_email($email){
        return $this->fetchOne("select * from customer where customer_email='$email'");
    }
    //function for checking otp
    function check_otp ($code, $email){
        return $this->fetchOne("select * from customer where code='$code' and customer_email='$email'");
    }
    //updating the info
    function update_otp($email){
        return $this->query("UPDATE customer set status = 'verified' where customer_email ='$email'");
    }
    // updating the code users didn't receive
    function new_otp($code, $email){
        return $this->query("Update customer set code = '$code' where customer_email = '$email'");
    }
    //Setting status as not verified when they click on the reset button after they input their email
    function status_otp($email){
        return $this->query("UPDATE customer set status = 'notverified' where customer_email ='$email'");
    }

    // Updating the password
    function new_password($email, $password){
        return $this->query("UPDATE customer set customer_pass = '$password' WHERE customer_email = '$email'");
    }
    //select everything from customer 
    function select_all_customers(){
        return $this->fetch("select * from customer where user_role=2");
    }
}

?>
