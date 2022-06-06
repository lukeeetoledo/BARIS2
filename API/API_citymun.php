<?php 
include 'SYSTEM_config.php';

if(isset($_GET['region'])&&isset($_GET['province'])){
    $region_code = $_GET['region'];
    $province_code = $_GET['province'];
    $query_Get_citymun = "SELECT * FROM system_citymun_tbl WHERE region_code = '$region_code' AND province_code = '$province_code'";
    $result_Get_citymun = mysqli_query($conn,$query_Get_citymun);

    if($result_Get_citymun){
        $citymun_combo_box =  '<select id="s_citymun" name="txt_Citymunicipality" class="civilstatus" onChange="Get_Barangay(this.value);"> <option disabled selected>City/Municipality</option>';
        while( $citymun_row = mysqli_fetch_assoc($result_Get_citymun)){
            $citymun_combo_box = $citymun_combo_box . '<option value="'.$citymun_row['citymun_code'].'">'.$citymun_row['citymun_name'].'</option>';
        }
        $citymun_combo_box = $citymun_combo_box . '</select>';
        echo $citymun_combo_box;
    }
}

?>