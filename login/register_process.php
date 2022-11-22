<?php
require('../controllers/customer_controller.php');
session_start();
$email = "";
$name = "";
$phone ="";
$city ="";
$errors = array();
// check to see if form as has been submitted
if (isset($_POST['signup'])) {
    //retrieve the data from the submission
    $name = $_POST['name'];
    $email =  $_POST['email'];
    $city =  $_POST['city'];
    $phone =  $_POST['phone'];
    $en_password = $_POST['password'];
    $con_password = $_POST['con_password'];

    //checking if passwords match
    if ($en_password != $con_password) {
        $errors['password'] = "Password & Confirm password do not match";
    }

    //checking if someone has the same email
    $customer =  one_customer_email_controller($email);
    if ($customer != NULL) {
        $errors['email'] = "The Email that you entered already exist!";
    }
    if (count($errors) === 0) {
        //call the customer_info function and add a new customer to it
        $code = rand(999999, 111111);
        // $status = "notverified";
        $password = password_hash($en_password, PASSWORD_BCRYPT);
        $result = customer_info_controller($name, $email, $city, $phone, $password, $code, $status);
        $_SESSION['email'] = $email;
        if ($result == true) {
            require '../PHPMailerAutoload.php';
            require '../credential.php';
            $info = "We've sent a verification code to your email - $email";
            $_SESSION['info'] = $info;
            $_SESSION['email'] = $email;
    
            $mail = new PHPMailer;
    
            $mail->SMTPDebug = 4;                               // Enable verbose debug output
    
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = EMAIL;                 // SMTP username
            $mail->Password = PASS;                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;
            $mail->SMTPDebug  = SMTP::DEBUG_OFF;                                // TCP port to connect to
    
            $mail->setFrom(EMAIL, 'Afybas Fabric Haven');
            $mail->addAddress($_SESSION['email']);     // Add a recipient
    
            $mail->addReplyTo(EMAIL);
    
            $mail->isHTML(true);                                  // Set email format to HTML
    
            $mail->Subject = "Your Verification Code";
            $mail->Body    = "<div class=\"cont\" style=\"text-align:center;
            width: 75%;
            min-width: 400px;
            padding: 35px 50px;
            transform: translate(-50%,-50%);
            position: relative;
            left: 50%;
            top: 380px;
            border-radius: 10px;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            box-shadow: 0px 6px 18px 0px rgba(16, 5, 54, 0.17);\">   
                <div class=\"img\">
                    <img src=\"https://img.freepik.com/premium-vector/otp-onetime-password-2step-authentication-data-protection-internet-security-concept_100456-10200.jpg?\"
                        style=\"width:220px; height:180px;\">
                </div>
                <div class=\"text\" style=\"text-align: center; line-height: 0cm;\">
                    <p style=\"font-size:28px\">Hi</p>
                    <br><p style=\"font-size:18px\">This is your verification code for Afybas Fabric Haven</p>
                    <br><p style=\"font-size:40px\"><strong>{$code}</strong></p>
                    <br><p style=\"font-size:14px\">Kindly ignore this if this notification wasn't mean't for you! Thank you</p>
                </div>
            </div>";

            if (!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                header('location: ../login/user-otp.php');
            }
        }
    }
}

//Check if user click on the verification code
if (isset($_POST['check'])) {
    $_SESSION['info'] = "";
    //retrieve the data from the submission
    $code = $_POST['otp'];
    $email = $_SESSION['email'];
    //crosschecking the user's information and email
    $user =  check_otp_controller($code, $email);

    if ($user == NULL) {
        $errors['otp-error'] = "You've entered incorrect code!";
    }  if (count($errors) === 0){
        $update=customer_otp_controller($email);
        header('location: login-user.php');
    }
}

