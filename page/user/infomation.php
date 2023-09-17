<?php

    session_start();
    if(!isset($_SESSION["user"])){
        header("Location: ../../index.php");
    }


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta
      name="description"
      content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5"
    />
    <meta name="author" content="AdminKit" />
    <meta
      name="keywords"
      content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web"
    />

    <title>HOME PAGE | BUNNY VA</title>

    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="../../assets/css/simplebar.css">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="../../assets/css/feather.css">
    <link rel="stylesheet" href="../../assets/css/dataTables.bootstrap4.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="../../assets/css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="../../assets/css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="../../assets/css/app-dark.css" id="darkTheme" disabled>
    
    

  </head>

  <body class="vertical light">
    <div class="wrapper">
    <?php include "inc/header.php" ?>
      <?php include "inc/sidebar.php" ?>


        <main role="main" class="main-content">
          <div class="container-fluid p-0">
            <h1 class="h3 mb-3">Career</h1>
            
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Pilot Ranks</h5>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Rank Title</th>
                                                <th scope="col">Hours Requirement</th>
                                                <th scope="col">Exam Requirement</th>
                                                <th scope="col">Pay Rate/Hour</th>
                                                <th scope="col">Rank Image</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Student Pilot</td>
                                                <td>0</td>
                                                <td>None</td>
                                                <td>$0.00</td>
                                                <td><img src="https://crew.theredsvirtual.com/lib/images/ranks/bar1%20s.png"></td>
                                            </tr>
                                            <tr>
                                                <td>First Officer</td>
                                                <td>10</td>
                                                <td>None</td>
                                                <td>$0.00</td>
                                                <td><img src="https://crew.theredsvirtual.com/lib/images/ranks/bar2%20s.png"></td>
                                            </tr>
                                            <tr>
                                                <td>Senior First Officer</td>
                                                <td>25</td>
                                                <td>None</td>
                                                <td>$0.00</td>
                                                <td><img src="https://crew.theredsvirtual.com/lib/images/ranks/bar3%20s.png"></td>
                                            </tr>
                                            <tr>
                                                <td>Captain</td>
                                                <td>50</td>
                                                <td>None</td>
                                                <td>$0.00</td>
                                                <td><img src="https://crew.theredsvirtual.com/lib/images/ranks/bar4%20s.png"></td>
                                            </tr>
                                            <tr>
                                                <td>Senior Captain</td>
                                                <td>100</td>
                                                <td>None</td>
                                                <td>$0.00</td>
                                                <td><img src="https://crew.theredsvirtual.com/lib/images/ranks/bar4+%20s.png"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

          </div>
        </main>

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
  </body>
</html>
