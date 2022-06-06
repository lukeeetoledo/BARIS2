<?php 
    function generateReceipt($transac_ID){
        include "SYSTEM_config.php";
        $target = "saved_files/receipts/";
        $PHPFile = $transac_ID.".php";
        $PDFFile = $transac_ID.".pdf";
        $PHPLink = $target.$PHPFile;
        $PDFLink = $target.$PDFFile;
        $PDFPath = "../".$PDFLink;
        $PHPPath = "../".$PHPLink;

        $query_Select_transac = "SELECT * FROM barangay_docu_receipts_tbl WHERE transac_ID = '$transac_ID'";
        $result_Select_transac = mysqli_query($conn,$query_Select_transac);
        $receipt = "";

        if(mysqli_num_rows($result_Select_transac) > 0){
            $row = mysqli_fetch_assoc($result_Select_transac);
            $receipt .= '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="../../CSS/receipt.css">
                <title>Receipt</title>
            </head>
            
            <body>
                <div id="receipt_head">
                    <h1>Receipt</h1>
                    <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=http%3A%2F%2Fwww.google.com%2F&choe=UTF-8" width="64px" style="float: right;display:inline" title="Link to Google.com" />
                </div>
                <div id="receipt_body">
                    <label>Transaction ID: <span>'.$row['transac_ID'].'</span></label>
                    <hr><br>
                    <label>Document ID: <span>'.$row['docu_ID'].'</span></label>
                    <hr><br>
                    <label>Requested Document: <span>'.$row['transac_Docu'].'</span></label>
                    <hr><br>
                    <label>Date: <span>'.$row['transac_Date'].'</span></label>
                    <hr><br>
                    <label>Recepient: <span>'.$row['transac_Recipient'].'</span></label>
                    <hr><br>
                    <label>Price: <span>'.$row['transac_Price'].'</span></label>
                    <hr><hr><br><br><br><br><br>
                    <small style="float: right;">baris.com.ph</small><br>
                    <small style="float: right;">baris.tupm@gmail.com</small><br>
                </div>
            </body>
            
            </html>';
        }
        $toPHP = fopen($PHPPath, 'w');
        fwrite($toPHP, $receipt);
        fclose($toPHP);

        $curl = curl_init();
        $source = "https://baris.com.ph/" .$PHPLink;
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.pdfshift.io/v3/convert/pdf",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode(array(
                "source" => $source,
                "landscape" => true,
                "use_print" => false
            )),
            CURLOPT_HTTPHEADER => array('Content-Type:application/json'),
            CURLOPT_USERPWD => 'api:3351793c0ba7403fa032b2656a70f30f'
        ));

        $response = curl_exec($curl);
        file_put_contents($PDFPath, $response);
        //  DELETE PHP File
        unlink($PHPPath);
        return $PDFPath;
    }

?>