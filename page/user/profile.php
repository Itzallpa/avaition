<?php
session_start();

require_once "../../sql/database.php";

if(!isset($_SESSION["user"])){
    header("Location: ../auth/login");
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    </div>


    <div class="container content mt-3">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Title</h5>
                        <p class="card-text">Content</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Title</h5>
                        <p class="card-text">Content</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    

    
</body>


<script>
 const sidebar = document.getElementById('sidebar');
 const content = document.querySelector('.content');
    

 
    document.addEventListener('mousemove', (event) => {
        
            //check screen size not to show sidebar on small screens
            if (window.innerWidth < 768) {
                return;
            }
            

            if (event.clientX < 40) {
            sidebar.classList.add('active');
            content.style.marginLeft = '250px'; // เลือกขนาดของ margin-left ที่เหมาะสม

            document.body.style.overflowX = 'hidden'; // ป้องกันการเลื่อนแนวนอน
            } else {
                sidebar.classList.remove('active');
                content.style.marginLeft = '0';
            }

    });
    
  </script>
</html>
