<?php
session_start();

require_once "database.php";

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
    <style>
        body, html {
            height: 100%;
        }
        .bg {
            background-image: url("/images/bg.jpg");
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body class="bg">
    <div class="container">
        <br><br><br>
        <div class="row">
            <div class="col-6 offset-3" style="margin: auto;background: white; padding: 20px; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                <div class="panel-heading">
                    <h1>TG Profile</h1>
                    <p style="font-style: italic;">Profile</p>
                </div>
                <hr>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-3">
                            <form method="POST" enctype="multipart/form-data" action="upload.php">
                                <input type="file" name="file" id="profile-picture-input" style="display: none;">
                                <label for="profile-picture-input" style="cursor: pointer;">
                                    <img id="profile-picture" src="<?php echo $_SESSION['profile_picture'] ?? 'https://example.com/default_profile_picture.jpg'; ?>" alt="Profile Picture" class="thumbnail" style="max-width: 100%; max-height: 200px; object-fit: cover;">
                                </label>
                                <script>
                                    document.getElementById('profile-picture-input').addEventListener('change', function() {
                                        this.form.submit();
                                    });
                                </script>
                            </form>
                        </div>
                        <div class="col-9">
                            <dl class="row">
                                <dt class="col-12">
                                    Profile ID
                                </dt>
                                <dd class="col-12">
                                    <?php echo $_SESSION["data"] ?>
                                </dd>
                                <dt class="col-12">
                                    Profile Name
                                </dt>
                                <dd class="col-12">
                                    
                                </dd>
                            </dl>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
