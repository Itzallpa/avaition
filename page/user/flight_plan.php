<?php

    session_start();

    require_once "../../sql/database.php";

    if(!isset($_SESSION["user"])){
        header("Location: ../../index.php");
    }


    $sql = "SELECT * FROM flight_active";
    $result = mysqli_query($conn, $sql);

    $data_flp = 0;
    while($row = mysqli_fetch_assoc($result)){

        if($row['flight_book_by'] == $_SESSION["user_id"])
        {
            if($row["flight_status"] == 0)
            {
                $data_flp = $row["flight_id"];
                break;
            }
        }
    }


    if($data_flp != 0)
    {
        header("Location: ./flight_brief");
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


    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="icon" type="image/x-icon" href="../../img/bunnyhead.ico">


    <title>HOME PAGE | BUNNY VA</title>

    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="../../assets/css/simplebar.css">
    <!-- Awesome ICON -->
    <link href="https://kit-pro.fontawesome.com/releases/v6.4.2/css/pro.min.css" rel="stylesheet">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
      
    <!-- Font SF PRO DISPLAY (APPLE)-->
    <link href="https://fonts.cdnfonts.com/css/sf-pro-display?styles=98774,98773,98775,98770,98771,98769" rel="stylesheet">
                
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
                            <th>Flight Number &nbsp;<i class="fa-duotone fa-plane-tail fa-xl"></i></th>
                            <th>Departure &nbsp;<i class="fa-duotone fa-plane-departure fa-lg"></i></th>
                            <th>Arrival &nbsp;<i class="fa-duotone fa-plane-arrival fa-lg"></i></th>
                            <th>Departure Time &nbsp;<i class="fa-duotone fa-timer fa-lg"></i></th>
                            <th>Arrival Time &nbsp;<i class="fa-duotone fa-timer fa-lg"></i></th>
                            <th>Book &nbsp;<i class="fa-duotone fa-bookmark fa-lg"></i></th>
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
                                        <td><a href="book.php?bookid='.$row['flight_id'].'" class="btn btn-primary">Book &nbsp;<i class="fa-duotone fa-book-circle-arrow-up fa-xl"></i></a></td>
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
