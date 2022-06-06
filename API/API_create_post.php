<?php 
include 'SYSTEM_config.php';
session_start();

if(!isset($_SESSION['user_ID']) && !isset($_SESSION['user_Type']) && !isset($_SESSION['barangay_ID'])){
    header("location:../index.php");
  }
include 'API_insert_history.php';
$barangayID = $_SESSION['barangay_ID'];
$user_ID = $_SESSION['user_ID'];

date_default_timezone_set("Asia/Manila");

if(isset($_POST['txt_Title']) && isset($_POST['txt_Text_Content'])
    && isset($_POST['txt_Type'])){
   $query_getFullName = "SELECT * FROM barangay_users_tbl WHERE user_ID = '$user_ID'";
   $result_getFullName = mysqli_query($conn,$query_getFullName);
   $row = mysqli_fetch_assoc($result_getFullName);

    $post_Creator = $row['user_Fname'] . " " . $row['user_Lname'];
    $post_ID = uniqid('BaRIS-Post_');
    $post_Media_Stats = 0;
    $barangay_ID =  $barangayID;
    $post_Title = mysqli_real_escape_string($conn,$_POST['txt_Title']);
    $post_Text_Content = mysqli_real_escape_string($conn,$_POST['txt_Text_Content']);
    $creator_ID = $user_ID;
    $post_Date = mysqli_real_escape_string($conn, date("Y-m-d  [h:i A]"));
    $post_Type = mysqli_real_escape_string($conn,$_POST['txt_Type']);
    //$txt_Files = $_FILES['txt_Image']['name'][0];
    if(is_uploaded_file($_FILES['txt_Image']['tmp_name'][0])){
        $imageCount = count($_FILES['txt_Image']['name']);
        $post_Media_Stats = 1;
        for($i = 0; $i < $imageCount; $i++){
            $media_ID = uniqid('BaRIS-Media_');
            $imageName = $_FILES['txt_Image']['name'][$i];
            $path = 'saved_files/'.$imageName;
            $sql = "INSERT INTO barangay_post_media (post_ID, media_ID, post_Media) VALUES ('$post_ID','$media_ID','$path')";
            if($conn->query($sql) == TRUE){
               
            }else{
                echo "error";
                echo $conn->error;
            }
            move_uploaded_file($_FILES['txt_Image']['tmp_name'][$i], '../saved_files/' .$imageName);
            //C:\xampp\htdocs\BARIS\saved_files
        }      
    }      
        $query_Insert_post = "INSERT INTO barangay_post_tbl (post_ID, barangay_ID,  post_Title, post_Text_Content, creator_ID, post_Creator, post_Date, post_Type, post_Media_Status) 
        VALUES ('$post_ID','$barangay_ID', '$post_Title', '$post_Text_Content', '$creator_ID', '$post_Creator', '$post_Date', '$post_Type', '$post_Media_Stats')";

         if($conn->query($query_Insert_post) == TRUE){
             $subject = "Post_Creation";
             $holder_Type = "barangay";
             insertEvent($post_Date,$subject,$post_ID,$holder_Type);
           echo '<script>alert("Post Uploaded"); window.location.href="../barangay_Dashboard.php";</script>';
        }else{
            echo $conn->error;
        }
}
?>