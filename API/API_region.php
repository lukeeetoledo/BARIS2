<?php 
include 'SYSTEM_config.php';

$query_Get_region = "SELECT * FROM system_region_tbl ORDER BY region_sort";
$result_Get_region = mysqli_query($conn, $query_Get_region);

if($result_Get_region){
    $region_combo_box =  '<div class="form-wrapper" required> <select id="s_region" name="txt_Region" class="civilstatus" onChange="Get_Province(this.value);"> <option disabled selected>Region</option>';
    while( $region_row = mysqli_fetch_assoc($result_Get_region)){
        $region_combo_box = $region_combo_box . '<option value="'.$region_row['region_code'].'">'.$region_row['region_name'].'</option>';
    }
    $region_combo_box = $region_combo_box . '</select></div>';
}


?>

