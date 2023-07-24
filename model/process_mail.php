<?php
error_reporting(0);
function htmlsanitize($htmlsanitize){
	$htmlsanitize= str_replace("'","''",$htmlsanitize);
    return $htmlsanitize = html_entity_decode(htmlspecialchars($htmlsanitize, ENT_QUOTES, 'UTF-8'));
}

require 'mailer/class.phpmailer.php';

function send_email_php_mailer_test($to, $from, $fromName, $subject, $message) 
{ 
        try {
                            
                            $mail = new PHPMailer(true); //New instance, with exceptions enabled
                             $body             = $message;
                            $body             = preg_replace('/\\\\/','', $body); //Strip backslashes
                            $mail->IsSMTP();                           // tell the class to use SMTP
                            $mail->SMTPAuth   = true;                  // enable SMTP authentication
                            $mail->Port       = 465;                    // set the SMTP server port
                            $mail->Host       = "localhost"; // SMTP server
                            $mail->Username   = "info@paphetenterprise.com";     // SMTP server username
                            $mail->Password   = "paphet100%";            // SMTP server password
                            $mail->From       = $from;
                            $mail->FromName   = $fromName;
                            $mail->AddAddress($to);       
                            $mail->Subject  = $subject;
                            $mail->WordWrap   = 80; // set word wrap
                            $mail->MsgHTML($body);
                            $mail->IsHTML(true); // send as HTML

                            //for($i=1; $i<=20; $i++)
                        $mail->Send();
                            
                            echo 'Message has been sent.';
                        } catch (phpmailerException $e) {
                            echo $e->errorMessage();
                        }
    
}
//  send_email_php_mailer_test("kosokodaniel@gmail.com", "subject", "body");



$action = $_POST["action"];
if($action == "sendmail"){
    $name = htmlsanitize($_POST["name"]);
    echo $email = htmlsanitize($_POST["email"]);
    $phone = htmlsanitize($_POST["phone"]);
    $company = htmlsanitize($_POST["company"]);
    $event_type = htmlsanitize($_POST["event_type"]);
    $venue = htmlsanitize($_POST["venue"]);
    $date = htmlsanitize($_POST["date"]);
    $guestnumber = htmlsanitize($_POST["guestnumber"]);
    $service_type = htmlsanitize($_POST["service_type"]);
    $message = htmlsanitize($_POST["message"]);
    $body = "<div style='width:100%'>
            <div style=style='width:20%; margin: 0 auto; min-height:100px; border:1px solid blue;>
            <h1 style='text-align:center; font-weight:100;>".$name."</h1>
            <p>Phone Number: ".$phone."</p>
            <hr>
            <p>Event Type: ".$event_type."</p>
            <hr>
            <p>Venue: ".$venue."</p>
            <hr>
            <p>Date of EVent: ".$date."</p>
            <hr>
            <p>Expected Guest Number: ".$guestnumber."</p>
            <hr>
            <p>Type of Service Needed: ".$service_type."</p>
            <hr>
            <p>Message:</p>
            <p>".$message."</p>
            </div></div>";

    $subject ="Quotation....";
    echo $from = $email;
    echo $fromName = ucwords($name);
    $to = "kosokodaniel@gmail.com";

    send_email_php_mailer_test($to, $from, $fromName, $subject, $body);

}


    
?>