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
    $lastName = $_POST["lastName"];
    $contact = $_POST["contact"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    $userMail = new PHPMailer(true);

    try {
        $userMail->isSMTP();
        $userMail->Host = 'smtp.gmail.com'; 
        $userMail->SMTPAuth = true;
        $userMail->Username = 'hemsthecoder@gmail.com';
        $userMail->Password = 'xqpuzjeioeajlatk';
        $userMail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Use TLS
        $userMail->Port = 587;

        $userMail->setFrom('hemsthecoder@gmail.com', "NAISHA'S 1CR CLUB CONSULTING SERVICES PVT. LTD."); // Change this
        $userMail->addAddress($email);
        
        $userMail->isHTML(true);
        $userMail->Subject = "Thank You for Contacting Us";
        $userMail->Body = "Dear $firstName,<br><br>We have received your contact form submission. Thank you for getting in touch with us.<br><br>Best regards,<br>Your Company NAISHA'S 1CR CLUB CONSULTING SERVICES PVT. LTD.";

        $userMail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; 
        $mail->SMTPAuth = true;
        $mail->Username = 'hemsthecoder@gmail.com';
        $mail->Password = 'xqpuzjeioeajlatk';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
        $mail->Port = 587;

        
        $mail->setFrom('hemsthecoder@gmail.com', "NAISHA'S 1CR CLUB CONSULTING SERVICES PVT. LTD."); 
        $mail->addAddress($recipient);
        
        $mail->isHTML(false);
        $mail->Subject = "Contact from submission from website";
        $mail->Body = "Name: $firstName $lastname\nEmail: $email\n Contact Number: $contact\n Message:$message\n";

        $mail->send();
        header("Location:thank_you.html"); 
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
