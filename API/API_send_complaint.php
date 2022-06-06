<?php 
include 'SYSTEM_config.php';
session_start();
date_default_timezone_set("Asia/Manila");
if(isset($_POST['submit'])){
    $barangay_ID = $_SESSION['barangay_ID'];
    $complainant_ID = $_SESSION['user_ID'];
    $complaint_ID = uniqid("Complaint_");
    $complaint_Reason = $_POST['txt_Reason'];
    $respo_Count = 0 ;
    $action_Count = 0 ;
    $complaint_Status = "0";
    $date = mysqli_real_escape_string($conn, date("Y-m-d"));
    foreach($_POST['current_select'] as $respondent){
        $respo_Count++;
        $query_Add_respo = "INSERT INTO barangay_complaints_respondent SET complaint_ID = '$complaint_ID', respondent_ID = '$respondent'";
        $result_Add_respo = mysqli_query($conn,$query_Add_respo);
    }
    foreach($_POST['field_name'] as $action){
        $action_Count++;
        $query_Add_action = "INSERT INTO barangay_complaints_action SET complaint_ID = '$complaint_ID', respondent_action = '$action'";
        $result_Add_action = mysqli_query($conn,$query_Add_action);
    }
    $query_Add_complaint = "INSERT INTO barangay_complaints_tbl SET complaint_ID = '$complaint_ID', complainant_ID = '$complainant_ID', barangay_ID = '$barangay_ID', complaint_Reason = '$complaint_Reason', respo_Count = '$respo_Count', action_Count = '$action_Count', complaint_Date = '$date', complaint_Status = '$complaint_Status'";
    $result_Add_complaint = mysqli_query($conn, $query_Add_complaint);

    if($result_Add_complaint){
        echo '<script>alert("Complaint Submitted"); window.location.href="../services_complain.php";</script>';
    }
}
?>