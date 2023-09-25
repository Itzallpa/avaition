<?php

    session_start();
    
    include_once('../../sql/database.php');


    if($_POST["type"] == "add_aircraft")
    {

            
        $aircraft_name = $_POST["aircraft_name"];
        $airctaft_reg = $_POST["airctaft_reg"];
        $aircraft_type = $_POST["type_aircraft"];
    
        $sql = "SELECT * FROM `users` WHERE `id`=" . $_SESSION["user_id"] . "";
        $result = mysqli_query($conn, $sql);

        if(!mysqli_num_rows($result))
            echo "User does not exist";


        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $aircraft_add_by = 1;

        $aircraft_add_date = date("Y-m-d");
        

        $sql = "INSERT INTO `aircraft`(`aircraft_name`, `aircraft_reg`, `aircraft_type`, `aircraft_add_date`, `aircraft_add_by`) VALUES ('$aircraft_name', '$airctaft_reg', '$aircraft_type', '$aircraft_add_date', '$aircraft_add_by')";
        $result = mysqli_query($conn, $sql);
    
        echo $data["success"] = true;
    }
    else if($_POST["type"] == "get_aircraft_data")
    {

        $reg = $_POST["aircraft_reg"];
        $sql = "SELECT * FROM `aircraft` WHERE `aircraft_reg` = '$reg'";
        $result = mysqli_query($conn, $sql);

        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        echo json_encode($row);
    }
    else if($_POST["type"] == "edit_aircraft")
    {

        $aircraft_name = $_POST["aircraft_name"];
        $aircraft_reg = $_POST["aircraft_reg"];
        $aircraft_type = $_POST["type_aircraft"];
        $aircraft_id = $_POST["aircraft_id"];



        $sql = "UPDATE `aircraft` SET `aircraft_name`='$aircraft_name',`aircraft_reg`='$aircraft_reg',`aircraft_type`='$aircraft_type' WHERE `aircraft_id`=" . $aircraft_id . "";
        $result = mysqli_query($conn, $sql);


        $data = array(
            'aircraft_name' => $aircraft_name,
            'aircraft_reg' => $aircraft_reg,
            'aircraft_type' => $aircraft_type,
            'aircraft_id' => $aircraft_id

        );
        

         echo $aircraft_data = json_encode($data);

    }

?>