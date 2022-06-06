<?php
session_start();
if (!isset($_SESSION['user_ID']) && !isset($_SESSION['user_Type']) && !isset($_SESSION['barangay_ID'])) {
  header("location:index.php");
}
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
            if (this.status == 200) {
              elmnt.innerHTML = this.responseText;
            }
            if (this.status == 404) {
              elmnt.innerHTML = "Page not found.";
            }
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="CSS/services_support.css">

  <title>Services</title>
</head>

<body>

  <div w3-include-html="navbar.php"></div>
  <div class="collection">
    <div class="card" id="holder">
      <label id="tab" for="#holder">Request Form</label>
      <form action="API/API_send_request.php" method="POST">
        <label for="agenda">Agenda:<span>*</span></label>
        <select id="agenda" name="txt_Agenda" required style="overflow: auto;">
          <option value="Borrowing of Instruments/Materials">Borrowing of Instruments/Materials</option>
          <option value="Scheduling/Reservation">Scheduling/Reservation</option>
          <option value="Repair and Maintenance">Repair and Maintenance</option>
          <option value="Waste Management">Waste Management</option>
          <option value="Patrolling">Patrolling</option>
          <option value="Peace and Order">Peace and Order</option>
          <option value="Other">Other</option>
        </select>
        <label for="agenda_date">Date of Agenda<span>*</span></label>
        <input type="date" id="agenda_date" name = "txt_Agenda_Date" min="<?php echo date("Y-m-d"); ?>" required/>
        <label for="agenda_return">Due of Agenda<span>*</span></label>
        <input type="date" id="agenda_date" name = "txt_Agenda_Due" min="<?php echo date("Y-m-d"); ?>" required/>
        <label for="agenda_message">Message<span>*</span></label><br>
        <textarea name="txt_message" id="agenda_message" rows="5"></textarea>
        <input class="btn btn-success" type="submit" name="submit" id="submit" value="Submit" onclick="" style="margin-top:50px; padding:10px" />
      </form>
    </div>
  </div>

  <script>
    includeHTML();
  </script>

</body>

</html>

