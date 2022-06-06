<?php 
   include 'SYSTEM_config.php';
    session_start();
    if(!isset($_SESSION['barangay_ID']) && !isset($_SESSION['user_ID'])){
        header("location:../index.php");
    }
    $posts_Data = "";
    $barangay_ID = $_SESSION['barangay_ID'];
    $query_Get_posts = "SELECT * FROM  barangay_post_tbl WHERE barangay_ID = '$barangay_ID'";
    $result_Get_posts = mysqli_query($conn,$query_Get_posts);

    if(!mysqli_num_rows($result_Get_posts) > 0){
        $posts_Data = '<h1 style = "text-align: center">No post yet in this barangay.</h1>';
    }
    else{
        $row_Get_posts = mysqli_fetch_assoc($result_Get_posts);
        $posts_Data .= '<div class="card">';
        $posts_Data .= '<h2>'.$row_Get_posts['post_Creator'].'</h2>';
        $posts_Data .= '<h2>Post Title: '.$row_Get_posts['post_Title'].'</h2>';
        $posts_Data .= '<h4>Post ID: '.$row_Get_posts['post_ID'].'</h4>';
        $posts_Data .= '<h6>'.$row_Get_posts['post_Date'].'</h6>';
        $posts_Data .= '<h5>'.$row_Get_posts['post_Text_content'].'</h5>';
        $posts_Data .= '</div>';
    }
?>