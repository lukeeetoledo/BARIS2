<?php 
include 'SYSTEM_config.php';
session_start();

if(!isset($_SESSION['user_ID']) && !isset($_SESSION['user_Type']) && !isset($_SESSION['barangay_ID'])){
    header("location:../index.php");
  }
$target_dir = "saved_files/barangaysettings/";
$barangayID = $_SESSION['barangay_ID'];
$user_ID = $_SESSION['user_ID'];

if(isset($_POST['submit_settings'])){
    
    $user_ID = $user_ID;
    $barangay_ID =  $barangayID;
   
     $barangay_logo = $target_dir . basename($_FILES["barangay_logo"]["name"]);
     $barangay_citylogo = $target_dir . basename($_FILES["barangay_citylogo"]["name"]);
     $barangay_captain = mysqli_real_escape_string($conn,$_POST['barangay_captain']);
     $barangay_secretary = mysqli_real_escape_string($conn,$_POST['barangay_secretary']);
     $barangay_province = mysqli_real_escape_string($conn,$_POST['barangay_province']);
     $barangay_municipality = mysqli_real_escape_string($conn,$_POST['barangay_municipality']);
     $barangay_name = mysqli_real_escape_string($conn,$_POST['barangay_name']);
     $captain_signature = $target_dir . basename($_FILES["captain_signature"]["name"]);
     $secretary_signature = $target_dir . basename($_FILES["secretary_signature"]["name"]);
     $check = getimagesize($_FILES["barangay_logo"]["tmp_name"]);
     
     if ($check !== false) {
         $uploadOk = 1;
     } else {
         echo '<script>alert("Processing Error."); window.location.href="../barangay_settings.php";</script>';
         $uploadOk = 0;
     }
     if($uploadOk == 0){
         echo '<script>alert("Error Uploading File/s."); window.location.href="../barangay_settings.php";</script>';
     }
         $query_Insert_post = "INSERT INTO baragay_settings_tbl (barangay_ID, barangay_logo, barangay_citylogo, barangay_captain, barangay_secretary, 
         barangay_province,barangay_municipality,barangay_name, captain_signature, secretary_signature) 
         VALUES ('$barangay_ID','$barangay_logo','$barangay_citylogo','$barangay_captain','$barangay_secretary','$barangay_province',
         '$barangay_municipality','$barangay_name','$captain_signature','$secretary_signature')";
 
          if($conn->query($query_Insert_post) == TRUE){
             move_uploaded_file($_FILES['barangay_logo']['tmp_name'], '../' .$barangay_logo);
             move_uploaded_file($_FILES['barangay_citylogo']['tmp_name'], '../' .$barangay_citylogo);
             move_uploaded_file($_FILES['captain_signature']['tmp_name'], '../' .$captain_signature);
             move_uploaded_file($_FILES['secretary_signature']['tmp_name'], '../' .$secretary_signature);
             echo '<script>alert("Settings saved"); window.location.href="../barangay_settings.php"</script>';
         }else{
             echo $conn->error;
         }
        }


?>