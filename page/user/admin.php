<?php

    session_start();

    require_once "../../sql/database.php";

    $user_id = $_SESSION["user_id"];
    $sql = "SELECT * FROM users WHERE id = $user_id";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);






    if(!isset($_SESSION["user"])){
        header("Location: ../../index.php");
    }
    else if($row["user_role"] != "Admin"){
        header("Location: profile");
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

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="icon" type="image/x-icon" href="../../img/bunnyhead.ico">

    <link
      rel="canonical"
      href="https://demo-basic.adminkit.io/pages-blank.html"
    />

    <title>HOME PAGE | Thai Airway VA</title>

    <link href="css/app.css" rel="stylesheet" />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap"
      rel="stylesheet"
    />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="css/custom.css">
    
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="../../js/main.js"></script>
    

  </head>

  <body>
    <div class="wrapper">

      <?php include 'inc/sidebar.php'; ?>

      <div class="main">
        <?php include 'inc/header.php'; ?>

        <main class="content">
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

            <div class="row">
                <div class="col-lg-12">
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

                                        while($row = mysqli_fetch_assoc($result)){
                                            echo "<tr>";
                                            echo "<td>" . $row["id"] . "</td>";
                                            echo "<td>" . $row["full_name"] . "</td>";
                                            echo "<td>" . $row["email"] . "</td>";
                                            echo "<td>" . $row["user_role"] . "</td>";
                                            echo "<td>" . $row["birthdate"] . "</td>";
                                            echo "<td><button class='btn btn-primary edit_user_btn'>Edit</button></td>";
                                            echo "</tr>";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            <h1 class="h3 mb-3">Airport Mangement</h1>
            <div class="row">
                <div class="col-lg-6">
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
                                        
                                        $row = mysqli_fetch_assoc($result);

                                        if($row["airport_name"] == ""){
                                            echo "<tr>";
                                            echo "<td colspan='4'>No Data</td>";
                                            echo "</tr>";
                                        }

                                        $count = 1;
                                        while($row = mysqli_fetch_assoc($result)){
                                            echo "<tr>";
                                            echo "<td>" . $count . "</td>";
                                            echo "<td>" . $row["airport_name"] . "</td>";
                                            echo "<td>" . $row["icao"] . "</td>";
                                            echo "<td><button class='btn btn-danger'>DELETE</button></td>";
                                            echo "</tr>";

                                            $count++;
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">ADD AIRPORT</h5>
                            <div class="row">
                                <div class="col-lg">
                                    <label class="form-label">Airport Name</label>
                                    <input type="text"class="form-control" name="airport_name" placeholder="">
                                </div>
                                <div class="col-lg">
                                    <label class="form-label">ICAO</label>
                                    <input type="text"class="form-control" name="icao_name" placeholder="">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg">
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-success" id="submit-add-airport" type="button">ADD</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <h1 class="h3 mb-3">Flight Operation</h1>
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

                                        if(mysqli_num_rows($result) == 0){
                                            echo "<tr>";
                                            echo "<td colspan='7'>No Data</td>";
                                            echo "</tr>";
                                        }

                                        while($row = mysqli_fetch_assoc($result)){

                                            
                                            $sql = "SELECT * FROM aircraft WHERE aircraft_id = " . $row["flight_aircraft"];
                                            $result2 = mysqli_query($conn, $sql);

                                            $row2 = mysqli_fetch_assoc($result2);



                                            echo "<tr>";
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
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add Flight</h5>
                            <div class="row">
                                <div class="col-lg">
                                    <input type="text" class="form-control" name="callsign" placeholder="Aircraft Identification">
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
                                    <textarea class="form-control" rows="2" name="Remark" placeholder="Remark"></textarea>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-lg d-grid gap-2">
                                    <button class="btn btn-success" id="submit-add-flight" type="button">ADD FLIGHT</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <h3 class="mb-3">LOG</h3>
            <div class="row">
                <div class="col-lg">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">LOG</h5>
                            <p class="card-text">ทุกอย่างที่ ผู้ดูแลทำจะถูกบันทึกไว้โดย ระบบ</p>
                            <table id="user_table" class="table table-hover my-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>ID_USER</th>
                                        <th>Role</th>
                                        <th>Time</th>
                                        <th>Details</th>
                                        <th>VIEW</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>Admin</td>
                                        <td>2021-10-10 10:10:10</td>
                                        <td>เพิ่มสนามบิน</td>
                                        <td><button class="btn btn-primary">VIEW</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

          </div>
        </main>

        <?php include 'inc/footer.php'; ?>

      </div>
    </div>
    

    <script>
        $('#user_table').DataTable();
        $('#airport_table').DataTable();
        $('#Flight-Operation').DataTable();
    </script>


            <div id="edit_user" class="modal hide" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <span class="close-btn-modal" id="closeModalBtn">&times;</span>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h1>EDIT USER</h1>
                                    <div class="row">
                                        <div class="col-lg">
                                              <label for="" class="form-label">Full Name</label>
                                              <input type="text"class="form-control" name="" id="edit_fullname" placeholder="">
                                        </div>
                                        <div class="col-lg">
                                              <label for="" class="form-label">Email</label>
                                              <input type="text"class="form-control" name="" id="edit_email" placeholder="">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-lg">
                                            <label for="" class="form-label">IVAO ID</label>
                                            <input type="text"class="form-control" name="" id="edit_ivao_id" placeholder="">
                                        </div>
                                        <div class="col-lg">
                                            <label for="" class="form-label">VATSIM ID</label>
                                            <input type="text"class="form-control" name="" id="edit_Vatsim_id" placeholder="">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-lg">
                                            <label for="" class="form-label">Birthday</label>
                                            <input type="date"class="form-control" name="" id="edit_birthdate" placeholder="">
                                        </div>
                                        <div class="col-lg">
                                            <label for="" class="form-label">Role</label>
                                            <select class="form-select" aria-label="Default select example" id="edit_role">
                                                <option selected>Open this select menu</option>
                                                <option value="Member">Member</option>
                                                <option value="Admin">Admin</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-lg">
                                            <label for="" class="form-label">Password</label>
                                            <input type="password"class="form-control" name="" id="edit_password" placeholder="">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <button class="btn btn-primary" id="submit-edituser" type="button">SUBMIT</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script src="js/app.js"></script>

    
    
  </body>
</html>
