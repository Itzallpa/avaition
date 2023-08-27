
<?php

    session_start();

    if(!isset($_SESSION["user"])){
        header("Location: page/auth/login");
    }




?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thai Airways Landing Page</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
  <link rel="icon" href="img/tha_icon.ico" type="image/x-icon">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/custom.css">
</head>
<body>

    <?php include 'page/inc/navbar.php' ?>

    <div class="jumbotron text-center p-5">
        <h1 class="display-4">Welcome to Thai Airways</h1>
        <p class="lead">Experience the elegance of flying with us.</p>
        <a class="btn btn-purple btn-lg" href="#" role="button">Flight</a>
    </div>

    <div class="container mt-5 p-lg-0">
        <div class="row">
            <div class="col-lg-6 border p-2 shadow-1">
                <h1 class="text-center">LIVE MAP!</h1>
                <div class="ratio ratio-21x9">
                    <iframe src="https://tfdidesign.com/core/flightmap.php?theme=dark&noscrollwheel=true&region=5" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-lg-6">
                <h2 class="text-center" >Flight Book!</h2>
                <div class="d-grid gap-2">
                    <button class="btn btn-purple" type="button">BOOK FLIGHT</button>
                    <button class="btn btn-primary" type="button">CRRUENT FLIGHT</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 border mt-5 shadow-1 p-2">
                <h5>Current Flights</h5>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Pilot</th>
                        <th scope="col">Callsign</th>
                        <th scope="col">Arrival</th>
                        <th scope="col">Aircraft</th>
                        <th scope="col">ETE/ETD</th>
                        <th scope="col">Distance</th>
                        <th scope="col">Status</th>
                        <th scope="col">Network</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">1</th>
                        <td>THA1</td>
                        <td>VTCC</td>
                        <td>A320</td>
                        <td>1.10</td>
                        <td>400</td>
                        <td class="bg-primary">Enroute</td>
                        <td>IVAO</td>
                        </tr>
                        <tr>
                        <th scope="row">2</th>
                        <td>THA2</td>
                        <td>VTCC</td>
                        <td>A320</td>
                        <td>1.10</td>
                        <td>400</td>
                        <td class="bg-success">Enroute</td>
                        <td>IVAO</td>
                        </tr>
                        <tr>
                        <th scope="row">3</th>
                        <td>THA3</td>
                        <td>VTCC</td>
                        <td>A320</td>
                        <td>1.10</td>
                        <td>400</td>
                        <td>Enroute</td>
                        <td>IVAO</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>