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
    <link rel="stylesheet" href="CSS/barangayside.css" />
    <title>Document Requests</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <center>
        <div id="sidebar-wrapper" style="background-color: #bd8565;">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold border-bottom" style="color: #659DBD;"><img src="img/Logo_192.png" alt="BaRIS_Logo" width="60" height="60"><span style="text-shadow: 1px 1px 2px rgba(0, 0,0, 1)">BaRIS</span> </div>
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
                    <h2 class="fs-2 m-0">Document Requests</h2>
                </div>
            </nav>
            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2" id="count1"></h3>
                                  <h3 class="fs-2" id="count2" style="display:none"></h3>
                                <p class="fs-5">Pending Application</p>
                            </div>
                            <i class="fas fa-gift fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                </div>
                <div class="row" id="services">
                <div id="service_column"><button class="btn" id="service_choice" name="blotter_list" onclick="showBarangay_Request1();">Online</button></div>
                <div id="service_column"><button class="btn" id="service_choice" name="blotter_create" onclick="showBarangay_Request2();">Walk-In</button></div>
              
            </div>

                <div class="row my-5" id= "document_request1">
                    <h3 class="fs-4 mb-3">Online</h3>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12" style="overflow-x:auto;">
                                <table class="table table-striped" id="loadData1">
                                    <thead>
                                        <tr style="background-color: #bd8565;">
                                            <th>Document_ID</th>
                                            <th>User_ID</th>
                                            <th>Document_Type</th>
                                            <th>Requestor Full Name</th>
                                            <th>Email</th>
                                            <th>Contact_Number</th>
                                            <th>Mode of Deliver</th>
                                            <th>Request_Mode</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div style = "display:none" class="row my-5" id= "document_request2">
                    <h3 class="fs-4 mb-3">Walk-In</h3>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12" style="overflow-x:auto;">
                                <table class="table table-striped" id="loadData2">
                                    <thead>
                                        <tr style="background-color: #bd8565;">
                                            <th>Document_ID</th>
                                            <th>Document_Type</th>
                                            <th>Requestor Full Name</th>
                                            <th>Email</th>
                                            <th>Contact_Number</th>
                                            <th>Request_Mode</th>
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
    <!-- /#page-content-wrapper -->
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
  $(document).ready(function(){
      loadMoreData();
      function loadMoreData(page){
        $.ajax({
          url : "API/API_request_load_data.php",
          type: "POST",
          cache:false,
          data:{page_no:page},
          success:function(data){
            if (data) {
              $("#pagination").remove();
              document.getElementById("count1").innerHTML = data.slice(-1); 
              $("#loadData1").append(data);
            }else{
              $(".loadbtn").prop("disabled", true);
              $(".loadbtn").html('That is All');
            }
          }
        });
      }
      
      $(document).on('click', '.loadbtn', function(){
        $(".loadbtn").html('Loading...');
        var pId = $(this).data("id");
        loadMoreData(pId);
      });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
      loadMoreData();
      function loadMoreData(page){
        $.ajax({
          url : "API/API_request_load_data2.php",
          type: "POST",
          cache:false,
          data:{page_no:page},
          success:function(data){
            if (data) {
              $("#pagination2").remove();
              document.getElementById("count2").innerHTML = data.slice(-1); 
              $("#loadData2").append(data);
            }else{
              $(".loadbtn2").prop("disabled", true);
              $(".loadbtn2").html('That is All');
            }
          }
        });
      }
      
      $(document).on('click', '.loadbtn2', function(){
        $(".loadbtn2").html('Loading...');
        var pId = $(this).data("id");
        loadMoreData(pId);
      });
  });
</script>
<script>
function showBarangay_Request1() {

var A = document.getElementById("document_request1");
var B = document.getElementById("document_request2");
var C = document.getElementById("count1");
var D = document.getElementById("count2");


// If the checkbox is checked, display the output text
   A.style.display = "block";
   B.style.display = "none";
   C.style.display = "block";
   D.style.display = "none";
 
}
function showBarangay_Request2() {

var A = document.getElementById("document_request1");
var B = document.getElementById("document_request2");
var C = document.getElementById("count1");
var D = document.getElementById("count2");


// If the checkbox is checked, display the output text
 A.style.display = "none";
 B.style.display = "block";
 C.style.display = "none";
 D.style.display = "block";
}
</script>
