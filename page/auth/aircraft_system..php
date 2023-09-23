<?php

    session_start();
    include_once('../../sql/database.php');


    if($_POST["type"] == "add_aircraft")
    {
            
        $aircraft_name = $_POST["aircraft_name"];
        $airctaft_reg = $_POST["airctaft_reg"];
        $aircraft_type = $_POST["aircraft_type"];

        $sql = "SELECT * FROM `users` WHERE `id`=" . $_SESSION["user_id"] . "";
        $result = mysqli_query($conn, $sql);

        if(!mysqli_num_rows($result))
            echo "User does not exist";


        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $aircraft_add_by = $user["id"];

        $aircraft_add_date = date("Y-m-d");


        $sql = "INSERT INTO `aircraft`(`aircraft_name`, `airctaft_reg`, `aircraft_type`, `aircraft_add_date`, `aircraft_add_by`) VALUES ('$aircraft_name', '$airctaft_reg', '$aircraft_type', '$aircraft_add_date', '$aircraft_add_by')";
        $result = mysqli_query($conn, $sql);
    
        echo $data["success"] = true;
    }

?>