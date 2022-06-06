<?php
   require_once('SYSTEM_config.php');
   session_start();
   if(!isset($_SESSION['user_ID']) && !isset($_SESSION['user_Type']) && !isset($_SESSION['barangay_ID'])){
      header("location:../index.php");
  }

   $barangay_ID = $_SESSION['barangay_ID'];
   
   $num_rows = 0;
   if (isset($_POST['page_no'])) {
      $page = $_POST['page_no'];
   }else{
      $page = 0;
   }
   $sql = "SELECT * FROM barangay_complaints_tbl WHERE barangay_ID = '$barangay_ID' AND complaint_Status = '0' ";
   
   $query = $conn->query($sql);
   if ($query->num_rows > 0) {
   $num_rows = mysqli_num_rows($query);
   $output = "";
   $output .= "<tbody>";
   while ($row = $query->fetch_assoc()) {
         
   $output.="<tr>
               <td>{$row["complaint_ID"]}</td>
               <td>{$row["complaint_Reason"]}</td>
               <td><a class = 'btn btn-outline-primary' href='./view_profile.php?token={$row["complainant_ID"]}' target='blank'>{$row["complainant_ID"]}</a></td>
               <td>Respondents</td>
               <td>Actions</td>
               <td>{$row["complaint_Date"]}</td>
               <td><a class='btn btn-danger' href='API/API_delete_complaint.php?token={$row["complaint_ID"]}'  onclick='return checkDelete()'>Delete</td>
             </tr>";
   }
   $output .= "<tbody>";
         
   echo $output;     
   }
?>