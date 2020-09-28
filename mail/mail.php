<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
// require 'vendor/autoload.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
$name = $_POST["name"];
$phone = $_POST["phone"];
// $content = $_POST["content"];

try {
    //Настройки сервера
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.mail.ru';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'futuredev';                     // SMTP username
    $mail->Password   = 'Fdevelopment2020';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 465;                                    // TCP port to connect to
    $mail->CharSet = "UTF-8";

    //Recipients
    $mail->setFrom('futuredev@mail.ru', '');

    $mail->addAddress('futuredev@mail.ru', '');     // Add a recipient
    /* $mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com'); */

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    if (!empty($name) && !empty($phone)) {
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $theme;
    $mail->Body    = "<h3>Имя отправителя: $name<h3>
                       <p>Номер: $phone</p> ";
    $mail->AltBody = "Имя отправителя: $name \n Телефонный номер: $phone";

    $mail->send();
    }
    // echo 'Письмо успешно отправленно!';
    header("Location: ../index.html?success=1");
} catch (Exception $e) {
    // echo "Письмо не ушло. Mailer Error: {$mail->ErrorInfo}";
    header("Location: ../index.html?success=0");
}