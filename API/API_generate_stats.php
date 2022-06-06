<?php
session_start();
if (!isset($_SESSION['user_ID']) && !isset($_SESSION['user_Type']) && !isset($_SESSION['barangay_ID'])) {
    header("location:../index.php");
}

function generateSex(){
    include "SYSTEM_config.php";
    $barangay_ID = (int)$_SESSION['barangay_ID'];
    $sex_[0] = "";
    $sex_[1] = "";
    $sex_count_[0] = 0;
    $sex_count_[1] = 0;
    

    $query_Get_sex = "SELECT prof_Sex, COUNT(*) FROM barangay_profiling_tbl WHERE barangay_ID = '$barangay_ID' GROUP BY prof_Sex ORDER BY prof_Sex ASC";
    $result_Get_sex = mysqli_query($conn, $query_Get_sex);

    if(mysqli_num_rows($result_Get_sex) > 0){
        $i = 0;
        while($row = mysqli_fetch_assoc($result_Get_sex)){
            $sex_[$i] = $row['prof_Sex'];
            $sex_count_[$i] = $row['COUNT(*)'];
            $i++;
        }
        $total_count = $sex_count_[0] + $sex_count_[1];
        $sex_1 = ($sex_count_[0]/$total_count)*100;
        $sex_2 = ($sex_count_[1]/$total_count)*100;
        $dataPoints = array( 
            array("label"=>$sex_[0], "symbol" => "F","y"=>$sex_1),
            array("label"=>$sex_[1], "symbol" => "M","y"=>$sex_2),
        );
        return $dataPoints;

    }
}

function generateResidential(){
    include "SYSTEM_config.php";
    $barangay_ID = $_SESSION['barangay_ID'];
    $stat_[0] = "";
    $stat_[1] = "";
    $stat_count_[0] = 0;
    $stat_count_[1] = 0;
    

    $query_Get_resi = "SELECT prof_Addressstatus, COUNT(*) FROM barangay_profiling_tbl WHERE barangay_ID = '$barangay_ID' GROUP BY prof_Addressstatus ORDER BY prof_Addressstatus ASC";
    $result_Get_resi = mysqli_query($conn, $query_Get_resi);

    if(mysqli_num_rows($result_Get_resi) > 0){
        $i = 0;
        while($row = mysqli_fetch_assoc($result_Get_resi)){
            $stat_[$i] = $row['prof_Addressstatus'];
            $stat_count_[$i] = $row['COUNT(*)'];
            $i++;
        }
        $total_count = $stat_count_[0] + $stat_count_[1];
        $stat_1 = ($stat_count_[0]/$total_count)*100;
        $stat_2 = ($stat_count_[1]/$total_count)*100;
        $dataPoints = array( 
            array("label"=>$stat_[0], "symbol" => "Owned","y"=>$stat_1),
            array("label"=>$stat_[1], "symbol" => "Rent","y"=>$stat_2),
        );
        return $dataPoints;
    }
}


?>