<?php

    session_start();
    require_once "../../sql/database.php";


    //get data from jquery
    $full_name = $_POST["full_name"];
    $email = $_POST["email"];
    $birthdate = $_POST["birthdate"];


    //generate password 10 character
    $password_str = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);

    //hash password
    $password = password_hash($password_str, PASSWORD_DEFAULT);

    $ivao_id = $_POST["ivaoId"];
    $vatsim_id = $_POST["vatsimId"];

    if($ivao_id == ""){
        $ivao_id = "NULL";
    }

    if($vatsim_id == ""){
        $vatsim_id = "NULL";
    }

    //check if email exist
    $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        
        echo "Email already exist";
        $data['success'] = false;
        echo $data['success'];
        
    }
    else
    {
        //insert data to database
        $sql = "INSERT INTO `users`(`full_name`, `email`, `user_ivao_id`, `user_vatsim_id`, `birthdate`, `password`) VALUES ('$full_name','$email','$ivao_id','$vatsim_id','$birthdate','$password')";
        $result = mysqli_query($conn, $sql);
        

        $data['success'] = true;
        echo $data['success'];



        //send email
        $to = "AsanRodnuan2546@gmail.com"; // อีเมลของผู้รับ
        $subject = "Subject of the Email"; // หัวข้อของอีเมล
        $message = "This is the content of the email."; // เนื้อหาของอีเมล

        $headers = "From: sender@example.com\r\n"; // อีเมลผู้ส่ง
        $headers .= "Reply-To: sender@example.com\r\n"; // อีเมลที่สามารถตอบกลับได้
        $headers .= "Content-Type: text/html\r\n"; // ประเภทของเนื้อหา (เนื้อหาในรูปแบบ HTML

        sendEmail($to, $subject, $message, $headers);

    }



function sendEmail($to, $subject, $message, $headers)
{
    // ส่งอีเมล
    $mail_sent = mail($to, $subject, $message, $headers);

    if ($mail_sent) {
        echo "Email sent successfully.";
    } else {
        echo "Failed to send email.";
    }
}
    


?>