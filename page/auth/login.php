
<?php

    session_start();
    if(isset($_SESSION["user"])){
        header("Location: ../user/profile");
    }






?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/custom.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    
</head>
<body>
<div class="container">
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-4 mx-auto p-3 border shadow-1">
                <h1 class="text-center mt-5">Login</h1>
                    <div class="form-group">
                        <input type="email" placeholder="Enter Email:" name="email" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <input type="password" placeholder="Enter Password:" name="password" class="form-control"> 
                    </div>
                    <div class="d-grid gap-2 mt-3">
                        <button class="btn btn-primary" id="login" type="submit">LOGIN</button>
                    </div>
                    
                    <div class="mt-2">
                        <div class="row">
                            <div class="col">
                            <p>Don't have accout? <a href="registration">Register!</a> <p>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
</body>

<script src="js_jquery/login.js"></script>
</html>
