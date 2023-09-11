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





?>