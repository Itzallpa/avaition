
<?php 

session_start();

    if(!isset($_SESSION["data"])){
        header("Location: page/auth/login.php");
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thai Airways Landing Page</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/custom.css">
</head>
<body>
  <!-- โค้ดก่อนส่วนของ Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Thai Airways</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Flights</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
            </li>
        </ul>
        <!-- เพิ่มส่วนผู้เข้าสู่ระบบ -->
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">John Doe</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>
    <!-- โค้ดหลังส่วนของ Navbar -->


    <div class="jumbotron text-center p-5">
        <h1 class="display-4">Welcome to Thai Airways</h1>
        <p class="lead">Experience the elegance of flying with us.</p>
        <a class="btn btn-primary btn-lg" href="#" role="button">Flight</a>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-center text-purple fw-bold">ข่าว และ ประกาศ</h2>
            </div>
        </div>
    </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>