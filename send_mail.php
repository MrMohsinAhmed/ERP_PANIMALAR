<?php
session_start();  // Start the session to store success/failure messages

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['message']) && isset($_POST['selected_emails'])) {
    $emails = $_POST['selected_emails'];
    $message = $_POST['message'];
    $subject = "College Notification";

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'mohsinahmedmn004@gmail.com'; // SMTP username
        $mail->Password = 'fbvqrmixwavpuchj';          // SMTP password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('admin@college.com', 'Placement Cell');

        foreach ($emails as $email) {
            $mail->addAddress($email);
        }

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();
        
        // Set success message in the session
        $_SESSION['message'] = "Emails have been sent successfully!";
        $_SESSION['msg_type'] = "success";  // Type of message (success or error)
    } catch (Exception $e) {
        // Set failure message in the session
        $_SESSION['message'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        $_SESSION['msg_type'] = "danger";  // Use "danger" for error messages
    }

    // Redirect back to index.php to display the message (PRG pattern)
    header("Location: index.php");
    exit();
}
?>
