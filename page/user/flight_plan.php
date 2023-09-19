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

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="icon" type="image/x-icon" href="../../img/bunnyhead.ico">


    <title>HOME PAGE | BUNNY VA</title>

    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="../../assets/css/simplebar.css">
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

  <body>
    
  <body class="vertical light">
      <?php include "inc/header.php" ?>
      <?php include "inc/sidebar.php" ?>

      <main role="main" class="main-content">

          <div class="container-fluid p-0">
            <h1 class="h3 mb-3">Flight Book!</h1>
            
            <div class="row">
              <div class="col-lg">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">FLIGHT BOOK!</h5>
                      <table id="" class="table table-hover my-0">
                        <thead>
                          <tr>
                            <th>Flight Number</th>
                            <th>Departure</th>
                            <th>Arrival</th>
                            <th>Departure Time</th>
                            <th>Arrival Time</th>
                            <th>Book</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            include "../../sql/database.php";
                            $sql = "SELECT * FROM flights";
                            $result = mysqli_query($conn, $sql);
                            if(mysqli_num_rows($result) > 0){
                              while($row = mysqli_fetch_assoc($result)){
                                echo '<tr>
                                        <td>'.$row['flight_callsign'].'</td>
                                        <td>'.$row['flight_dep'].'</td>
                                        <td>'.$row['flight_arr'].'</td>
                                        <td>'.$row['flight_dep_time'].'</td>
                                        <td>'.$row['flight_arr_time'].'</td>
                                        <td><a href="book.php?id='.$row['flight_id'].'" class="btn btn-primary">Book</a></td>
                                      </tr>';
                              }
                            }
                          ?>
                        </tbody>
                      </table>
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
  </body>
</html>
