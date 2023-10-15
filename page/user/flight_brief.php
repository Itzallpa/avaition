<?php
    session_start();
    require_once "../../sql/database.php";

    if(!isset($_SESSION['user'])){
        header("Location: ../../index.php");
    }

    $sql = "SELECT * FROM flight_active";
    $result = mysqli_query($conn, $sql);

    $data_flp = 0;
    $flight_id = 0;
    while($row = mysqli_fetch_assoc($result)){

        if($row['flight_book_by'] == $_SESSION["user_id"])
        {
            if($row["flight_status"] == 0)
            {
                $data_flp = $row["flight_id"];
                $flight_id = $row["flight_plan_id"]; 
                break;
            }
        }
    }


    if($data_flp == 0)
    {
        header("Location: ./flight_plan.php");
    }





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="icon" type="image/x-icon" href="../../img/bunnyhead.ico">

    <title>BRIEF | BUNNY</title>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="../../assets/css/simplebar.css">
    <!-- Awesome ICON -->
    <link href="https://kit-pro.fontawesome.com/releases/v6.4.2/css/pro.min.css" rel="stylesheet">
    <!-- Font SF PRO DISPLAY (APPLE) -->
    <link href="https://fonts.cdnfonts.com/css/sf-pro-display?styles=98774,98773,98775,98770,98771,98769"
        rel="stylesheet">
    <!-- Fonts CSS -->
    <link
        href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="../../assets/css/feather.css">
    <link rel="stylesheet" href="../../assets/css/dataTables.bootstrap4.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="../../assets/css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="../../assets/css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="../../assets/css/app-dark.css" id="darkTheme" disabled>
    <link rel="stylesheet" href="../../assets/css/custom.css">


    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
</head>

<body class="vertical light">

    <?php include "inc/header.php" ?>
    <?php include "inc/sidebar.php" ?>


    <?php

        $sql = "SELECT * FROM flights WHERE flight_id = $flight_id";
        $result = mysqli_query($conn, $sql);

        $row = mysqli_fetch_assoc($result);
    

    ?>

    <main role="main" class="main-content">
        <div class="row">
            <div class="col-lg">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center" id="flight_callsign_brief"><?php echo $row["flight_callsign"]; ?></h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">DEPARTURE</h5>
                        <p class="card-text">
                            <b icao_dep="<?php echo $row["flight_dep"]; ?>">ICAO</b> : <?php echo $row["flight_dep"]; ?><br>
                            <b>TIME</b> : <?php echo $row["flight_dep_time"]; ?><br>
                            <b id="show_matar_dep" ></b>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">ARRIVAL</h5>
                        <p class="card-text">
                            <b data_text="<?php echo $row["flight_arr"]; ?>" data-req="metar">ICAO</b> : <?php echo $row["flight_arr"]; ?><br>
                            <b>TIME</b> : <?php echo $row["flight_arr_time"]; ?><br>
                            <b id="show_matar_arr" ></b>
                        </p>
                    </div>
                </div>
            </div>
        </div>


        <div class="row mt-3">
            <div class="col-lg">
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">
                            <button class="btn btn-danger" id="cancel-book-flight" type="button">ยกเลิก</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>





</body>

<script src="../../assets/js/jquery.min.js"></script>
<script src="../../assets/js/popper.min.js"></script>
<script src="../../assets/js/moment.min.js"></script>
<script src="../../assets/js/bootstrap.min.js"></script>
<script src="../../assets/js/simplebar.min.js"></script>
<script src='../../assets/js/daterangepicker.js'></script>
<script src='../../assets/js/jquery.stickOnScroll.js'></script>
<script src="../../assets/js/tinycolor-min.js"></script>
<script src="../../assets/js/config.js"></script>
<script src="../../assets/js/apps.js"></script>
<script src='../../assets/js/jquery.dataTables.min.js'></script>
<script src='../../assets/js/dataTables.bootstrap4.min.js'></script>
<script src="../../js/main.js"></script>

</html>