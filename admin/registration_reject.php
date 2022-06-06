<?php 
include 'SYSTEM_config.php';

if(isset($_GET['token']) && isset($_GET['prcs'])){
    $creator_ID = $_GET['token'];
    $registration_ID = $_GET['prcs'];
    $date_Created = date(DATE_RFC822);
    // GETTING BARANGAY ID
    $query_Get_brgy = "SELECT * FROM barangay_users_tbl WHERE user_ID = '$creator_ID'";
    $result_Get_brgy = mysqli_query($conn, $query_Get_brgy);

    if(mysqli_num_rows($result_Get_brgy) > 0){
        $row_rGb = mysqli_fetch_assoc($result_Get_brgy);
        $brgy_ID = $row_rGb['user_Barangay'];

        // INSERTING APPROVED REGISTRATION
            $query_Update_status = "UPDATE system_brgy_registration_tbl SET request_Status = '2' WHERE process_ID = '$registration_ID' ;";
            $result_Update_status = mysqli_query($conn, $query_Update_status);
            if($result_Update_status){
                echo '<script>alert("Barangay Registration Rejected!"); window.location.href="index.php"</script>';
            }else{
                echo $conn->error;
            }
            
  
    }

    
}

?>