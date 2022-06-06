<?php 
      session_start();
      if(!isset($_SESSION['user_ID']) && !isset($_SESSION['user_Type']) && !isset($_SESSION['barangay_ID']) || $_SESSION['user_Type'] == "3" || $_SESSION['user_Type'] == "2"){
      header("location:index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/Logo_192.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/barangay_registration.css">
    <title>Barangay Registration</title>
</head>

<body>
    <div>
        <h1>Barangay Registration</h1>
        <form action="API/API_register_barangay.php" method="POST" enctype='multipart/form-data'>
        <label id="Condition">Required[<span>*</span>]</label><br>
            <label for="Brgy_pos">Barangay Position<span>*</span></label>
            <select id="Brgy_pos" name="txt_Brgy_pos">
                <option value="Punong Barangay">Punong Barangay</option>
                <option value="Kagawad[Sanguniang Barangay Member]">Kagawad[Sanguniang Barangay Member]</option>
                <option value="SK Chairperson">SK Chairperson</option>
                <option value="Barangay Secretary">Barangay Secretary</option>
            </select>

            <label for="Res_stats">Residential Status<span>*</span></label>
            <select id="Res_stats" name="txt_Res_stats">
                <option value="Owned">Owned</option>
                <option value="Rental">Rental</option>
            </select>

            <label for="Valid_ID1">Valid ID#1<span>*</span></label>
            <input type="file" id="Valid_ID1" name="txt_Valid_ID1" required />

            <label for="Valid_ID2">Valid ID#2<span>*</span></label>
            <input type="file" id="Valid_ID2" name="txt_Valid_ID2" required />

            <label for="PoB">Proof of Billing<span>*</span></label>
            <input type="file" id="PoB" name="txt_PoB" required />

            <label for="Self_Portrait">Self Portrait<span>* <small>[Preferably 1x1 picture] [Will be use as profile picture.]</small></span></label>
            <input type="file" id="Self_Portrait" name="txt_Self_Portrait" required />

            <input type="submit" name="submit" value="Submit">
            <button class="btn btn-warning" onclick="window.location.href='user_profile.php'" style="width: 100%;">Cancel</button>
        </form>
    </div>
    <p>© 2022 Barangay and Residents' Information System</p>
</body>

</html>