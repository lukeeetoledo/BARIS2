<?php
session_start();
if (!isset($_SESSION['user_ID']) && !isset($_SESSION['user_Type']) && !isset($_SESSION['barangay_ID'])) {
    header("location:index.php");
}
include 'API/API_get_reports.php';
include 'API/API_gr_year.php';
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
    <link rel="stylesheet" href="CSS/barangayside_report.css" />
    <title>Barangay Reports</title>
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
                    <h2 class="fs-2 m-0">Reports of Barangay</h2>
                </div>
            </nav>
            <div class="row" id="report">
                <div id="report_column"><button class="btn" id="report_choice" name="add_report" onclick="changeReport(this);">Add Report</button></div>
                <div id="report_column"><button class="btn" id="report_choice" name="list_report" onclick="changeReport(this);">Report List</button></div>
                <div id="report_column"><button class="btn" id="report_choice" name="generate_report" onclick="changeReport(this);">Generate Report</button></div>
            </div>

            <!-- ADD REPORT -->
            <div class="row" id="report_add">
                <h3 class="fs-4 mb-3"><span id="head_filter_request">Add Report</span></h3>
                <!-- TYPE SELECTION -->
                <div>
                    <select name="report_type" id="report_type" onchange="showHideReport(this)">
                        <option value="programs/services">Programs/Services</option>
                        <option value="meetings">Meetings</option>
                        <option value="budget_expenditure">Budget Expenditure</option>
                        <option value="training/seminars">Training/Seminars</option>
                        <option value="others">Others</option>
                    </select>
                </div>
                <!-- PROGRAMS/SERVICES -->
                <div id="type_programs/services" class="report_list">
                    <form action="API/API_add_report.php" method="POST">
                        <label for="tps_type">Type<span id="span_req">*</span></label>
                        <input type="text" id="tps_type" name="txt_tps_type" placeholder="e.g. Health, Education etc.." required />
                        <label for="tps_title">Title<span id="span_req">*</span></label>
                        <input type="text" id="tps_title" name="txt_tps_title" placeholder="e.g. Libren Bakuna, Lesson etc.." required />
                        <label for="tps_description">Description<span id="span_req">*</span></label>
                        <input type="text" id="tps_description" name="txt_tps_description" required />
                        <label for="tps_date">Date<span id="span_req">*</span></label>
                        <input type="date" id="tps_date" name="txt_tps_date" required />
                        <label for="tps_NoB">Number of Beneficiary<span id="span_req">*</span></label>
                        <input type="number" id="tps_NoB" name="txt_tps_NoB" min="0" required />
                        <label for="tps_ToB">Type of Beneficiary<span id="span_req">*</span></label>
                        <input type="text" id="tps_ToB" name="txt_tps_ToB" placeholder="e.g. Student, Senior Citizen etc.." required />
                        <label for="tps_summary">Summary<span id="span_req">*</span></label>
                        <textarea name="txt_tps_summary" id="tps_summary" required></textarea>
                        <input class="submit" type="submit" name="tps_submit" value="Submit">
                    </form>
                </div>
                <!-- MEETINGS -->
                <div id="meetings" class="report_list" style="display: none;">
                    <form action="API/API_add_report.php" method="POST">
                        <label for="M_agenda">Agenda<span id="span_req">*</span></label>
                        <input type="text" id="M_agenda" name="txt_M_agenda" placeholder="e.g. Barangay Assembly" required />
                        <label for="M_description">Description<span id="span_req">*</span></label>
                        <input type="text" id="M_description" name="txt_M_description" required />
                        <label for="M_date">Date<span id="span_req">*</span></label>
                        <input type="date" id="M_date" name="txt_M_date" required />
                        <label for="M_startTime">Start Time<span id="span_req">*</span></label>
                        <input type="time" id="M_startTime" name="txt_M_startTime" required />
                        <label for="M_endTime">End Time<span id="span_req">*</span></label>
                        <input type="time" id="M_endTime" name="txt_M_endTime" required />
                        <label for="M_summary">Summary<span id="span_req">*</span></label>
                        <textarea name="txt_M_summary" id="M_summary" required></textarea>
                        <input class="submit" type="submit" name="M_submit" value="Submit">
                    </form>
                </div>
                <!-- BUDGET EXPENDITURE -->
                <div id="budget_expenditure" class="report_list" style="display: none;">
                    <form action="API/API_add_report.php" method="POST">
                        <label for="BE_project">Project<span id="span_req">*</span></label>
                        <input type="text" id="BE_project" name="txt_BE_project" placeholder="e.g. Road maintenance, Repairs" required />
                        <label for="BE_description">Description<span id="span_req">*</span></label>
                        <input type="text" id="BE_description" name="txt_BE_description" required />
                        <label for="BE_date">Date<span id="span_req">*</span></label>
                        <input type="date" id="BE_date" name="txt_BE_date" required />
                        <label for="BE_cost">Cost<span id="span_req">*</span></label>
                        <input type="number" id="BE_cost" name="txt_BE_cost" min="0.00" placeholder="0.00" required />
                        <label for="BE_FS">Fund Source<span id="span_req">*</span></label>
                        <input type="text" id="BE_FS" name="txt_BE_FS" placeholder="e.g. DSWD, Local City/Municipality" required />
                        <label for="BE_status">Status<span id="span_req">*</span></label>
                        <select name="txt_BE_status" id="BE_status">
                            <option value="started">Started</option>
                            <option value="on-going">On-going</option>
                            <option value="completed">Completed</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                        <input class="submit" type="submit" name="BE_submit" value="Submit">
                    </form>
                </div>
                <!-- TRAINING/SEMINARS -->
                <div id="type_training/seminars" class="report_list" style="display: none;">
                    <form action="API/API_add_report.php" method="POST">
                        <label for="tts_title">Title<span id="span_req">*</span></label>
                        <input type="text" id="tts_title" name="txt_tts_title" placeholder="e.g. Construction, Plantita-Plantito" required />
                        <label for="tts_description">Description<span id="span_req">*</span></label>
                        <input type="text" id="tts_description" name="txt_tts_description" required />
                        <label for="tts_Cby">Conducted by<span id="span_req">*</span></label>
                        <input type="text" id="tts_Cby" name="txt_tts_Cby" placeholder="e.g. Kapitan, Kagawad" required />
                        <label for="tts_Sby">Sponsored by<span id="span_req">*</span></label>
                        <input type="text" id="tts_Sby" name="txt_tts_Sby" placeholder="e.g. Mayor, Councilor" required />
                        <label for="tts_date">Date<span id="span_req">*</span></label>
                        <input type="date" id="tts_date" name="txt_tts_date" required />
                        <input class="submit" type="submit" name="tts_submit" value="Submit">
                    </form>
                </div>
                <!-- OTHERS -->
                <div id="others" class="report_list" style="display: none;">
                    <form action="API/API_add_report.php" method="POST">
                        <label for="others_title">Title<span id="span_req">*</span></label>
                        <input type="text" id="others_title" name="txt_others_title" placeholder="Other Reports" required />
                        <label for="others_description">Description<span id="span_req">*</span></label>
                        <input type="text" id="others_description" name="txt_others_description" required />
                        <label for="others_date">Date<span id="span_req">*</span></label>
                        <input type="date" id="others_date" name="txt_others_date" required />
                        <label for="others_summary">Summary<span id="span_req">*</span></label>
                        <textarea name="txt_others_summary" id="others_summary" required></textarea>
                        <input class="submit" type="submit" name="others_submit" value="Submit">
                    </form>
                </div>
            </div>
            <!-- LIST REPORT -->
            <div class="row" id="report_list" style="display: none;">
                <h3 class="fs-4 mb-3"><span id="head_filter_request">Report List</span></h3>
                <select name="report_type" id="report_type" onchange="showHideTable(this)">
                    <option value="all">All</option>
                    <option value="programs/services">Programs/Services</option>
                    <option value="meetings">Meetings</option>
                    <option value="budget_expenditure">Budget Expenditure</option>
                    <option value="training/seminars">Training/Seminars</option>
                    <option value="others">Others</option>
                </select>
                <div style="overflow: scroll;margin-top:10px; max-height: 1600px;">
                    <!-- ALL -->
                    <table class="report_table" id="table_0">
                        <tr>
                            <th>#</th>
                            <th>Type</th>
                            <th>Program/Service_Type</th>
                            <th>Title/Agenda/Project</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Summary</th>
                            <th>Num_Beneficiary</th>
                            <th>Type_Beneficiary</th>
                            <th>Meeting_Start</th>
                            <th>Meeting_End</th>
                            <th>Cost</th>
                            <th>Fund Source</th>
                            <th>Status</th>
                            <th>Conducted_by</th>
                            <th>Sponsored_by</th>
                        </tr>
                        <?php echo $report_0; ?>
                    </table>
                    <center>
                        <!-- Programs/Services -->
                        <table class="report_table" id="table_1" style="display: none;">
                            <tr>
                                <th>#</th>
                                <th>Program/Service_Type</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Num_Beneficiary</th>
                                <th>Type_Beneficiary</th>
                                <th>Summary</th>
                            </tr>
                            <?php echo $report_1; ?>
                        </table>
                    </center>
                    <center>
                        <!-- Meetings -->
                        <table class="report_table" id="table_2" style="display: none;">
                            <tr>
                                <th>#</th>
                                <th>Agenda</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Meeting_Start</th>
                                <th>Meeting_End</th>
                                <th>Summary</th>
                            </tr>
                            <?php echo $report_2; ?>
                        </table>
                    </center>
                    <center>
                        <!-- Budget Expenditure -->
                        <table class="report_table" id="table_3" style="display: none;">
                            <tr>
                                <th>#</th>
                                <th>Project</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Cost</th>
                                <th>Fund Source</th>
                                <th>Status</th>
                            </tr>
                            <?php echo $report_3; ?>
                        </table>
                    </center>
                    <center>
                        <!-- Training/Seminars -->
                        <table class="report_table" id="table_4" style="display: none;">
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Conducted_by</th>
                                <th>Sponsored_by</th>
                            </tr>
                            <?php echo $report_4; ?>
                        </table>
                    </center>
                    <center>
                        <!-- Others -->
                        <table class="report_table" id="table_5" style="display: none;">
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Summary</th>
                            </tr>
                            <?php echo $report_5; ?>
                        </table>
                    </center>
                </div>

            </div>
            <!-- GENERATE REPORT -->
            <div class="row" id="report_generate" style="display: none;">
                <h3 class="fs-4 mb-3"><span id="head_filter_request">Generate Report</span></h3>
                <label for="select_Type">Report Type</label>
                <select class="generate_select" name="generate_Type" id="select_Type" onchange="showHideTable(this)">
                    <option value="all">All</option>
                    <option value="programs/services">Programs/Services</option>
                    <option value="meetings">Meetings</option>
                    <option value="budget_expenditure">Budget Expenditure</option>
                    <option value="training/seminars">Training/Seminars</option>
                    <option value="others">Others</option>
                </select>
                <label for="select_Month">Month</label>
                <select class="generate_select" name="generate_Month" id="select_Month" onchange="showHideTable(this)">
                    <option value="all">All</option>
                    <option value="Jan">January</option>
                    <option value="Feb">February</option>
                    <option value="Mar">March</option>
                    <option value="Apr">April</option>
                    <option value="May">May</option>
                    <option value="Jun">June </option>
                    <option value="Jul">July</option>
                    <option value="Aug">August</option>
                    <option value="Sep">September</option>
                    <option value="Oct">October</option>
                    <option value="Nov">November</option>
                    <option value="Dec">December</option>
                </select>
                <label for="select_Year">Year</label>
                <select class="generate_select" name="generate_Year" id="select_Year" onchange="showHideTable(this)">
                    <option value="all">All</option>
                    <?php echo $year_List; ?>
                </select>
                <button class="btn btn-primary" onclick="generateLinkbtn('select_Type','select_Month','select_Year')" name="generate_submit" id="generate_submit" style="width:100%;">Generate</button>

                <!-- GENERATED LINK BUTTON -->
                <center>
                    <div id="generated_report"><label>Result here...</label></div>
                </center>
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
    function showHideReport(report) {
        var x = report.value;

        if (x == "programs/services") {
            document.getElementById("type_programs/services").style.display = "block";
            document.getElementById("meetings").style.display = "none";
            document.getElementById("budget_expenditure").style.display = "none";
            document.getElementById("type_training/seminars").style.display = "none";
            document.getElementById("others").style.display = "none";
        } else if (x == "meetings") {
            document.getElementById("type_programs/services").style.display = "none";
            document.getElementById("meetings").style.display = "block";
            document.getElementById("budget_expenditure").style.display = "none";
            document.getElementById("type_training/seminars").style.display = "none";
            document.getElementById("others").style.display = "none";
        } else if (x == "budget_expenditure") {
            document.getElementById("type_programs/services").style.display = "none";
            document.getElementById("meetings").style.display = "none";
            document.getElementById("budget_expenditure").style.display = "block";
            document.getElementById("type_training/seminars").style.display = "none";
            document.getElementById("others").style.display = "none";
        } else if (x == "training/seminars") {
            document.getElementById("type_programs/services").style.display = "none";
            document.getElementById("meetings").style.display = "none";
            document.getElementById("budget_expenditure").style.display = "none";
            document.getElementById("type_training/seminars").style.display = "block";
            document.getElementById("others").style.display = "none";
        } else {
            document.getElementById("type_programs/services").style.display = "none";
            document.getElementById("meetings").style.display = "none";
            document.getElementById("budget_expenditure").style.display = "none";
            document.getElementById("type_training/seminars").style.display = "none";
            document.getElementById("others").style.display = "block";
        }
    }

    function changeReport(report) {
        var x = report.name;
        if (x == "add_report") {
            document.getElementById("report_add").style.display = "block";
            document.getElementById("report_list").style.display = "none";
            document.getElementById("report_generate").style.display = "none";
        } else if (x == "list_report") {
            document.getElementById("report_add").style.display = "none";
            document.getElementById("report_list").style.display = "block";
            document.getElementById("report_generate").style.display = "none";
        } else {
            document.getElementById("report_add").style.display = "none";
            document.getElementById("report_list").style.display = "none";
            document.getElementById("report_generate").style.display = "block";
        }
    }

    function showHideTable(table) {

        var x = table.value;
        if (x == "all") {
            document.getElementById("table_0").style.display = "inline";
            document.getElementById("table_1").style.display = "none";
            document.getElementById("table_2").style.display = "none";
            document.getElementById("table_3").style.display = "none";
            document.getElementById("table_4").style.display = "none";
            document.getElementById("table_5").style.display = "none";
        } else if (x == "programs/services") {
            document.getElementById("table_0").style.display = "none";
            document.getElementById("table_1").style.display = "inline";
            document.getElementById("table_2").style.display = "none";
            document.getElementById("table_3").style.display = "none";
            document.getElementById("table_4").style.display = "none";
            document.getElementById("table_5").style.display = "none";
        } else if (x == "meetings") {
            document.getElementById("table_0").style.display = "none";
            document.getElementById("table_1").style.display = "none";
            document.getElementById("table_2").style.display = "inline";
            document.getElementById("table_3").style.display = "none";
            document.getElementById("table_4").style.display = "none";
            document.getElementById("table_5").style.display = "none";
        } else if (x == "budget_expenditure") {
            document.getElementById("table_0").style.display = "none";
            document.getElementById("table_1").style.display = "none";
            document.getElementById("table_2").style.display = "none";
            document.getElementById("table_3").style.display = "inline";
            document.getElementById("table_4").style.display = "none";
            document.getElementById("table_5").style.display = "none";
        } else if (x == "training/seminars") {
            document.getElementById("table_0").style.display = "none";
            document.getElementById("table_1").style.display = "none";
            document.getElementById("table_2").style.display = "none";
            document.getElementById("table_3").style.display = "none";
            document.getElementById("table_4").style.display = "inline";
            document.getElementById("table_5").style.display = "none";
        } else {
            document.getElementById("table_0").style.display = "none";
            document.getElementById("table_1").style.display = "none";
            document.getElementById("table_2").style.display = "none";
            document.getElementById("table_3").style.display = "none";
            document.getElementById("table_4").style.display = "none";
            document.getElementById("table_5").style.display = "inline";
        }
    }
</script>
<script>
    function generateLinkbtn(type, month, year) {
        document.getElementById("generated_report").innerHTML = "Generating...";
        setTimeout(function() {
            var var_Type = document.getElementById(type).value;
            var var_Month = document.getElementById(month).value;
            var var_Year = document.getElementById(year).value;
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById("generated_report").innerHTML = this.responseText;
            }
            xhttp.open("GET", "API/API_generate_linkbtn.php?tokenT=" + var_Type + "&tokenM=" + var_Month + "&tokenY=" + var_Year);
            xhttp.send();
        }, 1000);

    }
</script>