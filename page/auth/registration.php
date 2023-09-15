<?php

    session_start();

    if(isset($_SESSION["user"])){
        header("Location: ../../");
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../css/custom.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="../../img/bunnyhead.ico">
</head>
<body style="background-image: url('../../img/non.jpg');">
        <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-6">
            <div class="card shadow-1" style="background-color: #657d27">
                <div class="card-body">
                    <h2 class="card-title text-center text-white">REGISTER | BUNNY VA</h2>
                    <form>
                        <div class="mb-3">
                            <label for="fullName" class="form-label">Frist Name Last Name</label>
                            <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="FirstName" required>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="LastName" required>
                            </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="email@gmail.com" require>
                        </div>
                        <div class="mb-3">
                            <label for="birthdate" class="form-label">Birthday</label>
                            <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                        </div>
                        <div class="mb-3">
                            <label for="ivaoId" class="form-label">IVAO ID</label>
                            <input type="text" class="form-control" id="ivaoId" name="ivaoId" placeholder="not required">
                        </div>
                        <div class="mb-3">
                            <label for="vatsimId" class="form-label">VATSIM ID</label>
                            <input type="text" class="form-control" id="vatsimId" name="vatsimId" placeholder="not required">
                        </div>
                        <button type="button" id="register" class="btn btn-purple w-100">Register!</button>
                    </form>

                </div>
                <div class="card-footer text-white">
                    <div class="row">
                    <div class="col">
                        <p>Already have an account? <a href="login" class="text-white">Login!</a> <p>
                    </div>
                </div>
            </div>

            </div>
        </div>
        </div>



</body>

    <script src="js_jquery/register.js"></script>
</html>
