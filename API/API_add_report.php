<?php 
include 'SYSTEM_config.php';
session_start();
if(!isset($_SESSION['user_ID']) && !isset($_SESSION['user_Type']) && !isset($_SESSION['barangay_ID'])){
    header("location:../index.php");
  }
include 'API_insert_history.php';
$barangayID = $_SESSION['barangay_ID'];
$user_ID = $_SESSION['user_ID'];

date_default_timezone_set("Asia/Manila");

// PROGRAMS/SERVICES
if(isset($_POST['tps_submit'])){
    $report_ID = uniqid("BaRIS-report_");
    $report_Type = "Programs-Services";
    $PS_Type = $_POST['txt_tps_type'];
    $report_Title = $_POST['txt_tps_title'];
    $report_Description = $_POST['txt_tps_description'];
    $report_Date = $_POST['txt_tps_date'];
    $PS_Num_Beneficiary = $_POST['txt_tps_NoB']; 
    $PS_Type_Beneficiary = $_POST['txt_tps_ToB'];
    $date_Month = date('M', strtotime($report_Date));
    $date_Year = date('Y', strtotime($report_Date));
    $report_Summary = $_POST['txt_tps_summary'];

    $query_Add_report = "INSERT INTO barangay_reports_tbl SET report_ID = '$report_ID', barangay_ID = '$barangayID', report_Type = '$report_Type',
    PS_Type = '$PS_Type', report_TAP = '$report_Title', report_Description = '$report_Description', report_Date = '$report_Date',
    PS_Num_Beneficiary = '$PS_Num_Beneficiary', PS_Type_beneficiary = '$PS_Type_Beneficiary', date_Month = '$date_Month', date_Year = '$date_Year', report_Summary = '$report_Summary'";
    $result_Add_report = mysqli_query($conn, $query_Add_report);

    if($result_Add_report){
        $subject = "Adding_Report";
        $date = date('Y-m-d [h:i A]');
        $holder_Type = "barangay";
        insertEvent($date,$subject,$report_ID,$holder_Type);
        echo '<script>alert("Report Added!"); window.location.href="../barangay_Reports.php";</script>';
    }else{
        echo '<script>alert("Error: '.$conn->error.'}"); window.location.href="../barangay_Reports.php";</script>';
    }
    
}
// MEETINGS
if(isset($_POST['M_submit'])){
    $report_ID = uniqid("BaRIS-Report_");
    $report_Type = "Meetings";
    $report_Agenda = $_POST['txt_M_agenda'];
    $report_Description = $_POST['txt_M_description'];
    $report_Date = $_POST['txt_M_date'];
    $Meet_start_time = $_POST['txt_M_startTime'];
    $Meet_end_time = $_POST['txt_M_endTime'];
    $date_Month = date('M', strtotime($report_Date));
    $date_Year = date('Y', strtotime($report_Date));
    $report_Summary = $_POST['txt_M_summary'];

    $query_Add_report = "INSERT INTO barangay_reports_tbl SET report_ID = '$report_ID', barangay_ID = '$barangayID', report_Type = '$report_Type',
    report_TAP = '$report_Agenda', report_Description = '$report_Description', report_Date = '$report_Date', Meet_start_time = '$Meet_start_time',
    Meet_end_time = '$Meet_end_time', date_Month = '$date_Month', date_Year = '$date_Year', report_summary = '$report_Summary'";
    $result_Add_report = mysqli_query($conn, $query_Add_report);

    if($result_Add_report){
        $subject = "Adding_Report";
        $date = date('Y-m-d [h:i A]');
        $holder_Type = "barangay";
        insertEvent($date,$subject,$report_ID,$holder_Type);
        echo '<script>alert("Report Added!"); window.location.href="../barangay_Reports.php";</script>';
    }else{
        echo '<script>alert("Error: '.$conn->error.'}"); window.location.href="../barangay_Reports.php";</script>';
    }
    
}
// BUDGET EXPENDITURE
if(isset($_POST['BE_submit'])){
    $report_ID = uniqid("BaRIS-Report_");
    $report_Type = "Budget-Expenditure";
    $report_Project = $_POST['txt_BE_project'];
    $report_Description = $_POST['txt_BE_description'];
    $report_Date = $_POST['txt_BE_date'];
    $date_Month = date('M', strtotime($report_Date));
    $date_Year = date('Y', strtotime($report_Date));
    $BE_cost = "₱".$_POST['txt_BE_cost'];
    $BE_fund_source = $_POST['txt_BE_FS'];
    $BE_status = $_POST['txt_BE_status'];

    $query_Add_report = "INSERT INTO barangay_reports_tbl SET report_ID = '$report_ID', barangay_ID = '$barangayID', report_Type = '$report_Type',
    report_TAP = '$report_Project', report_Description = '$report_Description', report_Date = '$report_Date', date_Month = '$date_Month', date_Year = '$date_Year',
    BE_cost = '$BE_cost', BE_fund_source = '$BE_fund_source', BE_status = '$BE_status'";
    $result_Add_report = mysqli_query($conn, $query_Add_report);

     if($result_Add_report){
         $subject = "Adding_Report";
         $date = date('Y-m-d [h:i A]');
         $holder_Type = "barangay";
         insertEvent($date,$subject,$report_ID,$holder_Type);
         echo '<script>alert("Report Added!"); window.location.href="../barangay_Reports.php";</script>';
     }else{
         echo '<script>alert("Error: '.$conn->error.'}"); window.location.href="../barangay_Reports.php";</script>';
     }
}
// TRAINING-SEMINARS
if(isset($_POST['tts_submit'])){
    $report_ID = uniqid("BaRIS-Report_");
    $report_Type = "Training-Seminars";
    $report_Title = $_POST['txt_tts_title'];
    $report_Description = $_POST['txt_tts_description'];
    $TS_conducted_by = $_POST['txt_tts_Cby'];
    $TS_sponsored_by = $_POST['txt_tts_Sby'];
    $report_Date = $_POST['txt_tts_date'];
    $date_Month = date('M', strtotime($report_Date));
    $date_Year = date('Y', strtotime($report_Date));

    $query_Add_report = "INSERT INTO barangay_reports_tbl SET report_ID = '$report_ID', barangay_ID = '$barangayID', report_Type = '$report_Type', 
    report_TAP = '$report_Title', report_Description = '$report_Description', report_Date = '$report_Date', date_Month = '$date_Month', date_Year = '$date_Year',
    TS_conducted_by = '$TS_conducted_by', TS_sponsored_by = '$TS_sponsored_by'";
     $result_Add_report = mysqli_query($conn, $query_Add_report);

     if($result_Add_report){
         $subject = "Adding_Report";
         $date = date('Y-m-d [h:i A]');
         $holder_Type = "barangay";
         insertEvent($date,$subject,$report_ID,$holder_Type);
         echo '<script>alert("Report Added!"); window.location.href="../barangay_Reports.php";</script>';
     }else{
         echo '<script>alert("Error: '.$conn->error.'}"); window.location.href="../barangay_Reports.php";</script>';
     }
}
// OTHERS
if(isset($_POST['others_submit'])){
    $report_ID = uniqid("BaRIS-Report_");
    $report_Type = "Others";
    $report_Title = $_POST['txt_others_title'];
    $report_Description = $_POST['txt_others_description'];
    $report_Date = $_POST['txt_others_date'];
    $date_Month = date('M', strtotime($report_Date));
    $date_Year = date('Y', strtotime($report_Date));
    $report_Summary = $_POST['txt_others_summary'];

    $query_Add_report = "INSERT INTO barangay_reports_tbl SET report_ID = '$report_ID', barangay_ID = '$barangayID', report_Type = '$report_Type',
    report_TAP = '$report_Title', report_Description = '$report_Description', report_Date = '$report_Date', date_Month = '$date_Month', date_Year = '$date_Year',
    report_Summary = '$report_Summary'";
    $result_Add_report = mysqli_query($conn, $query_Add_report);

     if($result_Add_report){
         $subject = "Adding_Report";
         $date = date('Y-m-d [h:i A]');
         $holder_Type = "barangay";
         insertEvent($date,$subject,$report_ID,$holder_Type);
         echo '<script>alert("Report Added!"); window.location.href="../barangay_Reports.php";</script>';
     }else{
         echo '<script>alert("Error: '.$conn->error.'}"); window.location.href="../barangay_Reports.php";</script>';
     }
}
?>