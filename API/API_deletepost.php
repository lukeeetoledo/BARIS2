<?php
require_once('SYSTEM_config.php');

if(isset($_GET['token'])){
  $ID=$_GET['token'];
  $sql="DELETE FROM barangay_post_tbl WHERE post_ID = '$ID';
         DELETE FROM barangay_post_media WHERE post_ID ='$ID';";
  $result = mysqli_multi_query($conn, $sql);
  if($result){
      echo '<script>alert("Post Deleted!"); window.location.href="../barangay_Viewpost.php";</script>';
  }else{
      echo $conn->error;//getting the error
  }
}
else{
    echo '<script>alert("Post Deleted!"); window.location.href="../barangay_Viewpost.php";</script>';
   

}

?>