<?php

    session_start();
    include_once '../../sql/database.php';

    if(!isset($_SESSION["user"])){
        header("Location: ../../index.php");
    }
  

    $sql = "SELECT * FROM users WHERE id = '".$_SESSION["user_id"]."'";
    $result = mysqli_query($conn, $sql);


    if(mysqli_num_rows($result) > 0){
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $_SESSION["full_name"] = $user["full_name"]; 
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["pro_img"] = $user["profile_picture"];
        $_SESSION["email"] = $user["email"];
        $_SESSION["user_ivao_id"] = $user["user_ivao_id"];
        $_SESSION["user_vatsim_id"] = $user["user_vatsim_id"];
    }
    else
    {
        echo "Email does not exist";
    }


    


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta
      name="description"
      content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5"
    />
    <meta name="author" content="AdminKit" />
    <meta
      name="keywords"
      content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web"
    />

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link
      rel="canonical"
      href="https://demo-basic.adminkit.io/pages-blank.html"
    />

    <title>HOME PAGE | Thai Airway VA</title>

    <link href="css/app.css" rel="stylesheet" />

    <link rel="stylesheet" href="css/custom.css">


    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap"
      rel="stylesheet"
    />
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../auth/js_jquery/upload_pro_img.js"></script>
    <script src="../../js/main.js"></script>
    <link rel="icon" type="image/x-icon" href="../../img/bunnyhead.ico">
  </head>

  <body>
    <div class="wrapper">

      <?php include 'inc/sidebar.php'; ?>

      <div class="main">
        <?php include 'inc/header.php'; ?>

        <main class="content">
          <div class="container-fluid p-0">
            <h1 class="h3 mb-3">Profile</h1>

            <div class="row">
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-body text-center">
                            <input type="file" id="uploadImage" style="display: none;">
                            <label for="uploadImage">
                            <img
                                src="<?php echo $_SESSION["pro_img"] ?>"
                                class="img-fluid rounded-circle mb-2"
                                id="pro_img"
                            />
                            </label>
                            <h3><?php echo $_SESSION["full_name"] ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Profile</h5>

                      <div class="mb-3">
                        <div class="row">
                          <label for="" class="col-sm-2 col-form-label">Name</label>
                          <div class="col-sm-5">
                            <input type="text" readonly class="form-control-plaintext" id="" value="<?php echo $_SESSION["full_name"] ?>">
                          </div>
                        </div>
                        
                        <div class="row">
                          <label for="" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-5">
                            <input type="text" readonly class="form-control-plaintext" name="email" id="" value="<?php echo $_SESSION["email"] ?>">
                          </div>
                        </div>

                        <div class="row">
                          <label for="" class="col-sm-2 col-form-label">IVAO-ID</label>
                          <div class="col-sm-5">
                            <input type="number" class="form-control-plaintext" id="ivao_id" name="ivao_id" value="<?php echo $_SESSION["user_ivao_id"] ?>">

                    
                          </div>
                        </div>

                        <div class="row">
                          <label for="" class="col-sm-2 col-form-label">VATSIM-ID</label>
                          <div class="col-sm-5">
                            <input type="number" class="form-control-plaintext" id="vatsim_id" name="vatsim_id" value="<?php echo $_SESSION["user_vatsim_id"] ?>">
                          </div>
                        </div>
                        
                      </div>

                    </div>
                  </div>
                </div>
            </div>


          </div>
        </main>

        <footer class="footer">
          <div class="container-fluid">
            <div class="row text-muted">
              <div class="col-6 text-start">
                <p class="mb-0">
                  <a
                    class="text-muted"
                    href="#"
                    target="_blank"
                    ><strong>BUNNY</strong></a
                  >
                  &copy;
                </p>
              </div>
              <div class="col-6 text-end">
                <ul class="list-inline">
                  <li class="list-inline-item">
                    <a
                      class="text-muted"
                      href="#"
                      target="_blank"
                      >Support</a
                    >
                  </li>
                  <li class="list-inline-item">
                    <a
                      class="text-muted"
                      href="#"
                      target="_blank"
                      >Help Center</a
                    >
                  </li>
                  <li class="list-inline-item">
                    <a
                      class="text-muted"
                      href="#"
                      target="_blank"
                      >Privacy</a
                    >
                  </li>
                  <li class="list-inline-item">
                    <a
                      class="text-muted"
                      href="#"
                      target="_blank"
                      >Terms</a
                    >
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>

    <script src="js/app.js"></script>
  </body>
</html>
