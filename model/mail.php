<?php
require 'mailer/class.phpmailer.php'; // path to the PHPMailer class
       require 'mailer/class.smtp.php';
           $mail = new PHPMailer();
           $mail->IsSMTP();  // telling the class to use SMTP
           $mail->SMTPDebug = 2;
           $mail->Mailer = "smtp";
           $mail->Host = "ssl://smtp.gmail.com";
           $mail->Port = 587;
           $mail->SMTPAuth = true; // turn on SMTP authentication
           $mail->Username = "info@paphetenterprise.com"; // SMTP username
           $mail->Password = "paphet100%"; // SMTP password
        //    $Mail->Priority = 1;
           $mail->AddAddress("kosokodaniel@gmail.com","Daniel");
           $mail->SetFrom("joebrainme1@gmail.com", "name");
           $mail->AddReplyTo("joebrainme1@gmail.com","name");
           $mail->Subject  = "This is a Test Message";
           $mail->Body     = "user_message";
           $mail->WordWrap = 50;
           if(!$mail->Send()) {
           echo 'Message was not sent.';
           echo 'Mailer error: ' . $mail->ErrorInfo;
           } else {
           echo 'Message has been sent.';
           }
           ?>