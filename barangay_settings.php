<?php
session_start();
if (!isset($_SESSION['user_ID']) && !isset($_SESSION['user_Type']) && !isset($_SESSION['barangay_ID'])) {
    header("location:index.php");
}
include 'API/API_barangay_document_table.php';

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
    <title>Settings</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <center>
            <div id="sidebar-wrapper" style="background-color: #bd8565;">
                <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold border-bottom" style="color: #659DBD;"><img src="img/Logo_192.png" alt="" width="60" height="60"><span style="text-shadow: 1px 1px 2px rgba(0, 0,0, 1)">BaRIS</span> </div>
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
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user me-2"></i>Barangay Official
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="index.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            </nav>
            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-3">
                    </div>
                </div>
                <div class="container" id="Barangay_Certificate" style="border:solid; margin-top:20px">
                    <form action="API/API_post_QR.php" method="POST" enctype='multipart/form-data'>
                        <div style="margin-bottom: 15px; padding: 10px;background-color:#bd8565;font-weight: bold;">
                            <h1 style="display: inline-block;">Insert QR code for Payment Destination</h1>
                        </div>
                        <label>QR Code provider<span>*</span></label>
                        <input style="width: 100%; border: 1px solid #ccc;" type="text" name="qr_name" placeholder="eg. BDO, GCASH, PAYMAYA " required />
                        <label>Upload QR Code<span>*</span></label>
                        <input style="width: 100%; border: 1px solid #ccc;" type="file" name="payment_media" id="payment_media" required/?>
                        <label>QR code for:<span>*</span></label><br>
                        <select name="doc_type" style="width: 100%;" name="cars" id="cars">
                            <option value="All">All</option>
                            <option value="Barangay_Certificate">Barangay Certificate</option>
                            <option value="Barangay_Clearance">Barangay Clearance</option>
                            <option value="Certificate_Indigency">Certificate of indigency</option>
                            <option value="Business_Permit">Business Permit</option>
                            <option value="Cedula">Cedula</option>
                        </select> <br>
                        <label for="doc_number">Enter Number for Bank:<span>*</span></label>
                        <input style="width: 100%; border: 1px solid #ccc;" type="input" name="doc_number" placeholder="Number" required />
                        <button style="width: 100%; margin-top:10px" type="submit" name="submit_qr" class="btn btn-primary">Add</button>
                    </form>
                </div>
                <div class="row my-5" id="list_post">
                    <h3 class="fs-4 mb-3">Document Prices</h3>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12" style="overflow-x:auto;">
                                <table class="table table-striped" id="loadData">
                                    <thead>

                                        <tr style="background-color: #bd8565;">
                                            <th>Document_Type</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                        <?php echo $table ?>
                                        <div id="sample"></div>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container" id="Barangay_Certificate" style="border:solid; margin-top:20px">
                    <form action="API/API_barangay_settings.php" method="POST" enctype='multipart/form-data'>
                        <div style="margin-bottom: 15px; padding: 10px;background-color:#bd8565;font-weight: bold;">
                            <h1 style="display: inline-block;">Barangay Settings</h1>
                        </div>
                        <label>Insert Barangay logo<span>*</span></label>
                        <input style="width: 100%; border: 1px solid #ccc;" type="file" name="barangay_logo" id="payment_media" required />
                        <label for="doc_Cedulacpy">Insert City logo</label>
                        <input style="width: 100%; border: 1px solid #ccc;" type="file" name="barangay_citylogo" id="payment_media" required />
                        <label for="doc_Cedulacpy">Barangay Captain Full Name</label>
                        <input style="width: 100%; border: 1px solid #ccc;" type="text" name="barangay_captain" id="payment_media" required />
                        <label for="doc_Cedulacpy">Barangay Secretary Full Name</label>
                        <input style="width: 100%; border: 1px solid #ccc;" type="text" name="barangay_secretary" id="payment_media" required />
                        <label for="doc_Cedulacpy">Province</label>
                        <input style="width: 100%; border: 1px solid #ccc;" type="text" name="barangay_province" id="payment_media" required />
                        <label for="doc_Cedulacpy">Municipality</label>
                        <input style="width: 100%; border: 1px solid #ccc;" type="text" name="barangay_municipality" id="payment_media" required />
                        <label for="doc_Cedulacpy">Barangay Name</label>
                        <input style="width: 100%; border: 1px solid #ccc;" type="text" name="barangay_name" id="payment_media" required />
                        <label for="doc_Cedulacpy">Barangay Captain Signature</label>
                        <input style="width: 100%; border: 1px solid #ccc;" type="file" name="captain_signature" id="payment_media" required />
                        <label for="doc_Cedulacpy">Secretary Signature</label>
                        <input style="width: 100%; border: 1px solid #ccc;" type="file" name="secretary_signature" id="payment_media" required />
                        <button style="width: 100%; margin-top:10px" type="submit" name="submit_settings" class="btn btn-primary">Add</button>
                    </form>
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
<script>
    $(function() {
        $('#datepicker1').datepicker();
    });
</script>
<script>
    function enableSave(edit, documentID, save, cancel) {
        var edit = edit;
        var ID = document.getElementById(documentID);
        var saves = save;
        var cancels = cancel;


        ID.disabled = false;
        edit.style.display = 'none';
        saves.style.display = 'inline';
        cancels.style.display = 'inline';
        cancels.style.display = 'inline';
    }
    function savePrice(edit, documentID, save, cancel){
        var edit = edit;
        var ID = document.getElementById(documentID);
        var saves = save;
        var cancels = cancel;
        var xhttp = new XMLHttpRequest();

        xhttp.onload = function() {
          document.getElementById("sample").innerHTML = this.responseText;
        };
        xhttp.open("GET", "API/API_update_docprice.php?token1="+ID.id+"&token2="+ID.value);
        xhttp.send();
        alert("Price Updated");
        ID.disabled = false;
        edit.style.display = 'inline';
        saves.style.display = 'none';
        cancels.style.display = 'none';
        ID.disabled = true;
    }

    function cancelEdit(edit, documentID, save, cancel, defPrice){
        var edit = edit;
        var ID = document.getElementById(documentID);
        var saves = save;
        var cancels = cancel;


        ID.disabled = false;
        edit.style.display = 'inline';
        saves.style.display = 'none';
        cancels.style.display = 'none';
        ID.value = defPrice;
        ID.disabled = true;
    }
   
</script>