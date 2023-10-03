<?php


    session_start();
    include '../../sql/database.php';
    
    if(isset($_SESSION["full_name"]) == "Guest" && !isset($_SESSION["full_name"]))
    {
        header("Location: ../auth/login");
    }

    $id = $_SESSION["user_id"];
    $sql = "SELECT * FROM `users` WHERE `id` = '$id'";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);



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

    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="../../assets/css/simplebar.css">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Font SF PRO DISPLAY (APPLE) -->
    <link href="https://fonts.cdnfonts.com/css/sf-pro-display?styles=98774,98773,98775,98770,98771,98769" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="../../assets/css/feather.css">
    <link rel="stylesheet" href="../../assets/css/dataTables.bootstrap4.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="../../assets/css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="../../assets/css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="../../assets/css/app-dark.css" id="darkTheme" disabled>

    <title>HOME PAGE | BUNNY VA</title>

    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap"
      rel="stylesheet"
    />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    

  </head>

  <body class="vertical light">
    <div class="wrapper">
      <?php include 'inc/header.php'; ?>
      <?php include 'inc/sidebar.php'; ?>

      <main role="main" class="main-content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12">
                  <h3><?php echo $_SESSION["full_name"] ?></h3>
                </div>
              </div>
              <div class="row">
                  <div class="col-lg">
                    <div class="card shadow">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-3 text-center">
                            <span class="circle circle-sm bg-primary">
                              <i class="fe fe-16 fe-command text-white mb-0"></i>
                            </span>
                          </div>
                          <div class="col pr-0" style="font-size: calc(1.27812rem + 0.3375vw);">
                            <p class="small text-muted mb-0">Pireps Filed</p>
                            <span class="mb-0">1,869</span>
                            <span class="small text-success">+16.5%</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg">
                    <div class="card shadow">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-3 text-center">
                            <span class="circle circle-sm bg-primary">
                              <i class="fe fe-16 fe-map text-white mb-0"></i>
                            </span>
                          </div>
                          <div class="col pr-0" style="font-size: calc(1.27812rem + 0.3375vw);">
                            <p class="small text-muted mb-0">Current Location</p>
                            <span class="text400 mb-0"><?php echo $row["user_last_location"] ?></span>
                            <span class="small text-success">+16.5%</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg">
                    <div class="card shadow">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-3 text-center">
                            <span class="circle circle-sm bg-primary">
                              <i class="fe fe-16 fe-clock text-white mb-0"></i>
                            </span>
                          </div>
                          <div class="col pr-0" style="font-size: calc(1.27812rem + 0.3375vw);">
                            <p class="small text-muted mb-0">Total Hours</p>
                            <span class="text400 mb-0">1,869</span>
                            <span class="small text-success">+16.5%</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg">
                    <div class="card shadow">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-3 text-center">
                            <span class="circle circle-sm bg-primary">
                              <i class="fe fe-16 fe-clipboard text-white mb-0"></i>
                            </span>
                          </div>
                          <div class="col pr-0" style="font-size: calc(1.27812rem + 0.3375vw);">
                            <p class="small text-muted mb-0">Landing Average</p>
                            <span class="text400 mb-0">1,869</span>
                            <span class="small text-success">+16.5%</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="row mt-3">
                <div class="col-lg-8">
                  <div class="card">
                    <div class="card-body" style="height: 50vh">
                      <h5 class="card-title">LIVE MAP</h5>
                      <iframe style="height: 100%; width: 100%;" src="https://tfdidesign.com/core/flightmap.php?theme=dark&amp;noscrollwheel=true&amp;region=2" frameborder="0"></iframe>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Airline NOTAMs</h5>
                      <p class="card-text">Welcome Aboard BUNNY !</p>
                      <p>Posted by Natakon on 08/06/2023</p>

                      <img src="../../img/bunny.png" class="img-fluid" alt="" srcset="">
                      
                      <p>Welcome to BUNNY Virtual, Thank you to be the part of us ! Our staff be very happy to assist if you have any question or inquiry. If you are new here, please read our Pilot Guide book that you can download at Downloads page and proceed to REDAcademy and take the ENTRANCE EXAM so you can start flying as soon as possible. I hope you have a great time while you are here and also any recommendation and suggestion will be warmly welcome for our improvement to this new home. Let's paint the (virtual) skies Red (again)!</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row mt-3">
                  <div class="col-lg">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Upcoming Departure</h5>
                        <table class="table datatables" id="dataTable-1">
                              <thead>
                                <tr>
                                  <th>Flight #</th>
                                  <th>Pilot</th>
                                  <th>Limit</th>
                                  <th>Departure</th>
                                  <th>Arrival</th>
                                  <th>Aircraft</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>1</td>
                                  <td>Mark</td>
                                  <td>Otto</td>
                                  <td>@mdo</td>
                                  <td>@mdo</td>
                                  <td>@mdo</td>
                                </tr>
                              </tbody>
                        </table>
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

  <script>
      $('#dataTable-1').DataTable(
      {
        autoWidth: true,
        "lengthMenu": [
          [16, 32, 64, -1],
          [16, 32, 64, "All"]
        ]
      });
    </script>
</html>
