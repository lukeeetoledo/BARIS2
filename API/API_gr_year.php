<?php 
    include "SYSTEM_config.php";
    
$barangay_ID = $_SESSION['barangay_ID'];
$year_List = "";
$query_Select_year = "SELECT * FROM barangay_reports_tbl WHERE barangay_ID = '$barangay_ID' GROUP BY date_Year";
$result_Select_Year = mysqli_query($conn, $query_Select_year);

if(mysqli_num_rows($result_Select_Year) > 0){
    while($row = mysqli_fetch_assoc($result_Select_Year)){
        $year_List .= "<option value='{$row['date_Year']}'>{$row['date_Year']}</option>";
    }
}
?>