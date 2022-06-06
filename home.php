<?php 
    if(isset($_COOKIE['BaRIS_UNEM']) && isset($_COOKIE['BaRIS_PSH'])){
        header("location:API/API_login.php");
      }
    else if(isset($_SESSION['user_ID']) && isset($_SESSION['user_Type']) && isset($_SESSION['barangay_ID']) ){
        header("location:homepage.php");
      }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#121212">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/Logo_192.png">
    <link rel="apple-touch-icon" href="img/Logo_192.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="CSS/landing.css">
    <link rel="manifest" href="manifest.json">
    <title>BaRIS</title>
</head>

<body>
    <a href="#" id="go_UP"><img src="img/up-arrow.png" alt="go_UP"></a>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <img src="img/BaRIS_Logo.png" class="logo" alt="BaRIS_Logo">
        <ul>
            <li><a class="active" href="#landing">Home</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#how_to-s">How To's</a></li>
            <li><a href="#dev_team">About Us</a></li>
            <li><a href="#documentation">Documentation</a></li>
            <li><a href="login.php" id="login">Log In</a></li>
            <li><a href="signup.php" id="register">Register</a></li>
        </ul>
    </nav>
    <!-- MAIN -->
    <div class="main">
        <!-- LANDING -->
        <section id="landing">
            <div>
                <h1>Barangay and Resident's Information System</h1><br>
                <p>Keeping Barangay records is a one way to easily track resident's information.
                BARIS is capable in recording this bulk information and can be stored in a long period of time. 
                This system can meet strategic objectives for reducing paper consumption and reducing time consuming file retrieval from bulky documents. 
                BARIS can also track residents record such as personal to family information, complaints to amicable settlement information and can create daily reports for the barangay. 
                It is a control system that manages the process industrial workspace. It reduces human error and processing time, thus it can boost productivity and result into high quality of product produce</p>
            </div>
        </section>

        <section id="services">
            <div id="srvcs_head">
                <h1>Services</h1><br>
                <p>In the extent of implementation of the basic services and facilities in the barangay
                    as mandated in Section 17 of the Local Government Code of 1991, the indicators
                    were as follows: Agricultural Support Services, Health and Social Welfare
                    Services, Services and Facilities Related to General Hygiene and Sanitation,
                    Beautification and Solid Waste Collection, Maintenance of the Katarungang
                    Pambarangay, Maintenance of the Barangay Roads and Bridges and Water Supply
                    System, Infrastructure Facilities, Information and Reading Center, and Satellite or
                    Public Market.</p>
            </div>
            <div class="flip-card" id="card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <img src="img/lock.png" alt="Security">
                        <h1>SECURITY</h1>
                    </div>
                    <div class="flip-card-back">
                        <p>BARIS helps Barangay Information to be secured with the use of auto-backup database and system user level security preventing unauthorized personnel to access the information</p>
                    </div>
                </div>
            </div>
            <div class="flip-card" id="card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <img src="img/process.png" alt="Security">
                        <h1>ONLINE PROCESS</h1>
                    </div>
                    <div class="flip-card-back">
                        <p>Online processing of documents is also the main features of the system. You can get a documents such as barangay clearance, business permit or cedula by providing a corresponding requirements</p>
                    </div>
                </div>
            </div>
            <div class="flip-card" id="card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <img src="img/inventory.png" alt="Security">
                        <h1>AUTOMATED INVENTORY</h1>
                    </div>
                    <div class="flip-card-back">
                        <p>The System facilitates automated property inventory of the Barangay that can track location, cost, acquisition date and condition of the property. The system can speedily generate inventory with accuracy</p>
                    </div>
                </div>
            </div>
            <div class="flip-card" id="card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <img src="img/monitor.png" alt="Security">
                        <h1>MONITORING</h1>
                    </div>
                    <div class="flip-card-back">
                        <p>The ability of BARIS to monitor Residents Information and Business information status is an essential
                            feature that may help Barangay Officials in decision making to formulate solutions, corresponding recommendations and appropriate positive actions</p>
                    </div>
                </div>
            </div>
            <div class="flip-card" id="card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <img src="img/administrative.png" alt="Security">
                        <h1>ADMININSTRATIVE CONVINIENCE</h1>
                    </div>
                    <div class="flip-card-back">
                        <p>The system facilitates the speedy processing of data which help employees increase their productivity and allows other important tasks to be devoted to rather than spending their time in manual manipulations of record that is time consuming</p>
                    </div>
                </div>
            </div>
            <div class="flip-card" id="card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <img src="img/communication.png" alt="Security">
                        <h1>COMMUNICATION</h1>
                    </div>
                    <div class="flip-card-back">
                        <p>The system helps its users to have a convinient way of communication where user can easily share announcements, events and pictures so that every user will always be updated.</p>
                    </div>
                </div>
            </div>
        </section>
        <section id="how_to-s">
            <div id="srvcs_head">
                <h1>How To's</h1><br>
                <p>Providing step by step procedure for some features of the system which can help the user to adapt faster so they can maximize the benefits of using the website. Below are the videos that which you can watch to help you understand and follow [Barangay Registration, Installing Progressive Web Application on devices, etc.].</p>
            </div><br>
            <center>
                <div class="vid_HTs" id="PWA">
                    <video controls>
                        <source src="saved_files/demo/DEMO_BARANGAY_OFFICIAL.mp4" type="video/mp4">
                        Our website does not support this type of file.
                        Try [mp4,mkv].
                    </video><br>
                    <label for="PWA">VID_001: User - Barangay Official</label>
                </div>
                <div class="vid_HTs" id="PWA">
                    <video controls>
                        <source src="saved_files/demo/DEMO_BARANGAY_RESIDENT.mp4" type="video/mp4">
                        Our website does not support this type of file.
                        Try [mp4,mkv].
                    </video><br>
                    <label for="PWA">VID_002: User - Barangay Resident</label>
                </div>
            </center>
        </section>
        <section id="dev_team">
            <div id="srvcs_head">
                <h1>Development Team</h1><br>
                <p>Students at Technological University of the Philippines - Manila S.Y. 2021-2022 taking Bachelor of Science in Information Technology. The development of this website is one of the final requirement for them to be qualified for graduation. </p>
            </div><br>
            <center>
            <div id="team_card">
                <div class="team-member card-effect">
                    <img src="img/marvin.jpg" alt="">
                    <h5 class="mb-0 mt-4">Jaudian, Marvin</h5>
                    <p>Front-End Developer</p>
                    <i class='bx bxl-gmail'>
                        <p>jaudianmarvin01@gmail.com</p>
                    </i>

                    <div class="social-icons">
                        <a href="https://web.facebook.com/JaudianMarvin/"><i class='bx bxl-facebook'></i></a>
                        <a href="https://www.linkedin.com/in/marvin-jaudian-246329203/"><i class='bx bxl-linkedin'></i></a>
                        <a href="https://github.com/jaudianmarvin?fbclid=IwAR1AzSTOB0XwaaZ2wB3XiwuL1cR1zns9DAKSyfKIY0gPlq4AwCxZDZHRexA"><i class='bx bxl-github'></i></a>
                    </div>
                </div>
            </div>
            <div id="team_card">
                <div class="team-member card-effect">
                    <img src="img/jawo.png" alt="">
                    <h5 class="mb-0 mt-4">Manzon, Eduard</h5>
                    <p>Front-End Developer</p>
                    <i class='bx bxl-gmail'>
                        <p>manzonjohneduard@gmail.com</p>
                    </i>
                    <div class="social-icons">
                        <a href="https://web.facebook.com/jawo.jawo.jawo/"><i class='bx bxl-facebook'></i></a>
                        <a href="https://www.linkedin.com/in/johnmanzon/"><i class='bx bxl-linkedin'></i></a>
                        <a href="https://github.com/jawo406"><i class='bx bxl-github'></i></a>
                    </div>
                </div>
            </div>
            <div id="team_card">
                <div class="team-member card-effect">
                    <img src="img/crisjahn.jpg" alt="">
                    <h5 class="mb-0 mt-4">Perez, Crisjahn</h5>
                    <p>Back-End Developer</p>
                    <i class='bx bxl-gmail'>
                        <p>crisjahn.perez09@gmail.com</p>
                    </i>
                    <div class="social-icons">
                        <a href="https://web.facebook.com/crisjahn.perezzzz?_rdc=1&_rdr"><i class='bx bxl-facebook'></i></a>
                        <a href="https://www.linkedin.com/in/crisjahnperez?fbclid=IwAR2x1vGVNjq-zY4GZdU6fwLj1s0YY_Id7AyfBSgDbPn1n38Y0kou0sNWmck"><i class='bx bxl-linkedin'></i></a>
                        <a href="https://github.com/rajyon?fbclid=IwAR3IsH38Td9h97OC36C9aIUtsb7FOeFibOIULaUiKCKxeJO2TjA_5mjbfc0"><i class='bx bxl-github'></i></a>
                    </div>
                </div>
            </div>
            <div id="team_card">
                <div class="team-member card-effect">
                    <img src="img/luke.jpg" alt="">
                    <h5 class="mb-0 mt-4">Toledo, Luke</h5>
                    <p>Back-End Developer</p>
                    <i class='bx bxl-gmail'>
                        <p>luketoledo61@gmail.com</p>
                    </i>
                    <div class="social-icons">
                        <a href="https://web.facebook.com/lukeeetoledo?_rdc=1&_rdr"><i class='bx bxl-facebook'></i></a>
                        <a href="https://www.linkedin.com/in/luke-toledo/?fbclid=IwAR1b4o25BEof62LV6b4Ymht1rAboyQkW247lHSHcB44RUmmRWHXDTrFx-3w"><i class='bx bxl-linkedin'></i></a>
                        <a href="https://github.com/lukeeetoledo?fbclid=IwAR0uTHrxYU_zcbeFPL89H2cY-q1McqoA4ttL0JB9PYwnhrQB6vITN0yYJI4"><i class='bx bxl-github'></i></a>
                    </div>
                </div>
            </div>
            </center>
        </section>
        <section id="documentation">
        <div id="srvcs_head">
                <h1>Documentation</h1><br>
                <p></p>
            </div><br>
            <div id="docu_card">
                <a href="Documents/Chapter 1.pdf" >Chapter 1</a>
                <a href="Documents/Chapter 2.pdf" >Chapter 2</a>
                <a href="Documents/Chapter 3.pdf" >Chapter 3</a>
                <a href="#" >Chapter 4</a>
                <a href="#" >Chapter 5</a>
            </div>
        </section>
    </div>
    <footer>
        <center>
        <p>©2022 Technological University of the Philippines - Manila</p>
        <p>BSIT - 4D represent</p>
        </center>
    </footer>
    <script src="src/index.js"></script>
</body>

</html>