<?php 
      session_start();
      if(!isset($_SESSION['user_ID']) && !isset($_SESSION['user_Type']) && !isset($_SESSION['barangay_ID'])){
      header("location:index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" href="img/Logo_192.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="CSS/barangayside.css" />
    <link rel="stylesheet" href="CSS/loading.css" />
    <title>Create Post</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <center>
        <div id="sidebar-wrapper" style="background-color: #bd8565;">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold border-bottom" style="color: #659DBD;"><img src="img/Logo_192.png" alt="BaRIS_Logo" width="60" height="60"><span style="text-shadow: 1px 1px 2px rgba(0, 0,0, 1)">BaRIS</span> </div>
            <div class="list-group list-group-flush my-3" >
            <button class="btn btn-success" onclick="window.location.href='homepage_loader.php';" style="margin-left: 10px; margin-right: 10px;">Switch to Resident</button><br>
            <button class="btn btn-dark" onclick="window.location.href='API/API_logout.php';" style="margin-left: 10px; margin-right: 10px;">Log Out</button><hr>
            <div id="dashboard"> <a href="barangay_Dashboard.php" class="list-group-item list-group-item-action bg-transparent second-text active" style="display:flex; color:white; justify-content:center">Dashboard</a></div>
                <div id="dashboard"> <a href="barangay_CreatePost.php" class="list-group-item list-group-item-action bg-transparent second-text active" style="display:flex; color:white; justify-content:center">Create Post</a></div>
                <div id="dashboard"> <a href="barangay_Viewpost.php" class="list-group-item list-group-item-action bg-transparent second-text active" style="display:flex; color:white; justify-content:center"></i>Viewpost</a></div>
                <div id="dashboard"> <a href="barangay_List.php" class="list-group-item list-group-item-action bg-transparent second-text active" style="display:flex; color:white; justify-content:center">Resident List</a></div>
                <div id="dashboard"> <a href="barangay_Account_list.php" class="list-group-item list-group-item-action bg-transparent second-text active" style="display:flex; color:white; justify-content:center">Account List</a></div>
                <div id="dashboard"> <a href="barangay_Services.php" class="list-group-item list-group-item-action bg-transparent second-text active" style="display:flex; color:white; justify-content:center">Services</a></div>
                <div id="dashboard"> <a href="barangay_Permit.php" class="list-group-item list-group-item-action bg-transparent second-text active" style="display:flex; color:white; justify-content:center">Documents</a></div>
                <div id="dashboard"> <a href="barangay_Permit_request.php" class="list-group-item list-group-item-action bg-transparent second-text active" style="display:flex; color:white; justify-content:center">Document Requests</a></div>
                <div id="dashboard"> <a href="barangay_Reports.php" class="list-group-item list-group-item-action bg-transparent second-text active" style="display:flex; color:white; justify-content:center">Reports</a></div>
                <div id="dashboard"> <a href="barangay_History.php" class="list-group-item list-group-item-action bg-transparent second-text active" style="display:flex; color:white; justify-content:center">History</a></div>
                <div id="dashboard"> <a href="barangay_settings.php" class="list-group-item list-group-item-action bg-transparent second-text active" style="display:flex; color:white; justify-content:center">Settings</a></div>
            </div>
        </div>
        </center>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Dashboard</h2>
                </div>
            </nav>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="container" style="border:solid;">
                <div class="row">
                <div style="margin-bottom: 15px; padding: 10px;background-color:#bd8565;font-weight: bold;"><h1>Create Post</h1>
                    </div>    
                        <form action="API/API_create_post.php" method="POST" enctype='multipart/form-data'>
                            <div class="form-group">
                                <label for="Type">Type</label>
                                <select name="txt_Type" id="type">
                                    <option value="Annoucement" required>Announcement</option>
                                </select>
                            </div>
                            <div class="form-group">
                            <textarea rows = 1; name="txt_Title" type="text" class="form-control" id="title" minlength="4" maxlength="36" required placeholder="Title"></textarea>
                            <div id="text_area1_remain">36 Characters Remaining</div>    
                            </div>
                            
                            <div class="form-group">
                                <textarea  rows="5" class="form-control" name="txt_Text_Content" id="description" minlength="4" maxlength="325" required placeholder="Description"></textarea>
                                <div id="text_area2_remain">325 Characters Remaining</div>
                            </div>
                           

                            <script>
                                const myTitle = document.getElementById('title');
                                const remainingChars1 = document.getElementById('text_area1_remain');
                                const MAX_CHARS1 = 36;

                                const myTextArea = document.getElementById('description');
                                const remainingChars2 = document.getElementById('text_area2_remain');
                                const MAX_CHARS2 = 325;

                                myTitle.addEventListener('input', () => {
                                    const remaining = MAX_CHARS1 - myTitle.value.length;
                                    const color = remaining < MAX_CHARS1 * 0.1 ? 'red' : null;
                                    remainingChars1.textContent = `${remaining} Characters Remaining`;
                                    remainingChars1.style.color = color;
                                });
                                myTextArea.addEventListener('input', () => {
                                    const remaining = MAX_CHARS2 - myTextArea.value.length;
                                    const color = remaining < MAX_CHARS2 * 0.1 ? 'red' : null;
                                    remainingChars2.textContent = `${remaining} Characters Remaining`;
                                    remainingChars2.style.color = color;
                                });
                            </script>

                            Select image to upload:
                            <input type="file" name="txt_Image[]" id="txt_Image" enctype='multipart/form-data' multiple/>
                            <div class="form-group">
                                <button style = "width: 100%; margin-top:10px" type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    <!-- /#page-content-wrapper -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function() {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>