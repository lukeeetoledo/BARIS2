<?php 
include 'SYSTEM_config.php';
session_start();

if(!isset($_SESSION['user_ID']) && !isset($_SESSION['user_Type']) && !isset($_SESSION['barangay_ID'])){
    header("location:../index.php");
  }
$target_dir = "saved_files/documents/";
$barangayID = $_SESSION['barangay_ID'];
$uploadOk = 1;
date_default_timezone_set("Asia/Manila");

if(isset($_POST['submit_brg_cert'])){
$docu_type1 = "Barangay_Ceritificate";

   $barangay_ID =  $barangayID;
   $doc_Type = $docu_type1;
   $doc_ID = uniqid('BaRISPost_');
    $doc_Fname = mysqli_real_escape_string($conn,$_POST['doc_Fname']);
    $doc_Lname = mysqli_real_escape_string($conn,$_POST['doc_Lname']);
    $doc_Mname = mysqli_real_escape_string($conn,$_POST['doc_Mname']);
    $doc_Suffix = mysqli_real_escape_string($conn,$_POST['doc_Suffix']);
    $doc_Sex = mysqli_real_escape_string($conn,$_POST['doc_Sex']);
    $doc_Address= mysqli_real_escape_string($conn,$_POST['doc_Address']);
    $doc_Civilstatus = mysqli_real_escape_string($conn,$_POST['doc_Civilstatus']);
    $doc_Citizenship = mysqli_real_escape_string($conn,$_POST['doc_Citizenship']);
    $doc_Date = mysqli_real_escape_string($conn, date("m-d-Y"));
    $doc_Purpose =mysqli_real_escape_string($conn, $_POST['doc_Purpose']);
    $doc_Requestmode = "Walk-In";

    $doc_Cedulacpy = $target_dir . basename($_FILES["doc_Cedulacpy"]["name"]);
    $check = getimagesize($_FILES["doc_Cedulacpy"]["tmp_name"]);
    
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo '<script>alert("Processing Error."); window.location.href="../user_barangaycertificate.php";</script>';
        $uploadOk = 0;
    }
    if($uploadOk == 0){
        echo '<script>alert("Error Uploading File/s."); window.location.href="../user_barangaycertificate.php";</script>';
    }
        $query_Insert_post = "INSERT INTO barangay_documents_tbl (barangay_ID, doc_Type, doc_ID, doc_Fname, doc_Lname, doc_Mname, doc_Suffix, doc_Sex, doc_Civilstatus, doc_Citizenship, doc_Address, doc_Purpose, doc_Date, doc_Cedulacpy, doc_Requestmode) 
        VALUES ('$barangay_ID', '$doc_Type', '$doc_ID','$doc_Fname','$doc_Lname','$doc_Mname','$doc_Suffix','$doc_Sex','$doc_Civilstatus','$doc_Citizenship','$doc_Address','$doc_Purpose','$doc_Date','$doc_Cedulacpy','$doc_Requestmode')";

         if($conn->query($query_Insert_post) == TRUE){
            move_uploaded_file($_FILES['doc_Cedulacpy']['tmp_name'], '../' .$doc_Cedulacpy);
            echo '<script>alert("Request sent"); window.location.href="../barangay_Permit.php"</script>';
        }else{
            echo $conn->error;
        }
}else if(isset($_POST['submit_brg_clear'])){
    $docu_type2 = "Barangay_Clearance";
    $target_dir = "saved_files/documents/";
 
    $barangay_ID =  $barangayID;
    $doc_Type = $docu_type2;
    $doc_ID = uniqid('BaRISPost_');
    $doc_Fname = mysqli_real_escape_string($conn,$_POST['doc_Fname']);
    $doc_Lname = mysqli_real_escape_string($conn,$_POST['doc_Lname']);
    $doc_Mname = mysqli_real_escape_string($conn,$_POST['doc_Mname']);
    $doc_Suffix = mysqli_real_escape_string($conn,$_POST['doc_Suffix']);
    $doc_Sex = mysqli_real_escape_string($conn,$_POST['doc_Sex']);
    $doc_Address= mysqli_real_escape_string($conn,$_POST['doc_Address']);
    $doc_Birthdate = mysqli_real_escape_string($conn,$_POST['doc_Birthdate']);
    $doc_Age= mysqli_real_escape_string($conn,$_POST['doc_Age']);
    $doc_Civilstatus = mysqli_real_escape_string($conn,$_POST['doc_Civilstatus']);  
    $doc_Citizenship = mysqli_real_escape_string($conn,$_POST['doc_Citizenship']); 
    $doc_Purpose =mysqli_real_escape_string($conn, $_POST['doc_Purpose']);
    $doc_Cedulacpy = $target_dir . basename($_FILES["doc_Cedulacpy"]["name"]);
    $doc_IDpres =mysqli_real_escape_string($conn, $_POST['doc_IDpres']);
    $doc_UploadedID = $target_dir . basename($_FILES["doc_UploadedID"]["name"]);
    $doc_Email = mysqli_real_escape_string($conn, $_POST['doc_Email']);
    $doc_Contact =mysqli_real_escape_string($conn, $_POST['doc_Contact']);
    $check = getimagesize($_FILES["doc_UploadedID"]["tmp_name"]);
    $check = getimagesize($_FILES["doc_Cedulacpy"]["tmp_name"]);
    $doc_Date = mysqli_real_escape_string($conn, date("m-d-Y "));
    $doc_Requestmode = "Walk-In";

    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo '<script>alert("Processing Error."); window.location.href="../user_barangayclearance.php";</script>';
        $uploadOk = 0;
    }
    if($uploadOk == 0){
        echo '<script>alert("Error Uploading File/s."); window.location.href="../user_barangayclearance.php";</script>';
    }
        $query_Insert_post = "INSERT INTO barangay_documents_tbl (barangay_ID, doc_Type, doc_ID, doc_Fname, doc_Lname, doc_Mname, doc_Suffix, doc_Address, doc_Birthdate,doc_Sex, doc_Age, doc_Civilstatus, doc_Citizenship,doc_Purpose, doc_Date, doc_Cedulacpy,
        doc_IDpres, doc_UploadedID, doc_Email, doc_Contact, doc_Requestmode) 
        VALUES ('$barangay_ID', '$doc_Type', '$doc_ID', '$doc_Fname', '$doc_Lname', '$doc_Mname', '$doc_Suffix', '$doc_Address','$doc_Birthdate','$doc_Sex','$doc_Age','$doc_Civilstatus','$doc_Citizenship','$doc_Purpose','$doc_Date','$doc_Cedulacpy',
       '$doc_IDpres','$doc_UploadedID','$doc_Email','$doc_Contact','$doc_Requestmode')";

         if($conn->query($query_Insert_post) == TRUE){
            move_uploaded_file($_FILES['doc_Cedulacpy']['tmp_name'], '../' .$doc_Cedulacpy);
            move_uploaded_file($_FILES['doc_UploadedID']['tmp_name'], '../' .$doc_UploadedID);
           echo '<script>alert("Request sent"); window.location.href="../barangay_Permit.php"</script>';
        }else{
            echo $conn->error;
        }
}

