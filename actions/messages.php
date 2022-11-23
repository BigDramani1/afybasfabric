<?php 
	if(isset($_POST['sendmail'])) {
	$to ="johnmahama65@gmail.com";
   $subject="{$_POST['subject']} from Afybas Fabric Empire";
   $msg="<h3>From {$_POST["name"]}</h3> <br><p style=font-size:18px;>{$_POST['message']}</p>";
include('../smtp/smtp/PHPMailerAutoload.php');   
echo stmp_mailer($to, $subject, $msg);

function stmp_mailer($to, $subject, $msg){
   
    $mail = new PHPMailer();
    $mail->SMTPDebug= 3;
    $mail -> IsSMTP();
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;  
    $mail->SMTPSecure = 'tls';   
    $mail -> isHTML(true) ;                   //Enable SMTP authentication
    $mail->Username   = 'johnmahama65@gmail.com';                     //SMTP username
    $mail->Password   = 'eorpvauwzsduanlm';                               //SMTP password           //Enable implicit TLS encryption
    $mail->Port       = 587;       
    $mail->SMTPDebug  = SMTP::DEBUG_OFF;                              //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
    //Recipients
    $mail->setFrom('johnmahama65@gmail.com', 'Afybas Fabric Empire');
    $mail->addAddress($to);     //Add a recipient            //Name is optional
    
    //Content                              //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $msg;
  
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
    }
                  
	 ?>