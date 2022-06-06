<?php include 'API/API_view_profile.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/Logo_192.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title><?php echo $user_ID; ?></title>
</head>
<body>
<center style="background-color:black">
    <div class="container" style=" padding-top: 108px !important; ">
        <div id="content" class="content p-0">
            <div class="profile-header">
                <div class="profile-header-cover"></div>
        
                <div class="profile-header-content">
                    <div class="profile-header-img">
                        <img class="profilepic"src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Profile_image" style="background-color: white;"/>
                    </div>
        
                    <div class="profile-header-info">
                        <h4 class="m-t-sm" style="color: white;"><?php echo $full_Name ?></h4>
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
                                                    <b><?php echo $f_Name ?></b> <br/>  
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
                                                <b><?php echo $c_number ?></b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="field">Email</td>
                                            <td class="value" style="text-align: right;">
                                                <b><?php echo $email ?></b>
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
</body>
</html>