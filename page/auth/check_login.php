<?php

session_start();
require_once "../../sql/database.php";


//get data from jquery
$email = $_POST["email"];
$password = $_POST["password"];


$data['success'] = true;
echo $data;

//check if email exist
/*$sql = "SELECT * FROM `users` WHERE `email` = '$email'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if(password_verify($password, $user["password"])){
        $data['success'] = true;
        echo "Login Complete";
    }
    else
    {
        echo "Password does not match";
    }
}
else
{
    echo "Email does not exist";
}*/





?>