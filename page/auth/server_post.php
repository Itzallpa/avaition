<?php

    session_start();

    include_once('../../sql/database.php');


    if($_POST["type"] == "edit_docs_pilot")
    {
        $data_post = $_POST["data"];

        $sql = "UPDATE `server_post` SET `pilot_train_docs` = '$data_post' WHERE `id` = 1";
        $result = mysqli_query($conn, $sql);

        echo $data = true;
    }







?>