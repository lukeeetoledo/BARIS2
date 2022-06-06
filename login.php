<?php 
if(isset($_COOKIE['BaRIS_UNEM']) && isset($_COOKIE['BaRIS_PSH'])){
        header("location:API/API_login.php");
      }
?>

<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <!---<title> Responsive Login Form | CodingLab </title>--->
  <link rel="stylesheet" href="CSS/login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="img/Logo_192.png">
  <title>Log In</title>
</head>

<body>
  <div class="container">
    <form action="API/API_login.php" method="POST">
      <a href="index.php">Back</a>
      <div class="title">Log In</div>
      <div class="input-box underline">
        <input type="text" name="txt_Username" placeholder="Enter Your Email or Username" required>
        <div class="underline"></div>
      </div>
      <div class="input-box">
        <input type="password" name="txt_Password" placeholder="Enter Your Password" required>
        <div class="underline"></div>
      </div>
      <div id="Error"></div>
      <div style="float: right;">
        <label for="chkbx_SL">Stay Logged In</label>
        <input type="checkbox" name="chkbx_SL" id="chkbx_SL">
      </div>

      <div class="input-box button">
        <input type="submit" name="" value="Log In">
      </div>
      <div class="text"><a href="forgotpass.php">Forgot password?</a></div>

      <div class="text sign-up-text">Don't have an account? <a href="signup.php">SignUp Now</a></div>
    </form>
  </div>
</body>

</html>

<script>

</script>