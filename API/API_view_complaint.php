<?php 
    include 'SYSTEM_config.php';
    include 'API_int_roman.php';
    date_default_timezone_set("Asia/Manila");
    $official_ID = $_SESSION['user_ID'];
    $complaint_ID = $_GET['token'];
    $complainant = "";
    $respondent = "";
    $action = "";
    $date = mysqli_real_escape_string($conn, date("Y-m-d  [h:i A]"));
    $query_View_complaint = "SELECT * FROM barangay_complaints_tbl WHERE complaint_ID = '$complaint_ID'";
    $result_View_complaint = mysqli_query($conn, $query_View_complaint);

    if(mysqli_num_rows($result_View_complaint) > 0){
        // COMPLAINT_ID
        $rCID_row = mysqli_fetch_assoc($result_View_complaint);
        $complainant = $rCID_row['complainant_ID'];
        // COMPLAINANT NAME
        $result_User_Fullname = mysqli_query($conn,"SELECT * FROM barangay_users_tbl WHERE user_ID = '$complainant'");
        $rUFn = mysqli_fetch_assoc($result_User_Fullname);
        $complainant = $rUFn['user_Lname'] . " " . $rUFn['user_Suffix'] . ", " . $rUFn['user_Fname'] . " " . $rUFn['user_Mname'];
        // MEDIATOR
        $result_Mediator_Fullname = mysqli_query($conn,"SELECT * FROM barangay_users_tbl WHERE user_ID = '$official_ID'");
        $rMFn = mysqli_fetch_assoc($result_Mediator_Fullname);
        $official_ID = $rMFn['user_Lname'] . " " . $rMFn['user_Suffix'] . ", " . $rMFn['user_Fname'] . " " . $rMFn['user_Mname'];
        // GETTING RESPONDENTS AND ACTIONS
        $query_Get_respondents = "SELECT * FROM barangay_complaints_respondent WHERE complaint_ID = '$complaint_ID'";
        $result_Get_respondents = mysqli_query($conn, $query_Get_respondents);
        $query_Get_actions = "SELECT * FROM barangay_complaints_action WHERE complaint_ID = '$complaint_ID'";
        $result_Get_actions = mysqli_query($conn, $query_Get_actions);

        if(mysqli_num_rows($result_Get_actions) > 0 && mysqli_num_rows($result_Get_respondents) > 0){
            $i = 0;
            // RESPONDENT
            while($rGr = mysqli_fetch_assoc($result_Get_respondents)){
                $indiv_respo = $rGr['respondent_ID'];
                $result_Get_Fullname = mysqli_query($conn,"SELECT * FROM barangay_profiling_tbl WHERE prof_ID = '$indiv_respo'");
                $rGFn = mysqli_fetch_assoc($result_Get_Fullname);
                $indiv_FN = $rGFn['prof_Lname'] . ", " . $rGFn['prof_Fname'] . " " . $rGFn['prof_Mname'];
                $i++;
                $respondent .= $i . ". " . $indiv_FN . " | ";
            }
            $i = 0;
            // ACTION
            while($rGa = mysqli_fetch_assoc($result_Get_actions)){
                $solo_action = $rGa['respondent_action'];
                $i++;
                $iCount = numberToRoman($i);
                $action .= "[" . $iCount . ". " . $solo_action . "], ";
            }
        }
    }
    else{
        $complainant = "error";
    }
?>