<?php

session_start();
require_once "../../sql/database.php";


//get data from jquery
$email = $_POST["email"];
$password = $_POST["password"];

//check if email exist
$sql = "SELECT * FROM `users` WHERE `email` = '$email'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if(password_verify($password, $user["password"])){
        
        $_SESSION["user"] = "yes";
        $_SESSION["full_name"] = $user["full_name"]; 
        $_SESSION["user_id"] = $user["id"];




        $data['success'] = true;
        echo $data['success'];

        
    }
    else
    {
        $data['success'] = false;
        echo $data['success'];
    }
}
else
{
    echo "Email does not exist";
}





?>