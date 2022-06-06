<?php 
  session_start();
  require_once('SYSTEM_config.php');
  if(!isset($_SESSION['user_ID']) && !isset($_SESSION['user_Type']) && !isset($_SESSION['barangay_ID'])){
     header("location:../index.php");
 }
 $user_ID = $_SESSION['user_ID'];
 
if(isset($_GET['tokenC']) && $_GET['tokenC'] !=""){
    $Cnumber = $_GET['tokenC'];

    $qr_Update_cnum = mysqli_query($conn, "UPDATE system_accounts_tbl SET account_Contactnumber = '$Cnumber' WHERE user_ID = '$user_ID'");
    if($qr_Update_cnum){
        echo "0";
    }
}else if(isset($_GET['tokenE']) && $_GET['tokenE'] !=""){
    $Email = $_GET['tokenE'];

    $qr_Update_email = mysqli_query($conn, "UPDATE system_accounts_tbl SET account_Email = '$Email' WHERE user_ID = '$user_ID'");
    if($qr_Update_email){
        echo "0";
    }
}else{
    echo "1";
}
?>