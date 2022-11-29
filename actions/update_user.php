<?php
require('../controllers/customer_controller.php');
require('../settings/core.php');


if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $city = $_POST['city'];
    $email = $_POST['email'];

        $result = update_customer_account_ctr($name, $city, $email);
        if ($result== true) {
            header("location: ../view/dash/dashboard.php");
        }
    }

