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
// convert the response to PHP object
if(isset($decodedResponse->data->status) && $decodedResponse->data->status === 'success'){
    // get form values
    $email = $_GET['email'];
    $amount = $_GET['amount'];
    $reference = $_GET['reference'];

    $customer_id = $_SESSION['id'];
    $invoice_no = mt_rand(100, 1000);
    $order_date = date('Y/m/d');
    $order_status = 'success';

    $addorder = add_order_controller($customer_id, $invoice_no, $order_date, $order_status);
  

    if($addorder){
// get the most recent order id
        $new_order = get_recent_order_controller();
     

        // call a function that stores an array of the customer's details
        $products = select_all_from_cart_controller($customer_id);
     
        foreach($products as $product){ 	
            $addorderdetails = add_order_details_controller($new_order['last_order'], $product['p_id'], $product['qty']);
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