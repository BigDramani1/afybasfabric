<?php
 
require ('../controllers/cart_controller.php');  
require ('../settings/core.php');   

// initialize a client url which we will use to send the reference to the paystack server for verification
$curl = curl_init();
// set options for the curl session insluding the url, headers, timeout, etc
curl_setopt_array($curl, array(
CURLOPT_URL => "https://api.paystack.co/transaction/verify/{$_GET['reference']}",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "GET",
CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer sk_test_b185f885fd9f2d0e2cf8f9f2bfe16dafbd472556", // replace with your private key on paystack  
    "Cache-Control: no-cache",
),
));

// get the response and store
$response = curl_exec($curl);
// if there are any errors
$err = curl_error($curl);
// close the session
curl_close($curl);

// convert the response to PHP object
$decodedResponse = json_decode($response);

$reference = $_GET['reference'];
// convert the response to PHP object
if(isset($decodedResponse->data->status) && $decodedResponse->data->status === 'success'){
    // get form values
    $email = $_SESSION['email'];
    $random = rand(10,10000);
    $add = $_GET['amount'];
    $customer_id = $_SESSION['id'];
    $invoice_no = mt_rand(100, 1000);
    $order_date = date('Y/m/d');
    $order_status = 'success';
    $add_order = add_order_controller($customer_id, $invoice_no, $order_date, $order_status, $add);


    if($add_order){
// get the most recent order id
        $new_order = get_recent_order_controller();
     

        // call a function that stores an array of the customer's details
        $products = select_all_from_cart_controller($customer_id);

     
        foreach($products as $product){ 	
            $addorderdetails = add_order_details_controller($new_order['last_order'], $product['p_id'], $product['qty']);
            if($addorderdetails){
            $each_item =each_total_amount_controller($customer_id, $product['p_id']);
            //add to receipt
            $insert = receipt_controller($product['p_id'], $customer_id, $product['qty'], $each_item['each_amount'], $new_order['last_order']);
            //add to admin receipt
            $admin_add = admin_add_receipt($product['p_id'], $customer_id, $product['qty'], $each_item['each_amount'], $order_date );
            //send mail
            $receipt=show_receipt_controller($customer_id);
            $amounts = $_GET['amount'];
            $name = $_SESSION['name'];
            $from = "johnmahama65@gmail.com";
            $to = $email;
            $subject = "Payment Successful";

            $msg = "<div class='headings' style=\"text-align:center;\">
             <h1>Thank You For Your Purchased</h1>
             <p style=\"font-size:18px; line-height:1.5\"><em><strong>Please save this email for your records.
             <br>Check your purchase status at any time by logging in to your Afybas Fabric Account and going into your dashboard!
             <br>Have a Question? We're here to <a href=\"https://afybasfabric.herokuapp.com/view/contact.php\">help 24/7</a></em></strong></p>
         </div>
         <div class=\"cardings\" style=\"background-color:#edfaff; 
         width: 75%;
         min-width: 400px;
         padding: 35px 50px;
         transform: translate(-50%,-50%);
         position: relative;
         left: 50%;
         top: 350px;
         border-radius: 10px;
         -webkit-border-radius: 10px;
         -moz-border-radius: 10px;
         box-shadow: 0px 6px 18px 0px rgba(16, 5, 54, 0.17);\">
         <div class=\"top\">
             <img src=\"http://drive.google.com/uc?export=view&id=1a8CEeSSus9KlJkF0LZj8f-w0PqfEJnc1\" width=\"80\" style=\"float:left\">
             <p style=\"float:right\"><strong>&nbsp;&nbsp;Payment #$random</strong><br>Date: $order_date</p>
         </div>
         <div class=\"line\"  style=\"position:relative;
         display: -ms-flexbox;
         display: flex;
         -ms-flex-direction: column;
         flex-direction: column;
         margin-top:100px;
         min-width: 0;
         word-wrap: break-word;
         background-color: #fff;
         background-clip: border-box;
         border: 1px solid rgba(0,0,0,.125);
         border-radius: 0.25rem;\">
                     </div>
     <div class=\"another\" style=\"float:left; line-height:1.5; margin-top:30px;\">
         <h2>Payment Made To</h2><br>Name:<strong>Afybas Fabric Haven</strong>
     </div>
     <div class=\"anothers\" style=\"text-align:right; line-height:1.5; margin-top:30px;\">
         <h2>Payment Details</h2><br>Name: <strong>$name</strong>
     </div>
     <div class=\"rest\" style=\"margin-top:100px;\">
         <p style='text-align:center; font-size:22px;'>Total: <strong>GH₵$amounts</strong></p>
         </div>
     </div>
             ";
            include_once(dirname(__FILE__)).'/../smtp/smtp/PHPMailerAutoload.php';
            $mail = new PHPMailer();
            $mail->SMTPDebug = 3;
            $mail->IsSMTP();
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;
            $mail->SMTPSecure = 'tls';
            $mail->isHTML(true);                   //Enable SMTP authentication
            $mail->Username   = 'johnmahama65@gmail.com';                     //SMTP username
            $mail->Password   = 'eorpvauwzsduanlm';                               //SMTP password           //Enable implicit TLS encryption
            $mail->Port       = 587;
            $mail->SMTPDebug  = SMTP::DEBUG_OFF;                              //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom($from, 'Afybas Fabric Haven');
            $mail->addAddress($to);     //Add a recipient            //Name is optional
            
            //Content                              //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $msg;

            $mail->SMTPOptions = array('ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => false
            ));
            if (!$mail->Send()) {
                echo $mail->ErrorInfo;
            }
            $amounts = $_GET['amount'];
            $name = $_SESSION['name'];
            $from = "johnmahama65@gmail.com";
            $to = "johnmahama65@gmail.com";
            $subject = "Product has been Purchased";

            $msg = "<div class='headings' style=\"text-align:center;\">
             <h1>Payment Made</h1>
             <p style=\"font-size:18px; line-height:1.5\">A client made a purchase. Pleach out immediately!
             <br>Log into your account @<a href='https://afybasfabric.herokuapp.com/login/login-user.php'>Afybas Fabric Haven</a> and click on the client purchases to view what they ordered for</p>
         </div>
         <div class=\"cardings\" style=\"background-color:#edfaff; 
         width: 75%;
         min-width: 400px;
         padding: 35px 50px;
         transform: translate(-50%,-50%);
         position: relative;
         left: 50%;
         top: 350px;
         border-radius: 10px;
         -webkit-border-radius: 10px;
         -moz-border-radius: 10px;
         box-shadow: 0px 6px 18px 0px rgba(16, 5, 54, 0.17);\">
         <div class=\"top\">
             <img src=\"http://drive.google.com/uc?export=view&id=1a8CEeSSus9KlJkF0LZj8f-w0PqfEJnc1\" width=\"80\" style=\"float:left\">
             <p style=\"float:right\"><strong>&nbsp;&nbsp;Payment #$random</strong><br>Date: $order_date</p>
         </div>
         <div class=\"line\"  style=\"position:relative;
         display: -ms-flexbox;
         display: flex;
         -ms-flex-direction: column;
         flex-direction: column;
         margin-top:100px;
         min-width: 0;
         word-wrap: break-word;
         background-color: #fff;
         background-clip: border-box;
         border: 1px solid rgba(0,0,0,.125);
         border-radius: 0.25rem;\">
                     </div>
     <div class=\"another\" style=\"float:left; line-height:1.5; margin-top:30px;\">
         <h2>Payment Made To</h2><br>Name:<strong>Afybas Fabric Haven</strong>
     </div>
     <div class=\"anothers\" style=\"text-align:right; line-height:1.5; margin-top:30px;\">
         <h2>Payment Details</h2><br>Name: <strong>$name</strong>
     </div>
     <div class=\"rest\" style=\"margin-top:100px;\">
         <p style='text-align:center; font-size:22px;'>Total: <strong>GH₵ $amounts</strong></p>
         </div>
     </div>
             ";
            include_once(dirname(__FILE__)).'/../smtp/smtp/PHPMailerAutoload.php';
            $mail = new PHPMailer();
            $mail->SMTPDebug = 3;
            $mail->IsSMTP();
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;
            $mail->SMTPSecure = 'tls';
            $mail->isHTML(true);                   //Enable SMTP authentication
            $mail->Username   = 'johnmahama65@gmail.com';                     //SMTP username
            $mail->Password   = 'eorpvauwzsduanlm';                               //SMTP password           //Enable implicit TLS encryption
            $mail->Port       = 587;
            $mail->SMTPDebug  = SMTP::DEBUG_OFF;                              //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom($from, 'Afybas Fabric Haven');
            $mail->addAddress($to);     //Add a recipient            //Name is optional
            //Content                              //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $msg;

            $mail->SMTPOptions = array('ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => false
            ));
            if (!$mail->Send()) {
                echo $mail->ErrorInfo;
            }     
            }
        }
    
    }
    $amount = total_amount_controller($customer_id);
        // call controller function to insert into the payment table
        $result = add_payment_controller($amount['Amount'], $customer_id, $new_order['last_order'], "GH₵", $order_date);

        if($result) {
            $cartItems = select_all_from_cart_controller($customer_id);
            foreach ($cartItems as $cart) {
                remove_from_cart_controller($cart['p_id'], $customer_id);
                header("Location:../view/payment_success.php");
            }

        }else {
            echo "insertion failed";
        }

    }else{
    // if verification failed
        echo $response;
}
?>