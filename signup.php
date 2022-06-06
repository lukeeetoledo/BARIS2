<?php include 'API/API_region.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Signup</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/Logo_192.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="CSS/signup.css">
</head>

<body>
<a href="index.php" style="margin: 25px;color:white;border:solid 3px white;padding:10px;background-color:#bd8565">Back</a>
    <div class="container" style="margin-top: 25px;">
        <form action="API/API_signup.php" method="POST">
            <div class="form-content">
                <center>
                <div class="title"> Account Registration</div>
                </center>
                <div class="user-details">
                    <div class="input-box">
                        <p style="float:right"><span style="color:red;">*</span> - required</p>
                        <span class="details">First Name<span style="color:red">*</span></span>
                        <input type="text" name="txt_Fname" placeholder="Enter your first name" pattern="[a-zA-Z\s]{1,}" minlength="1" required>
                        <span class="details">Last Name<span style="color:red">*</span></span>
                        <input type="text" name="txt_Lname" placeholder="Enter your last name"  pattern="[a-zA-Z\s]{1,}" minlength="3" required>
                        <span class="details">Middle Name</span>
                        <input type="text" name="txt_Mname" pattern="[a-zA-Z\s]{1,}" minlength="3" placeholder="Enter your middle name">


                        <div class="form-wrapper" >
                            <select name="txt_Suffix" class="civilstatus">
                                <option disabled selected>Suffix</option>
                                <option value="Jr.">Jr.</option>
                                <option value="Sr.">Sr.</option>
                                <option value="II">II</option>
                                <option value="III">III</option>
                            </select>
                        </div>
                        <div class="form-wrapper" required >
                            <select name="txt_Civilstatus" class="civilstatus">
                                <option disabled selected>Civil Status</option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Divorced">Divorced</option>
                                <option value="Widowed">Widowed</option>
                            </select>
                        </div>
                        <div class="form-wrapper" required>
                    <select name="txt_Gender" class="civilstatus">
                                <option disabled selected>Sex</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                    </select>
                        </div></br>
                        <span class="details">Religion<span style="color:red">*</span></span>
                        <input type="text" name="txt_Religion" placeholder="Enter your religion" minlength="2" pattern="[a-zA-Z\s]{1,}" required>
                    </div>

                    <section class="container">
                            <label for="date">Birthdate<span style="color:red">*</span></label>
                                <div class="input-group date" id="datepicker">
                                    <input type="date" name="txt_Birthdate" class="form-control" max="<?php echo date("Y-m-d", strtotime("-18 years")) ?>" style="width:80%" required>
                                </div>
                    </section>
                    <div class="input-box">
                        <span class="details">Address<span style="color:red">*</span></span>
                        <!-- REGION -->
                        <?php echo $region_combo_box; ?>
                        <!-- PROVINCE -->
                        <div id="province" class="form-wrapper" required>
                            <select name="txt_Province" class="civilstatus">
                                <option disabled selected>Province</option>
                            </select>
                        </div>
                        <!-- CITYMUNICIPALITY -->
                        <div id="citymun" class="form-wrapper" required>
                            <select name="txt_Citymunicipality" class="civilstatus">
                                <option disabled selected>City/Municipality</option>
                            </select>
                        </div>
                        <!-- BARANGAY -->
                        <div id="barangay" class="form-wrapper" required>
                            <select name="txt_Barangay" class="civilstatus">
                                <option disabled selected>Barangay</option>
                            </select>
                        </div>
                        <br>
                        <div>
                            <span class="details">Block/Lot/Unit #<span style="color:red">*</span></span>
                            <input type="text" name="txt_Block" placeholder="Enter your Block/Lot/Unit #" required>
                        </div>
                        <span class="details">Email<span style="color:red">*</span></span>
                        <input type="email" name="txt_Email" placeholder="Enter your email" required>
                        <span class="details">Contact Number<span style="color:red">*</span></span>
                        <input type="number" name="txt_Contactnumber" placeholder="Enter your phone number" required>
                        <span class="details">Username<span style="color:red">*</span></span>
                        <input type="text" name="txt_Username" placeholder="Enter your username" required>
                        <span class="details">Password<span style="color:red">*</span></span>
                        <input type="password" name="txt_Password" placeholder="Enter your password" required>
                        <span class="details">Confirm Password<span style="color:red">*</span></span>
                        <input type="password" name="txt_Confirmpassword" placeholder="Confirm Password" required>
                    </div>
                </div>
                <div class="button">
                    <input type="submit" value="Register" />
                </div>
            </div>
            <div>
                <p class="text-center">Already have an account? <a href="login.php">Log In</a></p>
            </div>
    </div>

    </form>
    </div>
</body>
<style>
    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none; 
    margin: 0; 
}
</style>
</html>

<script src="address.js"></script>