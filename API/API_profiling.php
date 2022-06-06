<?php 
include 'SYSTEM_config.php';
session_start();

if(!isset($_SESSION['barangay_ID'])){
    header("location:../index.php");
  }

$barangayID = $_SESSION['barangay_ID'];
date_default_timezone_set("Asia/Manila");
if(isset ($_POST['add_btn'])){
    if(isset($_POST['prof_Fname']) && isset($_POST['prof_Lname'])&& isset($_POST['prof_Mname'])&& isset($_POST['prof_Suffix'])
    && isset($_POST['prof_Birthdate'])&& isset($_POST['prof_Address'])
    && isset($_POST['prof_Addressstatus'])&& isset($_POST['prof_Fathername'])&& isset($_POST['prof_Fatheroccu'])
    && isset($_POST['prof_Mothername'])&& isset($_POST['prof_Motheroccu'])){
        
       
        $prof_ID =  mysqli_real_escape_string($conn,uniqid('Res_'));
        $barangay_ID = $barangayID;
        $prof_Fname =  mysqli_real_escape_string($conn,$_POST['prof_Fname']);
        $prof_Lname =  mysqli_real_escape_string($conn,$_POST['prof_Lname']);
        $prof_Mname =  mysqli_real_escape_string($conn,$_POST['prof_Mname']);
        $prof_Suffix =  mysqli_real_escape_string($conn,$_POST['prof_Suffix']);
        $prof_Birthdate =  mysqli_real_escape_string($conn,$_POST['prof_Birthdate']);
        if(isset($_POST['prof_Sex'])){
            $prof_Sex =  mysqli_real_escape_string($conn,$_POST['prof_Sex']);
        }
        $prof_Address =  mysqli_real_escape_string($conn,$_POST['prof_Address']);
        $prof_Addressstatus =  mysqli_real_escape_string($conn,$_POST['prof_Addressstatus']);
        $prof_Fathername =  mysqli_real_escape_string($conn,$_POST['prof_Fathername']);
        $prof_Fatheroccu = mysqli_real_escape_string($conn,$_POST['prof_Fatheroccu']);
        $prof_Mothername = mysqli_real_escape_string($conn,$_POST['prof_Mothername']);
        $prof_Motheroccu = mysqli_real_escape_string($conn,$_POST['prof_Motheroccu']);
        
            $query_Insert_profile = "INSERT INTO barangay_profiling_tbl (prof_ID, barangay_ID, prof_Fname, prof_Lname, prof_Mname,prof_Suffix, prof_Birthdate, prof_Sex, prof_Address, prof_Addressstatus, prof_Fathername, prof_Fatheroccu, prof_Mothername, prof_Motheroccu) 
            VALUES ('$prof_ID','$barangay_ID','$prof_Fname','$prof_Lname', '$prof_Mname', '$prof_Suffix', '$prof_Birthdate', '$prof_Sex', '$prof_Address', '$prof_Addressstatus', '$prof_Fathername', '$prof_Fatheroccu', '$prof_Mothername', '$prof_Motheroccu')";
    
             if($conn->query($query_Insert_profile) == TRUE){
                echo '<script>alert("Resident Uploaded"); window.location.href="../barangay_List.php";</script>';
            }else{
                echo "error";
                echo $conn->error;
            }
    }
}
if(isset ($_POST['update_btn']) && isset($_GET['token'])){
    if(isset($_POST['prof_Fname']) && isset($_POST['prof_Lname'])&& isset($_POST['prof_Mname'])&& isset($_POST['prof_Suffix'])
    && isset($_POST['prof_Birthdate'])&& isset($_POST['prof_Address'])
    && isset($_POST['prof_Addressstatus'])&& isset($_POST['prof_Fathername'])&& isset($_POST['prof_Fatheroccu'])
    && isset($_POST['prof_Mothername'])&& isset($_POST['prof_Motheroccu'])){
        
       
        $prof_ID = $_GET['token'];
        $prof_Fname =  mysqli_real_escape_string($conn,$_POST['prof_Fname']);
        $prof_Lname =  mysqli_real_escape_string($conn,$_POST['prof_Lname']);
        $prof_Mname =  mysqli_real_escape_string($conn,$_POST['prof_Mname']);
        $prof_Suffix =  mysqli_real_escape_string($conn,$_POST['prof_Suffix']);
        $prof_Birthdate =  mysqli_real_escape_string($conn,$_POST['prof_Birthdate']);
        if(isset($_POST['prof_Sex'])){
            $prof_Sex =  mysqli_real_escape_string($conn,$_POST['prof_Sex']);
        }
        $prof_Address =  mysqli_real_escape_string($conn,$_POST['prof_Address']);
        $prof_Addressstatus =  mysqli_real_escape_string($conn,$_POST['prof_Addressstatus']);
        $prof_Fathername =  mysqli_real_escape_string($conn,$_POST['prof_Fathername']);
        $prof_Fatheroccu = mysqli_real_escape_string($conn,$_POST['prof_Fatheroccu']);
        $prof_Mothername = mysqli_real_escape_string($conn,$_POST['prof_Mothername']);
        $prof_Motheroccu = mysqli_real_escape_string($conn,$_POST['prof_Motheroccu']);
        
            $query_Update_profile = "UPDATE barangay_profiling_tbl SET prof_Fname='$prof_Fname', prof_Lname='$prof_Lname', prof_Mname='$prof_Mname',prof_Suffix='$prof_Suffix', prof_Birthdate='$prof_Birthdate',prof_Sex='$prof_Sex', prof_Address='$prof_Address',
            prof_Addressstatus='$prof_Addressstatus', prof_Fathername='$prof_Fathername',prof_Fatheroccu='$prof_Fatheroccu', prof_Mothername='$prof_Mothername',prof_Motheroccu='$prof_Motheroccu'
            WHERE prof_ID='$prof_ID'";
    
             if($conn->query($query_Update_profile) == TRUE){
                echo '<script>alert("Resident Updated"); window.location.href="../barangay_List.php";</script>';
            }else{
                echo 'error';
                echo $conn->error;
            }
    }
}else{
    echo '<script>alert("User Not Found! Please Select a Resident First!"); window.location.href="../barangay_List.php";</script>';
}

?>
