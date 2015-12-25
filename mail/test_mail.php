<?php
require 'lib/PHPMailer/PHPMailerAutoload.php';

$name = $_POST['name'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

// Check for empty fields
if(empty($name)  		||
   empty($email_address) 		||
   empty($phone) 		||
   empty($message)	||
   !filter_var($email,FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }

$mail = new PHPMailer;

$mail->isSMTP();
$mail->Host = gethostbyname('mail.psicologa-pescara.it');
$mail->SMTPAuth = true;
$mail->Username = 'psicologa-pescara.it';
$mail->Password = 'amoghumu';
$mail->SMTPSecure = 'tls';
$mail->Port="587";
$mail->From = 'info@psicologa-pescara.it';
$mail->FromName = 'Info';
$mail->addAddress('riccardo.navarra@gmail.com');

$mail->isHTML(true);

$mail->Subject =  'Soggetto';
$mail->Body    = 'This is SMTP Email Test';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
 } else {
    echo 'Message has been sent';
}
?>


