<?php 
include 'SYSTEM_config.php';
session_start();


if(isset($_POST['txt_Username']) && isset($_POST['txt_Password']) || isset($_COOKIE['BaRIS_UNEM'])){
    $user_Name = "";
    $user_Email = "";
    $user_Password = "";
    if(isset($_COOKIE['BaRIS_UNEM'])){
        $user_Name =  rawurldecode($_COOKIE['BaRIS_UNEM']);
        $user_Email = rawurldecode($_COOKIE['BaRIS_UNEM']);
        $user_Password = rawurldecode($_COOKIE['BaRIS_PSH']);
    }else{
        $user_Name = mysqli_real_escape_string($conn, $_POST['txt_Username']);
        $user_Email = mysqli_real_escape_string($conn, $_POST['txt_Username']);
        $user_Password = mysqli_real_escape_string($conn, md5($_POST['txt_Password']));
    }
    

    if(filter_var($user_Email, FILTER_VALIDATE_EMAIL)) {
        $query_Check_user = "SELECT * FROM system_accounts_tbl WHERE account_Email = '$user_Email' AND account_Password = '$user_Password'";
        $result_Check_user = mysqli_query($conn, $query_Check_user);

    if(mysqli_num_rows($result_Check_user) > 0){
        $row_Select_userID = mysqli_fetch_assoc($result_Check_user);
        $user_Type = $row_Select_userID['account_Type'];
        $_SESSION["user_Type"] = $user_Type;
        $_SESSION["user_ID"] = $row_Select_userID['user_ID'];
        $user_ID = $_SESSION['user_ID'];
        $query_Get_barangay = "SELECT * FROM barangay_users_tbl WHERE user_ID = '$user_ID'";
        $result_Get_barangay = mysqli_query($conn,$query_Get_barangay);
        $row_Select_barangay = mysqli_fetch_assoc($result_Get_barangay);
        $_SESSION['barangay_ID'] = $row_Select_barangay['user_Barangay'];
        if(isset($_POST['chkbx_SL'])){
            $email = mysqli_real_escape_string($conn, $user_Email);
            setcookie("BaRIS_UNEM", $email, time() + (86400 * 30), "/");
            setcookie("BaRIS_PSH", $user_Password, time() + (86400 * 30), "/");
        }else{
            if(isset($_COOKIE["BaRIS_UNEM"])){
                setcookie("BaRIS_UNEM", "");
            }
            if(isset($_COOKIE["BaRIS_PSH"])){
                setcookie("BaRIS_PSH", "");
            }
        }
        if($user_Type == "3"){
            header("Location: ../select_type.php");
        }else{
            header("Location: ../homepage.php");
        }
    }else{
            echo "<script>
                      window.location = '../login.php';
                      alert('Email/Username/Password are incorrect.');
                  </script>";
    }
    }
    else {
        $query_Check_user = "SELECT * FROM system_accounts_tbl WHERE account_Username = '$user_Name' AND account_Password = '$user_Password'";
        $result_Check_user = mysqli_query($conn, $query_Check_user);

        if (mysqli_num_rows($result_Check_user) > 0) {
            $row_Select_userID = mysqli_fetch_assoc($result_Check_user);
            $user_Type = $row_Select_userID['account_Type'];
            $_SESSION["user_Type"] = $user_Type;
            $_SESSION["user_ID"] = $row_Select_userID['user_ID'];
            $user_ID = $_SESSION['user_ID'];
            $query_Get_barangay = "SELECT * FROM barangay_users_tbl WHERE user_ID = '$user_ID'";
            $result_Get_barangay = mysqli_query($conn,$query_Get_barangay);
            $row_Select_barangay = mysqli_fetch_assoc($result_Get_barangay);
            $_SESSION['barangay_ID'] = $row_Select_barangay['user_Barangay'];
            if(isset($_POST['chkbx_SL'])){
                setcookie("BaRIS_UNEM", $user_Name, time() + (86400 * 30), "/");
                setcookie("BaRIS_PSH", $user_Password, time() + (86400 * 30), "/");
            }else{
                if(isset($_COOKIE["BaRIS_UNEM"])){
                    setcookie("BaRIS_UNEM", "");
                }
                if(isset($_COOKIE["BaRIS_PSH"])){
                    setcookie("BaRIS_PSH", "");
                }
            }
            if($user_Type == "3"){
                header("Location: ../select_type.php");
            }
            else{
                header("Location: ../homepage.php");
            }
        } else {
            echo "<script>
                      window.location = '../login.php';
                      alert('Email/Username/Password are incorrect.');
                  </script>";
    }
    }
}
?>