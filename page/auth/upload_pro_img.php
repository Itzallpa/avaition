<?php

    session_start();
    require_once "../../sql/database.php";

    $file = $_POST["img_url"];
    

    $sql = "UPDATE `users` SET `profile_picture` = '$file' WHERE `users`.`id` = '$_SESSION[user_id]'";
    $result = mysqli_query($conn, $sql);

    $_SESSION["pro_img"] = $file;
    

    echo $data['success'] = true;

?>