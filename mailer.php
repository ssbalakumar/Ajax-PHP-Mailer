<?php 

$msg = '';
//Don't run this unless we're handling a form submission
if (array_key_exists('email', $_POST)) {
    date_default_timezone_set('Etc/UTC');

require 'mailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();        // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';   // Specify main and backup server
$mail->SMTPAuth = true;           // Enable SMTP authentication
$mail->Username = 'username@gmail.com';  // SMTP username
$mail->Password = 'pwd';   // SMTP password
$mail->SMTPSecure = 'tls';  // Enable encryption, 'ssl' also accepted
$mail->Port = 587;  //Set the SMTP port number - 587 for authenticated TLS
$mail->setFrom('someone@domain.com', 'Name');  //Set who the message is to be sent from 
$mail->addAddress('someone@domain.com', 'Name');  // Mail Receiver Address 
$mail->addCC('someone-another@domain.com');
$mail->addBCC('someone-another@domain.com');
$mail->WordWrap = 50;  // Set word wrap to 50 characters 
$mail->addAttachment('/images/image.jpg', 'new.jpg'); //  Name is Optional
$mail->isHTML(false);  

// Set email format to HTML
$mail->Subject = 'Contact Form Sumbmission';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if ($mail->addReplyTo($_POST['email'], $_POST['name'])) {
        $mail->Subject = 'PHPMailer Ajax contact form';
        //Keep it simple - don't use HTML
        $mail->isHTML(false);
        //Build a simple message body
        $mail->Body = <<<EOT
Email: {$_POST['email']}
Name: {$_POST['name']}
Phone: {$_POST['phone']}
Message: {$_POST['message']}
EOT;
        //Send the message, check for errors
        if (!$mail->send()) {
            //The reason for failing to send will be in $mail->ErrorInfo
            //but you shouldn't display errors to users - process the error, log it on your server.
            $msg = 'Sorry, something went wrong. Please try again later.';
        } else {
            $msg = 'Message sent! Thanks for contacting us.';
        }
    } else {
        $msg = 'Invalid email address, message ignored.';
    }
} 