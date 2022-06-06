<?php 
include 'API/API_user_profile.php';
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
    <title>Documents</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/services_complain.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="CSS/documentpage.css">
    
</head>
<body style = "background-color:#e4e6eb;">
<div w3-include-html="navbar.php"></div>
<script>
includeHTML();
</script>
    <div class="container" style="padding-top: 108px; align-items:center">
            <div class="profile-header">
                <div class="profile-container" style = "margin-top:10px;width:100%;">
                    <img src="./img/documents.JPG" alt="" style = "border:solid;width:100%;max-width:720px"> <br><hr>
                   
                    <select name="format" style = "text-align-last:center; width: 100%; font-size:large" onchange="javascript:handleSelect(this)">
                      <option disabled selected class = "lt">Choose Document</option><hr style="background-color: black">
                      <option class = "lt" value="user_barangaycertificate"><a href="user_barangaycertificate.php">Barangay Certificate</a></option>
                      <option class = "lt"value="user_barangayclearance"><a href="user_barangayclearance.php">Barangay Clearance</a></option>
                      <option class = "lt"value="user_certificateindingency"><a href="user_certificateindingency.php">Certificate of Indigency</a></option>
                      <option class = "lt"value="user_businesspermit"><a href="user_businesspermit.php">Business Permit</a></option>
                      <option class = "lt"value="user_cedula"><a href="user_cedula.php">Cedula</a></option>
                    </select>
                </div>
        </div>     
    </div>

</body>
</html>
<script type="text/javascript">
    $(function() {
        $('#datepicker').datepicker();
    });
</script> 
<script type="text/javascript">
  function handleSelect(elm)
  {
     window.location = elm.value+".php";
  }
</script>