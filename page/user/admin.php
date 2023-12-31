<?php

    session_start();

    require_once "../../sql/database.php";

    $user_id = $_SESSION["user_id"];
    $sql = "SELECT * FROM users WHERE id = $user_id";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);


    $_SESSION["user_role"] = $row["user_role"];


    if(!isset($_SESSION["user"])){
        header("Location: ../../index.php");
    }
    else if($row["user_role"] != "Admin" && ($row["user_role"] != "Airport Mangement" && ($row["user_role"] != "Aircraft Mangement" && ($row["user_role"] != "Flight Operation" )))){
        header("Location: profile");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="icon" type="image/x-icon" href="../../img/bunnyhead.ico">

    <title>HOME PAGE | Thai Airway VA</title>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


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

<body class="vertical light">
    <div class="wrapper">

        <?php include 'inc/header.php'; ?>
        <?php include 'inc/sidebar.php'; ?>



        <main role="main" class="main-content">
            <div class="container-fluid p-0">
                <h1 class="h3 mb-3">Admin Page</h1>

                <div class="row">
                    <div class="col-lg">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Pilot Online</h5>
                                <p class="card-text">XX</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">All Pilot</h5>
                                <p class="card-text">XX</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">ALL Flight</h5>
                                <p class="card-text">XX</p>
                            </div>
                        </div>
                    </div>
                </div>


                <?php if($_SESSION["user_role"] == "Admin") { ?>
                <h1 class="h3 mt-3">User Mangement</h1>
                <div class="row">
                    <div class="col-lg-12 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">ALL USER</h5>
                                <table id="user_table" class="table table-hover my-0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Birth Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM users";
                                        $result = mysqli_query($conn, $sql);

                                        $count = 1;

                                        while($row = mysqli_fetch_assoc($result)){
                                            echo "<tr>";
                                            echo "<td>" . $count . "</td>";
                                            echo "<td>" . $row["full_name"] . "</td>";
                                            echo "<td>" . $row["email"] . "</td>";
                                            echo "<td>" . $row["user_role"] . "</td>";
                                            echo "<td>" . $row["birthdate"] . "</td>";
                                            echo "<td><button class='btn btn-primary' data-toggle='modal' data-target='#edit_user'>Edit</button></td>";
                                            echo "</tr>";

                                            $count++;
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>

                <?php if($_SESSION["user_role"] == "Airport Mangement" || $_SESSION["user_role"] == "Admin") { ?>

                <h1 class="h3 mt-3">Airport Mangement</h1>
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">AIRPORT</h5>
                                <table id="airport_table" class="table table-hover my-0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Airport Name</th>
                                            <th>ICAO Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql = "SELECT * FROM airport";
                                            $result = mysqli_query($conn, $sql);

                                            $count = 1;
                                            while($row = mysqli_fetch_assoc($result)){

                                                if(!$row)
                                                {
                                                    echo "<tr>";
                                                    echo "<td class=''> No Data </td>";
                                                    echo "<tr>";
                                                    break;
                                                }

                                                echo "<tr>";
                                                echo "<td>" . $count . "</td>";
                                                echo "<td>" . $row["airport_name"] . "</td>";
                                                echo "<td>" . $row["icao"] . "</td>";
                                                echo "<td><button class='btn btn-danger' name='del_airport'>DELETE</button></td>";
                                                echo "</tr>";

                                                $count++;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12 mt-lg-0 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">ADD AIRPORT</h5>
                                <div class="row">
                                    <div class="col-lg">
                                        <label class="form-label">Airport Name</label>
                                        <input type="text" class="form-control" name="airport_name" placeholder="">
                                    </div>
                                    <div class="col-lg">
                                        <label class="form-label">ICAO</label>
                                        <input type="text" class="form-control" name="icao_name" placeholder="">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-lg">
                                        <div class="d-grid gap-2">
                                            <button class="btn btn-success" id="submit-add-airport"
                                                type="button">ADD</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>

                <h1 class="h3 mt-3">Aircraft Mangement</h1>
                <div class="row">
                    <div class="col-lg">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Aircraft</h5>
                                <table id="aircraft_table" class="table table-hover my-0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Aircraft Name</th>
                                            <th>Registration</th>
                                            <th>Add Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM aircraft";
                                        $result = mysqli_query($conn, $sql);
                                    

                                        $count = 1;
                                        while($row = mysqli_fetch_assoc($result)){
                                            echo "<tr>";
                                            echo "<td>" . $count . "</td>";
                                            echo "<td>" . $row["aircraft_name"] . "</td>";
                                            echo "<td>" . $row["aircraft_reg"] . "</td>";
                                            echo "<td>" . $row["aircraft_add_date"] . "</td>";
                                            echo "<td><button class='btn btn-primary' data-toggle='modal' data-target='#edit_aircraft'>Edit</button></td>";
                                            echo "</tr>";

                                            $count++;
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if($_SESSION["user_role"] == "Aircraft Mangement" || $_SESSION["user_role"] == "Admin") { ?>
                <div class="row mt-3">
                    <div class="col-lg">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">ADD AIRCRAFT</h5>
                                <div class="row">
                                    <div class="col-lg">
                                        <input class="form-control" type="text" name="aircraft_name"
                                            placeholder="Aircraft Name">
                                    </div>
                                    <div class="col-lg">
                                        <select name="airctaft_type" class="form-control" id="airctaft_type">
                                            <option value="" disabled selected>Aircraft Type</option>
                                            <option value="Boeing">Boeing</option>
                                            <option value="Airbus">Airbus</option>
                                        </select>
                                    </div>
                                    <div class="col-lg">
                                        <input class="form-control" type="text" name="airctaft_reg"
                                            placeholder="Registration">
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-lg-12">
                                        <div class="d-grid gap-2">
                                            <button class="btn btn-success" id="submit-add-aircraft" type="button">ADD
                                                AIRCRAFT</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>

            <h1 class="h3 mt-3">Flight Operation</h1>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Flight Operation</h5>
                            <table id="Flight-Operation" class="table table-hover my-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Flight Number</th>
                                        <th>Departure</th>
                                        <th>Time</th>
                                        <th>Arrival</th>
                                        <th>Time</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                        $sql = "SELECT * FROM flights";
                                        $result = mysqli_query($conn, $sql);
                                        $count = 1;
                                        while($row = mysqli_fetch_assoc($result)){

                                            
                                            $sql = "SELECT * FROM aircraft WHERE aircraft_id = " . $row["flight_aircraft"];
                                            $result2 = mysqli_query($conn, $sql);
                                            

                                            $row2 = mysqli_fetch_assoc($result2);

                                            
                                            if(!$row2)
                                            {
                                                $row2["aircraft_name"] = "No Data";
                                                $row2["aircraft_reg"] = "No Data";
                                            }


                                            echo "<tr data-toggle='modal' data-target='#edit_flight'>";
                                            echo "<td>" . $count . "</td>";
                                            echo "<td>" . $row["flight_callsign"] . "</td>";
                                            echo "<td>" . $row["flight_dep"] . "</td>";
                                            echo "<td>" . $row["flight_dep_time"] . "</td>";
                                            echo "<td>" . $row["flight_arr"] . "</td>";
                                            echo "<td>" . $row["flight_arr_time"] . "</td>";
                                            echo "<td>" . $row2["aircraft_name"] . " (" . $row2["aircraft_reg"] . ")" . "</td>";
                                            echo "</tr>";

                                            $count++;
                                        }
                                    
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php if($_SESSION["user_role"] == "Flight Operation" || $_SESSION["user_role"] == "Admin") { ?>
                <div class="col-lg-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add Flight</h5>
                            <div class="row">
                                <div class="col-lg">
                                    <input type="text" class="form-control" name="callsign"
                                        placeholder="Aircraft Identification">
                                </div>
                                <div class="col-lg mt-lg-0 mt-3">
                                    <select class="form-control mb-3" name="aircraft">
                                        <option selected disabled>Aircraft</option>
                                        <?php

                                            $sql = "SELECT * FROM aircraft";
                                            $result = mysqli_query($conn, $sql);

                                            while($row = mysqli_fetch_assoc($result)){
                                                $name = $row["aircraft_name"];
                                                $reg = $row["aircraft_reg"];
    
                                                $full_aircraft = $name . "(" . $reg . ")";

                                                echo "<option value=". $row["aircraft_id"] .">" . $full_aircraft . "</option>";
                                            }
                                        
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg">
                                    <select class="form-control mb-3" id="dep_icao">
                                        <option selected="" disabled>Departure</option>
                                        <?php

                                            $sql = "SELECT * FROM airport";
                                            $result = mysqli_query($conn, $sql);

                                            while($row = mysqli_fetch_assoc($result)){
                                                echo "<option>" . $row["icao"] . "</option>";
                                            } 
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg">
                                    <select class="form-control mb-3" id="arr_icao">
                                        <option selected="" disabled>Arrival</option>
                                        <?php
                                        
                                            $sql = "SELECT * FROM airport";
                                            $result = mysqli_query($conn, $sql);

                                            while($row = mysqli_fetch_assoc($result)){
                                                echo "<option>" . $row["icao"] . "</option>";
                                            } 
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg">
                                    <input type="text" class="form-control" id="dep_time" placeholder="Departure Time">
                                </div>
                                <div class="col-lg mt-lg-0 mt-3">
                                    <input type="text" class="form-control" id="arr_time" placeholder="Arrival Time">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-lg">
                                    <textarea class="form-control" rows="2" name="route"
                                        placeholder="Route"></textarea>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-lg">
                                    <textarea class="form-control" rows="2" name="Remark"
                                        placeholder="Remark"></textarea>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-lg d-grid gap-2">
                                    <button class="btn btn-success" id="submit-add-flight" type="button">ADD
                                        FLIGHT</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>

    </div>
    </main>
    </div>


    <div class="modal fade" id="edit_user" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">EDIT USER</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg">
                                    <label for="" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" name="" id="edit_fullname" placeholder="">
                                </div>
                                <div class="col-lg">
                                    <label for="" class="form-label">Email</label>
                                    <input type="text" class="form-control" name="" id="edit_email" placeholder="">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-lg">
                                    <label for="" class="form-label">IVAO ID</label>
                                    <input type="text" class="form-control" name="" id="edit_ivao_id" placeholder="">
                                </div>
                                <div class="col-lg">
                                    <label for="" class="form-label">VATSIM ID</label>
                                    <input type="text" class="form-control" name="" id="edit_Vatsim_id" placeholder="">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-lg">
                                    <label for="" class="form-label">Birthday</label>
                                    <input type="date" class="form-control" name="" id="edit_birthdate" placeholder="">
                                </div>
                                <div class="col-lg">
                                    <label for="" class="form-label">Role</label>
                                    <select class="form-control" id="edit_role">
                                        <option disabled>Open this select menu</option>
                                        <option value="Member">Member</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Airport Mangement">Airport Mangement</option>
                                        <option value="Aircraft Mangement">Aircraft Mangement</option>
                                        <option value="Flight Operation">Flight Operation</option>

                                    </select>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-lg">
                                    <label for="" class="form-label">RANK</label>
                                    <select class="form-control" id="edit_rank">
                                        <option disabled>Open this select menu</option>
                                        <?php 
                                            $sql = "SELECT * FROM rank_pilot";
                                            $result = mysqli_query($conn, $sql);

                                            while($row = mysqli_fetch_assoc($result)){
                                                echo "<option value=". $row["rank_id"] .">" . $row["rank_name"] . "</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg">
                                    <label for="" class="form-label">Flight Hour</label>
                                    <input type="text" class="form-control" name="" id="edit_flight_hour"
                                        placeholder="">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-lg">
                                    <label for="" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="" id="edit_password"
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="submit-edituser"
                        data-dismiss="modal">Understood</button>
                </div>
            </div>
        </div>
    </div>

    <?php if($_SESSION["user_role"] == "Aircraft Mangement" || $_SESSION["user_role"] == "Admin") { ?>
    <div class="modal fade" id="edit_aircraft" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">EDIT AIRCRAFT</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <label for="aircraftname" class="form-label">Aircraft Name</label>
                            <input class="form-control" type="text" name="airc_name">
                        </div>
                        <div class="col">
                            <label for="aircraftreg" class="form-label">Aircraft Register</label>
                            <input class="form-control" type="text" name="airc_reg">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg">
                            <label for="aircrafttype" class="form-label">Aircraft Type</label>
                            <select class="form-control" name="airc_type">
                                <option disabled>Aircraft Type</option>
                                <option value="Airbus">Airbus</option>
                                <option value="Boeing">Boeing</option>
                            </select>
                        </div>
                        <div class="col-lg d-none">
                            <label for="addby" class="form-label">AIRCRAFT ID</label>
                            <input class="form-control" type="text" name="airc_id" disabled readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="submit-editaircraft"
                            data-dismiss="modal">Understood</button>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <?php } ?>


    <?php if($_SESSION["user_role"] == "Flight Operation" || $_SESSION["user_role"] == "Admin") { ?>
    <div class="modal fade" id="edit_flight" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">EDIT FLIGHT</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg">
                            <label for="callsign" class="form-label">Callsign</label>
                            <input class="form-control" type="text" name="edit_callsign">
                        </div>
                        <div class="col-lg">
                            <label for="aircraft" class="form-label">Aircraft</label>
                            <select class="form-control" name="edit_aircraft">
                                <option disabled>Aircraft</option>
                                <?php

                                    $sql = "SELECT * FROM aircraft";
                                    $result = mysqli_query($conn, $sql);

                                    while($row = mysqli_fetch_assoc($result)){
                                        $name = $row["aircraft_name"];
                                        $reg = $row["aircraft_reg"];
                                        
                                        $id = $row["aircraft_id"];
                                        $full_aircraft = $row["aircraft_name"] . " (" . $row["aircraft_reg"] . ")";

                                        echo "<option value='$id'>" . $full_aircraft . "</option>";
                                    }
                                
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg">
                            <label for="dep_icao" class="form-label">Departure</label>
                            <select class="form-control" name="edit_dep_icao">
                                <option disabled>Departure</option>
                                <?php

                                    $sql = "SELECT * FROM airport";
                                    $result = mysqli_query($conn, $sql);
                                    
                                    while($row = mysqli_fetch_assoc($result)){

                                        echo "<option value=". $row["icao"] .">" . $row["icao"] . "</option>";
                                    } 
                                ?>
                            </select>
                        </div>
                        <div class="col-lg">
                            <label for="arr_icao" class="form-label">Arrival</label>
                            <select class="form-control" name="edit_arr_icao">
                                <option disabled>Arrival</option>
                                <?php
                                
                                    $sql = "SELECT * FROM airport";
                                    $result = mysqli_query($conn, $sql);

                                    while($row = mysqli_fetch_assoc($result)){
                                        echo "<option value=". $row["icao"] .">" . $row["icao"] . "</option>";
                                    } 
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg">
                            <label for="dep_time" class="form-label">Departure Time</label>
                            <input class="form-control" type="text" name="edit_dep_time">
                        </div>
                        <div class="col-lg">
                            <label for="arr_time" class="form-label">Arrival Time</label>
                            <input class="form-control" type="text" name="edit_arr_time">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg">
                            <label for="remark" class="form-label">Remark</label>
                            <textarea class="form-control" rows="2" name="edit_remarks"
                                placeholder="ปล่อยไว้หากคุณไม่ต้องการแก้ไข"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg">
                            <label for="remark" class="form-label">Route</label>
                            <textarea class="form-control" rows="2" name="edit_route"
                            ></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" id="submit-delflight"
                            data-dismiss="modal">DELETE</button>
                        <button type="button" class="btn btn-primary" id="submit-editflight"
                            data-dismiss="modal">Understood</button>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <?php } ?>




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

    <script>
    $('#user_table').DataTable();
    $('#airport_table').DataTable();
    $('#aircraft_table').DataTable();
    $('#Flight-Operation').DataTable();
    </script>
</body>

</html>