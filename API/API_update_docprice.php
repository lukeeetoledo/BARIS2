<?php 
include 'SYSTEM_config.php';
session_start();
if(!isset($_SESSION['user_ID']) && !isset($_SESSION['user_Type']) && !isset($_SESSION['barangay_ID'])){
    header("location:../index.php");
  }
$barangayID = $_SESSION['barangay_ID'];
// $id = $_GET(['token1']);
// $price = $_GET(['token2']);

if(isset($_GET['token1']) && isset($_GET['token2'])){
    $doc_id = $_GET['token1'];
    $doc_Price = $_GET['token2'];

    $update_sql = "UPDATE barangay_document_types_tbl SET doc_Price = '$doc_Price' WHERE ID = '$doc_id'";
    $result = mysqli_query($conn, $update_sql);
    if($result){
  }else{
      echo $conn->error;
  }
}
  
?>
