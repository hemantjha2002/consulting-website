<?php
extract($_POST);
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recipient = "naisha1crclub@gmail.com"; // Change this to your email address
    $subject = "New Contact Form Submission";
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $contact = $_POST["contact"];
    $email = $_POST["email"];
    $service = $_POST["service"];
   
    // $userMail = new PHPMailer(true);

    // try {
    //     $userMail->isSMTP();
    //     $userMail->Host = 'smtp.gmail.com'; 
    //     $userMail->SMTPAuth = true;
    //     $userMail->Username = 'naisha1crclub@gmail.com';
    //     $userMail->Password = 'iqmxbxiclhrlhkcg';
    //     $userMail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Use TLS
    //     $userMail->Port = 587;

    //     $userMail->setFrom('naisha1crclub@gmail.com', "NAISHA'S 1CR CLUB CONSULTING SERVICES PVT. LTD."); // Change this
    //     $userMail->addAddress($email);
        
    //     $userMail->isHTML(true);
    //     $userMail->Subject = "Thank You for Contacting Us";
    //     $userMail->Body = "Dear $firstName,<br><br>We have received your booking request our team will schedule a meeting. Thank you for getting in touch with us.<br><br>Best regards,<br>NAISHA'S 1CR CLUB CONSULTING SERVICES PVT. LTD.";

    //     $userMail->send();
    // } catch (Exception $e) {
    //     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    // }

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; 
        $mail->SMTPAuth = true;
        $mail->Username = 'naisha1crclub@gmail.com';
        $mail->Password = 'iqmxbxiclhrlhkcg';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
        $mail->Port = 587;

        
        $mail->setFrom('naisha1crclub@gmail.com', "NAISHA'S 1CR CLUB CONSULTING SERVICES PVT. LTD."); 
        $mail->addAddress($recipient);
        
        $mail->isHTML(false);
        $mail->Subject = "Request for scheduling an appointment";
        $mail->Body = "Name: $firstName $lastname\nEmail: $email\n Contact Number: $contact\n Service required:$service\n";

        $mail->send();
        header("Location:thank_you.html"); 
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>