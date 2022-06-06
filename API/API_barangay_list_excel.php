<?php 
include 'SYSTEM_config.php';
include './SimpleXLSXGen/SimpleXLSXGen.php';
session_start();

if(!isset($_SESSION['barangay_ID'])){
   header("location:../index.php");
}

$residentList = [
   [ '<b><center>Resident Id</b></center>', '<b><center>First Name</b></center>', '<b><center>Last Name</b></center>', 
   '<b><center>Middle Name</b></center>', '<b><center>Suffix</b></center>', '<b><center>Birthdate</b></center>', 
   '<b><center>Sex</b></center>','<center><b>Address</b></center>','<center><b>Addressstatus</b></center>',
   '<b><center>Father Name</b></center>','<b><center>Father Occupation</b></center>','<b><center>Mother Name</b></center>', '<b><center>Mother Occupation</b></center>'],
];

$barangay_ID = $_SESSION['barangay_ID'];

//$id = 0;
$sql = "SELECT * FROM barangay_profiling_tbl WHERE barangay_ID = '$barangay_ID'";
   $query = mysqli_query($conn, $sql);
   if(mysqli_num_rows($query)>0){
      foreach($query as $row){
         //$id++;
        $residentList = array_merge($residentList, array(array($row["prof_ID"],$row["prof_Fname"],$row["prof_Lname"],$row["prof_Mname"],$row["prof_Suffix"],$row["prof_Birthdate"],$row["prof_Sex"],$row["prof_Address"],$row["prof_Addressstatus"],$row["prof_Fathername"],$row["prof_Fatheroccu"],$row["prof_Mothername"],$row["prof_Motheroccu"])));
      }
   }
$xlsx = Shuchkin\SimpleXLSXGen::fromArray( $residentList );
$xlsx ->setDefaultFont('Calibri Light');
$xlsx->downloadAs('Resident_List.xlsx');   

?>
