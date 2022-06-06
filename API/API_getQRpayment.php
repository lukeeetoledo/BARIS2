<?php 
include 'SYSTEM_config.php';

if(!isset($_SESSION['barangay_ID'])){
    header("location:../index.php");
}
$paymentPic = " ";
$barangay_ID = $_SESSION['barangay_ID'];
$query_Get_Paymentpicture = "SELECT * FROM barangay_payment_settings_tbl WHERE barangay_ID = '$barangay_ID' AND doc_type = 'Barangay_Certificate'";
$result_Get_PaymentPicture = mysqli_query($conn,$query_Get_Paymentpicture);
$price = "";
if(mysqli_num_rows($result_Get_PaymentPicture) > 0){
$get_price = "SELECT * FROM barangay_document_types_tbl WHERE barangay_ID = '$barangay_ID' AND doc_Type = 'Barangay_Certificate'";
$result_get_price = mysqli_query($conn,$get_price);
$rowprice = mysqli_fetch_assoc($result_get_price);
    $price = $rowprice['doc_Price'];
    while ($row = $result_Get_PaymentPicture->fetch_assoc()){
        
        $paymentPic .= "<div id = 'qrPayment'>
                        <img src='{$row['payment_media']}'>
                    </div>";
    }
}



?>