<?php 
include 'SYSTEM_config.php';
session_start();

if(!isset($_SESSION['user_ID']) && !isset($_SESSION['user_Type']) && !isset($_SESSION['barangay_ID'])){
    header("location:../index.php");
  }

$barangayID = $_SESSION['barangay_ID'];
$user_ID = $_SESSION['user_ID'];

if(isset($_POST['submit_qr'])){
    if(is_uploaded_file($_FILES['payment_media']['tmp_name'])){
            $imageName = $_FILES['payment_media']['name'];
            $path = 'saved_files/QR/'.$imageName;
            $qr_name  = mysqli_real_escape_string($conn,$_POST['qr_name']);
            $doc_type  = mysqli_real_escape_string($conn,$_POST['doc_type']);
            $doc_number = mysqli_real_escape_string($conn,$_POST['doc_number']);
    $check_num = "SELECT * FROM barangay_payment_settings_tbl WHERE qr_name = '$qr_name' AND doc_number = '$doc_number' AND doc_type = '$doc_type'";
    $check_num_result = mysqli_query($conn, $check_num);
        if(mysqli_num_rows($check_num_result) > 0){
            echo '<script>alert("Phone Number Already added!"); window.location.href="../barangay_settings.php";</script>';  
        }
            if($doc_type =="All"){
                $index[0] = "INSERT INTO barangay_payment_settings_tbl (barangay_id, payment_media, qr_name, doc_type, doc_number) VALUES ('$barangayID','$path','$qr_name','Barangay_Certificate','$doc_number')";
                $index[1] = "INSERT INTO barangay_payment_settings_tbl (barangay_id, payment_media, qr_name, doc_type, doc_number) VALUES ('$barangayID','$path','$qr_name','Barangay_Clearance','$doc_number')";
                $index[2] = "INSERT INTO barangay_payment_settings_tbl (barangay_id, payment_media, qr_name, doc_type, doc_number) VALUES ('$barangayID','$path','$qr_name','Certificate_Indigency',,'$doc_number')";
                $index[3] = "INSERT INTO barangay_payment_settings_tbl (barangay_id, payment_media, qr_name, doc_type, doc_number) VALUES ('$barangayID','$path','$qr_name','Business_Permit',,'$doc_number')";
                $index[4] = "INSERT INTO barangay_payment_settings_tbl (barangay_id, payment_media, qr_name, doc_type, doc_number) VALUES ('$barangayID','$path','$qr_name','Cedula','$doc_number')";
                for($i = 0; $i < count($index); $i++){
                    $result = mysqli_query($conn,$index[$i]);
                }
            }else{
                $sql = "INSERT INTO barangay_payment_settings_tbl (barangay_id, payment_media, qr_name, doc_type, doc_number) VALUES ('$barangayID','$path','$qr_name','$doc_type','$doc_number')";
                if($conn->query($sql) == TRUE){
                    
                }else{
                    echo "error";
                    echo $conn->error;
                }
            }
            move_uploaded_file($_FILES['payment_media']['tmp_name'], '../saved_files/QR/' .$imageName);
            echo '<script>alert("Photo Uploaded"); window.location.href="../barangay_settings.php";</script>';      
    }
}



?>