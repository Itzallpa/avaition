<?php

session_start();


require_once "../../../sql/database.php";


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../../PHPMailer/Exception.php';
require '../../../PHPMailer/PHPMailer.php';
require '../../../PHPMailer/SMTP.php';


echo $_POST["email"];


$sql = "SELECT * FROM `users` WHERE `email` = '$_POST[email]'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $full_name = $user["full_name"];
    $email = $user["email"];
    $subject = "Notification Login!";
    $body = "
    <h1>Notification Login!</h1>
    <p>Someone has logged into your account. If it's not you, please contact us immediately.</p>

    <p>Thank you.</p>

    <p>Best Regards,</p>

    <p>Bunny Vir</p>

    <p>https://bunnyvir.com</p>
    

    ";
    sendEmail($email, $full_name, $subject, $body);
    echo $data['success'] = true;
}
else
{
    echo $data['success'] = false;
}




//crete function to send email
function sendEmail($email, $full_name, $subject, $body){
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'AsanRodnuan2546@gmail.com';                     // SMTP username
        $mail->Password   = 'fppuajcodyxnzcpi';                               // SMTP password
        $mail->SMTPSecure = 'auto';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to
    
        //Recipients
        $mail->setFrom('AsanRodnuan2546@gmail.com', 'Bunny Vir');
        $mail->addAddress($email, $full_name);     // Add a recipient
    
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $body;
    
        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }    
}



?>