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



    if($user["user_role"] == "Admin" || $user["user_role"] == "Airport Mangement" || $user["user_role"] == "Aircraft Mangement" || $user["user_role"] == "Flight Operation")
        $role = 1;
    else
        $role = 0;

    


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5" />
    <meta name="author" content="AdminKit" />
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web" />

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="icon" type="image/x-icon" href="../../img/bunnyhead.ico">

    <link rel="canonical" href="https://demo-basic.adminkit.io/pages-blank.html" />

    <title>HOME PAGE | Thai Airway VA</title>

    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="../../assets/css/simplebar.css">
    <!-- Awesome ICON -->
    <link href="https://kit-pro.fontawesome.com/releases/v6.4.2/css/pro.min.css" rel="stylesheet">
    <!-- Font SF PRO DISPLAY (APPLE) -->
    <link href="https://fonts.cdnfonts.com/css/sf-pro-display?styles=98774,98773,98775,98770,98771,98769"
        rel="stylesheet">
    <!-- Fonts CSS -->
    <link
        href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="../../assets/css/feather.css">
    <link rel="stylesheet" href="../../assets/css/dataTables.bootstrap4.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="../../assets/css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="../../assets/css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="../../assets/css/app-dark.css" id="darkTheme" disabled>

</head>

<body class="vertical  light">
    <div class="wrapper">

        <?php include 'inc/header.php'; ?>
        <?php include 'inc/sidebar.php'; ?>

        <div class="main">

            <main role="main" class="main-content">
                <div class="container-fluid p-0">

                    <h1 class="h3 mb-3">Profile</h1>
                    <div class="row mt-5 align-items-center">
                        <?php if($role) { ?>
                        <div class="col-lg-12">
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>No Shear this</strong> This is your profile page. You can see your profile
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="col-md-3 text-center mb-5">
                            <div class="avatar avatar-xl">
                                <img src="<?php echo $_SESSION["pro_img"] ?>" class="avatar-img rounded-circle">
                            </div>
                        </div>
                        <div class="col">
                            <div class="row align-items-center">
                                <div class="col-md-7">
                                    <h4 class="mb-1"><?php echo $_SESSION["full_name"] ?></h4>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <p class="small mb-0 text-muted">IVAO-VID: <?php echo $_SESSION["user_ivao_id"] ?>
                                    </p>
                                    <p class="small mb-0 text-muted">VATSIM-ID:
                                        <?php echo $_SESSION["user_vatsim_id"] ?></p>
                                    <p class="small mb-0 text-muted">BNY-ID: <?php echo $_SESSION["user_id"] ?></p>
                                </div>
                                <div class="col-md-7">
                                    <p class="text-muted"> <?php echo $user["user_comment"] ?> </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg">
                            <div class="card mb-4 shadow">
                                <div class="card-body my-n3">
                                    <div class="row align-items-center">
                                        <div class="col-3 text-center">
                                            <span class="circle circle-lg bg-light">
                                                <i class="fe fe-user fe-24 text-primary"></i>
                                            </span>
                                        </div> <!-- .col -->
                                        <div class="col">
                                            <a href="#">
                                                <h3 class="h5 mt-4 mb-1">Personal</h3>
                                            </a>
                                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit. Mauris blandit nisl ullamcorper, rutrum metus in, congue lectus.
                                            </p>
                                        </div> <!-- .col -->
                                    </div> <!-- .row -->
                                </div> <!-- .card-body -->
                                <div class="card-footer">
                                    <a href="" class="d-flex justify-content-between text-muted"><span>Account
                                            Settings</span><i class="fe fe-chevron-right"></i></a>
                                </div> <!-- .card-footer -->
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="card mb-4 shadow">
                                <div class="card-body my-n3">
                                    <div class="row align-items-center">
                                        <div class="col-3 text-center">
                                            <span class="circle circle-lg bg-light">
                                                <i class="fe fe-user fe-24 text-primary"></i>
                                            </span>
                                        </div> <!-- .col -->
                                        <div class="col">
                                            <a href="#">
                                                <h3 class="h5 mt-4 mb-1">Security</h3>
                                            </a>
                                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit. Mauris blandit nisl ullamcorper, rutrum metus in, congue lectus.
                                            </p>
                                        </div> <!-- .col -->
                                    </div> <!-- .row -->
                                </div> <!-- .card-body -->
                                <div class="card-footer">
                                    <a href="" class="d-flex justify-content-between text-muted"><span>Security
                                            Settings</span><i class="fe fe-chevron-right"></i></a>
                                </div> <!-- .card-footer -->
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="card mb-4 shadow">
                                <div class="card-body my-n3">
                                    <div class="row align-items-center">
                                        <div class="col-3 text-center">
                                            <span class="circle circle-lg bg-light">
                                                <i class="fe fe-user fe-24 text-primary"></i>
                                            </span>
                                        </div> <!-- .col -->
                                        <div class="col">
                                            <a href="#">
                                                <h3 class="h5 mt-4 mb-1">Personal</h3>
                                            </a>
                                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit. Mauris blandit nisl ullamcorper, rutrum metus in, congue lectus.
                                            </p>
                                        </div> <!-- .col -->
                                    </div> <!-- .row -->
                                </div> <!-- .card-body -->
                                <div class="card-footer">
                                    <a href="" class="d-flex justify-content-between text-muted"><span>Account
                                            Settings</span><i class="fe fe-chevron-right"></i></a>
                                </div> <!-- .card-footer -->
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <p>Flight Book</p>
                            <table class="table table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Flight Number</th>
                                        <th>Arrival</th>
                                        <th>Aircraft</th>
                                        <th>Flight Time</th>
                                        <th>Submitted</th>
                                        <th>Status</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>TG123</td>
                                        <td>VTBS</td>
                                        <td>A320</td>
                                        <td>1:30</td>
                                        <td>2021-09-01 12:00:00</td>
                                        <td>Approved</td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-primary">View</a>
                                        </td>
                                    </tr>
                                </tbody>
                                </table>
                        </div>
                    </div>
                    
                    <?php if($role) { ?>
                    <div class="row">
                      <div class="col-lg-12">
                        <p>STAFF NOTE</p>
                      </div>
                    </div>
                    <?php } ?>

                </div>
            </main>
        </div>
    </div>

    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/popper.min.js"></script>
    <script src="../../assets/js/moment.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/simplebar.min.js"></script>
    <script src='../../assets/js/daterangepicker.js'></script>
    <script src='../../assets/js/jquery.stickOnScroll.js'></script>
    <script src="../../assets/js/tinycolor-min.js"></script>
    <script src="../../assets/js/config.js"></script>
    <script src="../../assets/js/apps.js"></script>
    <script src='../../assets/js/jquery.dataTables.min.js'></script>
    <script src='../../assets/js/dataTables.bootstrap4.min.js'></script>
    <script src="../../js/main.js"></script>
</body>

</html>