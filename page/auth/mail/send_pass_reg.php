<?php

session_start();


require_once "../../../sql/database.php";


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../../PHPMailer/Exception.php';
require '../../../PHPMailer/PHPMailer.php';
require '../../../PHPMailer/SMTP.php';


$email = $_POST["email"];
$full_name = $_POST["full_name"];
$password = $_POST["password"];


$subject = "BUNNY VA Reminder";
$body = "

Dear $full_name,<br>

Thank you for registering with BUNNY VA. We are excited to have you on board.
<br><br>
Password: $password
<br>
<br>
Warm Regards,
<br>
BUNNY VA Team
";

sendEmail($email, $full_name, $subject, $body);







//crete function to send email
function sendEmail($email, $full_name, $subject, $body){
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 1;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'ns3.productsgood.com';                       // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'hq@bunnyvirtualairline.com';                     // SMTP username
        $mail->Password   = '[Lj3m)BJ0aoz';                               // SMTP password
        $mail->SMTPSecure = 'auto';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to
    
        //Recipients
        $mail->setFrom('hq@bunnyvirtualairline.com', 'Bunny Virtual Airline');
        $mail->addAddress($email, $full_name);     // Add a recipient
    
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $body;
    
        $mail->send();

        echo $data = true;
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

        echo $data = false;
    }    
}





?>