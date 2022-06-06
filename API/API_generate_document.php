<?php 
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  require 'PHPMailer-master/src/Exception.php';
  require 'PHPMailer-master/src/PHPMailer.php';
  require 'PHPMailer-master/src/SMTP.php';
  require 'API_generate_receipt.php';
    session_start();
    include 'SYSTEM_config.php';

if(!isset($_SESSION['user_ID']) && !isset($_SESSION['user_Type']) && !isset($_SESSION['barangay_ID'])){
    header("location:../index.php");
  }

  $barangay_ID = $_SESSION['barangay_ID'];

  if(isset($_GET['tokenDT']) && isset($_GET['tokenDID']) && isset($_GET['tokenMode']) && isset($_GET['tokenAct'])){
    $doc_Type = $_GET['tokenDT'];
    $doc_ID= $_GET['tokenDID'];
    $doc_Requestmode= $_GET['tokenMode'];
    $doc_Action= $_GET['tokenAct'];
    $doc_Date = "";
    $EMAIL = "";
    $NAME = "";
    $doc_fileName = "BaRIS-doc_".time();
    $doc_PHP = $doc_fileName.".php";
    $doc_Body = "";
    $doc_PDF = $doc_fileName.".pdf";
    $barangay_settings = "SELECT * FROM baragay_settings_tbl WHERE barangay_id = '$barangay_ID'";
    $result_barangay_settings = mysqli_query($conn, $barangay_settings);
    $picturerow = mysqli_fetch_assoc($result_barangay_settings);
    $str = "saved_files/barangaysettings/";
    $trimimage = substr($picturerow['barangay_logo'] , 29);
    $trimimage2 = substr($picturerow['barangay_citylogo'] , 29);
    $trimimage4 = substr($picturerow['captain_signature'] , 29);
    $trimimage5 = substr($picturerow['secretary_signature'] , 29);

    if($doc_Type == "Barangay_Clearance"){
        $query_Get_Info = "SELECT * FROM barangay_documents_tbl WHERE doc_ID = '$doc_ID' AND doc_Requestmode = '$doc_Requestmode'";
        $result_Get_Info = mysqli_query($conn, $query_Get_Info);

        if(mysqli_num_rows($result_Get_Info) > 0){
            $row = mysqli_fetch_assoc($result_Get_Info);
            $req_FullName = $row['doc_Lname'] ." " . $row['doc_Suffix'] .", " . ucwords($row['doc_Fname']) ." " . $row['doc_Mname']; 
            $EMAIL = $row['doc_Email'];
            $NAME = $req_FullName;
            $doc_Body .= '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>'.$doc_fileName.'</title>
                <link rel="stylesheet" href="../../CSS/barangay_doc_style.css"/>
            </head>
            <body>
                <div class="main-page">
                  <div class="sub-page">
                  <img src="../barangaysettings/'.$trimimage.'" width="150px" height ="120px" style="position:absolute;margin-top: 25px;" alt="">
                  <img src="../barangaysettings/'.$trimimage2.'" width="150px" height ="120px" style="position:absolute;margin-top: 25px;margin-left:565px"  alt="">
                
                          <h4 align="center">Republic of the Philippines<br>Province of <b>'.$picturerow['barangay_province'].'</b><br>
                                      Municipality of <b>'.$picturerow['barangay_municipality'].'</b></h4>
                    <h2 align="center">Barangay <b>'.$picturerow['barangay_name'].'</b></h2><hr>
                    <h2 align="center">B A R A N G A Y C L E A R A N C E</h2>
                    <h4 align="left">TO WHOM IT MAY CONCERN:</h4>
                    <p style = "text-indent: 10%;" align="left">This is to certify that <b>'.$req_FullName.'</b> of legal age, <b>'.$row['doc_Sex'].'</b>, <b>'.$row['doc_Civilstatus'].'</b>, <b>'.$row['doc_Citizenship'].'</b>,
                        is a bonafide resident of <b>'.$row['doc_Address'].'</b> <b>'.$picturerow['barangay_name'].'</b>, and that he/she has no derogatory/
                    criminal record filed in this Barangay<br></p>
                    <p>This Ceritification is being issued upon the request of the above-named person upon his/her request for:<b>'.$row['doc_Purpose'].'</b></p>
                    <h4 style = "text-indent: 10%;" align="left">Issued this date:  <b>'.$row['doc_Date'].'</b><h4><br><br>
                    <span align="left" class="line"></span>
                    <img src="../barangaysettings/'.$trimimage4.'" width="150px" height ="120px" style="position:absolute;margin-left:364px"  alt="">
                    <h4 style = "text-indent: 10%;" align="right"><b>'.$picturerow['barangay_captain'].'</b><br>Barangay Captain<h4>
                    <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=https://baris.com.ph/view_document_stats.php?token1='.$doc_ID.'&token2=Barangay_Clearance" title="Link to Google.com" />
            
                  </div>    
                </div>
              </body>
            </html>';
            $doc_Date = $row['doc_Date'];
        }else{
            return;
        }

       
    }else if($doc_Type == "Barangay_Ceritificate"){
        $query_Get_Info = "SELECT * FROM barangay_documents_tbl WHERE doc_ID = '$doc_ID' AND doc_Requestmode = '$doc_Requestmode'";
        $result_Get_Info = mysqli_query($conn, $query_Get_Info);

        if(mysqli_num_rows($result_Get_Info) > 0){
            $row = mysqli_fetch_assoc($result_Get_Info);
            $req_FullName = $row['doc_Lname'] ." " . $row['doc_Suffix'] .", " . ucwords($row['doc_Fname']) ." " . $row['doc_Mname']; 
            $EMAIL = $row['doc_Email'];
            $NAME = $req_FullName;
            $doc_Body .= '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>'.$doc_fileName.'</title>
                <link rel="stylesheet" href="../../CSS/barangay_doc_style.css"/>
            </head>
            <body>
                <div class="main-page">
                  <div class="sub-page">
                
                  <img src="../barangaysettings/'.$trimimage.'" width="150px" height ="120px" style="position:absolute;margin-top: 25px;" alt="">
                  <img src="../barangaysettings/'.$trimimage2. '" width="150px" height ="120px" style="position:absolute;margin-top: 25px;margin-left:565px"  alt="">
                
                  <h4 align="center">Republic of the Philippines<br>Province of <b>' . $picturerow['barangay_province'] . '</b><br>
                  Municipality of <b>' . $picturerow['barangay_municipality'] . '</b></h4>
                    <h2 align="center">Barangay <b>' . $picturerow['barangay_name'] . '</b></h2><hr>
                    <h2 align="center">B A R A N G A Y C E R T I F I C A T E</h2>
                    <h4 align="left">TO WHOM IT MAY CONCERN:</h4>
                    <p style = "text-indent: 10%;" align="left">This is to certify that <b>'.$req_FullName.'</b>  of legal age, <b>'.$row['doc_Sex'].'</b>, <b>'.$row['doc_Civilstatus'].'</b>, <b>'.$row['doc_Citizenship'].'</b>,
                        is a bonafide resident of <b>'.$row['doc_Address'].'</b> <b>'.$picturerow['barangay_name'].'</b>, and that he/she has no derogatory/
                    criminal record filed in this Barangay<br></p>
                    <p>This Ceritification is being issued upon the request of the above-named person upon his/her request for:<b>'.$row['doc_Purpose'].'</b></p>
                    <h4 style = "text-indent: 10%;" align="left">Issued this  <b>'.$row['doc_Date'].'</b><h4><br><br>
                    <img src="../barangaysettings/'.$trimimage4.'" width="150px" height ="120px" style="position:absolute;bottom:364pxpx; margin-left:564px"  alt="">
                    <h4 style = "text-indent: 10%;" align="right"><b>'.$picturerow['barangay_captain'].'</b><br>Barangay Captain<h4>
                    <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=https://baris.com.ph/view_document_stats.php?token1='.$doc_ID.'&token2=Barangay_Ceritificate" title="Link to Google.com" />
            
                  </div>    
                </div>
              </body>
            </html>';
            $doc_Date = $row['doc_Date'];
        }else{
            return;
        }

    }else if($doc_Type == "Certificate_Indigency"){
        $query_Get_Info = "SELECT * FROM barangay_documents_tbl WHERE doc_ID = '$doc_ID' AND doc_Requestmode = '$doc_Requestmode'";
        $result_Get_Info = mysqli_query($conn, $query_Get_Info);

        if(mysqli_num_rows($result_Get_Info) > 0){
            $row = mysqli_fetch_assoc($result_Get_Info);
            $req_FullName = $row['doc_Lname'] ." " . $row['doc_Suffix'] .", " . ucwords($row['doc_Fname']) ." " . $row['doc_Mname']; 
            $EMAIL = $row['doc_Email'];
            $NAME = $req_FullName;
            $doc_Body .= '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>'.$doc_fileName.'</title>
                <link rel="stylesheet" href="../../CSS/barangay_doc_style.css"/>
            </head>
            <body>
                <div class="main-page">
                  <div class="sub-page">
                  <img src="../barangaysettings/'.$trimimage.'" width="150px" height ="120px" style="position:absolute;margin-top: 25px;" alt="">
                  <img src="../barangaysettings/'.$trimimage2.'" width="150px" height ="120px" style="position:absolute;margin-top: 25px;margin-left:565px"  alt="">

                  <h4 align="center">Republic of the Philippines<br>Province of <b>'.$picturerow['barangay_province'].'</b><br>
                  Municipality of <b>'.$picturerow['barangay_municipality'].'</b></h4>
                    <h2 align="center">Barangay <b>'.$picturerow['barangay_name'].'</b></h2><hr>
                    <h2 align="center">C E R T I F I C A T E O F I N D I G E N C Y</h2>
                    <h4 align="left">TO WHOM IT MAY CONCERN:</h4>
                    <p style = "text-indent: 10%;" align="left">This is to certify that <b>'.$req_FullName.'</b> of legal age, <b>'.$row['doc_Sex'].'</b>, <b>'.$row['doc_Civilstatus'].'</b>, <b>'.$row['doc_Citizenship'].'</b>
                        is a resident of this Barangay and is one of the indigents in our barangay.<br></p>
                    <p>This Ceritification is being issued upon the request of the above-named person upon his/her request for:<b>'.$row['doc_Purpose'].'</b></p>
                    <h4 style = "text-indent: 10%;" align="left">Issued this <b>'.$row['doc_Date'].'</b><h4><br><br>
                    <span align="left" class="line"></span>
                    <img src="../barangaysettings/'.$trimimage4.'" width="150px" height ="120px" style="position:absolute;margin-left:364px"  alt="">
                    <h4 style = "text-indent: 10%;" align="right"><b>'.$picturerow['barangay_captain'].'</b><br>Barangay Captain<h4>
                    <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=https://baris.com.ph/view_document_stats.php?token1='.$doc_ID.'&token2=Ceritificate%20of%20Indigency" title="Link to Google.com" />
            
                  </div>    
                </div>
              </body>
            </html>';
            $doc_Date = $row['doc_Date'];
        }else{
            return;
        }

    }else if($doc_Type == "Business_Permit"){
        $query_Get_Info = "SELECT * FROM barangay_documents_tbl WHERE doc_ID = '$doc_ID' AND doc_Requestmode = '$doc_Requestmode'";
        $result_Get_Info = mysqli_query($conn, $query_Get_Info);

        if(mysqli_num_rows($result_Get_Info) > 0){
            $row = mysqli_fetch_assoc($result_Get_Info);
            $req_FullName = $row['doc_Lname'] ." " . $row['doc_Suffix'] .", " . ucwords($row['doc_Fname']) ." " . $row['doc_Mname']; 
            $EMAIL = $row['doc_Email'];
            $NAME = $req_FullName;
            $doc_Body .= '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>'.$doc_fileName.'</title>
                <link rel="stylesheet" href="../../CSS/barangay_doc_style.css"/>
            </head>
            <body>
                <div class="main-page">
                  <div class="sub-page">
                  <img src="../barangaysettings/'.$trimimage.'" width="150px" height ="120px" style="position:absolute;margin-top: 25px;" alt="">
                  <img src="../barangaysettings/'.$trimimage2.'" width="150px" height ="120px" style="position:absolute;margin-top: 25px;margin-left:565px"  alt="">

                  <h4 align="center">Republic of the Philippines<br>Province of <b>'.$picturerow['barangay_province'].'</b><br>
                  Municipality of <b>'.$picturerow['barangay_municipality'].'</b></h4>
                <h2 align="center">Barangay <b>'.$picturerow['barangay_name'].'</b></h2><hr>
                    <h2 align="center">B U S I N E S S P E R M I T</h2>
                    <h4 align="justify">TO WHOM IT MAY CONCERN:</h4>
                    <p align="justify">This is to certify:<br><br>NAME OF BUSINESS: <b>'.$row['doc_Businessname'].'</b><br><br>
                    NAME OF APPLICANT: <b>'.$req_FullName.'</b><br><br> ADDRESS: <b>'.$row['doc_Businessloc'].'</b></p>
                    <p align="justify">Which operating a business at <b>'.$row['doc_Businessloc'].'</b> has undergone identification process and its operation conforms with 
                      the existing laws, rules and regulation of this barangay.<br><br> This permit is issued under requirements of the Local Government
                      Code (R.A.) 7160. Article 4, seciton 152 paragraph C and upon request of the above-named for purposed of applying for the Mayors Permit 
                      License for the year 2022.
                    </p>
                    <h4 align="left" style = "text-indent: 10%;" >Issued this  <b>'.$row['doc_Date'].'</b><h4>
                    <h4 align="left">Prepared by:<h4>
                    <h4 align="left"><b>'.$picturerow['barangay_secretary'].'</b><br>Brgy. Secretary<h4>
                    <img src="../barangaysettings/signature.png" width="150px" height ="120px" style="position:absolute;  bottom:364px;"  alt="">
                    <img src="../barangaysettings/'.$trimimage4.'" width="150px" height ="120px" style="position:absolute;  bottom:250px; margin-left:585px"  alt="">
                    <h4 style = "text-indent: 10%;" align="right"><b>'.$picturerow['barangay_captain'].'</b><br>Barangay Captain<h4>
                    <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=https://baris.com.ph/view_document_stats.php?token1='.$doc_ID.'&token2=Business%20Permit" title="Link to Google.com" style = "width: 144px"/>
                  </div>    
                </div>
              </body>
            </html>';
            $doc_Date = $row['doc_Date'];
        }else{
            return;
        }

    }else{
        $query_Get_Info = "SELECT * FROM barangay_documents_tbl WHERE doc_ID = '$doc_ID' AND doc_Requestmode = '$doc_Requestmode'";
        $result_Get_Info = mysqli_query($conn, $query_Get_Info);

        if(mysqli_num_rows($result_Get_Info) > 0){
            $row = mysqli_fetch_assoc($result_Get_Info);
            $req_FullName = $row['doc_Lname'] ." " . $row['doc_Suffix'] .", " . ucwords($row['doc_Fname']) ." " . $row['doc_Mname']; 
            $EMAIL = $row['doc_Email'];
            $NAME = $req_FullName;
            $doc_Body .= '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>'.$doc_fileName.'</title>
                <link rel="stylesheet" href="../../CSS/barangay_doc_style.css"/>
            </head>
            <body>
                <div class="main-page">
                  <div class="sub-page">
                  <img src="../barangaysettings/'.$trimimage.'" width="150px" height ="120px" style="position:absolute;margin-top: 25px;" alt="">
                  <img src="../barangaysettings/'.$trimimage2.'" width="150px" height ="120px" style="position:absolute;margin-top: 25px;margin-left:565px"  alt="">

                  <h4 align="center">Republic of the Philippines<br>Province of <b>'.$picturerow['barangay_province'].'</b><br>
                  Municipality of <b>'.$picturerow['barangay_municipality'].'</b></h4>
                    <h2 align="center">Barangay <b>'.$picturerow['barangay_name'].'</b></h2><hr>
                    <h2 align="center">C E D U L A</h2>
                    <h4 align="left">TO WHOM IT MAY CONCERN:</h4>
                    <p style = "text-indent: 10%;" align="left">This is to certify that <b>'.$req_FullName.'</b> of legal age, <b>'.$row['doc_Sex'].'</b, <b>'.$row['doc_Civilstatus'].'</b, <b>'.$row['doc_Citizenship'].'</b>,
                       Have a record of the following for his/her ceddula<br></p>
                    <p>Birthplace:<b>'.$row['doc_Birthplace'].'</b> <br>Height in cm: <b>'.$row['doc_Height'].'</b><br> Weight in kg: <b>'.$row['doc_Weight'].'</b><br>Occupation: <b>'.$row['doc_Occupation'].'</b><br>
                    Total Earning From Salaries Profession: <b>'.$row['doc_Earningfromsal'].'</b><br>
                    Total Gross Receipt From Business: <b>'.$row['doc_Grossrecfrombus'].'</b><br>Total Income From Party: <b>'.$row['doc_Totalincom'].'</b><br>Tax Identification Number: <b>'.$row['doc_Taxindentification'].'</b></p>
                    <h4 style = "text-indent: 10%;" align="left">Issued this date:  <b>'.$row['doc_Date'].'</b><h4><br><br>
                    <span align="left" class="line"></span>
                    <img src="../barangaysettings/'.$trimimage4.'" width="150px" height ="120px" style="position:absolute;margin-left:364px"  alt="">
                    <h4 style = "text-indent: 10%;" align="right"><b>'.$picturerow['barangay_captain'].'</b><br>Barangay Captain<h4>
                    <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=https://baris.com.ph/view_document_stats.php?token1='.$doc_ID.'&token2=Cedula" title="Link to Google.com"  style = "width: 215px"/>
            
                  </div>    
                </div>
              </body>
            </html>';
            $doc_Date = $row['doc_Date'];
        }else{
            return;
        }

    }
    // RECEIPT
    $transac_ID = "BaRIS-transac_".time();
    $result_Doc_price = mysqli_query($conn, "SELECT * FROM barangay_document_types_tbl WHERE barangay_ID = '$barangay_ID' AND doc_Type = '$doc_Type'");
    $rowX = mysqli_fetch_assoc($result_Doc_price);
    $doc_Price = $rowX['doc_Price'];
    $query_Insert_receipt = "INSERT INTO barangay_docu_receipts_tbl SET transac_ID = '$transac_ID', docu_ID = '$doc_ID', transac_Docu = '$doc_Type', 
    transac_Date = '$doc_Date', transac_Recipient = '$NAME', transac_Price = '$doc_Price'";
    $result_Insert_receipt = mysqli_query($conn,$query_Insert_receipt);

    $PHPPath = "../saved_files/req_document/" . $doc_PHP;
    $PDFPath = "../saved_files/req_document/" . $doc_PDF;
    $PHPLink = "saved_files/req_document/" . $doc_PHP;
    $toPHP = fopen($PHPPath, 'w');
    fwrite($toPHP, $doc_Body);
    fclose($toPHP);
    $PDF_receipt = generateReceipt($transac_ID);
    $curl = curl_init();
    
    $source = "https://baris.com.ph/" . $PHPLink;
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
    if($doc_Action == "PDF"){
      header("location:".$PDFPath);
    }else{
      // EMAIL
                $mail = new PHPMailer();
                $mail->IsSMTP();
                $mail->Mailer = "smtp";
                $mail->SMTPDebug  = 0;
                $mail->SMTPAuth   = TRUE;
                $mail->SMTPSecure = "tls";
                $mail->Port       = 587;
                $mail->Host       = "mail.baris.com.ph";
                $mail->Username   = "admin@baris.com.ph";
                $mail->Password   = "Txuc+!&H*(La";

                $mail->IsHTML(true);
                $mail->AddAddress($EMAIL, "recipient-name");
                $mail->SetFrom($my_email, "BaRIS");
                $mail->AddReplyTo($my_email, "reply-to-name");
                $mail->AddCC($EMAIL, "cc-recipient-name");
                $mail->Subject = "Document Request - BaRIS";
                $mail->addAttachment($PDFPath);
                $mail->addAttachment($PDF_receipt);
                $content = "<p><strong>Dear Mr./Ms. {$NAME},</strong></p>
                 <p>You have requested the following document: {$doc_Type}</p>
                 <p>Attached are the file of the document and the invoice of the transaction.</p>
                 <p>If not on the primary inbox search the mail at the *Spam Collection*. </p>
                 <p>Kindly report as not a spam. </p>";
                 $mail->Body = $content;
                if (!$mail->Send()) {
                    echo $mail->ErrorInfo;
                } else {
                    echo "<script>
                      alert('Document has been sent!');
                      window.location.href='../barangay_Permit_request.php';
                      </script>";
                }
    }
    
  }
