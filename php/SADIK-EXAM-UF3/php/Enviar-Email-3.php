<?php
/*
coger el id del usuario

generar token
guardar a la DB
enviar email amb link al formulari de modo de password juntamnete con el token


al formulari de mod passs:
    verificar el token (*verificar la caducitat)
    modificar la pass per lusuari vinculat al token

*/

require("SpiritSocial_Functions.php");    //Incluir funciones

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 20; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

//Coger el email del usuario:
$User=$_GET["User"];
$con=ConnectDB();
$selectEmail = " SELECT id, Email from usuarios where User='".$User."' ";
$resultatEmail = mysqli_query($con,$selectEmail) or die('Consulta fallida: ' . mysqli_error($con));
CloseDB($con);

$idEmail = $resultatEmail->fetch_assoc();
$id=$idEmail['id'];
$email= $idEmail['Email'];


//Generar token:
$token = randomPassword();

//guardar token  a la db
$con=ConnectDB();
$InsertToken = " insert into tokens (token,id_usuarios) values ('$token','$id') ";
$resultatToken = mysqli_query($con,$InsertToken) or die('Consulta fallida: ' . mysqli_error($con));
CloseDB($con);

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'sadik.laaroussii@gmail.com';            // SMTP username
    $mail->Password   = 'rocmanhgvdfyecbk';                     //PASS LAPTOP: iaxxfyaimmubbhvc   // PASS COMPUTER:  rocmanhgvdfyecbk     // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to
    //Recipients
    $mail->setFrom('s-sdk-s@hotmail.es', 'sdk');
    $mail->addAddress('sdk.laaroussi@gmail.com', 'Sdk');     // Add a recipient
    $mail->addAddress('sadik.laaroussii@gmail.com', 'Sadik');     // Add a recipient
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'New Password';                                 
    $mail->Body    = "El link per generar el nou  password es: <a href=\"http://localhost/Sadik/FOAP-2019/php/SADIK-EXAM-UF3/php/SpiritSocial_GenerateNewPass.php?token=$token\" >LINK</a>";
    $mail->AltBody = '';
    $mail->send();
    echo 'El link para generar password se ha enviado a el email proporcionado.';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>