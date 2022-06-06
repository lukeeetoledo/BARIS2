<?php 
include 'SYSTEM_config.php';

if(isset($_GET['province'])&&isset($_GET['citymun'])){
    $province_code = $_GET['province'];
    $citymun_code = $_GET['citymun'];

    $query_Get_barangay = "SELECT * FROM system_barangay_tbl WHERE province_code = '$province_code' AND citymun_code = '$citymun_code'";
    $result_Get_barangay = mysqli_query($conn,$query_Get_barangay);

    if($result_Get_barangay){
        $barangay_combo_box =  '<select id="s_barangay" name="txt_Barangay" class="civilstatus"> <option disabled selected>Barangay</option>';
        while( $barangay_row = mysqli_fetch_assoc($result_Get_barangay)){
            $barangay_combo_box = $barangay_combo_box . '<option value="'.$barangay_row['barangay_code'].'">'.$barangay_row['barangay_name'].'</option>';
        }
        $barangay_combo_box = $barangay_combo_box . '</select>';
        echo $barangay_combo_box;
    }
}

?>