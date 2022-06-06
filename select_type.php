<?php 
      session_start();
      if(!isset($_SESSION['user_ID']) && !isset($_SESSION['user_Type']) && !isset($_SESSION['barangay_ID'])){
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
    <title>Login As </title>
    <link rel="stylesheet" href="CSS/loginAs.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <center>
        <div style="margin-top: 50px;margin-bottom: 50px;"><img src="img/BaRIS_Logo.png" alt="BaRIS_Logo"></div>
        <label style="color: white;">LOG IN AS:</label>
        <div style="margin:auto">
            <button class="btn-1" onclick="window.location.href='homepage_loader.php';">Resident</button>
            <button class="btn-1" onclick="window.location.href='barangay_loader.php';">Barangay Official</button>
        </div>
    </center>
</body>

</html>