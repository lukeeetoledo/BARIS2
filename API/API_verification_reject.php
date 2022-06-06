<?php 
session_start();
include 'SYSTEM_config.php';
date_default_timezone_set('Asia/Manila');

if(!isset($_SESSION['user_ID']) && !isset($_SESSION['user_Type']) && !isset($_SESSION['barangay_ID'])){
   header("location:../index.php");
}
$barangayID = $_SESSION['barangay_ID'];
$user_ID = $_SESSION['user_ID'];

if(isset($_GET['token']) && isset($_GET['prcs'])){
    $creator_ID = $_GET['token'];
    $registration_ID = $_GET['prcs'];
    $date_Created = date(DATE_RFC822);

        // INSERTING APPROVED REGISTRATION
            $query_Update_status = "UPDATE barangay_verification_tbl SET request_Status = '2' WHERE process_ID = '$registration_ID' ;";
            $result_Update_status = mysqli_query($conn, $query_Update_status);
            if($result_Update_status){
                echo '<script>alert("Account Verification Rejected!"); window.location.href="../barangay_Account_list.php"</script>';
            }else{
                echo $conn->error;
            }
            
  
    

    
}

?>