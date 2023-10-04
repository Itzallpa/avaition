<?php

    session_start();
    require_once "../../sql/database.php";

    if(!isset($_SESSION['user'])){
        header("Location: ../../index.php");
    }

    if(isset($_GET['bookid'])){
        $bookid = $_GET['bookid'];
    }
    else
    {
        header("Location: ./flight_plan.php");
    }


    $sql = "SELECT * FROM flights WHERE flight_id = '$bookid'";
    $result = mysqli_query($conn, $sql);

    $data;

    if(mysqli_num_rows($result) > 0){
       
        $row = mysqli_fetch_assoc($result);

        $sql = "SELECT * FROM aircraft WHERE aircraft_id = '".$row["flight_aircraft"]."'";
        $result = mysqli_query($conn, $sql);

        $row2 = mysqli_fetch_assoc($result);

        $row["flight_aircraft"] = $row2["aircraft_name"];

        $data = $row;
    }
    else
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

    <title>BOOK | BUNNY</title>

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

    <style>
        #map-route {
            height: 400px;
            width: 100%;
        }
    </style>


</head>

<body class="vertical light">
    <?php include "inc/header.php" ?>
    <?php include "inc/sidebar.php" ?>


    <main role="main" class="main-content">
        <div class="row">
            <div class="col-lg">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Flight Informations</h5>
                        <div class="row">
                            <div class="col-lg">
                                <p id="flp_dep">Departure: <?php echo $data["flight_dep"] ?></p>
                                <p id="flp_callsign">Callsign: <?php echo $data["flight_callsign"] ?></p>
                                <p id="distance_">distance: </p>
                            </div>
                            <div class="col-lg">
                                <p id="flp_arr">Arrival: <?php echo $data["flight_arr"] ?></p>
                                <p>Aircraft: <?php echo $data["flight_aircraft"] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Route</h5>
                        <div class="blockquote">
                            <?php echo $data["flight_route"] ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Dispatch</h5>

                        <div class="row">
                            <div class="col-lg">
                                <button class="btn btn-primary" id="sent-simrief-submit" type="button">Simbrief</button>
                                <button class="btn btn-primary" type="button">IVAO FPL</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">MAP</h5>
                        <div id="map-route">
                            
                        </div>
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
<script src="../../js/map.js"></script>

</html>