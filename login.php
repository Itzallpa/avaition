<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
   exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<div class="container">
    <?php
    if (isset($_POST["login"])) {
       $email = $_POST["email"];
       $password = $_POST["password"];
        require_once "database.php";
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if ($user) {
            if (password_verify($password, $user["password"])) {
                $_SESSION["user"] = "yes";
                $_SESSION["data"] = $user["full_name"] ; 
                $_SESSION["user_id"] = $user["id"];
                
                echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Welcome back!',
                        text: 'Log in Complete!',
                        timer: 100000, // 1 seconds
                        timerProgressBar: true,
                        showConfirmButton: false
                    }).then(() => {
                        window.location.href = 'index.php';
                    });
                </script>";
                exit();
            } else {
                echo "<script>Swal.fire('Error', 'Password does not match', 'error');</script>";
            }
        } else {
            echo "<script>Swal.fire('Error', 'Email does not match', 'error');</script>";
        }
    }
    ?>
    <form action="login.php" method="post">
        <div class="form-group">
            <input type="email" placeholder="Enter Email:" name="email" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" placeholder="Enter Password:" name="password" class="form-control"> 
        </div>
        <div class="form-btn">
            <input type="submit" value="Login" name="login" class="btn btn-primary">
        </div>
    </form>
    <div><p>Not registered yet? <a href="registration.php">Register Here</a></p></div>
</div>
</body>
</html>
