<?php
include 'API/API_user_profile.php';

$verified = "";
$pending = "";
$style_2_3 = "";
$style_4 = "";
$style_0 = "";
if ($user_Type == "3" || $user_Type == "2") {
    $verified = '<a class = "btn btn-primary" href="#" style="font-size: 16px; pointer-events: none; display:inline"> &#10003 Verified</a>';
    $style_2_3 = "display:none;";
} else if ($user_Type == "4") {
    $style_4 = "display:none;";
} else if ($user_Type == "1") {
    $pending = '<a class = "btn btn-warning" href="#" style="font-size: 16px; pointer-events: none; display:inline">⏱ Pending</a>';
    $style_2_3 = "display:none;";
    $style_4 = "display:none;";
} else {
    $style_0 = "display:none;";
}
?>

<!DOCTYPE html>
<html lang="en">
<style>
    ::-webkit-scrollbar {
        width: 10px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #bd8565;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #976a51;
    }

    #pen1,
    #pen2 {
        background-color: transparent;
        background-repeat: no-repeat;
        border: none;
        cursor: pointer;
        overflow: hidden;
        outline: none;
        margin-left: 5px;
    }

    #pentooltip1,
    #pentooltip2 {
        visibility: hidden;
        width: 120px;
        background-color: white;
        color: black;
        text-align: center;
        border-radius: 6px;
        border: solid 3px #659DBD;

        /* Position the tooltip text - see examples below! */
        position: absolute;
        z-index: 1;
    }

    #Cnumber::-webkit-inner-spin-button,
    #Cnumber::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>
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
    <title>User Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


</head>
<body>
    <div w3-include-html="navbar.php"></div>
    <center style="background-color:#e4e6eb;">
        <div class="container" style=" padding-top: 108px !important; ">
            <div id="content" class="content p-0" style="margin-right:3px">
                <div class="profile-header">
                    <div class="profile-header-cover"></div>

                    <div class="profile-header-content"><br>
                        <div class="profile-header-img">
                            <img class="profilepic" src="<?php echo $image ?>" width="250px" height="250px" alt="" style="border: solid 3px black;border-radius:50%" /><br>
                        </div>

                        <div class="profile-header-info"><br>
                            <h4 class="m-t-sm"><?php echo $full_Name ?></h4>
                            <?php echo $verified;
                            echo $pending; ?>
                            <a class='btn btn-success' href="user_verification.php" style='font-size: 16px; <?php echo $style_2_3;
                                                                                                            echo $style_4; ?>'>Verify My Account</a>
                            <a class='btn btn-success' href="barangay_registration.php" style='font-size: 16px; <?php echo $style_2_3;
                                                                                                                echo $style_0; ?>'>Register my Barangay</a>
                            
                        </div>
                    </div>

                    <ul class="profile-header-tab nav nav-tabs">

                        <li class="nav-item"><a href="#profile-about" class="nav-link active show" data-toggle="tab">ABOUT</a></li>

                    </ul>
                </div>

                <div class="profile-container" style=" margin: auto;background-color: #659DBD;padding:30px;border-radius:10px;">
                    <div class="row row-space-20">
                        <div class="col-md-12">
                            <div class="tab-content p-0">
                                <div class="tab-pane active show" id="profile-about">
                                    <table class="table table-profile">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="field">First Name</td>
                                                <td class="value" style="text-align: right;">
                                                    <div class="m-b-5">
                                                        <b><?php echo $f_Name ?></b> <br />
                                                    </div>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="field">Middle Name</td>
                                                <td class="value" style="text-align: right;">
                                                    <div class="m-b-5">
                                                        <b><?php echo $m_Name ?></b>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="field">Last Name</td>
                                                <td class="value" style="text-align: right;">
                                                    <b><?php echo $l_Name ?></b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="field">Suffix</td>
                                                <td class="value" style="text-align: right;">
                                                    <div class="m-b-5">
                                                        <b><?php echo $suffix ?></b> <br />

                                                    </div>

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-profile">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Contact Information</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="field">Mobile Phones</td>
                                                <td class="value" style="text-align: right;">
                                                    <b><input type="number" id="Cnumber" name="txt_Cnumber" value="<?php echo $c_number ?>" style="background-color: #659DBD; border:none" disabled></b>
                                                    <button id="pen1" onclick="updateCnumber('pen1', 'saveCnumber', 'cancelCnumber', 'Cnumber')" onmouseover="document.getElementById('pentooltip1').style.visibility = 'visible'" onmouseout="document.getElementById('pentooltip1').style.visibility = 'hidden'"><span style="font-family: 'Wingdings 2'; color:white">&#33;</span></button>
                                                    <button class="btn btn-success" onclick="saveCnumber('pen1', 'saveCnumber', 'cancelCnumber', 'Cnumber', '<?php echo $c_number ?>')" style="display: none;" id="saveCnumber">Save</button>
                                                    <button class="btn btn-outline-light" onclick="cancelCnumber('pen1', 'saveCnumber', 'cancelCnumber', 'Cnumber', '<?php echo $c_number ?>')" style="display: none;" id="cancelCnumber">Cancel</button>
                                                    <span id="pentooltip1">Edit</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="field">Email</td>
                                                <td class="value" style="text-align: right;">
                                                    <b><input type="email" id="Email" name="txt_Email" value="<?php echo $email ?>" style="background-color: #659DBD; border:none" disabled></b>
                                                    <button id="pen2" onclick="updateEmail('pen2', 'saveEmail', 'cancelEmail', 'Email')" onmouseover="document.getElementById('pentooltip2').style.visibility = 'visible'" onmouseout="document.getElementById('pentooltip2').style.visibility = 'hidden'"><span style="font-family: 'Wingdings 2'; color:white">&#33;</span></button>
                                                    <button class="btn btn-success" onclick="saveEmail('pen2', 'saveEmail', 'cancelEmail', 'Email', '<?php echo $email ?>')" style="display: none;" id="saveEmail">Save</button>
                                                    <button class="btn btn-outline-light" onclick="cancelEmail('pen2', 'saveEmail', 'cancelEmail', 'Email', '<?php echo $email ?>')" style="display: none;" id="cancelEmail">Cancel</button>
                                                    <span id="pentooltip2">Edit</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-profile">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Address</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="field">Region</td>
                                                <td class="value" style="text-align: right;">
                                                    <b><?php echo $region ?></b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="field">Province</td>
                                                <td class="value" style="text-align: right;">
                                                    <b><?php echo $province ?></b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="field">City/Municipality</td>
                                                <td class="value" style="text-align: right;">
                                                    <b><?php echo $city_Mun ?></b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="field">Barangay</td>
                                                <td class="value" style="text-align: right;">
                                                    <b><?php echo $barangay ?></b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="field">Block/Lot/Unit No.</td>
                                                <td class="value" style="text-align: right;">
                                                    <b>Block 71 Lot 22</b>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-profile">
                                        <thead>
                                            <tr>
                                                <th colspan="2">BASIC INFORMATION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="field">Birth of Date</td>
                                                <td class="value" style="text-align: right;">
                                                    <b><?php echo $birthdate ?></b>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="field">Sex</td>
                                                <td class="value" style="text-align: right;">
                                                    <b><?php echo $sex ?></b>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="field">Username</td>
                                                <td class="value" style="text-align: right;">
                                                    <b><?php echo $user_Name ?></b>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </center>
     <script>
        includeHTML();
    </script>
