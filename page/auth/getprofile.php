<?php

    session_start();
    require_once "../../sql/database.php";

    $sql = "SELECT * FROM users WHERE email = '".$_GET["email"]."'";
    $result = mysqli_query($conn, $sql);


    if(mysqli_num_rows($result) > 0){

        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $data['full_name'] = $user["full_name"];
        $data['email'] = $user["email"];
        $data['user_ivao_id'] = $user["user_ivao_id"];
        $data['user_vatsim_id'] = $user["user_vatsim_id"];
        $data['birthdate'] = $user["birthdate"];
        $data['user_role'] = $user["user_role"];

        echo json_encode($data);



    }   

?>