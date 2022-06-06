<?php 
    include 'SYSTEM_config.php';
    session_start();
    if (!isset($_SESSION['user_ID']) && !isset($_SESSION['user_Type']) && !isset($_SESSION['barangay_ID'])) {
        header("location:../index.php");
    }
    if(isset($_POST['submit'])){
        $blotter_ID = uniqid('BaRISBlotter_');
        $complaint_ID = $_POST['txt_complaint_ID'];
        $barangay_ID = $_SESSION['barangay_ID'];
        $complainant_Name = $_POST['txt_complainant_Name'];
        $respondent_List = $_POST['txt_respondent_List'];
        $action_List = $_POST['txt_action_List'];
        $mediator_Name = $_POST['txt_Mediator_name'];
        $date_Resolved = $_POST['txt_Date'];
        $resolution = $_POST['txt_Resolution'];

        $query_Insert_Blotter = "INSERT INTO barangay_blotter_tbl SET blotter_ID = '$blotter_ID', complaint_ID = '$complaint_ID', barangay_ID = '$barangay_ID', complainant_Name = '$complainant_Name',
        respondent_List = '$respondent_List', action_List = '$action_List', mediator_Name = '$mediator_Name', date_Resolved = '$date_Resolved', resolution_List = '$resolution'";
        $result_Insert_Blotter = mysqli_query($conn, $query_Insert_Blotter);

        if($result_Insert_Blotter){
            $result_Select_status = mysqli_query($conn, "SELECT * FROM barangay_complaints_tbl WHERE complaint_ID = '$complaint_ID'");
            if(mysqli_num_rows($result_Select_status) > 0){
                $result_Update_status = mysqli_query($conn, "UPDATE barangay_complaints_tbl SET complaint_Status  = '1' WHERE complaint_ID = '$complaint_ID'");
            }
            $try = mysqli_num_rows($result_Select_status);
            echo '<script>alert("Blotter Listed."); window.location.href="../barangay_Services.php";</script>';
        }else{
            echo '<script>alert("Blotter Listing Failed!"); window.location.href="../barangay_Services.php";</script>';
        }
    }
?>