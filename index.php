<?php


  session_start();

  
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bunny VA</title>
    <link rel="stylesheet" href="css/custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="icon" type="image/x-icon" href="/img/bunnyhead.ico">
  </head>
  <body>

    <nav class="navbar bg-purple " data-bs-theme="dark">
      <div class="container-fluid">
        <img src="img/bunny.png" width="45" height="45">
        <a style="margin-left: 0.5%; font-size: 25px; color: #FFFFFF" class="bunnytext">BUNNY VA</a>

        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link text-white bunnytext" style="font-weight: 700; font-size: 20px" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class='nav-link text-white bunnytext' style="font-weight: 700; font-size: 20px" href='page/auth/login'>Crew</a>
          </li>
        </ul>

      </div>
    </nav>
    
    
    <header class="bg-purple p-lg-5 my-auto header-center" style="height: 100vh;">
      <div class="container">
          <div class="row">
            <div class="col-lg">
              <h1 class="display-1 text-white" style="font-family: SF Pro Display, sans-serif;font-weight: 700">Welcome to BUNNY VA</h1>
              <p class="lead text-white bunnytext">Let's paint the virtual skies with us today!  A great community, for everyone.</p>
              <a href='page/user/profile' class='btn-apply btn-lg bunnytext'>PROFILE</a>
            </div>
            <div class="col-lg order-lg-last order-first">
              <img class="img-fluid" src="img/bunny.png" alt="">
            </div>
          </div>
      </div>
    </header>

    <div class="container mt-3">
      <div class="row">
        <div class="col-lg text-center">
          <i class="bi bi-mortarboard" style="font-size: 3rem;"></i>
          <h2 class="bunnytext">XXX</h2>
          <p class="bunnytext">PILOT</p>
        </div>
        <div class="col-lg text-center">
          <i class="bi bi-calendar-event-fill" style="font-size: 3rem;"></i>
          <h2 class="bunnytext">XXX</h2>
          <p class="bunnytext">Schedules</p>
        </div>
        <div class="col-lg text-center">
          <i class="bi bi-airplane" style="font-size: 3rem;"></i>
          <h2 class="bunnytext">XXX</h2>
          <p class="bunnytext">Flights</p>
        </div>
      </div>
    </div>



    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mx-auto text-center">
            <img src="img/bunny.png" alt="" width="70" height="70" srcset="">
            <p style="font-family: SF Pro Display, sans-serif;font-size: 13px;font-weight: 400" >BUNNY VA is a non-profit organization. This website serve the hobby of flight simulation.</p>
            <br>
            <p class="bunnytext">Copyright © 2023 BUNNY VA</p>
          </div>
        </div>
      </div>
    </footer>
    
    
    
    
    
    
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>