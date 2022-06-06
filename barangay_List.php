<?php
session_start();
if (!isset($_SESSION['user_ID']) && !isset($_SESSION['user_Type']) && !isset($_SESSION['barangay_ID'])) {
    header("location:index.php");
}
$Fname = 'placeholder="First Name"';
$Lname = 'placeholder="Last Name"';
$Mname = 'placeholder="Middle Name"';
$Suffix = 'placeholder="Suffix"';
$Birthdate = 'placeholder="Birth Date"';
$Address = 'placeholder="Address"';
$Fathername = 'placeholder="Father Name"';
$Fatheroccu = 'placeholder="Father Occupation"';
$Mothername = 'placeholder="Mother Name"';
$Motheroccu = 'placeholder="Mother Occupation"';
$token = "";
if (isset($_GET['token'])) {

    include 'API/API_getresident.php';
    $token = '?token=' . $_GET["token"] . '';
    $Fname =  'value=' . $row["prof_Fname"] . '';
    $Lname = 'value=' . $row["prof_Lname"] . '';
    $Mname = 'value=' . $row["prof_Mname"] . '';
    $Suffix = 'value=' . $row["prof_Suffix"] . '';
    $Birthdate = 'value=' . $row["prof_Birthdate"] . '';
    $sex = 'value=' . $row["prof_Sex"] . '';
    $Address = 'value=' . $row["prof_Address"] . '';
    $Addressstats = 'value=' . $row["prof_Addressstatus"] . '';
    $Fathername = 'value=' . $row["prof_Fathername"] . '';
    $Fatheroccu = 'value=' . $row["prof_Fatheroccu"] . '';
    $Mothername = 'value=' . $row["prof_Mothername"] . '';
    $Motheroccu = 'value=' . $row["prof_Motheroccu"] . '';
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="img/Logo_192.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="CSS/barangayside.css" />


    <title>Resident List</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <center>
            <div id="sidebar-wrapper" style="background-color: #bd8565;">
                <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold border-bottom" style="color: #659DBD;"><img src="img/Logo_192.png" alt="BaRIS_Logo" width="60" height="60"><span style="text-shadow: 1px 1px 2px rgba(0, 0,0, 1)">BaRIS</span> </div>
                <div class="list-group list-group-flush my-3">
                    <button class="btn btn-success" onclick="window.location.href='homepage_loader.php';" style="margin-left: 10px; margin-right: 10px;">Switch to Resident</button><br>
                    <button class="btn btn-dark" onclick="window.location.href='API/API_logout.php';" style="margin-left: 10px; margin-right: 10px;">Log Out</button>
                    <hr>
                    <div id="dashboard"> <a href="barangay_Dashboard.php" class="list-group-item list-group-item-action bg-transparent second-text active" style="display:flex; color:white; justify-content:center">Dashboard</a></div>
                    <div id="dashboard"> <a href="barangay_CreatePost.php" class="list-group-item list-group-item-action bg-transparent second-text active" style="display:flex; color:white; justify-content:center">Create Post</a></div>
                    <div id="dashboard"> <a href="barangay_Viewpost.php" class="list-group-item list-group-item-action bg-transparent second-text active" style="display:flex; color:white; justify-content:center"></i>Viewpost</a></div>
                    <div id="dashboard"> <a href="barangay_List.php" class="list-group-item list-group-item-action bg-transparent second-text active" style="display:flex; color:white; justify-content:center">Resident List</a></div>
                    <div id="dashboard"> <a href="barangay_Account_list.php" class="list-group-item list-group-item-action bg-transparent second-text active" style="display:flex; color:white; justify-content:center">Account List</a></div>
                    <div id="dashboard"> <a href="barangay_Services.php" class="list-group-item list-group-item-action bg-transparent second-text active" style="display:flex; color:white; justify-content:center">Services</a></div>
                    <div id="dashboard"> <a href="barangay_Permit.php" class="list-group-item list-group-item-action bg-transparent second-text active" style="display:flex; color:white; justify-content:center">Documents</a></div>
                    <div id="dashboard"> <a href="barangay_Permit_request.php" class="list-group-item list-group-item-action bg-transparent second-text active" style="display:flex; color:white; justify-content:center">Document Requests</a></div>
                    <div id="dashboard"> <a href="barangay_Reports.php" class="list-group-item list-group-item-action bg-transparent second-text active" style="display:flex; color:white; justify-content:center">Reports</a></div>
                    <div id="dashboard"> <a href="barangay_History.php" class="list-group-item list-group-item-action bg-transparent second-text active" style="display:flex; color:white; justify-content:center">History</a></div>
                    <div id="dashboard"> <a href="barangay_settings.php" class="list-group-item list-group-item-action bg-transparent second-text active" style="display:flex; color:white; justify-content:center">Settings</a></div>
                </div>
        </center>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Resident List</h2>
                </div>
            </nav>

            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <p class="fs-5">Total Residents</p>
                                <h3 class="fs-2" id="count"></h3>
                            </div>
                            <i class="fas fa-gift fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                </div>
                <div class="container" style="border:solid; margin-top:20px;text-align:center">
                    <div style="margin-bottom: 15px; padding: 10px;background-color:#bd8565;font-weight: bold;">
                        <h1 style="display: inline-block;">Resident Profiling</h1><label for="myCheck" style="float:right;border:solid 3px"><img id="arrow_down" src="img/arrow-down.png" style="display: none;" alt=""><img id="arrow_up" src="img/arrow-up.png" alt=""></label><input type="checkbox" id="myCheck" onclick="myFunction()" style="display:none">
                    </div><br>
                    <form action="API/API_profiling.php<?php echo $token ?>" method="POST" enctype='multipart/form-data'>
                    <center>
                        <div class="row">
                            <div class="column" id="add_A">
                                <h3>Personal Information</h3>
                                <input style="margin-top:10px;  margin-bottom: 10px" name="prof_Fname" class="form-control" id="prof_Fname" minlength="4" required <?php echo $Fname ?>>
                                <input style="margin-bottom: 10px" name="prof_Lname" class="form-control" id="prof_Lname" minlength="4" required <?php echo $Lname ?>>
                                <input style=" margin-bottom: 10px" name="prof_Mname" class="form-control" id="prof_Mname" minlength="4" required <?php echo $Mname ?>>
                                <div style="margin-top: 10px;">
                                    <select name="prof_Suffix" id="prof_sex" style="width: 100%;padding:10px;margin-bottom:10px">
                                        <option name="prof_None" value="-">None</option>
                                        <option name="prof_Sr" value="Sr.">Sr.</option>
                                        <option name="prof_Jr" value="Jr.">Jr.</option>
                                    </select>
                                </div>
                                <div class="input-group date" id="datepicker">
                                    <input type="text" name="prof_Birthdate" class="form-control" required <?php echo $Birthdate ?>>
                                    <span class="input-group-append">
                                        <span class="input-group-text bg-white d-block">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </span>
                                </div>
                                <div style="margin-top: 10px;">
                                    <select name="prof_Sex" id="prof_sex" style="width: 100%;padding:10px;margin-bottom:10px">
                                        <option name="prof_Female" value="Male">Male</option>
                                        <option name="prof_Male" value="Female">Female</option>
                                    </select>
                                </div>
                                <input style=" margin-bottom: 10px" name="prof_Address" class="form-control" id="prof_Address" minlength="4" required <?php echo $Address ?>>
                                <div style="margin-top: 10px;">
                                    <select name="prof_Addressstatus" id="prof_Addressstatus" style="width: 100%;;padding:10px;margin-bottom:20px">
                                        <option name="prof_Owned" value="Owned">Owned</option>
                                        <option name="prof_Rent" value="Rent">Rent</option>
                                    </select>
                                </div>
                            </div><br>
                            <div class="column" id="add_B">
                                <h3>Family Composition</h3>
                                <input style="  margin-bottom: 10px" name="prof_Fathername" class="form-control" id="prof_Fathername" minlength="4" required <?php echo $Fathername ?>>
                                <input style="  margin-bottom: 10px" name="prof_Fatheroccu" class="form-control" id="prof_Fatheroccu" minlength="4" <?php echo $Fatheroccu ?>>
                                <input style="  margin-bottom: 10px" name="prof_Mothername" class="form-control" id="prof_Mothername" minlength="4" required <?php echo $Mothername ?>>
                                <input style="  margin-bottom: 10px" name="prof_Motheroccu" class="form-control" id="prof_Motheroccu" minlength="4" required <?php echo $Motheroccu ?>>
                                <div class="form-group" id="add_C">
                                    <button style="width: 100%; margin-top:10px" type="submit" name="add_btn" class="btn btn-primary">Add</button>
                                    <button style="width: 100%; margin-top:10px" type="submit" name="update_btn" class="btn btn-primary">Save</button>
                                    <button style="width: 100%; margin-top:10px" type="button" onclick="window.location.href='barangay_List.php'" class="btn btn-primary">Clear</button>
                                </div>
                            </div>
                            </center>
                    </form>
                </div>
            </div>
            <div class="row my-5" id="list_resident">
                <h3 class="fs-4 mb-3">List of Residents</h3>
                <div class="container">
                    <a href="API/API_barangay_list_excel.php" style="margin-bottom: 5px" class="btn btn-success">Export to Excel </a>
                    <div class="row">
                        <div class="col-md-12 col-sm-12" style="overflow-x:auto;">
                            <table class="table table-striped" id="loadData">
                                <thead>
                                    <tr style="background-color: #bd8565;">
                                        <th>Resident ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Middle Name</th>
                                        <th>Suffix</th>
                                        <th>Birth Date</th>
                                        <th>Sex</th>
                                        <th>Address</th>
                                        <th>Address Status</th>
                                        <th>Father's Name</th>
                                        <th>Father's Occupation</th>
                                        <th>Mother's Name</th>
                                        <th>Mothers's Occupation</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function() {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>

<script type="text/javascript">
    $(document).ready(function() {
        loadMoreData();

        function loadMoreData(page) {
            $.ajax({
                url: "API/API_load_profiling_data.php",
                type: "POST",
                cache: false,
                data: {
                    page_no: page
                },
                success: function(data) {
                    if (data) {
                        // $("#pagination").remove();
                        document.getElementById("count").innerHTML = data.slice(-2);
                        $("#loadData").append(data);
                    } else {
                        // $(".loadbtn").prop("disabled", true);
                        // $(".loadbtn").html('That is All');
                    }
                }
            });
        }

        // $(document).on('click', '.loadbtn', function() {
        //     $(".loadbtn").html('Loading...');
        //     var pId = $(this).data("id");
        //     loadMoreData(pId);
        // });
    });
</script>

<script type="text/javascript">
    $(function() {
        $('#datepicker').datepicker();
    });
</script>

<script>
    function myFunction() {
        // Get the checkbox
        var checkBox = document.getElementById("myCheck");
        // Get the output text
        var A = document.getElementById("add_A");
        var B = document.getElementById("add_B");
        var C = document.getElementById("add_C");
        var D = document.getElementById("arrow_down");
        var E = document.getElementById("arrow_up");

        // If the checkbox is checked, display the output text
        if (checkBox.checked == false) {
            A.style.display = "block";
            B.style.display = "block";
            C.style.display = "block";
            D.style.display = "none";
            E.style.display = "block";
        } else {
            A.style.display = "none";
            B.style.display = "none";
            C.style.display = "none";
            D.style.display = "block";
            E.style.display = "none";
        }
    }
</script>