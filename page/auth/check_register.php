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
    $password = $_POST["password"];

    $ivao_id = $_POST["ivaoId"];
    $vatsim_id = $_POST["vatsimId"];

    if($ivao_id == ""){
        $ivao_id = "NULL";
    }

    if($vatsim_id == ""){
        $vatsim_id = "NULL";
    }

    if($password == ""){
        echo $data['success'] = false;
    }

    //hash password
    $password = password_hash($password, PASSWORD_DEFAULT);


    //check if email exist
    $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        
        echo "Email already exist";
        echo $data['success'] = false;
        
    }
    else
    {
        //insert data to database
        $sql = "INSERT INTO `users`(`full_name`, `email`, `user_ivao_id`, `user_vatsim_id`, `birthdate`, `password`) VALUES ('$full_name','$email','$ivao_id','$vatsim_id','$birthdate','$password')";
        $result = mysqli_query($conn, $sql);

        echo $data['success'] = true;



    }
    


?>