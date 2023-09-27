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

    

    //split full name
    $name = explode(" ", $_SESSION["full_name"]);
    $first_name = $name[0];
    $last_name = $name[1];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SETTING</title>

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="vertical  light">

    <div class="wrapper">
        <?php include 'inc/header.php'; ?>
        <?php include 'inc/sidebar.php'; ?>

        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-10 col-xl-8">
                        <h2 class="h3 mb-4 page-title">Settings</h2>
                        <div class="my-4">
                            <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                        aria-controls="home" aria-selected="true">Profile</a>
                                </li>
                            </ul>
                            <form>
                                <div class="row mt-5 align-items-center">
                                    <div class="col-md-3 text-center mb-5">
                                        <div class="avatar avatar-xl">
                                            <img src="<?php echo $_SESSION["pro_img"] ?>"
                                                class="avatar-img rounded-circle">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row align-items-center">
                                            <div class="col-md-7">
                                                <h4 class="mb-1"><?php echo $_SESSION["full_name"] ?></h4>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col-md-7">
                                                <p class="text-muted" id="user_comment_id"> <?php echo $user["user_comment"] ?> </p>
                                            </div>
                                            <div class="col">
                                                <p class="small mb-0 text-muted">IVAO-VID:
                                                    <?php echo $_SESSION["user_ivao_id"] ?>
                                                </p>
                                                <p class="small mb-0 text-muted">VATSIM-ID:
                                                    <?php echo $_SESSION["user_vatsim_id"] ?></p>
                                                <p class="small mb-0 text-muted">BNY-ID:
                                                    <?php echo $_SESSION["user_id"] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="firstname">Firstname</label>
                                        <input type="text" id="firstname" class="form-control" placeholder="" value="<?php echo $first_name ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="lastname">Lastname</label>
                                        <input type="text" id="lastname" class="form-control" placeholder="" value="<?php echo $last_name ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail4">Email</label>
                                    <input type="email" class="form-control" id="inputEmail4"
                                        placeholder="" value="<?php echo $user["email"] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="inputusercomment">Comment</label>
                                    <textarea type="text" class="form-control" id="inputusercomment"
                                        placeholder=""><?php echo $user["user_comment"] ?></textarea>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md">
                                        <label for="inputivaoid">IVAO-VID</label>
                                        <input type="number" class="form-control" id="inputivaoid"
                                            value="<?php echo $_SESSION["user_ivao_id"] ?>">
                                    </div>
                                    <div class="form-group col-md">
                                        <label for="inputvatsimid">VATSIM-ID</label>
                                        <input type="number" class="form-control" id="inputvatsimid"
                                            value="<?php echo $_SESSION["user_vatsim_id"] ?>">
                                    </div>
                                    <div class="form-group col-md">
                                        <label for="inputvatsimid">Birth Day</label>
                                        <input type="date" class="form-control" id="inputbirthdate"
                                            value="<?php echo $user["birthdate"] ?>">
                                    </div>
                                </div>
                                <hr class="my-4">
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Old Password</label>
                                            <input type="password" class="form-control" id="old_password">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword5">New Password</label>
                                            <input type="password" class="form-control" id="new_password">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword6">Confirm Password</label>
                                            <input type="password" class="form-control" id="comfirm_password">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mb-2">Password requirements</p>
                                        <p class="small text-muted mb-2"> To create a new password, you have to meet all
                                            of the following requirements: </p>
                                        <ul class="small text-muted pl-4 mb-0">
                                            <li> Minimum 8 character </li>
                                            <li>At least one special character</li>
                                            <li>At least one number</li>
                                            <li>Can’t be the same as a previous password </li>
                                        </ul>
                                    </div>
                                </div>
                                <button type="button" id="submit-edit-user-by-user" class="btn btn-primary">Save Change</button>
                            </form>
                        </div> <!-- /.card-body -->
                    </div> <!-- /.col-12 -->
                </div>
            </div>
        </main>
    </div>

</body>


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

</html>