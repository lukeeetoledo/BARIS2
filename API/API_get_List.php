<?php
require_once('SYSTEM_config.php');
session_start();
$list = "";

if(isset($_SESSION['barangay_ID'])){
  $barangay_ID = $_SESSION['barangay_ID'];
  $sql="SELECT* FROM barangay_profiling_tbl WHERE barangay_ID = '$barangay_ID';";
  $result = mysqli_query($conn, $sql);
   
  if (mysqli_num_rows($result)> 0) {
      $i = 0 ;
	while($row = mysqli_fetch_assoc($result)){
        $i++;
        $list .='<option value="'.$row['prof_ID'].'">'.$row['prof_Lname'].', '.$row['prof_Fname'].' '.$row['prof_Mname'].'</option>';
    }
 
}
}
?>