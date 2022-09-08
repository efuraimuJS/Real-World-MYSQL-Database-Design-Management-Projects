<?php
function sendOTP($mail, $otp)
{
    require 'phpmailer/PHPMailerAutoload.php';
    require 'phpmailer/class.phpmailer.php';
    require 'phpmailer/class.smtp.php';

    $message_body = "<br>Hi there</br> Your One Time Password for registration is: <br/>
<strong><h2>" . $otp . "</h2></strong><br/>Please don't share your otp with anyone. <strong>If this wasn't you, 
please ignore this message.</strong>";

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth = TRUE;
    $mail->SMTPDebug = 0;

    $mail->Mailer = "smtp"; //mailer protocal
    $mail->Host = "smtp.gmail.com"; //address of email host
    $mail->Port = 587; //port number

    $mail->SMTPSecure = 'tls'; //tls or ssl encrypt
    $mail->Username = '****';
    $mail->Password = '####';


    $mail->SetFrom("email_address", "username"); // email from which we want to send mail
    $mail->AddAddress($mail); //email of receiver

    $mail->IsHTML(true);
    $mail->Subject = "Verify email- OTP";
    $mail->MsgHTML($message_body);

    if(!$mail->Send()){
        return 0;
    }else{
        return 1;
    }

}