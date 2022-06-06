<?php 
include 'SYSTEM_config.php';
    if(isset($_POST['txt_first_pass']) && isset($_POST['txt_second_pass']) &&isset($_GET['token'])){
        $first_Pass = $_POST['txt_first_pass'];
        $second_Pass = $_POST['txt_second_pass'];
        $userID = $_GET['token'];
        if($first_Pass == $second_Pass){
            $new_Password = mysqli_real_escape_string($conn, md5($first_Pass));
            $query_Set_password = "UPDATE system_accounts_tbl SET account_Password = '$new_Password' WHERE user_ID = '$userID'";
            $result_Set_password = mysqli_query($conn,$query_Set_password);
            if($result_Set_password){
                echo "<script>
                      alert('Changed password successfully.');
                      window.location.href='../index.php';
                      </script>";
            }
        }else{
            echo "<script>
            alert('Changed password successfully.');
            window.location.href='../confirmpass.php?token={$userID}';
            </script>";
        } 
    }
?>