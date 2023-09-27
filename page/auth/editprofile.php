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

    if($_POST["type"] == "edit_user_by_user")
    {
        
        if(mysqli_num_rows($result) > 0){
    
            $firstname = $_POST["firstname"];
            $lastname = $_POST["lastname"];
            $email = $_POST["email"];
            $ivao_id = $_POST["ivao_id"];
            $vatsim_id = $_POST["vatsim_id"];
            $birthdate = $_POST["birthdate"];
            $oldpassword = $_POST["oldpassword"];
            $newpassword = $_POST["newpassword"];
            $comfirm_password = $_POST["comfirm_password"];
            $inputusercomment = $_POST["inputusercomment"];

            $fullname = $firstname." ".$lastname;
            

            if($oldpassword == "")
            {
                $sql = "UPDATE `users` SET `full_name`='$fullname',`email`='$email',`user_ivao_id`='$ivao_id',`user_vatsim_id`='$vatsim_id',`birthdate`='$birthdate',`user_comment`='$inputusercomment' WHERE `email` = '$email'";
                $result = mysqli_query($conn, $sql);
                echo $data['success'] = true;
            }
            else
            {
                $sql = "SELECT * FROM users WHERE email = '".$_POST["email"]."'";
                $result = mysqli_query($conn, $sql);
                $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $password = $user["password"];
                if(password_verify($oldpassword, $password))
                {
                    if($newpassword == $comfirm_password)
                    {
                        $newpassword = password_hash($newpassword, PASSWORD_DEFAULT);
                        $sql = "UPDATE `users` SET `full_name`='$fullname',`email`='$email',`user_ivao_id`='$ivao_id',`user_vatsim_id`='$vatsim_id',`birthdate`='$birthdate',`password`='$newpassword' WHERE `email` = '$email'";
                        $result = mysqli_query($conn, $sql);
                        echo $data['success'] = true;
                    }
                    else
                    {
                        echo $data['success'] = false;
                    }
                }
                else
                {
                    echo $data['success'] = false;
                }
            }
    
        }
        else
        {
            echo $data['success'] = false;
        }
    }



?>