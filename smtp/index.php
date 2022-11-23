<?php
$html="Testing";
include('smtp/PHPMailerAutoload.php');   
//echo stmp_mailer("johnmahama65@gmail.com", 'work', $html);
function stmp_mailer(){
   
    $mail = new PHPMailer();
    $mail->SMTPDebug= 3;
    $mail -> IsSMTP();
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;  
    $mail->SMTPSecure = 'tls';   
    $mail -> isHTML(true) ;                   //Enable SMTP authentication
    $mail->Username   = 'johnmahama65@gmail.com';                     //SMTP username
    $mail->Password   = 'eorpvauwzsduanlm';                               //SMTP password           //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
    //Recipients
    $mail->setFrom('johnmahama65@gmail.com');
    $mail->addAddress('johnmahama65@gmail.com');     //Add a recipient            //Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    
    //Content                              //Set email format to HTML
    $mail->Subject = 'love';
    $mail->Body    = 'jucie';
  
    $mail->SMTPOptions=array('ssl'=> array(
        'verify_peer'=> false,
        'verify_peer_name' => false,
        'allow_self_signed'=> false
    ));
    if (!$mail->Send()){
        echo $mail->ErrorInfo;
    } else{
        return "sent";
    }
    

}








?>