<?php

        session_start();

        include_once('../../sql/database.php');


        if($_GET["type"] == "get_docs_pilot")
        {
            $sql = "SELECT * FROM `server_post` WHERE `id` = 1";
            $result = mysqli_query($conn, $sql);

            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            echo json_encode($row);

        }











?>