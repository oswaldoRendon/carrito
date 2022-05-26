<?php
 ini_set( 'display_errors', 1 );
 error_reporting( E_ALL );



//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
//$mail = new PHPMailer(true);
/*
$mail->SMTPOptions = array(
    'ssl' => array(
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => true
    )
    );*/
function enviarcorreo($asunto,$mensaje,$body,$from,$to){

try {

    $mail = new PHPMailer(true);
    $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
        );
$mail->isSMTP();
$mail->Host = 'smtp.office365.com';
$mail->Port       = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth   = true;
$mail->Username = 'correofrom';
$mail->Password = 'passworddecorreofrom';
//$mail->SetFrom('correofrom', 'FromEmail');
//$mail->addAddress("correoto", 'ToEmail');
$mail->SetFrom($from, 'FromEmail');
$mail->addAddress($to, 'ToEmail');
//$mail->SMTPDebug  = 3;
//$mail->Debugoutput = function($str, $level) {echo "debug level $level; message: $str";}; //$mail->Debugoutput = 'echo';
$mail->IsHTML(true);
$my_path ="facturas/pdf/factura_producto_6.pdf";
$mail->AddAttachment($my_path);
$mail->Subject = "hola asunto";//$asunto;
$mail->Body    = "cuerpo demail";//$body;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}