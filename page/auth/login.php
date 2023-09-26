<?php


  session_start();

    /*if(isset($_SESSION["full_name"]) != "Guest")
    {
        echo "<script> alert('. ". $_SESSION['full_name']. ". ') </script>";
    }
    else
    {
        echo "<script> alert('Guest') </script>";
    }*/


    if(isset($_SESSION["full_name"]) && $_SESSION["full_name"] != "Guest")
        header("Location: ../user/profile");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/custom.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Awesome ICON -->
    <link href="https://kit-pro.fontawesome.com/releases/v6.4.2/css/pro.min.css" rel="stylesheet">
    <!-- Font SF PRO DISPLAY (APPLE) -->
    <link href="https://fonts.cdnfonts.com/css/sf-pro-display?styles=98774,98773,98775,98770,98771,98769" rel="stylesheet">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <style>
    </style>
    <link rel="icon" type="image/x-icon" href="../../img/bunnyhead.ico">
    <style>
        body {
            background-image: url('https://cdn.discordapp.com/attachments/1151918559069470870/1152271901490692226/20230828175721_1.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            backdrop-filter: blur(8px);
            display: flex;
        }
        body.swal2-height-auto {
            height: 100% !important
        }
        ::placeholder {
            color: white;
            margin-right: auto;
            text-decoration: none;
            white-space: nowrap;
            font-family: 'SF Pro Display', sans-serif;
            font-weight: 500;                                      
        }
        
    </style>
</head>
<body>
<div>
    <div>
    <div id="Header">
        </div>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <div id="Content">
        <div class="row">
            <div class="w3 p-3 login-box">
                <h1 class="login-text text-white bunnytext" style="height: 56px; z-index: 3;">BUNNY VA LOGIN <i class="fa-duotone fa-right-to-bracket fa-xl"></i></h1>
                    <div class="form-group bunnytextwh">
                        <input type="email" placeholder="Enter Email:" name="email" class="form-control1">
                    </div>
                    <div class="form-group mt-3">
                        <input type="password" placeholder="Enter Password:" name="password" class="form-control1"> 
                    </div>
                    <div class="d-grid gap-2 mt-3">
                        <button class="loginbtn" id="login" type="submit"> <h1 class="login-textbtn">LOGIN <i class="fa-duotone fa-circle-check fa-xl"></i></a></button>
                    </div>
                    
                    <div class="mt-2">
                        <div class="row">
                            <div class="col text-white bunnytext">
                            <p>Don't have accout? <a href="registration" class="text-white">Register</a> <p>
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
