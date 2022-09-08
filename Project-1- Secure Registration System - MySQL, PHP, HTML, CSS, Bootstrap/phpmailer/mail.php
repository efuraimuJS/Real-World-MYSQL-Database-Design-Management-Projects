<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

function sendOTP($mail, $otp)
{

    require 'vendor/autoload.php';
//    require 'phpmailer/PHPMailerAutoload.php';
//    require 'phpmailer/class.phpmailer.php';
//    require 'phpmailer/class.smtp.php';


    $message_body = "<br>Hi there</br> Your One Time Password for registration is: <br/>
<strong><h2>" . $otp . "</h2></strong><br/>Please don't share your otp with anyone. <strong>If this wasn't you, please ignore this message.</strong>";

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPDebug = 0;

        $mail->Mailer = "smtp"; //mailer protocal
        $mail->Host = "smtp.gmail.com"; //address of email host
        $mail->Port = 587; //port number

        $mail->SMTPSecure = PHPMAILER::ENCRYPTION_SMTPS; //tls or ssl encrypt
        $mail->Username = '****';
        $mail->Password = '####';


        $mail->setFrom("efuraimu.js@gmail.com", "efuraimu.js");
        // email from which we want to send mail
        $mail->addAddress($mail); //email of receiver

        $mail->isHTML(true);
        $mail->Subject = "Verify email- OTP";
        $mail->msgHTML($message_body);


        if (!$mail->Send()) {
            return 0;
        } else {
            return 1;
        }
    } catch (Exception $e) {
        echo " Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}
