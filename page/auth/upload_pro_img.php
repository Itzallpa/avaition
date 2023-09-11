<?php



    session_start();



    require_once "../../sql/database.php";

    $file = $_POST["img_url"];

    if (strpos($file, 'data:image/jpeg') === 0) {
        
        $filename = "../../img/profile_img/" . "profile_img_". $_SESSION["user_id"] . ".jpg";
        $file_data = str_replace('data:image/jpeg;base64,', '', $file);
        $file_data = base64_decode($file_data);

    }
    else if (strpos($file, 'data:image/png') === 0) {
        
        $filename = "../../img/profile_img/" . "profile_img_". $_SESSION["user_id"] . ".png";
        $file_data = str_replace('data:image/png;base64,', '', $file);
        $file_data = base64_decode($file_data);

    }
    else if (strpos($file, 'data:image/jpg') === 0) {
        
        $filename = "../../img/profile_img/" . "profile_img_". $_SESSION["user_id"] . ".jpg";
        $file_data = str_replace('data:image/jpg;base64,', '', $file);
        $file_data = base64_decode($file_data);

    }
    else if (strpos($file, 'data:image/gif') === 0) {
        
        $filename = "../../img/profile_img/" . "profile_img_". $_SESSION["user_id"] . ".gif";
        $file_data = str_replace('data:image/gif;base64,', '', $file);
        $file_data = base64_decode($file_data);

    }
    else {
        echo $data['success'] = false;
    }

    file_put_contents($filename, $file_data);

    $sql = "UPDATE `users` SET `profile_picture` = '$filename' WHERE `users`.`id` = '$_SESSION[user_id]'";
    $result = mysqli_query($conn, $sql);

    $_SESSION["pro_img"] = $filename;

    echo $data['success'] = true;

?>