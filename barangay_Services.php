<?php 
      session_start();
      if(!isset($_SESSION['user_ID']) && !isset($_SESSION['user_Type']) && !isset($_SESSION['barangay_ID'])){
      header("location:index.php");
  }
  include 'API/API_complaint_ID.php';
  $txt_Complaint = "";
  $txt_Complainant = "";
  $txt_Respondent = "";
  $txt_Action = "";
  $txt_Official = "";
  $txt_Date = "";
  if(isset($_GET['token'])){
    include 'API/API_view_complaint.php';
    $txt_Complaint = $_GET['token'];
    $txt_Complainant = $complainant;
    $txt_Respondent = $respondent;
    $txt_Action = $action;
    $txt_Official = $official_ID;
    $txt_Date = $date;
}
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/Logo_192.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="CSS/barangayside.css" />
    <title>Services</title>
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
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Services</h2>
                </div>
            </nav>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
  
            <div class="row" id="services">
                <div id="service_column"><button class="btn" id="service_choice" name="blotter_create" onclick="showBlotter_Create();">Create Blotter</button></div>
                <div id="service_column"><button class="btn" id="service_choice" name="blotter_list" onclick="showBlotter_List();">Blotter List</button></div>
                <div id="service_column"><button class="btn" id="service_choice" name="complaint" onclick="showComplaint();">Complaint</button></div>
                <div id="service_column"><button class="btn" id="service_choice" name="support" onclick="showSupport();">Support</button></div>
            </div>

            <!-- BLOTTER -->
            <div class="row" id="service_blotter_create">
                <div><label for="myCheck" style="float:left;border:solid 3px;margin-right: 3px;"><img id="arrow_down" src="img/arrow-down.png" alt=""><img id="arrow_up" src="img/arrow-up.png" alt="" style="display: none;"></label><input type="checkbox" id="myCheck" onclick="myFunction()" style="display:none">
                    <label style="font-size: 32px;font-weight:bold">Blotter Form</label>
                    <div id="add_form">
                    <button onclick="generateComplaintID();" style="float: right;padding:1px">Generate Complaint ID</button>
                    <form action="API/API_create_blotter.php" method="POST">
                        <select name="list_ID" class="blotter_input" style="background-color: #659DBD; color:white" onchange="redirectComplaint(this.value);">
                            <option value="#" selected>Select complaint</option>
                            <?php echo $complaint_IDs;?>
                        </select>
                        <label for="complaint_ID">Complaint ID<span id="span_req">*</span><small style="color: red;"> [Not Editable]</small></label><br>
                        <input type="text" name="txt_complaint_ID" id="complaint_ID" class="blotter_input" style="background-color: #EDEADE;" value="<?php echo $txt_Complaint; ?>" readonly/>
                        <label for="complainant_Name">Complainant<span id="span_req">*</span></label><br>
                        <input type="text" name="txt_complainant_Name" id="complainant_Name" class="blotter_input" value="<?php echo $txt_Complainant; ?>" required />
                        <label for="respondent">Respondent/s<span id="span_req">*</span></label><br>
                        <input type="text" name="txt_respondent_List" id="respondent" class="blotter_input" value="<?php echo $txt_Respondent; ?>" required />
                        <label for="action">Action/s<span id="span_req">*</span></label><br>
                        <input type="text" name="txt_action_List" id="action" class="blotter_input" value="<?php echo $txt_Action; ?>" required />
                        <label for="Mediator">Mediator<span id="span_req">*</span></label><br>
                        <input type="text" name="txt_Mediator_name" id="Mediator" class="blotter_input" value="<?php echo $txt_Official; ?>" required />
                        <label for="Date">_Date<span id="span_req">*</span></label><br>
                        <input type="text" name="txt_Date" id="Date" class="blotter_input" value="<?php echo $txt_Date; ?>" required />
                        <label for="Resolution">Resolution<span id="span_req">*</span></label><br>
                        <textarea name="txt_Resolution" id="Resolution" cols="128" rows="10" class="blotter_input" required></textarea>
                        <input type="submit" class="btn btn-success" style="width: 100%; margin-bottom:5px" name = "submit" value="Submit" /><br>
                        <a href="barangay_Services.php" class="btn btn-info" style="width: 100%;">Clear</a>
                    </form>
                    </div> 
                </div>
            </div>
            <div class="row" id="service_blotter_list">
            <h3 class="fs-4 mb-3" id="head_filter_blotter">List of Blotter</h3>
                    <div class="container">
                    <a href = "API/API_barangay_blotter_excel.php" style = "margin-bottom: 5px" class = "btn btn-success">Export to Excel </a>
                        <div class="row">
                            <div class="col-md-12 col-sm-12" style="overflow-x:auto;">
                                <table class="table table-striped" id="loadData_blotter">
                                    <thead>
                                        <tr style="background-color: #bd8565;">
                                            <th>Blotter_ID</th>
                                            <th>Complaint_ID</th>
                                            <th>Complainant_Name</th>
                                            <th>Respondent_List</th>
                                            <th>Action_List</th>
                                            <th>Mediator_Name</th>
                                            <th>Resolution_List</th>
                                            <th>Date_Resolved</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
            <!-- COMPLAINT -->
            <div class="row" id="service_complaint">
                <h3 class="fs-4 mb-3" id="head_filter_complaints">List of Pending Complaints</h3>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12" style="overflow-x:auto;">
                                <table class="table table-striped" id="loadData0">
                                    <thead>
                                        <tr style="background-color: #bd8565;">
                                            <th>Complaint_ID</th>
                                            <th>Complaint_Reason</th>
                                            <th>Complainant_ID</th>
                                            <th>Respondent_List</th>
                                            <th>Action_List</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                                <table class="table table-striped" id="loadData1" style="display: none;">
                                    <thead>
                                        <tr style="background-color: #bd8565;">
                                            <th>Complaint_ID</th>
                                            <th>Complaint_Reason</th>
                                            <th>Complainant_ID</th>
                                            <th>Respondent_List</th>
                                            <th>Action_List</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                    <button id="btn_filter" onclick="filterComplaints()" style="width: 50%; float:right">Resolved Complaints ></button> 
            </div>

            <!-- SERVICES -->
            <div class="row" id="service_support">
            <h3 class="fs-4 mb-3" ><span id="head_filter_request">List of Request</span></h3>
                    <div class="container">
                    <a href = "API/API_barangay_support_excel.php" style = "margin-bottom: 5px" class = "btn btn-success">Export to Excel </a>
                        <div class="row">
                            <div class="col-md-12 col-sm-12" style="overflow-x:auto;">
                                <table class="table table-striped" id="loadData_support">
                                    <thead>
                                        <tr style="background-color: #bd8565;">
                                            <th>Request_ID</th>
                                            <th>Request_Agenda</th>
                                            <th>Date_Requested</th>
                                            <th>Agenda_Date</th>
                                            <th>Agenda_Due</th>
                                            <th>Request_Message</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
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
<script>
function showBlotter_Create() {

  var A = document.getElementById("service_blotter_create");
  var B = document.getElementById("service_complaint");
  var C = document.getElementById("service_support");
  var D = document.getElementById("service_blotter_list");

  // If the checkbox is checked, display the output text
     A.style.display = "block";
     B.style.display = "none";
     C.style.display = "none";
     D.style.display = "none";
}
function showComplaint() {

var A = document.getElementById("service_blotter_create");
var B = document.getElementById("service_complaint");
var C = document.getElementById("service_support");
var D = document.getElementById("service_blotter_list");

// If the checkbox is checked, display the output text
   A.style.display = "none";
   B.style.display = "block";
   C.style.display = "none";
   D.style.display = "none";
}
function showSupport() {

var A = document.getElementById("service_blotter_create");
var B = document.getElementById("service_complaint");
var C = document.getElementById("service_support");
var D = document.getElementById("service_blotter_list");

// If the checkbox is checked, display the output text
   A.style.display = "none";
   B.style.display = "none";
   C.style.display = "block";
   D.style.display = "none";
}

