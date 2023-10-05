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

    if($_POST["type"] == "edit_user_admin")
    {
        
        if(mysqli_num_rows($result) > 0){
    
            $email = $_POST["email"];
            $edit_fullname = $_POST["edit_fullname"];
            $edit_email = $_POST["edit_email"];
            $edit_ivao_id = $_POST["edit_ivao_id"];
            $edit_vatsim_id = $_POST["edit_vatsim_id"];
            $edit_birthdate = $_POST["edit_birthdate"];
            $edit_role = $_POST["edit_role"];
            $edit_password = $_POST["edit_password"];
            $edit_rank = $_POST["edit_rank"];
            $edit_flight_hour = $_POST["edit_flight_hour"];

            $sql = "SELECT * FROM users WHERE email = '".$_POST["email"]."'";
            $result = mysqli_query($conn, $sql);

            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $password = $user["password"];

            if($edit_password == "")
            {
                $sql = "UPDATE `users` SET `full_name`='$edit_fullname',`email`='$edit_email',`user_ivao_id`='$edit_ivao_id',`user_vatsim_id`='$edit_vatsim_id',`birthdate`='$edit_birthdate',`user_role`='$edit_role',`rank`='$edit_rank',`flight_hour`='$edit_flight_hour' WHERE `email` = '$email'";
                $result = mysqli_query($conn, $sql);


                $sql = "SELECT * FROM users WHERE email = '".$_POST["email"]."'";
                $result = mysqli_query($conn, $sql);
                
                $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

                echo $data = json_encode($user);
            }
            else
            {
                $edit_password = password_hash($edit_password, PASSWORD_DEFAULT);
                $sql = "UPDATE `users` SET `full_name`='$edit_fullname',`email`='$edit_email',`user_ivao_id`='$edit_ivao_id',`user_vatsim_id`='$edit_vatsim_id',`birthdate`='$edit_birthdate',`user_role`='$edit_role',`rank`='$edit_rank',`flight_hour`='$edit_flight_hour',`password`='$edit_password' WHERE `email` = '$email'";
                $result = mysqli_query($conn, $sql);

                $sql = "SELECT * FROM users WHERE email = '".$_POST["email"]."'";
                $result = mysqli_query($conn, $sql);
                
                $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

                echo $data = json_encode($user);
            }
        }
        else
        {
            echo $data = false;
        }


    
    }



?>