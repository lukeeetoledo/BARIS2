<?php 
include 'SYSTEM_config.php';
include './SimpleXLSXGen/SimpleXLSXGen.php';
session_start();

if(!isset($_SESSION['barangay_ID'])){
   header("location:../index.php");
}

$postList = [
   [ '<b><center>Blotter ID</b></center>', '<b><center>Complaint ID</b></center>', '<b><center>Complainant Name</b></center>', 
   '<b><center>Respondent List</b></center>', '<b><center>Action List</b></center>', '<b><center>Mediator Name</b></center>'
   , '<b><center>Resolution List</b></center>', '<b><center>Date Resolved</b></center>']
];

$barangay_ID = $_SESSION['barangay_ID'];

//$id = 0;
$sql = "SELECT * FROM barangay_blotter_tbl WHERE barangay_ID = '$barangay_ID'";
   $query = mysqli_query($conn, $sql);
   if(mysqli_num_rows($query)>0){
      foreach($query as $row){
         //$id++;
        $postList = array_merge($postList, array(array($row["blotter_ID"],$row["complaint_ID"],$row["complainant_Name"],$row["respondent_List"],$row["action_List"]
        ,$row["mediator_Name"],$row["resolution_List"],$row["date_Resolved"])));
      }
   }
$xlsx = Shuchkin\SimpleXLSXGen::fromArray( $postList );
$xlsx ->setDefaultFont('Calibri Light');
$xlsx->downloadAs('Blotter_List.xlsx');   

?>
