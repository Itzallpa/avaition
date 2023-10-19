<?php


    session_start();
    require_once "../../sql/database.php";


    $type = $_POST["type"];

    if($type == "approve_flight")
    {
        $id = $_POST["flight_id"];
        $sql = "UPDATE flight_log SET flight_status = 1 WHERE ID = '$id'";
        $result = mysqli_query($conn, $sql);

        echo $data = true;
    }
    else if($type == "reject_flight")
    {
        $id = $_POST["flight_id"];
        $sql = "UPDATE flight_log SET flight_status = 2 WHERE ID = '$id'";
        $result = mysqli_query($conn, $sql);

        echo $data = true;
    }







?>