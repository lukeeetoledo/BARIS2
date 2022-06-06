<?php 
  function insertEvent($date, $subject, $content, $holder_Type){
    include 'SYSTEM_config.php';
    session_start();
      if(!isset($_SESSION['user_ID']) && !isset($_SESSION['user_Type']) && !isset($_SESSION['barangay_ID'])){
      header("location:../index.php");
  }
    $barangayID = $_SESSION['barangay_ID'];
    $user_ID = $_SESSION['user_ID'];
    date_default_timezone_set("Asia/Manila");
    $event_ID = uniqid('BaRIS-Event_');
    $event_Date = $date;
    $event_Subject = $subject;
    $event_Content = $content;
    $event_Holder = $user_ID;
    if($holder_Type == "user"){
        $result_Insert_event = mysqli_query($conn, "INSERT INTO barangay_history_tbl SET event_ID = '$event_ID', event_Date = '$event_Date', event_Subject = '$event_Subject', event_Content = '$event_Content', event_Holder = '$event_Holder', barangay_ID = '$barangayID', holder_Type = '$holder_Type'");
    }else{
        $result_Insert_event = mysqli_query($conn, "INSERT INTO barangay_history_tbl SET event_ID = '$event_ID', event_Date = '$event_Date', event_Subject = '$event_Subject', event_Content = '$event_Content', event_Holder = '$event_Holder', barangay_ID = '$barangayID', holder_Type = '$holder_Type'");  
    }
    if($result_Insert_event){
        return;
    }
}
?>