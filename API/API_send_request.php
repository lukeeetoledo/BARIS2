<?php 
    include 'SYSTEM_config.php';
    include 'API_insert_history.php';
    session_start();
    date_default_timezone_set("Asia/Manila");
    if (!isset($_SESSION['user_ID']) && !isset($_SESSION['user_Type']) && !isset($_SESSION['barangay_ID'])) {
        header("location:../index.php");
    }
    $barangay_ID = $_SESSION['barangay_ID'];
    if(isset($_POST['submit'])){
        $subject = "Services";
        $holder_Type = "user";
        $request_ID = uniqid("BaRISrqst_");
        $request_Agenda = $_POST['txt_Agenda'];
        $date_Requested = mysqli_real_escape_string($conn, date("Y-m-d"));
        $agenda_Date = $_POST['txt_Agenda_Date'];
        $agenda_Due = $_POST['txt_Agenda_Due'];
        $request_Message = $_POST['txt_message'];
        $request_Status = 0;

        $query_Insert_request = "INSERT INTO barangay_support_tbl SET request_ID = '$request_ID', barangay_ID = '$barangay_ID', request_Agenda = '$request_Agenda',
        date_Requested = '$date_Requested', agenda_Date = '$agenda_Date', agenda_Due = '$agenda_Due', request_Message = '$request_Message', request_Status = '$request_Status'";
        $result_Insert_request = mysqli_query($conn, $query_Insert_request);

        if( $result_Insert_request){
            insertEvent($date_Requested, $subject, $request_Agenda, $holder_Type);
            echo '<script>alert("Request Submitted!"); window.location.href="../services_support.php";</script>';
        }else{
            echo $conn->error;
        }
    }
?>