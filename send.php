<?php

    $userName = &_POST['userName'];
    $userEmail = &_POST['userEmail'];
    $userPhone = &_POST['userPhone'];

//Load Composer's autoloader
require 'vendor/Exception.php';
require 'vendor/PHPMailer.php';
require 'vendor/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer\PHPMailer\PHPMailer();

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'rezister812@gmail.com';                     //SMTP username
    $mail->Password   = 'l24k4288m';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('rezister812@gmail.com', 'Данёке');
    $mail->addAddress('rezister813@gmail.com');     //Add a recipient
    



    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Новая заявка сайта';
    $mail->Body    = "Имя пользователя: ${userName}, его телефон: ${userPhone}. Его почта: ${userEmail}";

    $mail->send();
    header('Location: thanks.html')
} catch (Exception $e) {
    echo "Сообщение не отправленно, есть ошибка. Код ошибки: {$mail->ErrorInfo}";
}
?>