// check email for forget passwords
if (isset($_POST['check-email'])) {
    $email =  $_POST['email'];
    //checking if someone has the same email
    $customer =  one_customer_email_controller($email);
    if ($customer == NULL) {
        $errors['email'] = "The Email that you entered do not exist!";
    }  if (count($errors) === 0){
        $code = rand(999999, 111111);
       $status = status_otp_controller($email);
        $result = new_otp_controller($code, $email);
        $_SESSION['email'] = $email;
        if ($result == true) {
            require '../PHPMailerAutoload.php';
            require '../credential.php';
            $info = "We've sent a verification code to your email - $email";
            $_SESSION['info'] = $info;
            $_SESSION['email'] = $email;
    
            $mail = new PHPMailer;
    
            $mail->SMTPDebug = 4;                               // Enable verbose debug output
    
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = EMAIL;                 // SMTP username
            $mail->Password = PASS;                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;
            $mail->SMTPDebug  = SMTP::DEBUG_OFF;                                // TCP port to connect to
    
            $mail->setFrom(EMAIL, 'Afybas Fabric Haven');
            $mail->addAddress($_SESSION['email']);     // Add a recipient
    
            $mail->addReplyTo(EMAIL);
    
            $mail->isHTML(true);                                  // Set email format to HTML
    
            $mail->Subject = "Your Verification Code";
            $mail->Body    = "<div class=\"cont\" style=\"text-align:center;
            width: 75%;
            min-width: 400px;
            padding: 35px 50px;
            transform: translate(-50%,-50%);
            position: relative;
            left: 50%;
            top: 380px;
            border-radius: 10px;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            box-shadow: 0px 6px 18px 0px rgba(16, 5, 54, 0.17);\">   
                <div class=\"img\">
                    <img src=\"https://img.freepik.com/premium-vector/otp-onetime-password-2step-authentication-data-protection-internet-security-concept_100456-10200.jpg?\"
                        style=\"width:220px; height:180px;\">
                </div>
                <div class=\"text\" style=\"text-align: center; line-height: 0cm;\">
                    <p style=\"font-size:28px\">Hi</p>
                    <br><p style=\"font-size:18px\">This is your verification code for Afybas Fabric Haven</p>
                    <br><p style=\"font-size:40px\"><strong>{$code}</strong></p>
                    <br><p style=\"font-size:14px\">Kindly ignore this if this notification wasn't mean't for you! Thank you</p>
                </div>
            </div>";
            if (!$mail->send()) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                header('location: reset_password_otp.php');
            }
        } 
    }
        
}


//Check if user click on the verification code after choosing reset password
if (isset($_POST['reseting'])) {
    $_SESSION['info'] = "";
    //retrieve the data from the submission
    $code = $_POST['otp'];
    $email = $_SESSION['email'];
    //crosschecking the user's information and email
    $user =  check_otp_controller($code, $email);

    if ($user == NULL) {
        $errors['otp-error'] = "You've entered incorrect code!";
    } if (count($errors) === 0){
        $update=customer_otp_controller($email);
        header('location: new-password.php');
    }
}