function showBlotter_List() {

var A = document.getElementById("service_blotter_create");
var B = document.getElementById("service_complaint");
var C = document.getElementById("service_support");
var D = document.getElementById("service_blotter_list");

// If the checkbox is checked, display the output text
   A.style.display = "none";
   B.style.display = "none";
   C.style.display = "none";
   D.style.display = "block";
}

function redirectComplaint(x){
    window.location = "?token="+x;
}

function generateComplaintID(){
    var x = document.getElementById("complaint_ID");
    var rand_ID = uniqid('ComplaintB_'); 
    x.value = rand_ID; 

}
function uniqid(prefix = "", random = false) {
    const sec = Date.now() * 1000 + Math.random() * 1000;
    const id = sec.toString(16).replace(/\./g, "").padEnd(14, "0");
    return `${prefix}${id}${random ? `.${Math.trunc(Math.random() * 100000000)}`:""}`;
};
</script>

<script type="text/javascript">
  $(document).ready(function(){
      loadMoreData();
      function loadMoreData(page){
        $.ajax({
          url : "API/API_get_complaints_0.php",
          type: "POST",
          cache:false,
          data:{page_no:page},
          success:function(data){
            if (data) {
              $("#pagination").remove();
              $("#loadData0").append(data);
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
<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure?');
}
</script>
<script>
    function filterComplaints(){
        var x = document.getElementById('loadData0');
        var y = document.getElementById('loadData1');
        var z = document.getElementById('btn_filter');
        var a = document.getElementById('head_filter_complaints');

        if(y.style.display == "none"){
            x.style.display = "none";
            y.style.display = "block";
            z.style.float = "left";
            z.innerHTML = "< Pending Complaints";
            a.innerHTML = "List of Resolved Complaints";
        }
        else{
            x.style.display = "block";
            y.style.display = "none";
            z.style.float = "right";
            z.innerHTML = "Resolved Complaints >";
            a.innerHTML = "List of Pending Complaints";
        }
    }
</script>
<script type="text/javascript">
  $(document).ready(function(){
      loadMoreData();
      function loadMoreData(page){
        $.ajax({
          url : "API/API_get_complaints_1.php",
          type: "POST",
          cache:false,
          data:{page_no:page},
          success:function(data){
            if (data) {
              $("#pagination1").remove();
              $("#loadData1").append(data);
            }else{
              $(".loadbtn1").prop("disabled", true);
              $(".loadbtn1").html('That is All');
            }
          }
        });
      }
      
      $(document).on('click', '.loadbtn1', function(){
        $(".loadbtn1").html('Loading...');
        var pId = $(this).data("id");
        loadMoreData(pId);
      });
  });
</script>

<script>
    function myFunction() {
  // Get the checkbox
  var checkBox = document.getElementById("myCheck");
  // Get the output text
  var A = document.getElementById("add_form");
  var D = document.getElementById("arrow_down");
  var E = document.getElementById("arrow_up");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    A.style.display = "none";
    D.style.display = "none";
    E.style.display = "block";
  } else {
    A.style.display = "block";
    D.style.display = "block";
    E.style.display = "none";
  }
}
</script>

<script type="text/javascript">
  $(document).ready(function(){
      loadMoreData();
      function loadMoreData(page_blotter){
        $.ajax({
          url : "API/API_get_blotter.php",
          type: "POST",
          cache:false,
          data:{page_no_blotter:page_blotter},
          success:function(data){
            if (data) {
              $("#pagination_blotter").remove();
              $("#loadData_blotter").append(data);
            }else{
              $(".loadbtn_blotter").prop("disabled", true);
              $(".loadbtn_blotter").html('That is All');
            }
          }
        });
      }
      
      $(document).on('click', '.loadbtn_blotter', function(){
        $(".loadbtn_blotter").html('Loading...');
        var pId = $(this).data("id");
        loadMoreData(pId);
      });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
      loadMoreData();
      function loadMoreData(page_support){
        $.ajax({
          url : "API/API_get_request.php",
          type: "POST",
          cache:false,
          data:{page_no_support:page_support},
          success:function(data){
            if (data) {
              $("#pagination_support").remove();
              $("#loadData_support").append(data);
            }else{
              $(".loadbtn_support").prop("disabled", true);
              $(".loadbtn_support").html('That is All');
            }
          }
        });
      }
      
      $(document).on('click', '.loadbtn_support', function(){
        $(".loadbtn_support").html('Loading...');
        var pId = $(this).data("id");
        loadMoreData(pId);
      });
  });
</script>