<?php 
    include "SYSTEM_config.php";
    $barangay_ID = $_SESSION['barangay_ID'];
    $complaint_IDs = "";
    $query_Complaint_ID = "SELECT * FROM barangay_complaints_tbl WHERE barangay_ID = '$barangay_ID' AND complaint_Status = '0'";
    $result_Complaint_ID = mysqli_query($conn,$query_Complaint_ID);

    if(mysqli_num_rows($result_Complaint_ID) > 0 ){
        while($rCID_row = mysqli_fetch_assoc($result_Complaint_ID)){
            $complaint_IDs .= '<option value="'.$rCID_row['complaint_ID'].'">'.$rCID_row['complaint_ID'].'</option>';
        }
        
    }

?>

