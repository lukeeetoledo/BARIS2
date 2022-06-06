<?php 
session_start();
session_unset();

if (!isset($_SESSION["user_ID"])) {
    if(isset($_COOKIE['BaRIS_UNEM'])){
        unset($_COOKIE['BaRIS_UNEM']);
    setcookie('BaRIS_UNEM', '', time() - 3600, '/');
    unset($_COOKIE['BaRIS_PSH']);
    setcookie('BaRIS_PSH', '', time() - 3600, '/');
    }
    header("Location: ../index.php");
}
?>