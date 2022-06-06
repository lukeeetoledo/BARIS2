<?php include 'API/API_check_token_validity.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Yinka Enoch Adedokun">
	<meta name="description" content="Simple Forgot Password Page Using HTML and CSS">
	<meta name="keywords" content="forgot password page, basic html and css">
	<link rel="icon" href="img/Logo_192.png">
    <link rel="stylesheet" href="CSS/forgotpass.css">
	<title>Change Password</title>
</head>
<body>
<div class="row">
		<h1>Change Password</h1>
		<h6 class="information-text">Enter your new password.</h6>
		<div class="form-group">
			<form action="API/API_reset_password.php?token=<?php echo $_GET['uid']?>" method="POST" enctype='multipart/form-data'>
			<input style="background-color:white;"type="password" name='txt_first_pass' id="user_password" required>
			<p><label for="username">New Password</label></p>
			<input style="background-color:white;"type="password" name='txt_second_pass' id="user_password" required>
			<p><label for="username">Confirm Password</label></p>
			<input type="submit" value="Change Pass"/>
			</form>
		</div>
		<div class="footer">
			<h5>New here? <a href="signup.php">Sign Up.</a></h5>
			<h5>Already have an account? <a href="login.php">Sign In.</a></h5>
		</div>
	</div>
</body>
</html>

