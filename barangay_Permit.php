<?php 

      session_start();
      if(!isset($_SESSION['user_ID']) && !isset($_SESSION['user_Type']) && !isset($_SESSION['barangay_ID'])){
      header("location:index.php");
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
    <title>Documents</title>
</head>

<body>
<div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <center>
        <div id="sidebar-wrapper" style="background-color: #bd8565;">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold border-bottom" style="color: #659DBD;"><img src="img/Logo_192.png" alt="" width="60" height="60"><span style="text-shadow: 1px 1px 2px rgba(0, 0,0, 1)">BaRIS</span> </div>
            <div class="list-group list-group-flush my-3" >
            <button class="btn btn-success" onclick="window.location.href='homepage_loader.php';" style="margin-left: 10px; margin-right: 10px;">Switch to Resident</button><br>
            <button class="btn btn-dark" onclick="window.location.href='API/API_logout.php';" style="margin-left: 10px; margin-right: 10px;">Log Out</button><hr>
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
           
            <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> -->

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
            <div class="row" id="services">
                <div id="service_column"><button class="btn" id="service_choice" name="blotter_create" onclick="showBarangay_Certificate();">Barangay Certificate</button></div>
                <div id="service_column"><button class="btn" id="service_choice" name="blotter_list" onclick="showBarangay_Clearance();">Barangay Clearance</button></div>
                <div id="service_column"><button class="btn" id="service_choice" name="complaint" onclick="showCertificate_Indigency();">Certificate of Indigency</button></div>
                <div id="service_column"><button class="btn" id="service_choice" name="support" onclick="showBusiness_Permit();">Business Permit</button></div>
                <div id="service_column"><button class="btn" id="service_choice" name="support" onclick="showCedula();">Cedula</button></div>
            </div>
            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-3">
                    </div>
                </div>
            <div class="container" id="Barangay_Certificate" style="border:solid; margin-top:20px">
            <div style="margin-bottom: 15px; padding: 10px;background-color:#bd8565;font-weight: bold;"><h1 style="display: inline-block;">Barangay Certificate</h1></div>     
            <div class="row">
                
                    <div class = "column">
                    <form action="API/API_barangay_document_brgy.php" method="POST" enctype='multipart/form-data'>
                    <input  style = "  margin-bottom: 10px" name="doc_Fname" class="form-control" id="doc_Fname" minlength="4" required placeholder="First Name">
                    <input  style = "  margin-bottom: 10px" name="doc_Lname" class="form-control" id="doc_Lname" minlength="4" required placeholder="Last Name" >  
                    <input  style = "  margin-bottom: 10px" name="doc_Mname" class="form-control" id="doc_Mname" minlength="4" required placeholder="Middle Name">  
                    <div style="margin-top: 10px;">
                        <select name="doc_Suffix" id="doc_Suffix" style="width: 100%;padding:10px;margin-bottom:10px">
                            <option name="doc_None" value="">None</option>
                            <option name="doc_Sr" value="Sr.">Sr.</option>
                            <option name="doc_Jr" value="Jr.">Jr.</option>
                        </select>
                    </div>
                    <div style="margin-top: 10px;">
                        <select name="doc_Sex" id="doc_Sex" style="width: 100%;padding:10px;margin-bottom:10px">
                            <option name="doc_Sr" value="Male">Male</option>
                            <option name="doc_Jr" value="Female">Female</option>
                        </select>
                    </div>
                    <input  style = "  margin-bottom: 10px" name="doc_Address" class="form-control" id="doc_Address" minlength="4" required placeholder="Full Address">
                    <div style="margin-top: 10px;">
                        <select name="doc_Civilstatus" id="doc_Civilstatus" style="width: 100%;padding:10px;margin-bottom:10px">
                            <option name="doc_Sr" value="Single">Single</option>
                            <option name="doc_Jr" value="Married">Married</option>
                        </select>
                    </div>
                    <input  style = "  margin-bottom: 10px" name="doc_Citizenship" class="form-control" id="doc_Citizenship" minlength="4" required placeholder="Enter Citizenship" > 
                    <label for="reason">Purpose of Application:</label>
                            <select style="width: 100%;padding:10px;margin-bottom:10px" id="reason" name="doc_Purpose" required style="overflow: auto;">
                                <option value="Bailbond">Bailbond</option>
                                <option value="Burial Assistance">Burial Assistance</option>
                                <option value="Cable Application">Cable Application</option>
                                <option value="DSWD">DSWD</option>
                                <option value="Educational Assistance">Educational Assistance</option>
                                <option value="Financial Assistance">Financial Assistance</option>
                                <option value="Foreign Employment ">Foreign Employment</option>
                                <option value="Loan Application (Housing Multi-purpose)">Loan Application (Housing Multi-purpose)</option>
                                <option value="Loan Application (Others)">Loan Application (Others)</option>
                                <option value="Local Employment">Local Employment</option>
                                <option value="Marriage License">Marriage License</option>
                                <option value="Maynilad (Business and Commercial)">Maynilad (Business and Commercial)</option>
                                <option value="Maynilad (Industrial)">Maynilad (Industrial)</option>
                                <option value="Maynilad (Residential Townhouse and Condominiums)">Maynilad (Residential Townhouse and Condominiums)</option>
                                <option value="Medical Assistance Meralco (Business and Commercial)">Medical Assistance Meralco (Business and Commercial)</option>
                                <option value="Meralco (Industrial)">Meralco (Industrial)</option>
                                <option value="Meralco (Residential Townhouse and Condominiums) ">Meralco (Residential Townhouse and Condominiums)</option>
                                <option value="NBI Clearance">NBI Clearance</option>
                                <option value="PhilHealth">PhilHealth</option>
                                <option value="Police Clearance">Police Clearance</option>
                                <option value="Postal ID">Postal ID</option>
                                <option value="Proof of Residency">Proof of Residency</option>
                                <option value="Scholarship">Scholarship</option>
                                <option value="School Requirement">School Requirement</option>
                                <option value="Social Pension">Social Pension</option>
                                <option value="Solo Parent ID">Solo Parent ID</option>
                                <option value="SSS ">SSS</option>
                                <option value="TRO">TRO</option>
                                <option value="Others">Others</option>
                            </select>
                    </div><br>
                    <div class = "column">
                    <label for="doc_Cedulacpy">Tax certificate or Cedula copy<span>*</span></label>
                    <input style= "width: 100%; border: 1px solid #ccc;"type="file" id="doc_Cedulacpy" name="doc_Cedulacpy" required />       
                    <div class="form-group"></div>
                    <button style = "width: 100%; margin-top:10px" type="submit" name ="submit_brg_cert"class="btn btn-primary">Add</button>
                    <button style = "width: 100%; margin-top:10px" type = "button" onclick = "window.location.href='barangay_Permit.php'" class="btn btn-primary">Clear</button>
                </div>  
                    </form>   
            </div>
        </div>
        <div class="container" id="Barangay_Clearance" style="border:solid; display:none; margin-top:20px">
                   
                <form action="API/API_barangay_document_brgy.php?php echo $token?>" method="POST" enctype='multipart/form-data'>
                <div style="margin-bottom: 15px; padding: 10px;background-color:#bd8565;font-weight: bold;"><h1 style="display: inline-block;">Barangay Clearance</h1></div> 
                <div class="row">
                
                    <div class = "column">
                    <input  style = "  margin-bottom: 10px" name="doc_Fname" class="form-control" id="doc_Fname" minlength="4" required placeholder="First Name">
                    <input  style = "  margin-bottom: 10px" name="doc_Lname" class="form-control" id="doc_Lname" minlength="4" required placeholder="Last Name" >  
                    <input  style = "  margin-bottom: 10px" name="doc_Mname" class="form-control" id="doc_Mname" minlength="4" required placeholder="Middle Name">  
                    <div style="margin-top: 10px;">
                        <select name="doc_Suffix" id="prof_sex" style="width: 100%;padding:10px;margin-bottom:10px">
                            <option name="doc_None" value="">None</option>
                            <option name="doc_Sr" value="Sr.">Sr.</option>
                            <option name="doc_Jr" value="Jr.">Jr.</option>
                        </select>
                    </div>
                    <label for="reason">Sex: </label>
                    <div>
                        <select name="doc_Sex" id="doc_Sex" style="width: 100%;padding:10px;margin-bottom:10px">
                            <option name="doc_Sex" value="Male">Male</option>
                            <option name="doc_Sex" value="Female">Female</option>
                        </select>
                    </div>
                    <input  style = "  margin-bottom: 10px" name="doc_Address" class="form-control" id="doc_Address" minlength="4" required placeholder="Full Address">
                    <label for="reason">Birth Date</label>
                    <div style = "  margin-bottom: 10px" class="input-group date" id="datepicker1">
                        <input type="text" name="doc_Birthdate" class="form-control" required>
                        <span class="input-group-append">
                            <span class="input-group-text bg-white d-block">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </span>
                    </div>
                    <input  type ="number" style = " margin-bottom: 10px" name="doc_Age" class="form-control" id="profdoc_Age_Fathername" min ="16" required placeholder="Age" >  
                    <label for="reason">Civil Status</label>
                            <select name="doc_Civilstatus" class="civilstatus">
                                <option disabled selected>Civil Status</option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Divorced">Divorced</option>
                                <option value="Widowed">Widowed</option>
                            </select><br>
                    <input  style = "  margin-bottom: 10px" name="doc_Citizenship" class="form-control" id="doc_Citizenship" minlength="4" required placeholder="Enter Citizenship" >        
                    <label for="reason">Purpose of Application:</label>
                            <select style="width: 100%;padding:10px;margin-bottom:10px" id="reason" name="doc_Purpose" required style="overflow: auto;">
                                <option value="Bailbond">Bailbond</option>
                                <option value="Burial Assistance">Burial Assistance</option>
                                <option value="Cable Application">Cable Application</option>
                                <option value="DSWD">DSWD</option>
                                <option value="Educational Assistance">Educational Assistance</option>
                                <option value="Financial Assistance">Financial Assistance</option>
                                <option value="Foreign Employment ">Foreign Employment</option>
                                <option value="Loan Application (Housing Multi-purpose)">Loan Application (Housing Multi-purpose)</option>
                                <option value="Loan Application (Others)">Loan Application (Others)</option>
                                <option value="Local Employment">Local Employment</option>
                                <option value="Marriage License">Marriage License</option>
                                <option value="Maynilad (Business and Commercial)">Maynilad (Business and Commercial)</option>
                                <option value="Maynilad (Industrial)">Maynilad (Industrial)</option>
                                <option value="Maynilad (Residential Townhouse and Condominiums)">Maynilad (Residential Townhouse and Condominiums)</option>
                                <option value="Medical Assistance Meralco (Business and Commercial)">Medical Assistance Meralco (Business and Commercial)</option>
                                <option value="Meralco (Industrial)">Meralco (Industrial)</option>
                                <option value="Meralco (Residential Townhouse and Condominiums) ">Meralco (Residential Townhouse and Condominiums)</option>
                                <option value="NBI Clearance">NBI Clearance</option>
                                <option value="PhilHealth">PhilHealth</option>
                                <option value="Police Clearance">Police Clearance</option>
                                <option value="Postal ID">Postal ID</option>
                                <option value="Proof of Residency">Proof of Residency</option>
                                <option value="Scholarship">Scholarship</option>
                                <option value="School Requirement">School Requirement</option>
                                <option value="Social Pension">Social Pension</option>
                                <option value="Solo Parent ID">Solo Parent ID</option>
                                <option value="SSS ">SSS</option>
                                <option value="TRO">TRO</option>
                                <option value="Others">Others</option>
                            </select>
                    </div><br>
                    <div class = "column">
                    <label for="doc_Cedulacpy">Tax certificate or Cedula copy</label>
                    <input style= "margin-bottom: 10px; width: 100%; border: 1px solid #ccc;"type="file" id="doc_Cedulacpy" name="doc_Cedulacpy" required />
                    <label for="reason">ID presented</label>
                            <select id="reason" name="doc_IDpres" required style="overflow: auto;">
                                <option value="Passport">Passport</option>
                                <option value="Driver's License">Driver's License</option>
                                <option value="UMID">UMID</option>
                                <option value="DSWD">DSWD</option>
                                <option value="PhilHealth ID">PhilHealth ID</option>
                                <option value="TIN ID">TIN ID/option>
                                <option value="Postal ID ">Postal ID</option>
                                <option value="PRC ID">PRC ID</option>
                                <option value="OFW ID">OFW ID</option>
                                <option value="National ID">National ID</option>
                                <option value="Student ID">Student ID</option>
                                <option value="Others">Others</option>
                            </select>
                            <label for="doc_UploadedID"></label>
                            <input style= "width: 100%; margin-bottom: 10px; border: 1px solid #ccc;"type="file" id="doc_UploadedID" name="doc_UploadedID" required />
                            <input  style = "  margin-bottom: 10px" name="doc_Email" class="form-control" id="doc_Email" minlength="4" required placeholder="Email Address" >
                            <input  style = "  margin-bottom: 10px" name="doc_Contact" class="form-control" id="doc_Contact" minlength="4" required placeholder="Contact Number">         
                    <div class="form-group"></div>
                    <button style = "width: 100%; margin-top:10px" type="submit" name ="submit_brg_clear"class="btn btn-primary">Add</button>
                    <button style = "width: 100%; margin-top:10px" type = "button" onclick = "window.location.href='barangay_Permit.php'" class="btn btn-primary">Clear</button>
                    </form>
                </div> 
                </div>
        </div>
        <div class="container" id="Certificate_Indigency" style="border:solid; display:none; margin-top:20px">
        <div style="margin-bottom: 15px; padding: 10px;background-color:#bd8565;font-weight: bold;"><h1 style="display: inline-block;">Certificate of Indigency</h1></div> 
                <form action="API/API_barangay_document_brgy.php" method="POST" enctype='multipart/form-data'>
                <div class="row">
                
                    <div class = "column">
                    <input  style = "  margin-bottom: 10px" name="doc_Fname" class="form-control" id="doc_Fname" minlength="4" required placeholder="First Name">
                    <input  style = "  margin-bottom: 10px" name="doc_Lname" class="form-control" id="doc_Lname" minlength="4" required placeholder="Last Name" >  
                    <input  style = "  margin-bottom: 10px" name="doc_Mname" class="form-control" id="doc_Mname" minlength="4" required placeholder="Middle Name">  
                    <div style="margin-top: 10px;">
                        <select name="doc_Suffix" id="prof_sex" style="width: 100%;padding:10px;margin-bottom:10px">
                            <option name="doc_None" value="">None</option>
                            <option name="doc_Sr" value="Sr.">Sr.</option>
                            <option name="doc_Jr" value="Jr.">Jr.</option>
                        </select>
                    </div>
                    <label for="reason">Sex: </label>
                    <div>
                        <select name="doc_Sex" id="doc_Sex" style="width: 100%;padding:10px;margin-bottom:10px">
                            <option name="doc_Sex" value="Male">Male</option>
                            <option name="doc_Sex" value="Female">Female</option>
                        </select>
                    </div>
                    <label for="reason">Birth Date</label>
                    <div style = "  margin-bottom: 10px" class="input-group date" id="datepicker2">
                        <input type="text" name="doc_Birthdate" class="form-control" required>
                        <span class="input-group-append">
                            <span class="input-group-text bg-white d-block">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </span>
                    </div>        
                    <div style="margin-top: 10px;">
                        <select name="doc_Civilstatus" id="doc_Civilstatus" style="width: 100%;padding:10px;margin-bottom:10px">
                            <option name="doc_Sr" value="Single">Single</option>
                            <option name="doc_Jr" value="Married">Married</option>
                        </select>
                    </div>
                    <input  style = "  margin-bottom: 10px" name="doc_Citizenship" class="form-control" id="doc_Citizenship" minlength="4" required placeholder="Enter Citizenship" > 
                    <label for="reason">Purpose of Application:</label>
                            <select style="width: 100%;padding:10px;margin-bottom:10px" id="reason" name="doc_Purpose" required style="overflow: auto;">
                                <option value="Bailbond">Bailbond</option>
                                <option value="Burial Assistance">Burial Assistance</option>
                                <option value="Cable Application">Cable Application</option>
                                <option value="DSWD">DSWD</option>
                                <option value="Educational Assistance">Educational Assistance</option>
                                <option value="Financial Assistance">Financial Assistance</option>
                                <option value="Foreign Employment ">Foreign Employment</option>
                                <option value="Loan Application (Housing Multi-purpose)">Loan Application (Housing Multi-purpose)</option>
                                <option value="Loan Application (Others)">Loan Application (Others)</option>
                                <option value="Local Employment">Local Employment</option>
                                <option value="Marriage License">Marriage License</option>
                                <option value="Maynilad (Business and Commercial)">Maynilad (Business and Commercial)</option>
                                <option value="Maynilad (Industrial)">Maynilad (Industrial)</option>
                                <option value="Maynilad (Residential Townhouse and Condominiums)">Maynilad (Residential Townhouse and Condominiums)</option>
                                <option value="Medical Assistance Meralco (Business and Commercial)">Medical Assistance Meralco (Business and Commercial)</option>
                                <option value="Meralco (Industrial)">Meralco (Industrial)</option>
                                <option value="Meralco (Residential Townhouse and Condominiums) ">Meralco (Residential Townhouse and Condominiums)</option>
                                <option value="NBI Clearance">NBI Clearance</option>
                                <option value="PhilHealth">PhilHealth</option>
                                <option value="Police Clearance">Police Clearance</option>
                                <option value="Postal ID">Postal ID</option>
                                <option value="Proof of Residency">Proof of Residency</option>
                                <option value="Scholarship">Scholarship</option>
                                <option value="School Requirement">School Requirement</option>
                                <option value="Social Pension">Social Pension</option>
                                <option value="Solo Parent ID">Solo Parent ID</option>
                                <option value="SSS ">SSS</option>
                                <option value="TRO">TRO</option>
                                <option value="Others">Others</option>
                            </select>
                    </div><br>
                    <div class = "column">
                            <input  style = "  margin-bottom: 10px" name="doc_Email" class="form-control" id="doc_Email" minlength="4" required placeholder="Email Address" >
                            <input  style = "  margin-bottom: 10px" name="doc_Contact" class="form-control" id="doc_Contact" minlength="4" required placeholder="Contact Number">         
                    <div class="form-group"></div>
                    <button style = "width: 100%; margin-top:10px" type="submit" name ="submit_cert_indi"class="btn btn-primary">Add</button>
                    <button style = "width: 100%; margin-top:10px" type = "button" onclick = "window.location.href='barangay_Permit.php'" class="btn btn-primary">Clear</button>
                    </form>
                </div> 
                </div>
        </div>
        <div class="container" id="Business_Permit"style="border:solid; display:none; margin-top:20px">
        <div style="margin-bottom: 15px; padding: 10px;background-color:#bd8565;font-weight: bold;"><h1 style="display: inline-block;">Business Permit</h1></div>
                <form action="API/API_barangay_document_brgy.php" method="POST" enctype='multipart/form-data'>
                <div class="row">
                
                    <div class = "column">
                    <input  style = "  margin-bottom: 10px" name="doc_Fname" class="form-control" id="doc_Fname" minlength="4" required placeholder="First Name">
                    <input  style = "  margin-bottom: 10px" name="doc_Lname" class="form-control" id="doc_Lname" minlength="4" required placeholder="Last Name" >  
                    <input  style = "  margin-bottom: 10px" name="doc_Mname" class="form-control" id="doc_Mname" minlength="4" required placeholder="Middle Name">  
                    <input  style = "  margin-bottom: 10px" name="doc_Businessname" class="form-control" id="doc_Businessname" minlength="4" required placeholder="Business Name" >  
                    <input  style = "  margin-bottom: 10px" name="doc_Businessloc" class="form-control" id="doc_Businessloc" minlength="4" required placeholder="Business Location">  
                    <div style="margin-top: 10px;">
                        <select name="doc_Suffix" id="prof_sex" style="width: 100%;padding:10px;margin-bottom:10px">
                            <option name="doc_None" value="">None</option>
                            <option name="doc_Sr" value="Sr.">Sr.</option>
                            <option name="doc_Jr" value="Jr.">Jr.</option>
                        </select>
                    </div>
                    <label for="reason">Purpose of Application:</label>
                            <select style="width: 100%;padding:10px;margin-bottom:10px" id="reason" name="doc_Purpose" required style="overflow: auto;">
                                <option value="Bailbond">Bailbond</option>
                                <option value="Burial Assistance">Burial Assistance</option>
                                <option value="Cable Application">Cable Application</option>
                                <option value="DSWD">DSWD</option>
                                <option value="Educational Assistance">Educational Assistance</option>
                                <option value="Financial Assistance">Financial Assistance</option>
                                <option value="Foreign Employment ">Foreign Employment</option>
                                <option value="Loan Application (Housing Multi-purpose)">Loan Application (Housing Multi-purpose)</option>
                                <option value="Loan Application (Others)">Loan Application (Others)</option>
                                <option value="Local Employment">Local Employment</option>
                                <option value="Marriage License">Marriage License</option>
                                <option value="Maynilad (Business and Commercial)">Maynilad (Business and Commercial)</option>
                                <option value="Maynilad (Industrial)">Maynilad (Industrial)</option>
                                <option value="Maynilad (Residential Townhouse and Condominiums)">Maynilad (Residential Townhouse and Condominiums)</option>
                                <option value="Medical Assistance Meralco (Business and Commercial)">Medical Assistance Meralco (Business and Commercial)</option>
                                <option value="Meralco (Industrial)">Meralco (Industrial)</option>
                                <option value="Meralco (Residential Townhouse and Condominiums) ">Meralco (Residential Townhouse and Condominiums)</option>
                                <option value="NBI Clearance">NBI Clearance</option>
                                <option value="PhilHealth">PhilHealth</option>
                                <option value="Police Clearance">Police Clearance</option>
                                <option value="Postal ID">Postal ID</option>
                                <option value="Proof of Residency">Proof of Residency</option>
                                <option value="Scholarship">Scholarship</option>
                                <option value="School Requirement">School Requirement</option>
                                <option value="Social Pension">Social Pension</option>
                                <option value="Solo Parent ID">Solo Parent ID</option>
                                <option value="SSS ">SSS</option>
                                <option value="TRO">TRO</option>
                                <option value="Others">Others</option>
                            </select>
                    </div><br>
                    <div class = "column">
                    <label for="reason">ID presented</label>
                    <select id="reason" name="doc_IDpres" required style="overflow: auto;">
                        <option value="Passport">Passport</option>
                        <option value="Driver's License">Driver's License</option>
                        <option value="UMID">UMID</option>
                        <option value="DSWD">DSWD</option>
                        <option value="PhilHealth ID">PhilHealth ID</option>
                        <option value="TIN ID">TIN ID/option>
                        <option value="Postal ID ">Postal ID</option>
                        <option value="PRC ID">PRC ID</option>
                        <option value="OFW ID">OFW ID</option>
                        <option value="National ID">National ID</option>
                        <option value="Student ID">Student ID</option>
                        <option value="Others">Others</option>
                    </select>
                    <label for="doc_UploadedID"></label>
                    <input style= "width: 100%; margin-bottom: 10px; border: 1px solid #ccc;"type="file" id="doc_UploadedID" name="doc_UploadedID" required />
                    <input  style = "  margin-bottom: 10px" name="doc_Email" class="form-control" id="doc_Email" minlength="4" required placeholder="Email Address" >
                    <input  style = "  margin-bottom: 10px" name="doc_Contact" class="form-control" id="doc_Contact" minlength="4" required placeholder="Contact Number">        
                    <div class="form-group"></div>
                    <button style = "width: 100%; margin-top:10px" type="submit" name ="submit_Bus_permit"class="btn btn-primary">Add</button>
                    <button style = "width: 100%; margin-top:10px" type = "button" onclick = "window.location.href='barangay_Permit.php'" class="btn btn-primary">Clear</button>
                    </form>
                </div> 
                </div>
        </div>
        <div class="container" id="Cedula" style="border:solid; display:none; margin-top:20px">
        <div style="margin-bottom: 15px; padding: 10px;background-color:#bd8565;font-weight: bold;"><h1 style="display: inline-block;">Cedula</h1></div>
                <form action="API/API_barangay_document_brgy.php" method="POST" enctype='multipart/form-data'>
                <div class="row">
                
                    <div class = "column">
                        
                    <input  style = "  margin-bottom: 10px" name="doc_Fname" class="form-control" id="doc_Fname" minlength="4" required placeholder="First Name">
                    <input  style = "  margin-bottom: 10px" name="doc_Lname" class="form-control" id="doc_Lname" minlength="4" required placeholder="Last Name" >  
                    <input  style = "  margin-bottom: 10px" name="doc_Mname" class="form-control" id="doc_Mname" minlength="4" required placeholder="Middle Name">  
                    <div style="margin-top: 10px;">
                        <select name="doc_Suffix" id="prof_sex" style="width: 100%;padding:10px;margin-bottom:10px">
                            <option name="doc_None" value="">None</option>
                            <option name="doc_Sr" value="Sr.">Sr.</option>
                            <option name="doc_Jr" value="Jr.">Jr.</option>
                        </select>
                    </div>
                    <label for="reason">Sex: </label>
                    <div>
                        <select name="doc_Sex" id="doc_Sex" style="width: 100%;padding:10px;margin-bottom:10px">
                            <option name="doc_Sex" value="Male">Male</option>
                            <option name="doc_Sex" value="Female">Female</option>
                        </select>
                    </div>
                    <input  style = "  margin-bottom: 10px" name="doc_Address" class="form-control" id="doc_Address" minlength="4" required placeholder="Full Address">
                    <label for="reason">Birth Date</label>
                    <div style = "  margin-bottom: 10px" class="input-group date" id="datepicker3">
                        <input type="text" name="doc_Birthdate" class="form-control" required>
                        <span class="input-group-append">
                            <span class="input-group-text bg-white d-block">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </span>
                    </div>
                    <input type = "number" style = "  margin-bottom: 10px" name="doc_Age" class="form-control" id="doc_Age" minlength="2" min="18" required placeholder="Age"> 
                    <input  style = "  margin-bottom: 10px" name="doc_Birthplace" class="form-control" id="doc_Birthplace" minlength="4" required placeholder="Birth Place">   
                    <label for="reason">Civil Status</label>
                            <select name="doc_Civilstatus" class="civilstatus">
                                <option disabled selected>Civil Status</option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Divorced">Divorced</option>
                                <option value="Widowed">Widowed</option>
                            </select><br>
                    <input  style = "  margin-bottom: 10px" name="doc_Citizenship" class="form-control" id="doc_Citizenship" minlength="4" required placeholder="Citizenship" >
                    <input  type = "number" style = "  margin-bottom: 10px" name="doc_Height" class="form-control" id="doc_Height" minlength="3" min = "137 cm" required placeholder="Height in cm">
                    <input  type = "number" style = "  margin-bottom: 10px" name="doc_Weight" class="form-control" id="doc_Weight" minlength="3" min = "28 kg" required placeholder="Weight in kg">  
                    <input  style = "  margin-bottom: 10px" name="doc_Occupation" class="form-control" id="doc_Occupation" minlength="4" required placeholder="Occupation">        
                    <label for="reason">Purpose of Application:</label>
                            <select style="width: 100%;padding:10px;margin-bottom:10px" id="reason" name="doc_Purpose" required style="overflow: auto;">
                                <option value="Bailbond">Bailbond</option>
                                <option value="Burial Assistance">Burial Assistance</option>
                                <option value="Cable Application">Cable Application</option>
                                <option value="DSWD">DSWD</option>
                                <option value="Educational Assistance">Educational Assistance</option>
                                <option value="Financial Assistance">Financial Assistance</option>
                                <option value="Foreign Employment ">Foreign Employment</option>
                                <option value="Loan Application (Housing Multi-purpose)">Loan Application (Housing Multi-purpose)</option>
                                <option value="Loan Application (Others)">Loan Application (Others)</option>
                                <option value="Local Employment">Local Employment</option>
                                <option value="Marriage License">Marriage License</option>
                                <option value="Maynilad (Business and Commercial)">Maynilad (Business and Commercial)</option>
                                <option value="Maynilad (Industrial)">Maynilad (Industrial)</option>
                                <option value="Maynilad (Residential Townhouse and Condominiums)">Maynilad (Residential Townhouse and Condominiums)</option>
                                <option value="Medical Assistance Meralco (Business and Commercial)">Medical Assistance Meralco (Business and Commercial)</option>
                                <option value="Meralco (Industrial)">Meralco (Industrial)</option>
                                <option value="Meralco (Residential Townhouse and Condominiums) ">Meralco (Residential Townhouse and Condominiums)</option>
                                <option value="NBI Clearance">NBI Clearance</option>
                                <option value="PhilHealth">PhilHealth</option>
                                <option value="Police Clearance">Police Clearance</option>
                                <option value="Postal ID">Postal ID</option>
                                <option value="Proof of Residency">Proof of Residency</option>
                                <option value="Scholarship">Scholarship</option>
                                <option value="School Requirement">School Requirement</option>
                                <option value="Social Pension">Social Pension</option>
                                <option value="Solo Parent ID">Solo Parent ID</option>
                                <option value="SSS ">SSS</option>
                                <option value="TRO">TRO</option>
                                <option value="Others">Others</option>
                            </select>
                    </div><br>
                    <div class = "column">
                    <input type = "number" style = "  margin-bottom: 10px" name="doc_Earningfromsal" class="form-control" id="doc_Earningfromsal" minlength="4" placeholder="Total Earning From Salaries Profession" >  
                    <input  type = "number" style = "  margin-bottom: 10px" name="doc_Grossrecfrombus" class="form-control" id="doc_Grossrecfrombus" minlength="4"  placeholder="Total Gross Receipt From Business">  
                    <input type = "number"  style = "  margin-bottom: 10px" name="doc_Totalincom" class="form-control" id="doc_Totalincom" minlength="4" placeholder="Total Income From Party" >
                    <input  style = "  margin-bottom: 10px" name="doc_Taxindentification" class="form-control" id="doc_Taxindentification" minlength="4" placeholder="Tax Indentification Number" >
                    <input  style = "  margin-bottom: 10px" name="doc_Email" class="form-control" id="doc_Email" minlength="4" required placeholder="Email Address" >
                    <input  style = "  margin-bottom: 10px" name="doc_Contact" class="form-control" id="doc_Contact" minlength="4" required placeholder="Contact Number">         
                    <div class="form-group"></div>
                    <button style = "width: 100%; margin-top:10px" type="submit" name ="submit_Cedula"class="btn btn-primary">Add</button>
                    <button style = "width: 100%; margin-top:10px" type = "button" onclick = "window.location.href='barangay_Permit.php'" class="btn btn-primary">Clear</button>
                   
                </div> 
                 </form>
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
    $(function() {
        $('#datepicker1').datepicker();
    });
</script>
<script type="text/javascript">
    $(function() {
        $('#datepicker2').datepicker();
    });
</script>
<script type="text/javascript">
    $(function() {
        $('#datepicker3').datepicker();
    });
</script>
<script>
function showBarangay_Certificate() {

var A = document.getElementById("Barangay_Certificate");
var B = document.getElementById("Barangay_Clearance");
var C = document.getElementById("Certificate_Indigency");
var D = document.getElementById("Business_Permit");
var E = document.getElementById("Cedula");

// If the checkbox is checked, display the output text
   A.style.display = "block";
   B.style.display = "none";
   C.style.display = "none";
   D.style.display = "none";
   E.style.display = "none";
}
function showBarangay_Clearance() {

    var A = document.getElementById("Barangay_Certificate");
var B = document.getElementById("Barangay_Clearance");
var C = document.getElementById("Certificate_Indigency");
var D = document.getElementById("Business_Permit");
var E = document.getElementById("Cedula");

// If the checkbox is checked, display the output text
 A.style.display = "none";
 B.style.display = "block";
 C.style.display = "none";
 D.style.display = "none";
 E.style.display = "none";
}
function showCertificate_Indigency() {

var A = document.getElementById("Barangay_Certificate");
var B = document.getElementById("Barangay_Clearance");
var C = document.getElementById("Certificate_Indigency");
var D = document.getElementById("Business_Permit");
var E = document.getElementById("Cedula");

// If the checkbox is checked, display the output text
 A.style.display = "none";
 B.style.display = "none";
 C.style.display = "block";
 D.style.display = "none";
 E.style.display = "none";
}

function showBusiness_Permit() {

    var A = document.getElementById("Barangay_Certificate");
var B = document.getElementById("Barangay_Clearance");
var C = document.getElementById("Certificate_Indigency");
var D = document.getElementById("Business_Permit");
var E = document.getElementById("Cedula");

// If the checkbox is checked, display the output text
 A.style.display = "none";
 B.style.display = "none";
 C.style.display = "none";
 D.style.display = "block";
 E.style.display = "none";
}
function showCedula() {

var A = document.getElementById("Barangay_Certificate");
var B = document.getElementById("Barangay_Clearance");
var C = document.getElementById("Certificate_Indigency");
var D = document.getElementById("Business_Permit");
var E = document.getElementById("Cedula");

// If the checkbox is checked, display the output text
A.style.display = "none";
B.style.display = "none";
C.style.display = "none";
D.style.display = "none";
E.style.display = "block";
}
</script>
