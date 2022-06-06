<?php 
include 'SYSTEM_config.php';
session_start();
if(!isset($_GET['token'])){
    header("location:./index.php");
}
$user_ID = $_GET['token'];

// USER_INFO
$full_Name = "";
$f_Name = "";
$m_Name = "";
$l_Name = "";
$suffix = "";
$c_number = "";
$email = "";
$region = "";
$province = "";
$city_Mun = "";
$barangay = "";
$birthdate = "";
$sex = "";
$user_Name = "";

$query_Get_info = "SELECT * FROM barangay_users_tbl WHERE user_ID = '$user_ID'";
$query_Get_contact = "SELECT * FROM system_accounts_tbl WHERE user_ID = '$user_ID'";
$result_Get_info = mysqli_query($conn, $query_Get_info);
$result_Get_contact = mysqli_query($conn, $query_Get_contact);

if(mysqli_num_rows($result_Get_info) > 0 && mysqli_num_rows($result_Get_contact) > 0){
    $rows_Get_info = mysqli_fetch_assoc($result_Get_info);
    $rows_Get_contact = mysqli_fetch_assoc($result_Get_contact);
    $f_Name = $rows_Get_info['user_Fname'];
    $m_Name = $rows_Get_info['user_Mname'];
    $l_Name = $rows_Get_info['user_Lname'];
    $suffix = $rows_Get_info['user_Suffix'];
    $full_Name = $f_Name.' '.$m_Name.' '.$l_Name.' '.$suffix.'';
    $c_number = $rows_Get_contact['account_Contactnumber'];
    $email = $rows_Get_contact['account_Email'];
    $region = $rows_Get_info['user_Region'];
    $province = $rows_Get_info['user_Province'];
    $city_Mun = $rows_Get_info['user_Citymunicipality'];
    $barangay = $rows_Get_info['user_Barangay'];
    $result_Region = mysqli_query($conn, "SELECT region_name FROM system_region_tbl WHERE region_code = '$region'");
    $result_Province = mysqli_query($conn, "SELECT province_name FROM system_province_tbl WHERE province_code = '$province' AND region_code = '$region'");
    $result_Citymun = mysqli_query($conn, "SELECT citymun_name FROM system_citymun_tbl WHERE citymun_code = '$city_Mun' AND province_code = '$province' AND region_code = '$region'");
    $result_Barangay = mysqli_query($conn, "SELECT barangay_name FROM system_barangay_tbl WHERE barangay_code = '$barangay' AND citymun_code = '$city_Mun' AND province_code = '$province' AND region_code = '$region'");
    $rR_Name = mysqli_fetch_assoc($result_Region)['region_name'];
    $region = $rows_Get_info['user_Region']." | ".$rR_Name;
    $rP_Name = mysqli_fetch_assoc($result_Province)['province_name'];
    $province = $rows_Get_info['user_Province']." | ".$rP_Name;
    $rCm_Name = mysqli_fetch_assoc($result_Citymun)['citymun_name'];
    $city_Mun = $rows_Get_info['user_Citymunicipality']." | ".$rCm_Name;
    $rB_Name = mysqli_fetch_assoc($result_Barangay)['barangay_name'];
    $barangay = $rows_Get_info['user_Barangay']." | ".$rB_Name;
    $birthdate = $rows_Get_info['user_Birthdate'];
    $sex = $rows_Get_info['user_Gender'];
    $user_Name = $rows_Get_contact['account_Username'];
}else{
    echo 'ERROR_INFO_NOT_FOUND';
}

?>