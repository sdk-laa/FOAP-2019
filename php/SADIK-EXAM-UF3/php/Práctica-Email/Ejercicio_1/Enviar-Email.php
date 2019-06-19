<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
//require ("../../Práctica-PDF/php/GenerarPDF")

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = 2;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'sadik.laaroussii@gmail.com';                     // SMTP username
    $mail->Password   = 'rocmanhgvdfyecbk';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to
    //Recipients
    $mail->setFrom('s-sdk-s@hotmail.es', 'sdk');
    $mail->addAddress('sdk.laaroussi@gmail.com', 'Sdk');     // Add a recipient
    $mail->addAddress('sadik.laaroussii@gmail.com', 'Sadik');     // Add a recipient
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'test pdf';
    $mail->Body    = ' Enviar un pdf';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    // definiendo el adjunto 
    //$mail->addAttachment('../../Práctica-PDF/php/GenerarPDF');
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>