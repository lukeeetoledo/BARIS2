<?php 
if(isset($_COOKIE['BaRIS_UNEM']) && isset($_COOKIE['BaRIS_PSH'])){
    header("location:API_login.php");
  }
else if(isset($_SESSION['user_ID']) && isset($_SESSION['user_Type']) && isset($_SESSION['barangay_ID']) ){
    header("location:../homepage.php");
  }
else{
    header("location:../home.php");
}
?>
