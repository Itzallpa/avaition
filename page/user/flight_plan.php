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

    <title>HOME PAGE | BUNNY VA</title>

    <link href="css/app.css" rel="stylesheet" />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap"
      rel="stylesheet"
    />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <link rel="stylesheet" href="css/custom.css">
    
    

  </head>

  <body>
    
    <div class="wrapper">
      <?php include "inc/sidebar.php" ?>

      <div class="main">
        <?php include "inc/header.php" ?>

        <main class="content">
          <div class="container-fluid p-0">
            <h1 class="h3 mb-3">Flight Book!</h1>
            
              
            <div class="row">
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Flight Book!</h5>
                    <select class="form-select" aria-label="">
                      <option selected>Select Airline</option>
                      <option value="1">Thai airway</option>
                      <option value="2">Air asia</option>
                      <option value="3">Nok air</option>
                    </select>
                    <select class="form-select mt-3" id="sel_airport">
                        <option selected>Select Airport</option>
                        <?php
                            include "../../sql/database.php";
                            $sql = "SELECT * FROM airport";
                            $result = $conn->query($sql);
                            while($row = $result->fetch_assoc()){
                                echo "<option value='".$row['icao']."'>".$row['airport_name']."</option>";
                            } 
                        ?>
                    </select>
                    <div class="row mt-3">
                      <div class="col-lg-6">
                          <input type="text" class="form-control" id="price_jumsit" placeholder="XX" disabled readonly>
                      </div>
                      <div class="col-lg-6">
                          <button class="btn btn-primary" type="button">SUBMIT</button>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">MAP</h5>
                    <div id="map" style="height: 400px; width: 100%;"></div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <div class="row d-flex justify-content-between">
                    <h5 class="card-title">Flight Assignment</h5>
                    <p class="card-title">TIME: XX</p>
                    </div>
                    <table class="table">
                      <thead>
                        <tr>
                          <th>เลขเที่ยวบิน</th>
                          <th>สายการบิน</th>
                          <th>ต้นทางและปลายทาง</th>
                          <th>เวลาออกและเลิกบิน</th>
                          <th>ระยะเวลาเที่ยวบิน</th>
                          <th>เส้นทางเที่ยวบิน</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>FLI123</td>
                          <td>AirlinesXYZ</td>
                          <td>กรุงเทพฯ - นิวยอร์ก</td>
                          <td>08:00 น. - 16:00 น.</td>
                          <td>14 ชั่วโมง</td>
                          <td>BKK - JFK</td>
                        </tr>
                        <!-- สามารถเพิ่มแถวข้อมูลเที่ยวบินเพิ่มเติมตามต้องการ -->
                      </tbody>
                    </table>
                    
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
    <script src="../../js/main.js"></script>
  </body>
</html>
