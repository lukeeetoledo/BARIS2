<?php 
session_start();

if(isset($_SESSION['admin'])){
    header("location:dashboard.php");
}
?>

<!DOCTYPE html><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color: #659DBD;">
    <center>
        <div style="margin-top:120px; background-color:#bd8565; width:50%;padding:25px;border-radius:20px;border:5px outset #bd8565;">
    <form action="validate.php" method="POST">
        <input type="text" name="txt_admin" id="admin" required/><br>
        <label for="admin">Username</label><br>
        <input type="password" name="txt_pass" id="pass" required/><br>
        <label for="pass">Password</label><br>
        <input type="submit" value="Login">
    </form>
    </div>
    </center>
</body>
</html>