// This is for resending verification code when you create a new account
if(isset($_POST['resend'])){
    $email=$_SESSION['email'];
    $customer =  one_customer_email_controller($email);
    if ($customer) {
        $code = rand(999999, 111111);
        $result = new_otp_controller($code, $email);
    if ($result == true) {
        require '../PHPMailerAutoload.php';
        require '../credential.php';
        $info = "We've sent a verification code to your email - $email";
        $_SESSION['info'] = $info;
        $_SESSION['email'] = $email;

        $mail = new PHPMailer;

        $mail->SMTPDebug = 4;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = EMAIL;                 // SMTP username
        $mail->Password = PASS;                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;
        $mail->SMTPDebug  = SMTP::DEBUG_OFF;                                // TCP port to connect to

        $mail->setFrom(EMAIL, 'Afybas Fabric Haven');
        $mail->addAddress($_SESSION['email']);     // Add a recipient

        $mail->addReplyTo(EMAIL);

        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = "Your Verification Code";
        $mail->Body    = "<div class=\"cont\" style=\"text-align:center;
        width: 75%;
        min-width: 400px;
        padding: 35px 50px;
        transform: translate(-50%,-50%);
        position: relative;
        left: 50%;
        top: 380px;
        border-radius: 10px;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        box-shadow: 0px 6px 18px 0px rgba(16, 5, 54, 0.17);\">   
            <div class=\"img\">
                <img src=\"https://img.freepik.com/premium-vector/otp-onetime-password-2step-authentication-data-protection-internet-security-concept_100456-10200.jpg?\"
                    style=\"width:200px; height:150px;\">
            </div>
            <div class=\"text\" style=\"text-align: center; line-height: 0cm;\">
                <p style=\"font-size:28px\">Hi</p>
                <br><p style=\"font-size:13px\">This is your verification code for Afybas Fabric Haven</p>
                <br><p style=\"font-size:40px\"><strong>{$code}</strong></p>
                <br><p style=\"font-size:13px\">Kindly ignore this if this notification wasn't mean't for you! Thank you</p>
            </div>
        </div>";
        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            header('location: ../login/user-otp.php?message=success');
        }
    }
}   
    
}
// This is for resending verification code when you want to reset your password 
if(isset($_POST['resending'])){
    $email=$_SESSION['email'];
    $customer =  one_customer_email_controller($email);
    if ($customer) {
        $code = rand(999999, 111111);
        $result = new_otp_controller($code, $email);
    }
    if ($result == true) {
        require '../PHPMailerAutoload.php';
        require '../credential.php';
        $info = "We've sent a verification code to your email - $email";
        $_SESSION['info'] = $info;
        $_SESSION['email'] = $email;

        $mail = new PHPMailer;

        $mail->SMTPDebug = 4;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = EMAIL;                 // SMTP username
        $mail->Password = PASS;                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;
        $mail->SMTPDebug  = SMTP::DEBUG_OFF;                                // TCP port to connect to

        $mail->setFrom(EMAIL, 'Afybas Fabric Haven');
        $mail->addAddress($_SESSION['email']);     // Add a recipient

        $mail->addReplyTo(EMAIL);

        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = "Your Verification Code";
        $mail->Body    = "<div class=\"cont\" style=\"text-align:center;
        width: 75%;
        min-width: 400px;
        padding: 35px 50px;
        transform: translate(-50%,-50%);
        position: relative;
        left: 50%;
        top: 380px;
        border-radius: 10px;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        box-shadow: 0px 6px 18px 0px rgba(16, 5, 54, 0.17);\">   
            <div class=\"img\">
                <img src=\"https://img.freepik.com/premium-vector/otp-onetime-password-2step-authentication-data-protection-internet-security-concept_100456-10200.jpg?\"
                    style=\"width:200px; height:150px;\">
            </div>
            <div class=\"text\" style=\"text-align: center; line-height: 0cm;\">
                <p style=\"font-size:28px\">Hi</p>
                <br><p style=\"font-size:13px\">This is your verification code for Afybas Fabric Haven</p>
                <br><p style=\"font-size:40px\"><strong>{$code}</strong></p>
            </div>
            <br><p style=\"font-size:13px\">Kindly ignore this if this notification wasn't mean't for you! Thank you</p>
        </div>";
        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            header('location: ../login/reset_password_otp.php?message=success');
        }
    }   
    
}
//if the user clicks on change password button
if (isset($_POST['change-password'])) {
    $_SESSION['info'] = "";
    $new_password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    if ($new_password != $cpassword) {
        $errors['password'] = "Password and confirm password do not match!";
    }else{
        $email = $_SESSION['email'];
        $password = password_hash($new_password, PASSWORD_BCRYPT);
        $update = new_password_controller($email, $password);
        header('Location: login-user.php?message=success');
    }
}else{
    echo "<script>alert('Sorry, we couldn't update your password. Try again later!');</script>";
}