else if(isset($_POST['submit_cert_indi'])){
    $docu_type3 = "Certificate_Indigency";
 
    $barangay_ID =  $barangayID;
    $doc_Type = $docu_type3;
    $doc_ID = uniqid('BaRISPost_');
    $doc_Fname = mysqli_real_escape_string($conn,$_POST['doc_Fname']);
    $doc_Lname = mysqli_real_escape_string($conn,$_POST['doc_Lname']);
    $doc_Mname = mysqli_real_escape_string($conn,$_POST['doc_Mname']);
    $doc_Suffix = mysqli_real_escape_string($conn,$_POST['doc_Suffix']);
    $doc_Birthdate = mysqli_real_escape_string($conn,$_POST['doc_Birthdate']);
    $doc_Civilstatus = mysqli_real_escape_string($conn,$_POST['doc_Civilstatus']);
    $doc_Citizenship = mysqli_real_escape_string($conn,$_POST['doc_Citizenship']);
    $doc_Sex = mysqli_real_escape_string($conn,$_POST['doc_Sex']);
    $doc_Date = mysqli_real_escape_string($conn, date("m-d-Y "));
    $doc_Purpose =mysqli_real_escape_string($conn, $_POST['doc_Purpose']);
    $doc_Email = mysqli_real_escape_string($conn, $_POST['doc_Email']);
    $doc_Contact =mysqli_real_escape_string($conn, $_POST['doc_Contact']);
    $doc_Requestmode = "Walk-In";
  
        $query_Insert_post = "INSERT INTO barangay_documents_tbl (barangay_ID, doc_Type, doc_ID, doc_Fname, doc_Lname, doc_Mname, doc_Suffix, doc_Birthdate, doc_Sex, doc_Civilstatus, doc_Citizenship,  doc_Purpose, doc_Date, doc_Email, doc_Contact, doc_Requestmode) 
        VALUES ('$barangay_ID', '$doc_Type', '$doc_ID', '$doc_Fname', '$doc_Lname', '$doc_Mname','$doc_Suffix','$doc_Birthdate','$doc_Sex','$doc_Civilstatus','$doc_Citizenship','$doc_Purpose','$doc_Date','$doc_Email','$doc_Contact','$doc_Requestmode')";

         if($conn->query($query_Insert_post) == TRUE){
            echo '<script>alert("Request sent"); window.location.href="../barangay_Permit.php"</script>';
        }else{
            echo $conn->error;
        }
}
else if(isset($_POST['submit_Bus_permit'])){
    $docu_type4 = "Business_Permit";
 
    $barangay_ID =  $barangayID;
    $doc_Type = $docu_type4;
    $doc_ID = uniqid('BaRISPost_');
    $doc_Fname = mysqli_real_escape_string($conn,$_POST['doc_Fname']);
    $doc_Lname = mysqli_real_escape_string($conn,$_POST['doc_Lname']);
    $doc_Mname = mysqli_real_escape_string($conn,$_POST['doc_Mname']);
    $doc_Suffix = mysqli_real_escape_string($conn,$_POST['doc_Suffix']);
    $doc_Date = mysqli_real_escape_string($conn, date("m-d-Y "));
    $doc_Businessname = mysqli_real_escape_string($conn, $_POST['doc_Businessname']);
    $doc_Businessloc =mysqli_real_escape_string($conn, $_POST['doc_Businessloc']);
    $doc_Email = mysqli_real_escape_string($conn, $_POST['doc_Email']);
    $doc_Contact =mysqli_real_escape_string($conn, $_POST['doc_Contact']);
    $doc_IDpres =mysqli_real_escape_string($conn, $_POST['doc_IDpres']);
    $doc_UploadedID = $target_dir . basename($_FILES["doc_UploadedID"]["name"]);
    $doc_Requestmode = "Walk-In";
  
        $query_Insert_post = "INSERT INTO barangay_documents_tbl (barangay_ID, doc_Type, doc_ID, doc_Fname, doc_Lname, doc_Mname, doc_Suffix, doc_Businessname, doc_Businessloc, doc_Date, doc_IDpres, doc_UploadedID, doc_Email, doc_Contact, doc_Requestmode) 
        VALUES ('$barangay_ID','$doc_Type', '$doc_ID', '$doc_Fname', '$doc_Lname', '$doc_Mname','$doc_Suffix','$doc_Businessname','$doc_Businessloc','$doc_Date','$doc_IDpres','$doc_UploadedID','$doc_Email','$doc_Contact','$doc_Requestmode')";

         if($conn->query($query_Insert_post) == TRUE){
            move_uploaded_file($_FILES['doc_UploadedID']['tmp_name'], '../' .$doc_UploadedID);
           echo '<script>alert("Request sent"); window.location.href="../barangay_Permit.php"</script>';
        }else{
            echo $conn->error;
        }
}
else if(isset($_POST['submit_Cedula'])){
    $docu_type5 = "Cedula";
 
    $barangay_ID =  $barangayID;
    $doc_Type = $docu_type5;
    $doc_ID = uniqid('BaRISPost_');
    $doc_Fname = mysqli_real_escape_string($conn,$_POST['doc_Fname']);
    $doc_Lname = mysqli_real_escape_string($conn,$_POST['doc_Lname']);
    $doc_Mname = mysqli_real_escape_string($conn,$_POST['doc_Mname']);
    $doc_Suffix = mysqli_real_escape_string($conn,$_POST['doc_Suffix']);
    $doc_Civilstatus = mysqli_real_escape_string($conn,$_POST['doc_Civilstatus']);  
    $doc_Birthdate = mysqli_real_escape_string($conn,$_POST['doc_Birthdate']);
    $doc_Sex = mysqli_real_escape_string($conn,$_POST['doc_Sex']);
    $doc_Address= mysqli_real_escape_string($conn,$_POST['doc_Address']);
    $doc_Birthplace = mysqli_real_escape_string($conn,$_POST['doc_Birthplace']);
    $doc_Citizenship = mysqli_real_escape_string($conn,$_POST['doc_Citizenship']); 
    $doc_Age= mysqli_real_escape_string($conn,$_POST['doc_Age']);
    $doc_Height= mysqli_real_escape_string($conn,$_POST['doc_Height']);
    $doc_Weight= mysqli_real_escape_string($conn,$_POST['doc_Weight']);
    $doc_Occupation= mysqli_real_escape_string($conn,$_POST['doc_Occupation']);
    $doc_Purpose =mysqli_real_escape_string($conn, $_POST['doc_Purpose']);
    $doc_Earningfromsal =mysqli_real_escape_string($conn, $_POST['doc_Earningfromsal']);
    $doc_Grossrecfrombus =mysqli_real_escape_string($conn, $_POST['doc_Grossrecfrombus']);
    $doc_Totalincom =mysqli_real_escape_string($conn, $_POST['doc_Totalincom']);
    $doc_Taxindentification =mysqli_real_escape_string($conn, $_POST['doc_Taxindentification']);
    $doc_Date = mysqli_real_escape_string($conn, date("m-d-Y "));
    $doc_Email = mysqli_real_escape_string($conn, $_POST['doc_Email']);
    $doc_Contact =mysqli_real_escape_string($conn, $_POST['doc_Contact']);
    $doc_Requestmode = "Walk-In";
   
  
        $query_Insert_post = "INSERT INTO barangay_documents_tbl (barangay_ID, doc_Type, doc_ID, doc_Fname, doc_Lname, doc_Mname, doc_Suffix, doc_Address, doc_Civilstatus, doc_Citizenship, doc_Birthdate, doc_Age, doc_Birthplace, doc_Sex, doc_Height, doc_Weight, doc_Occupation, 
        doc_Purpose, doc_Earningfromsal, doc_Grossrecfrombus, doc_Totalincom, doc_Taxindentification, doc_Date, doc_Email, doc_Contact, doc_Requestmode) 
        VALUES ('$barangay_ID', '$doc_Type', '$doc_ID', '$doc_Fname', '$doc_Lname', '$doc_Mname','$doc_Suffix','$doc_Address', '$doc_Civilstatus', '$doc_Citizenship','$doc_Birthdate','$doc_Age','$doc_Birthplace','$doc_Sex','$doc_Height','$doc_Weight','$doc_Occupation',
        '$doc_Purpose','$doc_Earningfromsal','$doc_Grossrecfrombus','$doc_Totalincom','$doc_Taxindentification','$doc_Date','$doc_Email','$doc_Contact','$doc_Requestmode')";

         if($conn->query($query_Insert_post) == TRUE){
           echo '<script>alert("Request sent"); window.location.href="../barangay_Permit.php"</script>';
        }else{
            echo $conn->error;
        }
}

?>