<?php
session_start();

require_once "../../sql/database.php";

if($_SESSION["data"] == ""){
    header("Location: login.php");
    exit();
}
else
{
    //check if user has profile picture
    $sql = "SELECT * FROM users WHERE id = " . $_SESSION["user_id"];
    $result = mysqli_query($conn, $sql);

    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if ($user["profile_picture"] == "") {
        $_SESSION["profile_picture"] = "https://example.com/default_profile_picture.jpg";
    } else {
        $_SESSION["profile_picture"] = $user["profile_picture"];
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Share with LinkedIn API v2</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/custom.css">
    <link rel="stylesheet" href="../../css/sidebar.css">
</head>
<body class="bg">

    <?php include '../inc/navbar.php' ?>
    
    <div class="d-flex">
        <div class="sidebar p-2" id="sidebar">
            <a href="#">Home</a>
            <a href="#">Flights</a>
            <a href="#">Services</a>
            <a href="#">About</a>
            <a href="#">Contact</a>
        </div>
        <div class="content">
            <div class="container p-2 mt-3">
                <div class="row">
                    <div class="col-lg-12 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Title</h5>
                            <p class="card-text">lore</p>
                        </div>
                    </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>


<script>
 const sidebar = document.getElementById('sidebar');
    
    document.addEventListener('mousemove', (event) => {
      if (event.clientX < 40) {
        sidebar.classList.add('active');
      } else {
        sidebar.classList.remove('active');
      }
    });
  </script>
</html>
