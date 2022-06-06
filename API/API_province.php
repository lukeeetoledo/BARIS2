<?php 
include 'SYSTEM_config.php';

if(isset($_GET['region'])){
    $region_code = $_GET['region'];
    $query_Get_province = "SELECT * FROM system_province_tbl WHERE region_code = '$region_code'";
    $result_Get_province = mysqli_query($conn,$query_Get_province);

    if($result_Get_province){
        $province_combo_box =  '<select id="s_province" name="txt_Province" class="civilstatus" onChange="Get_CityMun(this.value);"> <option disabled selected>Province</option>';
        while( $province_row = mysqli_fetch_assoc($result_Get_province)){
            $province_combo_box = $province_combo_box . '<option value="'.$province_row['province_code'].'">'.$province_row['province_name'].'</option>';
        }
        $province_combo_box = $province_combo_box . '</select>';
        echo $province_combo_box;
    }
}

?>