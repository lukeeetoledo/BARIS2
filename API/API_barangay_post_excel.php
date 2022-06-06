<?php 
include 'SYSTEM_config.php';
include './SimpleXLSXGen/SimpleXLSXGen.php';
session_start();

if(!isset($_SESSION['barangay_ID'])){
   header("location:../index.php");
}

$postList = [
   [ '<b><center>Post Id</b></center>', '<b><center>Post Title</b></center>', '<b><center>Post Content</b></center>', 
   '<b><center>Creator Id</b></center>', '<b><center>Post Creator</b></center>', '<b><center>Date Posted</b></center>']
];

$barangay_ID = $_SESSION['barangay_ID'];

//$id = 0;
$sql = "SELECT * FROM barangay_post_tbl WHERE barangay_ID = '$barangay_ID'";
   $query = mysqli_query($conn, $sql);
   if(mysqli_num_rows($query)>0){
      foreach($query as $row){
         //$id++;
        $postList = array_merge($postList, array(array($row["post_ID"],$row["post_Title"],$row["post_Text_Content"],$row["creator_ID"],$row["post_Creator"],$row["post_Date"])));
      }
   }
$xlsx = Shuchkin\SimpleXLSXGen::fromArray( $postList );
$xlsx ->setDefaultFont('Calibri Light');
$xlsx->downloadAs('Barangay_posts.xlsx');   

?>
