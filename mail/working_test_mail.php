<?php
require 'lib/PHPMailer/PHPMailerAutoload.php';

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

$mail->Subject = 'Test Mail Subject!';
$mail->Body    = 'This is SMTP Email Test';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
 } else {
    echo 'Message has been sent';
}
?>


