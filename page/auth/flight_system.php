<?php

    session_start();

    require_once "../../sql/database.php";


    $type = $_POST["type"];
    echo $type;

    /*if($type == "add_flight")
    {
        $dep_icao = $_POST["dep_icao"];
        $arr_icao = $_POST["arr_icao"];
        $dep_time = $_POST["dep_time"];
        $arr_time = $_POST["arr_time"];
        $callsign = $_POST["callsign"];
        $aircraft = $_POST["aircraft"];
        $remark = $_POST["remarks"];


        if($remark == "")
            $remark = "None";



        $sql = "SELECT * FROM `airport` WHERE `icao` = '$dep_icao'";
        $result = mysqli_query($conn, $sql);

        if(!mysqli_num_rows($result))
            echo $data['success'] = "Departure ICAO not found";

        $sql = "SELECT * FROM `airport` WHERE `icao` = '$arr_icao'";
        $result = mysqli_query($conn, $sql);

        if(!mysqli_num_rows($result))
            echo $data['success'] = "Arrival ICAO not found";


        $sql = "SELECT * FROM `flights` WHERE `flight_callsign` = '$callsign'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result))
            echo $data['success'] = "Callsign already exists";


        $sql = "SELECT * FROM `aircraft` WHERE `aircraft_id` = '$aircraft'";
        $result = mysqli_query($conn, $sql);

        if(!mysqli_num_rows($result))
            echo $data['success'] = "Aircraft not found";


        $sql = "INSERT INTO `flights` (`flight_callsign`, `flight_aircraft`, `flight_dep`, `flight_arr`, `flight_dep_time`, `flight_arr_time`, `flight_remark`) VALUES ('$callsign', '$aircraft', '$dep_icao', '$arr_icao', '$dep_time', '$arr_time', '$remark')";
        $result = mysqli_query($conn, $sql);


        echo $data['success'] = true;
    }
    else if($type == "edit_flight")
    {
        $callsign_old = $_POST["callsign_old"];
        $dep_icao = $_POST["dep_icao"];
        $arr_icao = $_POST["arr_icao"];
        $dep_time = $_POST["dep_time"];
        $arr_time = $_POST["arr_time"];
        $callsign = $_POST["callsign"];
        $aircraft = $_POST["aircraft"];
        $remark = $_POST["remarks"];

        if($remark == "")
            $remark = "None";


    
        

        $sql = "UPDATE `flights` SET `flight_callsign` = '$callsign', `flight_aircraft` = '$aircraft', `flight_dep` = '$dep_icao', `flight_arr` = '$arr_icao', `flight_dep_time` = '$dep_time', `flight_arr_time` = '$arr_time', `flight_remark` = '$remark' WHERE `flight_callsign` = '$callsign_old'";
        $result = mysqli_query($conn, $sql);

        

        

        echo $data['success'] = true;
        
        

    }
    else if($type == "getdata_aircraft")
    {
        $aircraft_reg = $_POST["aircraft_reg"];

        

        $sql = "SELECT * FROM `aircraft` WHERE `aircraft_reg` = '$aircraft_reg'";
        $result = mysqli_query($conn, $sql);

        $row = mysqli_fetch_assoc($result);
        
        if($row)
            echo json_encode($row);
        else
            echo $data['success'] = false;


    }
    else if($type == "delete_flight")
    {
        $callsign = $_POST["callsign"];

        $sql = "DELETE FROM `flights` WHERE `flight_callsign` = '$callsign'";
        $result = mysqli_query($conn, $sql);

        echo $data['success'] = true;
    }*/

?>