</body>

</html>

<script>
    // CONTACT NUMBER
    function updateCnumber(edit, save, cancel, field) {
        var a = document.getElementById(edit);
        var b = document.getElementById(save);
        var c = document.getElementById(cancel);
        var d = document.getElementById(field);

        a.style.display = "none";
        b.style.display = "inline";
        c.style.display = "inline";
        d.disabled = false;
        d.style = "background-color:white";
    }

    function cancelCnumber(edit, save, cancel, field, defval) {
        var a = document.getElementById(edit);
        var b = document.getElementById(save);
        var c = document.getElementById(cancel);
        var d = document.getElementById(field);

        a.style.display = "inline";
        b.style.display = "none";
        c.style.display = "none";
        d.disabled = true;
        d.style = "background-color:#659DBD;border:none;";
        d.value = defval;
    }

    function saveCnumber(edit, save, cancel, field, defval) {
        var a = document.getElementById(edit);
        var b = document.getElementById(save);
        var c = document.getElementById(cancel);
        var d = document.getElementById(field);
        var dValue = d.value;

        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            if (this.responseText == "0") {
                d.value = dValue;
                a.style.display = "inline";
                b.style.display = "none";
                c.style.display = "none";
                d.disabled = true;
                d.style = "background-color:#659DBD;border:none;";
                alert("Contact Number Updated!");
            } else {
                d.value = defval;
                alert("Contact Number Cannot be Empty!");
            }

        }
        xhttp.open("GET", "API/API_update_contact_info.php?tokenC=" + dValue);
        xhttp.send();
    }
    // EMAIL
    function updateEmail(edit, save, cancel, field) {
        var a = document.getElementById(edit);
        var b = document.getElementById(save);
        var c = document.getElementById(cancel);
        var d = document.getElementById(field);

        a.style.display = "none";
        b.style.display = "inline";
        c.style.display = "inline";
        d.disabled = false;
        d.style = "background-color:white";
    }

    function cancelEmail(edit, save, cancel, field, defval) {
        var a = document.getElementById(edit);
        var b = document.getElementById(save);
        var c = document.getElementById(cancel);
        var d = document.getElementById(field);

        a.style.display = "inline";
        b.style.display = "none";
        c.style.display = "none";
        d.disabled = true;
        d.style = "background-color:#659DBD;border:none;";
        d.value = defval;
    }

    function saveEmail(edit, save, cancel, field, defval) {
        var a = document.getElementById(edit);
        var b = document.getElementById(save);
        var c = document.getElementById(cancel);
        var d = document.getElementById(field);
        var dValue = d.value;

        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            if (this.responseText == "0") {
                d.value = dValue;
                a.style.display = "inline";
                b.style.display = "none";
                c.style.display = "none";
                d.disabled = true;
                d.style = "background-color:#659DBD;border:none;";
                alert("Email Updated!");
            } else {
                d.value = defval;
                alert("Email Cannot be Empty!");
            }

        }
        xhttp.open("GET", "API/API_update_contact_info.php?tokenE=" + dValue);
        xhttp.send();
    }
</script>