<?php 
include 'SYSTEM_config.php';
session_start();

$target_dir = "saved_files/documents/";
$uploadOk = 1;

if(isset($_POST['submit'])){
    // $user_ID = $_SESSION['user_ID'];
    // $barangay_ID = $_SESSION['barangay_ID'];
    $user_ID = 'BaRIS_625d52fe5c308';
    $barangay_ID = '54';
    $query_Get_info = "SELECT * FROM barangay_users_tbl WHERE user_ID = '$user_ID'";
    $result_Get_info = mysqli_query($conn, $query_Get_info);

    if(mysqli_num_rows($result_Get_info) > 0){
        $rows_Get_info = mysqli_fetch_assoc($result_Get_info);
        // DATA
        $process_ID = uniqid('Baris-prcs-');
        $requestor_ID = $user_ID;
        $requestor_Res_status = $_POST['txt_Res_stats'];
        $valid_ID1 = $target_dir . basename($_FILES["txt_Valid_ID1"]["name"]);
        $valid_ID2 = $target_dir . basename($_FILES["txt_Valid_ID2"]["name"]);
        $address_Proof = $target_dir . basename($_FILES["txt_PoB"]["name"]);
        $requestor_Image = $target_dir . basename($_FILES["txt_Self_Portrait"]["name"]);
        $request_Status = 0;
        // END_DATA
        // PROCESS
        #1
        $check = getimagesize($_FILES["txt_Valid_ID1"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo '<script>alert("Processing Error.1"); window.location.href="../account_verification.php";</script>';
            $uploadOk = 0;
        }
        #2
        $check = getimagesize($_FILES["txt_Valid_ID2"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo '<script>alert("Processing Error.2"); window.location.href="../account_verification.php";</script>';
            $uploadOk = 0;
        }
        #3
        $check = getimagesize($_FILES["txt_PoB"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo '<script>alert("Processing Error.3"); window.location.href="../account_verification.php";</script>';
            $uploadOk = 0;
        }
        #4
        $check = getimagesize($_FILES["txt_Self_Portrait"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo '<script>alert("Processing Error.4"); window.location.href="../account_verification.php";</script>';
            $uploadOk = 0;
        }

        
        // END_PROCESS
        if($uploadOk == 0){
            echo '<script>alert("Error Uploading File/s."); window.location.href="../account_verification.php";</script>';
        }
        $query_Insert_verification = "INSERT INTO barangay_verification_tbl SET process_ID = '$process_ID', requestor_ID = '$requestor_ID',requestor_Res_Stat = '$requestor_Res_status', 
        valid_ID_1 = '$valid_ID1', valid_ID_2 = '$valid_ID2', address_Proof = '$address_Proof', requestor_Image = '$requestor_Image', request_Status = '$request_Status'";
        $result_Insert_verification = mysqli_query($conn, $query_Insert_verification);

        if(!$result_Insert_verification){
            echo '<script>alert("Account Verification Failed."); window.location.href="../account_verification.php";</script>';
        }else{
            if( move_uploaded_file($_FILES["txt_Valid_ID1"]["tmp_name"], "../".$valid_ID1) && 
            move_uploaded_file($_FILES["txt_Valid_ID2"]["tmp_name"],  "../".$valid_ID2) &&  
            move_uploaded_file($_FILES["txt_PoB"]["tmp_name"],  "../".$address_Proof) &&  
            move_uploaded_file($_FILES["txt_Self_Portrait"]["tmp_name"],  "../".$requestor_Image)){
                
                 echo '<script>alert("Account Verification Submitted."); window.location.href="../userprofile.php";</script>';
            }
        }
    }
}else{
    echo '<script>alert("Processing Error."); window.location.href="../account_verification.php";</script>';
}

?>