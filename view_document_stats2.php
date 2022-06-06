<?php include 'API/API_get_document_view.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="img/Logo_192.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="CSS/barangayside.css">

  <title><?php $doc_ID; ?></title>
</head> 

<body style = "background-color:#121212">
  <center>
      <?php 
      $output = "";
      
      if($doc_Type == "Barangay_Ceritificate") {
        $output .= "
        <div class='container' id='Barangay_Certificate' style='border:solid; margin:20px'>
            <div style='margin-bottom: 15px; padding: 10px;background-color:#bd8565;font-weight: bold;'><h1 style='display: inline-block;'>Barangay Certificate</h1></div>     
            <div class='row'>
                <div id='userid'><span style = 'margin-right: 20px'><b>Document ID: </b></span> $doc_ID </div><hr>
                <div id='userid'><span style = 'margin-right: 20px'><b>Document Type:</b></span> $doc_Type</div><hr>
                <div id='fname'><span style = 'margin-right: 20px'><b>First Name:</b></span> $doc_Fname</div><hr>
                <div id='mname'><span style = 'margin-right: 20px'><b>Middle Name:</b></span> $doc_Mname</div><hr>
                <div id='lname'><span style = 'margin-right: 20px'><b>Last Name:</b></span> $doc_Lname</div><hr>
                <div id='suffix'><span style = 'margin-right: 20px'><b>Suffix:</b></span> $doc_Suffix</div><hr>
                <div id='address'><span style = 'margin-right: 20px'><b>Full Address:</b></span> $doc_Address</div><hr>
                <div id='sex'><span style = 'margin-right: 20px'><b>Sex:</b></span> $doc_Sex</div><hr>
                <div id='civilstatus'><span style = 'margin-right: 20px'><b>Civil Status:</b></span> $doc_Civilstatus</div><hr>
                <div id='citizenship'><span style = 'margin-right: 20px'><b>Citizenship:</b></span> $doc_Citizenship</div><hr>
                <div id='purpose'><span style = 'margin-right: 20px'><b>Purpose:</b></span> $doc_Purpose</div><hr>
                <div id='date'><span style = 'margin-right: 20px'><b>Application Date:</b></span> $doc_Date</div><hr>
                <div id='cedulaycpy'><span style = 'margin-right: 20px'><b>Cedula copy:</b></span> $doc_Cedulacpy</div><hr>
                <div id='email'><span style = 'margin-right: 20px'><b>Email:</b></span> $doc_Email</div><hr>
                <div id='contact'><span style = 'margin-right: 20px'><b>Contact:</b></span> $doc_Contact</div><hr>
                <div id='payment'><span style = 'margin-right: 20px'><b>Proof of Payment:</b></span> $doc_Payment</div><hr>
                <div id='delivertype'><span style = 'margin-right: 20px'><b>Deliver through:</b></span> $doc_DeliverType</div><hr>
                <div id='requrestmode'><span style = 'margin-right: 20px'><b>Request Mode:</b></span> $doc_Requestmode</div>
            </div>
        </div>
            ";
        }else if ($doc_Type == "Barangay_Clearance"){
            $output .= "
        <div class='container' id='Barangay_Certificate' style='border:solid; margin:20px'>
            <div style='margin-bottom: 15px; padding: 10px;background-color:#bd8565;font-weight: bold;'><h1 style='display: inline-block;'>Barangay Clearance</h1></div>     
            <div class='row'>
                <div id='userid'><span style = 'margin-right: 20px'><b>Document ID: </b></span> $doc_ID </div><hr>
                <div id='userid'><span style = 'margin-right: 20px'><b>User ID: </b></span> $user_ID</div><hr>
                <div id='userid'><span style = 'margin-right: 20px'><b>Document Type:</b></span> $doc_Type</div><hr>
                <div id='fname'><span style = 'margin-right: 20px'><b>First Name:</b></span> $doc_Fname</div><hr>
                <div id='mname'><span style = 'margin-right: 20px'><b>Middle Name:</b></span> $doc_Mname</div><hr>
                <div id='lname'><span style = 'margin-right: 20px'><b>Last Name:</b></span> $doc_Lname</div><hr>
                <div id='suffix'><span style = 'margin-right: 20px'><b>Suffix:</b></span> $doc_Suffix</div><hr>
                <div id='address'><span style = 'margin-right: 20px'><b>Full Address:</b></span> $doc_Address</div><hr>
                <div id='birthdate'><span style = 'margin-right: 20px'><b>Birth Date:</b></span> $doc_Birthdate</div><hr>
                <div id='sex'><span style = 'margin-right: 20px'><b>Sex:</b></span> $doc_Sex</div><hr>
                <div id='age'><span style = 'margin-right: 20px'><b>Age:</b></span> $doc_Age</div><hr>
                <div id='civilstatus'><span style = 'margin-right: 20px'><b>Civil Status:</b></span> $doc_Civilstatus</div><hr>
                <div id='citizenship'><span style = 'margin-right: 20px'><b>Citizenship:</b></span> $doc_Citizenship</div><hr>
                <div id='purpose'><span style = 'margin-right: 20px'><b>Purpose:</b></span> $doc_Purpose</div><hr>
                <div id='date'><span style = 'margin-right: 20px'><b>Application Date:</b></span> $doc_Date</div><hr>
                <div id='cedulaycpy'><span style = 'margin-right: 20px'><b>Cedula copy:</b></span> $doc_Cedulacpy</div><hr>
                <div id='idpresented'><span style = 'margin-right: 20px'><b>ID presented:</b></span> $doc_IDpres</div><hr>
                <div id='uploadedid'><span style = 'margin-right: 20px'><b>Uploaded Id:</b></span> $doc_UploadedID</div><hr>
                <div id='email'><span style = 'margin-right: 20px'><b>Email:</b></span> $doc_Email</div><hr>
                <div id='contact'><span style = 'margin-right: 20px'><b>Contact:</b></span> $doc_Contact</div><hr>
                <div id='payment'><span style = 'margin-right: 20px'><b>Proof of Payment:</b></span> $doc_Payment</div><hr>
                <div id='delivertype'><span style = 'margin-right: 20px'><b>Deliver through:</b></span> $doc_DeliverType</div><hr>
                <div id='requrestmode'><span style = 'margin-right: 20px'><b>Request Mode:</b></span> $doc_Requestmode</div>
            </div>
        </div>
            ";

        }else if ($doc_Type == "Ceritificate of Indigency"){
            $output .= "
        <div class='container' id='Barangay_Certificate' style='border:solid; margin:20px'>
            <div style='margin-bottom: 15px; padding: 10px;background-color:#bd8565;font-weight: bold;'><h1 style='display: inline-block;'>Ceritificate of Indigency</h1></div>     
            <div class='row'>
                <div id='userid'><span style = 'margin-right: 20px'><b>Document ID: </b></span> $doc_ID </div><hr>
                <div id='userid'><span style = 'margin-right: 20px'><b>User ID: </b></span> $user_ID</div><hr>
                <div id='userid'><span style = 'margin-right: 20px'><b>Document Type:</b></span> $doc_Type</div><hr>
                <div id='fname'><span style = 'margin-right: 20px'><b>First Name:</b></span> $doc_Fname</div><hr>
                <div id='mname'><span style = 'margin-right: 20px'><b>Middle Name:</b></span> $doc_Mname</div><hr>
                <div id='lname'><span style = 'margin-right: 20px'><b>Last Name:</b></span> $doc_Lname</div><hr>
                <div id='suffix'><span style = 'margin-right: 20px'><b>Suffix:</b></span> $doc_Suffix</div><hr>
                <div id='birthdate'><span style = 'margin-right: 20px'><b>Birth Date:</b></span> $doc_Birthdate</div><hr>
                <div id='sex'><span style = 'margin-right: 20px'><b>Sex:</b></span> $doc_Sex</div><hr>
                <div id='purpose'><span style = 'margin-right: 20px'><b>Purpose:</b></span> $doc_Purpose</div><hr>
                <div id='date'><span style = 'margin-right: 20px'><b>Application Date:</b></span> $doc_Date</div><hr>
                <div id='email'><span style = 'margin-right: 20px'><b>Email:</b></span> $doc_Email</div><hr>
                <div id='contact'><span style = 'margin-right: 20px'><b>Contact:</b></span> $doc_Contact</div><hr>
                <div id='payment'><span style = 'margin-right: 20px'><b>Proof of Payment:</b></span> $doc_Payment</div><hr>
                <div id='delivertype'><span style = 'margin-right: 20px'><b>Deliver through:</b></span> $doc_DeliverType</div><hr>
                <div id='requrestmode'><span style = 'margin-right: 20px'><b>Request Mode:</b></span> $doc_Requestmode</div>
            </div>
        </div>
            ";

        }else if ($doc_Type == "Business Permit"){
            $output .= "
        <div class='container' id='Barangay_Certificate' style='border:solid; margin:20px'>
            <div style='margin-bottom: 15px; padding: 10px;background-color:#bd8565;font-weight: bold;'><h1 style='display: inline-block;'>Business Permit</h1></div>     
            <div class='row'>
                <div id='userid'><span style = 'margin-right: 20px'><b>Document ID: </b></span> $doc_ID </div><hr>
                <div id='userid'><span style = 'margin-right: 20px'><b>User ID: </b></span> $user_ID</div><hr>
                <div id='userid'><span style = 'margin-right: 20px'><b>Document Type:</b></span> $doc_Type</div><hr>
                <div id='fname'><span style = 'margin-right: 20px'><b>First Name:</b></span> $doc_Fname</div><hr>
                <div id='mname'><span style = 'margin-right: 20px'><b>Middle Name:</b></span> $doc_Mname</div><hr>
                <div id='lname'><span style = 'margin-right: 20px'><b>Last Name:</b></span> $doc_Lname</div><hr>
                <div id='suffix'><span style = 'margin-right: 20px'><b>Suffix:</b></span> $doc_Suffix</div><hr>
                <div id='date'><span style = 'margin-right: 20px'><b>Application Date:</b></span> $doc_Date</div><hr>
                <div id='cedulaycpy'><span style = 'margin-right: 20px'><b>Cedula copy:</b></span> $doc_Cedulacpy</div><hr>
                <div id='idpresented'><span style = 'margin-right: 20px'><b>ID presented:</b></span> $doc_IDpres</div><hr>
                <div id='uploadedid'><span style = 'margin-right: 20px'><b>Uploaded Id:</b></span> $doc_UploadedID</div><hr>
                <div id='email'><span style = 'margin-right: 20px'><b>Email:</b></span> $doc_Email</div><hr>
                <div id='contact'><span style = 'margin-right: 20px'><b>Contact:</b></span> $doc_Contact</div><hr>
                <div id='businessname'><span style = 'margin-right: 20px'><b>Business Name:</b></span> $doc_Businessname</div><hr>
                <div id='businessloc'><span style = 'margin-right: 20px'><b>Business Location:</b></span> $doc_Businessloc</div><hr>
                <div id='payment'><span style = 'margin-right: 20px'><b>Proof of Payment:</b></span> $doc_Payment</div><hr>
                <div id='delivertype'><span style = 'margin-right: 20px'><b>Deliver through:</b></span> $doc_DeliverType</div><hr>
                <div id='requrestmode'><span style = 'margin-right: 20px'><b>Request Mode:</b></span> $doc_Requestmode</div>
            </div>
        </div>
            ";

        }else if ($doc_Type == "Cedula"){
            $output .= "
        <div class='container' id='Barangay_Certificate' style='border:solid; margin:20px'>
            <div style='margin-bottom: 15px; padding: 10px;background-color:#bd8565;font-weight: bold;'><h1 style='display: inline-block;'>Cedula</h1></div>     
            <div class='row'>
                <div id='userid'><span style = 'margin-right: 20px'><b>Document ID: </b></span> $doc_ID </div><hr>
                <div id='userid'><span style = 'margin-right: 20px'><b>User ID: </b></span> $user_ID</div><hr>
                <div id='userid'><span style = 'margin-right: 20px'><b>Document Type:</b></span> $doc_Type</div><hr>
                <div id='fname'><span style = 'margin-right: 20px'><b>First Name:</b></span> $doc_Fname</div><hr>
                <div id='mname'><span style = 'margin-right: 20px'><b>Middle Name:</b></span> $doc_Mname</div><hr>
                <div id='lname'><span style = 'margin-right: 20px'><b>Last Name:</b></span> $doc_Lname</div><hr>
                <div id='suffix'><span style = 'margin-right: 20px'><b>Suffix:</b></span> $doc_Suffix</div><hr>
                <div id='address'><span style = 'margin-right: 20px'><b>Full Address:</b></span> $doc_Address</div><hr>
                <div id='birthdate'><span style = 'margin-right: 20px'><b>Birth Date:</b></span> $doc_Birthdate</div><hr>
                <div id='birthdplace'><span style = 'margin-right: 20px'><b>Birth Place:</b></span> $doc_Birthplace</div><hr>
                <div id='sex'><span style = 'margin-right: 20px'><b>Sex:</b></span> $doc_Sex</div><hr>
                <div id='age'><span style = 'margin-right: 20px'><b>Age:</b></span> $doc_Age</div><hr>
                <div id='civilstatus'><span style = 'margin-right: 20px'><b>Civil Status:</b></span> $doc_Civilstatus</div><hr>
                <div id='citizenship'><span style = 'margin-right: 20px'><b>Citizenship:</b></span> $doc_Citizenship</div><hr>
                <div id='purpose'><span style = 'margin-right: 20px'><b>Purpose:</b></span> $doc_Purpose</div><hr>
                <div id='date'><span style = 'margin-right: 20px'><b>Application Date:</b></span> $doc_Date</div><hr>
                <div id='email'><span style = 'margin-right: 20px'><b>Email:</b></span> $doc_Email</div><hr>
                <div id='contact'><span style = 'margin-right: 20px'><b>Contact:</b></span> $doc_Contact</div><hr>
                <div id='height'><span style = 'margin-right: 20px'><b>Height:</b></span> $doc_Height</div><hr>
                <div id='weight'><span style = 'margin-right: 20px'><b>Weight:</b></span> $doc_Weight</div><hr>
                <div id='occupation'><span style = 'margin-right: 20px'><b>Occupation:</b></span> $doc_Occupation</div><hr>
                <div id='earningfromsal'><span style = 'margin-right: 20px'><b>Earning from Salary:</b></span> $doc_Earningfromsal</div><hr>
                <div id='grossrecfrombus'><span style = 'margin-right: 20px'><b>Total Gross Receipt From Business:</b></span> $doc_Grossrecfrombus</div><hr>
                <div id='totalincome'><span style = 'margin-right: 20px'><b>Total Income from Party:</b></span> $doc_Totalincom</div><hr>
                <div id='taxidentification'><span style = 'margin-right: 20px'><b>Tax Identification Number:</b></span> $doc_Taxindentification</div><hr>
                <div id='payment'><span style = 'margin-right: 20px'><b>Proof of Payment:</b></span> $doc_Payment</div><hr>
                <div id='delivertype'><span style = 'margin-right: 20px'><b>Deliver through:</b></span> $doc_DeliverType</div><hr>
                <div id='requrestmode'><span style = 'margin-right: 20px'><b>Request Mode:</b></span> $doc_Requestmode</div>
            </div>
        </div>
            ";
        }

      echo $output;
      ?>
      
             
                
           
  </center>
</body>
</html>