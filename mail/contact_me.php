<?php
require 'lib/PHPMailer/PHPMailerAutoload.php';

$rawData = file_get_contents("php://input");
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded
//$contents = utf8_encode($rawData);
$obj = json_decode($rawData);

$name=$obj->{'name'};
$email_address=$obj->{'email'};
$phone=$obj->{'phone'};
$message=$obj->{'message'};

//print_r($rawData);

//echo json_decode($rawData);

//$name="Riccardo";
//$email_address="riccardo.navarra@unich.it";
//$phone="3920167358";
//$message="$rawData";


// Check for empty fields
//if(empty($_POST['name'])  		||
//   empty($_POST['email']) 		||
//   empty($_POST['phone']) 		||
//   empty($_POST['message'])	||
//   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
//   {
//	echo "No arguments Provided!";
//	return false;
//   }

//$name = $_POST['name'];
//$email_address = $_POST['email'];
//$phone = $_POST['phone'];
//$message = $_POST['message'];

// Create the email and send the message
$to = 'info@psicologa-pescara.it';
// Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
//$headers = "From: noreply@psicologa-pescara.it\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
//$headers .= "Reply-To: $email_address";

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
$mail->Body    = $rawData;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
 } else {
    echo 'Message has been sent';
}

//mail($to,$email_subject,$email_body,$headers,'-f info@psicologa-pescara.it');
//return true;
?>