<?php

    session_start();
    require_once "../../sql/database.php";

    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;


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

        
        
        echo $data['success'] = true;



    }
    


?>