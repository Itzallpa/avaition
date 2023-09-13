<?php

    session_start();
    require_once "../../sql/database.php";

    
    $sql = "SELECT * FROM users WHERE email = '".$_POST["email"]."'";
    $result = mysqli_query($conn, $sql);

    if($_POST["type"] == "edit_ivao_id")
    {

        if(mysqli_num_rows($result) > 0){

            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

            
        

            $ivao_id = $_POST["ivao_id"];
            $email = $_POST["email"];

            $sql = "UPDATE `users` SET `user_ivao_id`='$ivao_id' WHERE `email` = '$email'";
            $result = mysqli_query($conn, $sql);

            echo $data['success'] = true;

        }
        else
        {
            echo $data['success'] = false;
        }
    }


    if($_POST["type"] == "edit_vatsim_id")
    {
            
        if(mysqli_num_rows($result) > 0){
    
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
                
            
    
            $vatsim_id = $_POST["vatsim_id"];
            $email = $_POST["email"];
    
            $sql = "UPDATE `users` SET `user_vatsim_id`='$vatsim_id' WHERE `email` = '$email'";
            $result = mysqli_query($conn, $sql);
    
            echo $data['success'] = true;
    
        }
        else
        {
            echo $data['success'] = false;
        }
    }

    if($_POST["type"] == "edit_user")
    {     
            if(mysqli_num_rows($result) > 0){
        
                $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
        
                $email = $_POST["email"];
                $full_name = $_POST["edit_fullname"];
                $ivao_id = $_POST["edit_ivao_id"];
                $vatsim_id = $_POST["edit_vatsim_id"];
                $birthdate = $_POST["edit_birthdate"];
                $user_role = $_POST["edit_role"];
                $password = $_POST["edit_password"];

                
                if($password != "")
                {
                    $password = password_hash($password, PASSWORD_DEFAULT);
                    $sql = "UPDATE `users` SET `password`='$password' WHERE `email` = '$email'";
                    $result = mysqli_query($conn, $sql);
                }

                $sql = "UPDATE `users` SET `full_name`='$full_name',`user_ivao_id`='$ivao_id',`user_vatsim_id`='$vatsim_id',`birthdate`='$birthdate',`user_role`='$user_role' WHERE `email` = '$email'";
                $result = mysqli_query($conn, $sql);
            
                $data = array(
                    'full_name' => $full_name,
                    'email' => $email,
                    'user_ivao_id' => $ivao_id,
                    'user_vatsim_id' => $vatsim_id,
                    'birthdate' => $birthdate,
                    'user_role' => $user_role
                );
                echo $user_data = json_encode($data);
        
            }
            else
            {
                echo $data['success'] = "Email does not exist";
            }
    }





?>