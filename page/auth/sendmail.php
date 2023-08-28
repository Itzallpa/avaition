<?php

        $to = "AsanRodnuan2546@gmail.com"; // อีเมลของผู้รับ
        $subject = "Subject of the Email"; // หัวข้อของอีเมล
        $message = "This is the content of the email."; // เนื้อหาของอีเมล

        $headers = "From: sender@example.com\r\n"; // อีเมลผู้ส่ง
        $headers .= "Reply-To: sender@example.com\r\n"; // อีเมลที่สามารถตอบกลับได้
        $headers .= "Content-Type: text/html\r\n"; // ประเภทของเนื้อหา (เนื้อหาในรูปแบบ HTML

        sendEmail($to, $subject, $message, $headers);


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