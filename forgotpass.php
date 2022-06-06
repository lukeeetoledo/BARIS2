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
	<title>Send Request</title>
</head>

<body>
	<div class="row">
		<h1>Forgot Password</h1>
		<h6 class="information-text">Enter your registered email to reset your password.</h6>
		<div class="form-group">
			<form action="API/API_request_forgot_password.php" method="POST">
			<input type="text" name="txt_email_cnumber" id="user_email"/>
			<p><label for="user_email">Email/Contact Number</label></p>
			<input type="submit" value="Send Reset Request"/>
			</form>
			
		</div>
		<div class="footer">
			<h5>New here? <a href="signup.php">Sign Up.</a></h5>
			<h5>Already have an account? <a href="login.php">Sign In.</a></h5>
		</div>
	</div>
</body>

</html>
