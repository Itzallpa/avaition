<?php

    
    session_start();

    if(isset($_SESSION['user'])){
        header("Location: page/user/profile");
    }



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/index.css">
    <title>BUNNY VIR</title>
</head>
<body>
        </nav>
        <main class="header">
            <div class="test col-lg-6 mx-auto p-3 text-center">
                <h1 class="text-center">WELCOME TO BUNNY VIRTUAL</h1>
                <p class="text-center">For you Apply to Bunny</p>
                <a href="page/auth/login" class="btn btn-light">CREW LOGIN</a>
            </div>
        </main>

        <div class="container mt-3">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="text-center p-2">BUNNY VIR</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 text-center">
                   <img style="border-radius: 120vh; width: 290px; height: 290px;" class="img-fluid" src="https://theredsvirtual.com/images/d6b8428d-c29a-4b5e-92cf-a8c7ad7a5f1a.png" alt="">
                </div>
                <div class="col-lg-6">
                    <h1>Welcome to BUUNY</h1>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aperiam nobis tempore laboriosam eos nisi rem minus ducimus totam. Eos fugit incidunt architecto ipsa autem totam pariatur optio provident numquam? Tempora!</p>
                </div>
            </div>
        </div>
    
</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</html>