<?php

        session_start();
        include_once '../../sql/database.php';

        if(!isset($_SESSION["user"])){
            header("Location: ../../index.php");
        }


        $id = $_GET['id'];

        $sql = "SELECT * FROM flight_log WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $log = mysqli_fetch_assoc($result);
        } else {
            echo "0 results";
        }



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5" />
    <meta name="author" content="AdminKit" />

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="icon" type="image/x-icon" href="../../img/bunnyhead.ico">

    <link rel="canonical" href="https://demo-basic.adminkit.io/pages-blank.html" />

    <title>HOME PAGE | Thai Airway VA</title>

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

</head>

<body class="vertical  light">
    <div class="wrapper">

        <?php include 'inc/header.php'; ?>
        <?php include 'inc/sidebar.php'; ?>

        <div class="main">

            <main role="main" class="main-content">
                <div class="container-fluid p-0">

                    <h1 class="h3 mb-3">Flight Log Book <?php echo $log["flight_number"] ?></h1>

                    <div class="row">
                        <div class="col-lg">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-text">
                                    <div class="row">
                                        <div class="col-lg">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">NAME</span>
                                                <input type="text" class="form-control" placeholder="name"
                                                    aria-label="name" aria-describedby="basic-addon1" value="<?php echo $log["flight_number"] ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">Arrival</span>
                                                <input type="text" class="form-control" placeholder="Arrival"
                                                    aria-label="Arrival" aria-describedby="basic-addon1" value="<?php echo $log["flight_arrival"] ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">Flight Aircraft</span>
                                                <input type="text" class="form-control" placeholder="Flight Aircraft"
                                                    aria-label="Flight Aircraft" aria-describedby="basic-addon1" value="<?php echo $log["flight_aircraft"] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">Flight Status</span>
                                                <?php if($log["flight_status"] == "1"){ ?>
                                                <input type="text" class="form-control" placeholder="Flight Status"
                                                    aria-label="Flight Status" aria-describedby="basic-addon1" value="Approved" disabled readonly>
                                                <?php }else{ ?>
                                                <input type="text" class="form-control" placeholder="Flight Status"
                                                    aria-label="Flight Status" aria-describedby="basic-addon1" value="Pending" disabled readonly>
                                                <?php } ?>
                                                
                                            </div>
                                        </div>
                                        <div class="col-lg">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">Flight Time</span>
                                                <input type="text" class="form-control" placeholder="Flight Time"
                                                    aria-label="Flight Time" aria-describedby="basic-addon1" value="<?php echo $log["flight_time"] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </main>
        </div>
    </div>

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
    <script src="../auth/js_jquery/upload_pro_img.js"></script>
</body>

</html>