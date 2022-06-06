<?php 
session_start();
include 'SYSTEM_config.php';
date_default_timezone_set('Asia/Manila');

if(!isset($_SESSION['user_ID']) && !isset($_SESSION['user_Type']) && !isset($_SESSION['barangay_ID'])){
   header("location:../index.php");
}
$barangayID = $_SESSION['barangay_ID'];
$user_ID = $_SESSION['user_ID'];


if(isset($_GET['token']) && isset($_GET['prcs']) && isset($_GET['img'])){
    $creator_ID = $_GET['token'];
    $registration_ID = $_GET['prcs'];
    $creator_Image = $_GET['img'];
    $date_Created = date(DATE_RFC822);
    // GETTING BARANGAY ID
            $query_Update_status_A = "UPDATE barangay_verification_tbl SET request_Status = '1' WHERE process_ID = '$registration_ID' ;";
            $result_Update_status_A = mysqli_query($conn, $query_Update_status_A);
            $_SESSION['user_Type'] = "3";
            $query_Update_status_B = "UPDATE system_accounts_tbl SET account_Type = '2' WHERE user_ID = '$creator_ID'";
            $result_Update_status_B = mysqli_query($conn, $query_Update_status_B);
            if($result_Update_status_A){
                if($result_Update_status_B){
                    $result_Update_img = mysqli_query($conn, "UPDATE barangay_users_tbl SET user_Image = '$creator_Image' WHERE user_ID = '$creator_ID'");
                    echo '<script>alert("Account Verification Approved!"); window.location.href="../barangay_Account_list.php"</script>';
                }else{
                    echo $conn->error;
                }
            }else{
                echo $conn->error;
            }
}

?>