<?php 
include 'SYSTEM_config.php';
session_start();
if(isset($_POST['txt_admin']) && isset($_POST['txt_pass'])){
    $admin = $_POST['txt_admin'];
    $pass = $_POST['txt_pass'];

    $query_Validate = "SELECT * FROM system_admin_tbl WHERE BaRIS_admin = '$admin' AND BaRIS_pass = '$pass'";
    $result_Validate = mysqli_query($conn, $query_Validate);

    if(mysqli_num_rows($result_Validate) > 0){
        $_SESSION['admin'] = "validated";
        header("location:index.php");
    }else{
        echo '<script>alert("Wrong username/password."); window.location.href="login.php";</script>';
    }
}

?>