<?php

        session_start();
        include('../../sql/database.php');



        $sql = "SELECT * FROM users WHERE id = '".$_SESSION["user_id"]."'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
        }

        if($user["user_role"] == "Admin" || $user["user_role"] == "Airport Mangement" || $user["user_role"] == "Aircraft Mangement" || $user["user_role"] == "Flight Operation")
            $role = 1;
        else
            $role = 0;




        if($role != 1){
            header("Location: ./profile");
        }


        
        if(isset($_GET["id"])){
            $sql = "SELECT * FROM flight_log WHERE id = '".$_GET["id"]."'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                $flight = mysqli_fetch_assoc($result);
            }


            $sql = "SELECT * FROM users WHERE id = '".$flight["flight_by"]."'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_num_rows($result);

            if($row > 0){
                $user = mysqli_fetch_assoc($result);
                $flight["flight_by"] = $row["full_name"];
            }
            else{
                $flight["flight_by"] = "Unknown";
            }



            if($flight["flight_status"] == 0)
                $flight["flight_status"] = "Pending";
            else if($flight["flight_status"] == 1)
                $flight["flight_status"] = "Approved";
            else if($flight["flight_status"] == 2)
                $flight["flight_status"] = "Rejected";
            else
                $flight["flight_status"] = "Unknown";



        }
        else{
            header("Location: ./view_profile");
        }


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="icon" type="image/x-icon" href="../../img/bunnyhead.ico">

    <link rel="canonical" href="https://demo-basic.adminkit.io/pages-blank.html" />

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

    <title>VIEW FLIGHT</title>
</head>

<body class="vertical  light">

    <div class="wrapper">
        <?php include 'inc/header.php'; ?>
        <?php include 'inc/sidebar.php'; ?>
    </div>

    <div class="main">

        <main role="main" class="main-content">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-lg">
                        <h5>VIEW FLIGHT <?php echo $flight["flight_number"] ?></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">FLIGHT LOG</h5>
                                <p class="card-text">
                                    Flight Number: <?php echo $flight["flight_number"] ?><br>
                                    Flight By: <?php echo $flight["flight_by"] ?><br>
                                    Flight Date: <?php echo $flight["flight_submitted"] ?><br>
                                    Flight Status: <?php echo $flight["flight_status"] ?><br>
                                </p>
                                <a href="./view_flight" class="btn btn-info">Back</a>
                                <button id="app_flight" class="btn btn-success">Approve</button>
                                <button id="rej_flight" class="btn btn-danger">Reject</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    </div>

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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>



<?php

        if(isset($_GET["type"]) == "getflightdata"){
            $sql = "SELECT * FROM flight_log WHERE id = '".$_GET["id"]."'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                $flight = mysqli_fetch_assoc($result);
            }
            echo json_encode($flight);
        }








?>