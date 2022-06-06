<?php 
include 'SYSTEM_config.php';

if(!isset($_GET['token1']) && !isset($_GET['token2']) && !isset($_SESSION['user_ID']) && !isset($_SESSION['user_Type']) && !isset($_SESSION['barangay_ID'])){
    header("location:../index.php");
    echo "<script>alarm('Post not found!;);window.close();</script>";
  }
$doc_ID	= $_GET['token1'];
$user_ID =	"";
$doc_Type = $_GET['token2'];
$doc_Fname = "";
$doc_Mname = "";
$doc_Lname = "";	
$doc_Suffix	="";
$doc_Address =	"";
$doc_Birthdate ="";	
$doc_Birthplace	="";
$doc_Sex =	"";
$doc_Age =	"";
$doc_Civilstatus ="";	
$doc_Citizenship ="";	
$doc_Purpose =	"";
$doc_Date =	"";
$doc_Cedulacpy =	"";
$doc_IDpres =	"";
$doc_UploadedID ="";	
$doc_Email = "";
$doc_Contact =	"";
$doc_Businessname =	"";
$doc_Businessloc ="";	
$doc_Height =	"";
$doc_Weight =	"";
$doc_Occupation =""	;
$doc_Earningfromsal =""	;
$doc_Grossrecfrombus ="";	
$doc_Totalincom =	"";
$doc_Taxindentification =	"";
$doc_Payment ="";	
$doc_DeliverType =	"";
$doc_Requestmode ="";
$query_Get_document = "SELECT * FROM barangay_documents_tbl WHERE doc_ID = '$doc_ID' AND  doc_Type = '$doc_Type'";
$result_Get_document = mysqli_query($conn,$query_Get_document);
if(mysqli_num_rows($result_Get_document) > 0){
    $row = mysqli_fetch_assoc($result_Get_document);
    $doc_Type = $doc_Type;
    $user_ID =  $row['user_ID'];
    $doc_Fname =  $row['doc_Fname'];
    $doc_Mname =  $row['doc_Mname'];
    $doc_Lname =  $row['doc_Lname'];	
    $doc_Suffix	= $row['doc_Suffix'];
    $doc_Address =	 $row['doc_Address'];
    $doc_Birthdate = $row['doc_Birthdate'];	
    $doc_Birthplace	= $row['doc_Birthplace'];
    $doc_Sex =	 $row['doc_Sex'];
    $doc_Age =	 $row['doc_Age'];
    $doc_Civilstatus = $row['doc_Civilstatus'];	
    $doc_Citizenship = $row['doc_Citizenship'];	
    $doc_Purpose =	 $row['doc_Purpose'];
    $doc_Date =	 $row['doc_Date'];
    $doc_Cedulacpy =	 $row['doc_Cedulacpy'];
    $doc_IDpres =	 $row['doc_IDpres'];
    $doc_UploadedID = $row['doc_UploadedID'];	
    $doc_Email =  $row['doc_Email'];
    $doc_Contact =	 $row['doc_Contact'];
    $doc_Businessname =	 $row['doc_Businessname'];
    $doc_Businessloc = $row['doc_Businessloc'];	
    $doc_Height =	 $row['doc_Height'];
    $doc_Weight =	 $row['doc_Weight'];
    $doc_Occupation = $row['doc_Occupation']	;
    $doc_Earningfromsal = $row['doc_Earningfromsal']	;
    $doc_Grossrecfrombus = $row['doc_Grossrecfrombus'];	
    $doc_Totalincom =	 $row['doc_Totalincom'];
    $doc_Taxindentification =	 $row['doc_Taxindentification'];
    $doc_Payment = $row['doc_Payment'];	
    $doc_DeliverType =	 $row['doc_DeliverType'];
    $doc_Requestmode = $row['doc_Requestmode'];
   
}

?>