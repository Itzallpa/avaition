<?php

    session_start();
    require_once "../../sql/database.php";

    $sql = "SELECT * FROM flight_log WHERE id = '".$_GET["id"]."'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if($row > 0){
       
        echo $data = json_encode($row);
    }
    else{
       $data = false;
    }








?>