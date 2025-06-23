<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $message = trim($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'hp12computer12@gmail.com';
        $mail->Password = 'zxjjnqmeughayome';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        $mail->setFrom('hp12computer12@gmail.com', 'Parag Portfolio');
        $mail->addAddress('hadiyaparag12@gmail.com'); 
        $mail->addReplyTo($email, $username);

        $mail->isHTML(true);
        $mail->Subject = "New Contact Message from $username";
        $mail->Body = "<strong>Name:</strong> $username<br><strong>Email:</strong> $email<br><strong>Message:</strong><br>$message";

        $mail->send();
        echo "<script>alert('Message sent successfully!'); window.location.href='index.html';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Mailer Error: {$mail->ErrorInfo}');</script>";
    }
}
?>
