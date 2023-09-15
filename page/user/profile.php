<?php


    session_start();

    if(!isset($_SESSION["user_id"])){
        header("Location: ../auth/login");
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

    <link
      rel="canonical"
      href="https://demo-basic.adminkit.io/pages-blank.html"
    />

    <title>HOME PAGE | BUNNY VA</title>

    <link href="css/app.css" rel="stylesheet" />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap"
      rel="stylesheet"
    />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="css/custom.css">
    
    

  </head>

  <body>
    <div class="wrapper">

      <?php include 'inc/sidebar.php'; ?>

      <div class="main">
        <?php include 'inc/header.php'; ?>

        <main class="content">
          <div class="container-fluid p-0">
            <h1 class="h3 mb-3"><?php echo $_SESSION["full_name"] ?></h1>
            <div class="row">
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Pireps Filed</h5>
                            <p class="card-text">##</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Current Location</h5>
                            <p class="card-text">##</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Hours</h5>
                            <p class="card-text">##</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Landing Average</h5>
                            <p class="card-text">##</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
				      <div class="col-lg-8">
                <div class="card">
                  <div class="card-header">
                    <h5 class="card-title">LIVE MAP</h5>
                  </div>
                  <div class="card-body">
                    <div style="height: 50vh">
                      <iframe style="height: 100%; width: 100%;" src="https://tfdidesign.com/core/flightmap.php?theme=dark&noscrollwheel=true&region=2" frameborder="0"></iframe>
                    </div>
                </div>
            </div>
              
            </div>

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Airline NOTAMs</h5>
                                <p class="card-text">
                                    <h1>Welcome Aboard BUNNY <VAr></VAr>!</h1>
                                    <p>Posted by Natakon on 08/06/2023</p>
                                    <img src="../../img/bunny.png" class="img-fluid" alt="" srcset="">
                                    <p>Welcome to BUNNY Virtual,  

                                    Thank you to be the part of us ! Our staff be very happy to assist if you have any question or inquiry.

                                    If you are new here, please read our Pilot Guide book that you can download at Downloads page and proceed to REDAcademy and take the ENTRANCE EXAM so you can start flying as soon as possible.

                                    I hope you have a great time while you are here and also any recommendation and suggestion will be warmly welcome for our improvement to this new home. Let's paint the (virtual) skies Red (again)!
                                    </p>
                                </p>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="row">
              <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                <div class="card flex-fill">
                  <div class="card-header">
                    <h5 class="card-title mb-0">Upcoming Departures</h5>
                  </div>
                  <table class="table table-hover my-0">
                    <thead>
                      <tr>
                        <th>Flight #</th>
                        <th class="d-none d-xl-table-cell">Pilot</th>
                        <th class="d-none d-xl-table-cell">Limit</th>
                        <th>Departure</th>
                        <th class="d-none d-md-table-cell">Aircraft</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>SKY001</a></td>
                            <td class="d-none d-xl-table-cell">Natakon</td>
                            <td class="d-none d-xl-table-cell">1/1</td>
                            <td>Bangkok (VTBS)</td>
                            <td class="d-none d-md-table-cell">A320</td>
                        </tr>
                        <tr>
                            <td>SKY002</a></td>
                            <td class="d-none d-xl-table-cell">Natakon</td>
                            <td class="d-none d-xl-table-cell">1/1</td>
                            <td>Bangkok (VTBS)</td>
                            <td class="d-none d-md-table-cell">A320</td>
                        </tr>
                        <tr>
                            <td>SKY003</a></td>
                            <td class="d-none d-xl-table-cell">Natakon</td>
                            <td class="d-none d-xl-table-cell">1/1</td>
                            <td>Bangkok (VTBS)</td>
                            <td class="d-none d-md-table-cell">A320</td>
                        </tr>
                        <tr>
                            <td>SKY004</a></td>
                            <td class="d-none d-xl-table-cell">Natakon</td>
                            <td class="d-none d-xl-table-cell">1/1</td>
                            <td>Bangkok (VTBS)</td>
                            <td class="d-none d-md-table-cell">A320</td>
                        </tr>
                        <tr>
                            <td>SKY005</a></td>
                            <td class="d-none d-xl-table-cell">Natakorn</td>
                            <td class="d-none d-xl-table-cell">1/1</td>
                            <td>Bangkok (VTBS)</td>
                            <td class="d-none d-md-table-cell">A320</td>
                        </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
        </main>

        <footer class="footer">
          <div class="container-fluid">
            <div class="row text-muted">
              <div class="col-6 text-start">
                <p class="mb-0">
                  <a
                    class="text-muted"
                    href="#"
                    target="_blank"
                    ><strong>BUNNY VA</strong></a
                  >
                  &copy;
                </p>
              </div>
              <div class="col-6 text-end">
                <ul class="list-inline">
                  <li class="list-inline-item">
                    <a
                      class="text-muted"
                      href="#"
                      target="_blank"
                      >Support</a
                    >
                  </li>
                  <li class="list-inline-item">
                    <a
                      class="text-muted"
                      href="#"
                      target="_blank"
                      >Help Center</a
                    >
                  </li>
                  <li class="list-inline-item">
                    <a
                      class="text-muted"
                      href="#"
                      target="_blank"
                      >Privacy</a
                    >
                  </li>
                  <li class="list-inline-item">
                    <a
                      class="text-muted"
                      href="#"
                      target="_blank"
                      >Terms</a
                    >
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>

    <script src="js/app.js"></script>
  </body>
</html>
