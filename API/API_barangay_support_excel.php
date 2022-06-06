<?php 
include 'SYSTEM_config.php';
include './SimpleXLSXGen/SimpleXLSXGen.php';
session_start();

if(!isset($_SESSION['barangay_ID'])){
   header("location:../index.php");
}

$postList = [
   [ '<b><center>Request Id</b></center>', '<b><center>Request Agenda</b></center>', '<b><center>Date Requested</b></center>', 
   '<b><center>Agenda Date</b></center>', '<b><center>Agenda Due</b></center>', '<b><center>Request Message</b></center>']
];

$barangay_ID = $_SESSION['barangay_ID'];

//$id = 0;
$sql = "SELECT * FROM barangay_support_tbl WHERE barangay_ID = '$barangay_ID'";
   $query = mysqli_query($conn, $sql);
   if(mysqli_num_rows($query)>0){
      foreach($query as $row){
         //$id++;
        $postList = array_merge($postList, array(array($row["request_ID"],$row["request_Agenda"],$row["date_Requested"],$row["agenda_Date"],$row["agenda_Due"],$row["request_Message"])));
      }
   }
$xlsx = Shuchkin\SimpleXLSXGen::fromArray( $postList );
$xlsx ->setDefaultFont('Calibri Light');
$xlsx->downloadAs('Support_Request_List.xlsx');   

?>
