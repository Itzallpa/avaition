
<?php

    session_start();
    if(isset($_SESSION["user"])){
        header("Location: ../../index.php");
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>สมัครสมาชิก</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="../../css/custom.css">

    <style>
        body {
        background-image: url('airport.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
    </style>
</head>
<body>

        <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-6">
            <div class="card shadow-1">
                <div class="card-body">
                    <h2 class="card-title text-center">REGISTER | THAI AIRWAY</h2>
                    <form>
                    <div class="mb-3">
                        <label for="fullName" class="form-label">Fristname Lastname</label>
                        <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="firstName" required>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="lastName" required>
                        </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" require>
                    </div>
                    <div class="mb-3">
                        <label for="birthdate" class="form-label">birthdate</label>
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
                    <button type="button" class="btn btn-primary w-100">Register!</button>
                    </form>

                </div>
                <div class="card-footer text-muted">
                    <div class="row">
                    <div class="col">
                        <p>Already have an account? <a href="login">Login!</a> <p>
                    </div>
                </div>
            </div>

            </div>
        </div>
        </div>



</body>
</html>
