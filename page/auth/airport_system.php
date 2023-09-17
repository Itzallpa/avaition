<?php

    session_start();
    include_once('../../sql/database.php');

    if($_POST["type"] == "add_airport")
    {

        $airport_name = $_POST["airport_name"];
        $icao_name = $_POST["icao_name"];

        $sql = "INSERT INTO `airport`(`airport_name`, `icao`) VALUES ('$airport_name','$icao_name')";
        $result = mysqli_query($conn, $sql);

        echo $data["success"] = true;
    }
    else if($_POST["type"] == "edit_airport_name")
    {
        $airport_name = $_POST["airport_name"];
        $new_airport_name = $_POST["new_airport_name"];

        //check database if airport name already exist
        $sql = "SELECT * FROM `airport` WHERE `airport_name`='$new_airport_name'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        if(isset($row["airport_name"]) == $new_airport_name)
        {
            echo $data["success"] = false;
            exit();
        }


        $sql = "UPDATE `airport` SET `airport_name`='$new_airport_name' WHERE `airport_name`='$airport_name'";
        $result = mysqli_query($conn, $sql);

        echo $data["success"] = true;

    }
    else if($_POST["type"] == "edit_icao_name")
    {
        $icao_name = $_POST["icao_name"];
        $new_icao_name = $_POST["new_icao_name"];

        //check database if airport name already exist
        $sql = "SELECT * FROM `airport` WHERE `icao`='$new_icao_name'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        if(isset($row["icao"]) == $new_icao_name)
        {
            echo $data["success"] = 0;
            exit();
        }
        else
        {

            $sql = "UPDATE `airport` SET `icao`='$new_icao_name' WHERE `icao`='$icao_name'";
            $result = mysqli_query($conn, $sql);

            
            echo $data["success"] = true;
        }

    }
    else if($_POST["type"] == "delete_airport")
    {
        $airport_name = $_POST["airport_name"];

        $sql = "SELECT * FROM `airport` WHERE `airport_name`='$airport_name'";
        $result = mysqli_query($conn, $sql);

        $row = mysqli_fetch_assoc($result);

        if(isset($row["airport_name"]) == $airport_name)
        {
            /*$sql = "DELETE FROM `airport` WHERE `airport_name`='$airport_name'";
            $result = mysqli_query($conn, $sql);*/

            echo $data = true;
        }
        else
        {
            echo $data = $row["airport_name"];
        }

        
    }
    else if($_POST["type"] == "get_airport_data")
    { 
        $sql = "SELECT * FROM `airport`";
        $result = mysqli_query($conn, $sql);

        $data = array();

        while($row = mysqli_fetch_assoc($result))
        {
            $data[] = $row;
        }

        echo json_encode($data);
    }


?>