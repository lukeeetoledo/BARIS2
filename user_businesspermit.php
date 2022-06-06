<?php 
include 'API/API_user_profile.php';
include 'API/API_getQRpayment4.php';
?>

<!DOCTYPE html>
<html lang="en">
<script>
function includeHTML() {
  var z, i, elmnt, file, xhttp;
  /*loop through a collection of all HTML elements:*/
  z = document.getElementsByTagName("*");
  for (i = 0; i < z.length; i++) {
    elmnt = z[i];
    /*search for elements with a certain atrribute:*/
    file = elmnt.getAttribute("w3-include-html");
    if (file) {
      /*make an HTTP request using the attribute value as the file name:*/
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
          if (this.status == 200) {elmnt.innerHTML = this.responseText;}
          if (this.status == 404) {elmnt.innerHTML = "Page not found.";}
          /*remove the attribute, and call this function once more:*/
          elmnt.removeAttribute("w3-include-html");
          includeHTML();
        }
      }      
      xhttp.open("GET", file, true);
      xhttp.send();
      /*exit the function:*/
      return;
    }
  }
};
</script>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/Logo_192.png">
    <title>Business Permit</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/barangay_documents.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    
</head>
<body style = "background-color:#e4e6eb;">
<div w3-include-html="navbar.php"></div>
<script>
includeHTML();
</script>
<center>
    <div class="container" style="padding-top: 108px !important; ">
        <div id="content" class="content p-0">
            <div class="profile-header">
                <div class="profile-header-cover"></div>
        <div class="column" style ="margin-top: 5px; display:inline-block">
                </div>
                <div class = "column" style="border:solid; padding: 1%">
                <h1 style="text-align:left">Business Permit</h1>
                    <h4>Barangay Business Clearance is one of the permits or documents required when registering a new business in the Philippines. This certificate is also needed when renewing your expired Mayor’s Permit or Business License, changing a new business location, and changing a new business commercial name.</h4>
                </div>
            </div><br>
            <div class="profile-container" style=" margin: auto;background-color: #659DBD;padding:30px;border-radius:10px;">
            <label id="tab" for="#holder">Business Permit Application</label>
                <div class="row row-space-20">
                    <div class="col-md-12">
                    <div class="tab-content p-0">
                    <form action = "API/API_barangay_document.php" method="POST" enctype='multipart/form-data'>
                            <div class="tab-pane active show" id="profile-about" style="text-align: left">
                            <div style="font-style:italic;"><h5>*Some important information are gathered from the personal information of the user*</h5></div>
                            <label for="reason">Business Name<span>*</span></label>
                            <input  style = "  margin-bottom: 10px" name="doc_Businessname" class="form-control" id="doc_Businessname" minlength="4" required placeholder="Enter Business Name" >  
                            <label for="reason">Business Location<span>*</span></label>
                            <input  style = "  margin-bottom: 10px" name="doc_Businessloc" class="form-control" id="doc_Businessloc" minlength="4" required placeholder="Business Location">  
                            <label for="reason">ID presented<span>*</span></label>
                            <select style = " border-radius: 5px;" id="reason" name="doc_IDpres" required style="overflow: auto;">
                                <option value="Passport">Passport</option>
                                <option value="Driver's License">Driver's License</option>
                                <option value="UMID">UMID</option>
                                <option value="DSWD">DSWD</option>
                                <option value="PhilHealth ID">PhilHealth ID</option>
                                <option value="TIN ID">TIN ID/option>
                                <option value="Postal ID ">Postal ID</option>
                                <option value="PRC ID">PRC ID</option>
                                <option value="OFW ID">OFW ID</option>
                                <option value="National ID">National ID</option>
                                <option value="Student ID">Student ID</option>
                                <option value="Others">Others</option>
                            </select>
                            <label for="Valid_ID1">Upload ID<span>*</span></label>
                            <input style= "width: 100%; border: 1px solid #ccc;"type="file" id="doc_UploadedID" name="doc_UploadedID" required />
                            <label for="reason">Email Address<span>*</span></label>
                            <input  style = "  margin-bottom: 10px" name="doc_Email" class="form-control" id="doc_Email" minlength="4" required placeholder="Enter Email Address">
                            <label for="reason">Contact Number<span>*</span></label>
                            <input  style = "  margin-bottom: 10px" name="doc_Contact" class="form-control" id="doc_Contact" minlength="4" required placeholder="Enter Contact Number">
                            </div><hr>
                            <div>
                            <h3  style = "font-weight: bold;">Convenience Fee Payment Method (<span style="color:white">₱<?php echo $price ?> PESOS ONLY</span>)</h3>
                            </div>
                            <div id = "qrPicture">
                                <?php echo $paymentPic ?>
                            </div>
                            <div style = "text-align:left; margin-top:40px">
                            <label for="doc_Cedulacpy">Proof of Payment<span>*</span></label>
                            <input style= "width: 100%; border: 1px solid #ccc;"type="file" id="doc_Payment" name="doc_Payment" required />
                            </div>
                            <div style = "text-align:left;">
                            <label for="reason" >Issue of paper will be send through:<span>*</span></label>
                            <select style = " border-radius: 5px;" id="reason" name="doc_DeliverType" required style="overflow: auto;">
                            <option value="Home">To Home Address</option>
                                <option value="Email">Registered Email Address</option>
                            </select>
                            </div>
                            <div style="font-style:italic; margin-top:100px;"><h4>*By clicking Submit, I certify that the information provided is true, correct and complete to the best of my belief.*</h4></div>
                            <input class="btn btn-success" type="submit" name="submit_Bus_permit" id="submit_Bus_permit" value="Submit" style="margin-top:100px; padding:10px"/>
                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>     
        </div>
</center>
</body>
</html>