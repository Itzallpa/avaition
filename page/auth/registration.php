<?php

    session_start();

    if(isset($_SESSION["full_name"]) != "Guest" && isset($_SESSION["full_name"]))
        header("Location: ../user/profile");


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../css/custom.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <!-- Awesome ICON -->
    <link href="https://kit-pro.fontawesome.com/releases/v6.4.2/css/pro.min.css" rel="stylesheet">
    <!-- Font SF PRO DISPLAY (APPLE) -->
    <link href="https://fonts.cdnfonts.com/css/sf-pro-display?styles=98774,98773,98775,98770,98771,98769" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../../img/bunnyhead.ico">
    <style>
        body {
            background-image: url('https://cdn.discordapp.com/attachments/1151918559069470870/1152271901490692226/20230828175721_1.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            backdrop-filter: blur(8px);

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
            font-weight: 400;                                      
        }
        .center-text {
            text-align: center;
        }
    </style>
</head>

<body>
<div>
<div id="Header">
    </div>
    <div id="Content">
    <div>
        <div class="row justify-content-center" style="width: 1400px; margin-right: 20%; margin-top: 0%; margin-left: 25%; margin-bottom: 20%">
            <div class="col-lg-6">
                <div class="card shadow-1 register-box" style="background-color: rgb(14 12 21 / 58%);" >
                    <div class="card-body">
                        <h2 class="card-title text-center bunnytextwh">REGISTER | BUNNY VA</h2>
                        <form>
                            <div class="mb-3 text-white">
                                <label for="fullName" class="form-label bunnytext">First Name Last Name</label>
                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="form-control1" id="firstName" name="firstName" placeholder="First name" required>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control1" id="lastName" name="lastName" placeholder="Last name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 text-white">
                                <label for="email" class="form-label bunnytext">Email</label>
                                <input type="email" class="form-control1" id="email" name="email" placeholder="email@gmail.com" require>
                            </div>
                            <div class="mb-3 text-white">
                                <label for="birthdate" class="form-label bunnytext">Birthday</label>
                                <input type="date" class="form-control1" style="font-weight: 400;" id="birthdate" name="birthdate" required>
                            </div>
                            <div class="mb-3 text-white">
                                <label for="ivaoId" class="form-label bunnytext">IVAO ID</label>
                                <input type="text" class="form-control1" style="font-weight: 400;" id="ivaoId" name="ivaoId" placeholder="not required">
                            </div>
                            <div class="mb-3 text-white">
                                <label for="vatsimId" class="form-label bunnytext">VATSIM ID</label>
                                <input type="text" class="form-control1" style="font-weight: 700;" id="vatsimId" name="vatsimId" placeholder="not required">
                            </div>
                            <button type="button" id="register" class="loginbtn" style="padding: 1ch 24ch;"><h1 class="login-textbtn">Register <i class="fa-duotone fa-circle-check fa-xl"></i></a></button>
                        </form>
                    </div>
                    <div class="card-footer text-white">
                        <div class="row">
                            <div class="col center-text bunnytext">
                                <p>Already have an account? <a href="login" class="text-white">Login!</a> <p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js_jquery/register.js"></script>
</body>
</html>
