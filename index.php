
<?php

  session_start();

  if(!isset($_SESSION["full_name"]))
    $_SESSION["full_name"] = "Guest";

  
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thai airways virtual airline</title>
    <link rel="stylesheet" href="css/custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
  </head>
  <body>

    <nav class="navbar bg-purple " data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand">THAI</a>
        
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link text-white" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="page/user/profile">Crew</a>
          </li>
        </ul>

      </div>
    </nav>
    
    
    <header class="bg-purple p-lg-5 my-auto header-center" style="height: 100vh;">
      <div class="container">
          <div class="row">
            <div class="col-lg">
              <h1 class="display-1 text-white">Welcome <?php echo $_SESSION["full_name"] ?> to Thai airways virtual airline</h1>
              <p class="lead text-white">Let's paint the virtual skies red with us today!  A great community, for everyone.</p>
              <a href="page/user/profile" class="btn-apply btn-lg">APPLY NOW</a>
            </div>
            <div class="col-lg order-lg-last order-first">
              <img class="img-fluid" src="img/tha-logo.png" alt="">
            </div>
          </div>
      </div>
    </header>

    <div class="container mt-3">
      <div class="row">
        <div class="col-lg text-center">
          <i class="bi bi-mortarboard" style="font-size: 3rem;"></i>
          <h2>XXX</h2>
          <p>PILOT</p>
        </div>
        <div class="col-lg text-center">
          <i class="bi bi-calendar-event-fill" style="font-size: 3rem;"></i>
          <h2>XXX</h2>
          <p>Schedules</p>
        </div>
        <div class="col-lg text-center">
          <i class="bi bi-airplane" style="font-size: 3rem;"></i>
          <h2>XXX</h2>
          <p>Flights</p>
        </div>
      </div>
    </div>



    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mx-auto text-center">
            <img src="img/tha-logo.png" alt="" width="70" height="70" srcset="">
            <p style="font-size: 13px">Thai airways virtual airline is a non-profit organization. This website serve the hobby of flight simulation. Similarities with real existing airlines are not intended and The Reds Virtual is in no way related to, funded by, or recognized by the real airlines.</p>
            <br>
            <p>Copyright © 2023 Thai airways virtual airlinel</p>
          </div>
        </div>
      </div>
    </footer>
    
    
    
    
    
    
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>