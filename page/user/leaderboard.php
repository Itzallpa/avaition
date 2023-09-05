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
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link
      rel="canonical"
      href="https://demo-basic.adminkit.io/pages-blank.html"
    />

    <title>HOME PAGE | BUNNY VIR</title>

    <link href="css/app.css" rel="stylesheet" />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="css/custom.css">
    

  </head>

  <body>
    <div class="wrapper">
      <?php include "inc/sidebar.php" ?>

      <div class="main">
        <?php include "inc/header.php" ?>

        <main class="content">
          <div class="container-fluid p-0">
            <h1 class="h3 mb-3">Leaderboard</h1>
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">All Time Greats</h5>
                            <div class="row">
                                <div class="col-lg col-12">
                                    <div class="card" style="background-color: #3D1A6E;">
                                        <div class="card-body text-white">
                                            <h5 class="card-title">Top Pilots All Time (Flights Flown)</h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg col-12">
                                        <table class="table table-hover my-0">
                                            <thead>
                                                <tr>
                                                <th>Pilots</th>
                                                <th>Flights Flown</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                <td>1.BUNNY VIR001</a></td>
                                                <td>0</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg col-12">
                                    <div class="card" style="background-color: #3D1A6E;">
                                        <div class="card-body">
                                            <h5 class="card-title">Top Pilots All Time (Hours Flown)</h5>     
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg col-12">
                                        <table class="table table-hover my-0">
                                            <thead>
                                                <tr>
                                                <th>Pilots</th>
                                                <th>Flights Flown</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                <td>1.BUNNY VIR001</a></td>
                                                <td>0</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                    ><strong>BUNNY</strong></a
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
