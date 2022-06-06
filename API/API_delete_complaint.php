<?php 
    include 'SYSTEM_config.php';

    if(isset($_GET['token'])){
        $complaint_ID = $_GET['token'];
        $result_Delete_complaint = mysqli_query($conn,"DELETE FROM barangay_complaints_tbl WHERE complaint_ID = '$complaint_ID'");
        $result_Delete_respondent = mysqli_query($conn,"DELETE FROM barangay_complaints_respondent WHERE complaint_ID = '$complaint_ID'");
        $result_Delete_action = mysqli_query($conn,"DELETE FROM barangay_complaints_action WHERE complaint_ID = '$complaint_ID'");

        if($result_Delete_complaint && $result_Delete_respondent && $result_Delete_action){
            echo '<script>alert("Complaint Deleted!"); window.location.href="../barangay_Services.php";</script>';
        }
    }
?>
