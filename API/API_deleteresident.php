<?php
require_once('SYSTEM_config.php');

if(isset($_GET['token'])){
  $ID=$_GET['token'];
  $sql="DELETE FROM barangay_profiling_tbl WHERE prof_ID= '$ID';";
  $result = mysqli_multi_query($conn, $sql);
  if($result){
    echo '<script>alert("Resident Deleted!"); window.location.href="../barangay_List.php";</script>';
   
    
  }else{
      echo $conn->error;//getting the error
  }
}
else{
    echo '<script>alert("Resident Deleted!"); window.location.href="../barangay_List.php";</script>';
   

}

?>