<?php
extract($_POST);
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recipient = "hemsthecoder@gmail.com"; // Change this to your email address
    $subject = "New Contact Form Submission";
    $firstName = $_POST["firstName"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    
    // Create a PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Change this to your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'hemsthecoder@gmail.com';
        $mail->Password = 'xqpuzjeioeajlatk';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Use TLS
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('hemsthecoder@gmail.com', 'Your Company'); // Change this
        $mail->addAddress($recipient);
        $mail->addReplyTo($email, $firstName);

        // Content
        $mail->isHTML(false);
        $mail->Subject = $subject;
        $mail->Body = "Name: $firstName\nEmail: $email\n\n$message";

        $mail->send();
        header("Location: thank_you.html"); // Redirect to thank you page
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>

<!-- 
extract($_POST);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


try {
    Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->SMTPAuth   = true;                                  
    $mail->Password   = 'xqpuzjeioeajlatk';                        
    $mail->Port       = 465;        
    
    $mail->setFrom('hemsthecoder@gmail.com', 'Mailer');
    $mail->addAddress($email, 'Joe User');     
    $mail->addAddress('ellen@example.com');              
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');         
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    

    
    $mail->isHTML(true);                                 
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?> -->
