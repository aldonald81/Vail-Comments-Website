<?php
//MUST ENABLE OPEN SSL in php.ini file - extension=C:\Program Files\php\ext\php_openssl.dll

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'vailcommonts@gmail.com'; // YOUR gmail email
    $mail->Password = 'vailcommonts8106$'; // YOUR gmail password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


    // Sender and recipient settings
    $mail->setFrom('vailcommonts@gmail.com', 'Vail Commonts');
    $mail->addAddress('aldonald@davidson.edu', 'Alexander Donald');
    //$mail->addReplyTo('example@gmail.com', 'Sender Name'); // to set the reply to

    // Setting the email content
    $mail->IsHTML(true);
    $mail->Subject = "Send email using Gmail SMTP and PHPMailer";
    $mail->Body = 'HTML message body. <b>Gmail</b> SMTP email body.';
    $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';
    $mail->SMTPDebug = 0;
    $mail->send();
    echo "Email message sent.";

} catch (Exception $e) {
    //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    echo "There was an error. Please try again!";
}

?>
