<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer files
require 'mail/Exception.php';
require 'mail/PHPMailer.php';
require 'mail/SMTP.php';

// Database connection
$conn = new mysqli('localhost', 'root', '', 'parking');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['reset'])) {
    $email = $_POST['email'];
    $code = bin2hex(random_bytes(16)); // Generates a secure random code

    // Check if the email exists in the database
    $stmt = $conn->prepare("SELECT * FROM sign WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // If the email exists, update the code and update_time
        $stmt = $conn->prepare("UPDATE sign SET code = ?, update_time = NOW() WHERE email = ?");
        $stmt->bind_param("ss", $code, $email);

        if ($stmt->execute()) {
            // Set up PHPMailer
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com'; // Your SMTP server
                $mail->SMTPAuth = true;
                $mail->Username = 'oa7152128@gmail.com'; // Your SMTP username
                $mail->Password = 'sluk xfwh kpku qucc'; // Your SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                // Recipients
                $mail->setFrom('oa7152128@gmail.com', 'Admin');
                $mail->addAddress($email);

                // Email content
                $mail->isHTML(true);
                $mail->Subject = 'Password Reset Request';
                $mail->Body    = "Click on this link to reset your password: 
                <a href='http://localhost/sign/Sign-up&Sign-in/change_password.php?code=$code'>Reset Password</a>";

                // Send the email
                $mail->send();
                echo 'Message has been sent. Check your email to reset your password.';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        } else {
            echo "Failed to update the reset code in the database.";
        }
    } else {
        echo "No account found with that email.";
    }

    $conn->close();
}
?>




