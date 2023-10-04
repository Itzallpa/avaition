<?php

    session_start();
    require_once "../../sql/database.php";

    

    $type = $_POST['type'];


    if($type == "sent_simbrief")
    {

        $flp_dep = $_POST['flp_dep'];
        $flp_arr = $_POST['flp_arr'];
        $flp_callsign = $_POST['flp_callsign'];


        $sql = "SELECT * FROM `flights` WHERE `flight_dep` = '$flp_dep' AND `flight_arr` = '$flp_arr' AND `flight_callsign` = '$flp_callsign'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
           
            $row = mysqli_fetch_assoc($result);

            $flight_id = $row['flight_id'];
            $user_id = $_SESSION['user_id'];


            $sql = "INSERT INTO `flight_active`(`flight_plan_id`, `flight_book_by`) VALUES ('$flight_id','$user_id');";
            $result = mysqli_query($conn, $sql);


            echo $data = true;
        }
        else
        {
            echo $data = false;
        }



    }



?>