<?php
require('../controllers/customer_controller.php');
session_start();
$email ="";
$errors = array();
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    //store all data
    $customer_email = one_customer_email_controller($email);
    //check if the email exists in the database.
    if ($customer_email == NULL) {
        $errors['pemail'] = "Incorrect email or password!";
    }
    // verify if the password is from the database.
    else {

        if (password_verify($password, $customer_email['customer_pass'])) {
            $_SESSION['email'] = $email;
            $status= $customer_email['status'];
            if ($status== 'notverified'){
                $_SESSION['status'] =  $customer_email['status'];
                $info = "It's look like you haven't still verify your email ";
                $_SESSION['info'] = $info;
                header('location: user-otp.php');
            }

            if ($status == 'verified') {
                $_SESSION['email'] = $customer_email['customer_email'];
                $_SESSION['password'] = $customer_email['customer_pass'];
                $_SESSION['city'] = $customer_email['customer_city'];
                $_SESSION['id'] = $customer_email['customer_id'];
                $_SESSION['name'] = $customer_email['customer_name'];
                $_SESSION['contact'] = $customer_email['customer_contact'];
                $_SESSION['user_role'] = $customer_email['user_role'];

                //check if the user is an admin; admin = 1, if the person is a customer = 2
                if ($_SESSION['user_role'] == 1){
                    header("Location: ../admin/brands.php");
                }

                if ($_SESSION['user_role'] == 2){
                    header("Location: ../index.php");// this will take the customer to a new page
                    }
            } else {
                $info = "It's look like you haven't still verify your email ";
                $_SESSION['info'] = $info;
                header('location: user-otp.php');
            }
        } else {
            $errors['pemail'] = "Incorrect email or password!";     
        }
    }
}
