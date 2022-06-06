<?php
   require_once('SYSTEM_config.php');
   session_start();
   if(!isset($_SESSION['user_ID']) && !isset($_SESSION['user_Type']) && !isset($_SESSION['barangay_ID'])){
      header("location:../index.php");
  }

   $barangay_ID = $_SESSION['barangay_ID'];
  
   $num_rows = 0;
   $sql = "SELECT * FROM barangay_blotter_tbl WHERE barangay_ID = '$barangay_ID' ORDER BY date_Resolved DESC";
   
   $query = $conn->query($sql);
   if ($query->num_rows > 0) {
   $num_rows = mysqli_num_rows($query);
   $output = "";
   $output .= "<tbody>";
   while ($row = $query->fetch_assoc()) {
         
   $last_id = $row['blotter_Count'];
   $output.="<tr>
               <td>{$row["blotter_ID"]}</td>
               <td>{$row["complaint_ID"]}</td>
               <td>{$row["complainant_Name"]}</td>
               <td>{$row["respondent_List"]}</td>
               <td>{$row["action_List"]}</td>
               <td>{$row["mediator_Name"]}</td>
               <td>{$row["resolution_List"]}</td>
               <td>{$row["date_Resolved"]}</td>
               <td><a class='btn btn-info' href='#' target='blank'>View</a>
               <a class='btn btn-danger' href='#' target='blank'>Delete</td>
             </tr>";
   }
   $output .= "<tbody>";
   $output.=$num_rows;
   echo $output;     
   }
?>