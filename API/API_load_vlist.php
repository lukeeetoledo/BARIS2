<?php
   // Include the database configuration file
   session_start();
   require_once('SYSTEM_config.php');
   if(!isset($_SESSION['user_ID']) && !isset($_SESSION['user_Type']) && !isset($_SESSION['barangay_ID'])){
      header("location:../index.php");
  }
  $barangayID = $_SESSION['barangay_ID'];
  $user_ID = $_SESSION['user_ID'];
  
  
   $num_rows = "";
   $filter = "";
   $page = 0;
   $extra = "That is all.";

   if (isset($_POST['page_no'])) {
      $page = $_POST['page_no'];
   }else if(isset($_POST['filter'])){
      $filter = $_POST['filter'];
      if($filter == 1 || $filter == 2){
         $extra = "No Approved/Rejected request.";
         $display = "style='display:none'";
      }else{
            $extra = "No Pending request.";
         $display = "";
      }
   }

   $sql = "SELECT * FROM barangay_verification_tbl WHERE request_Status = '$filter' AND barangay_ID = '$barangayID'";
   $query = $conn->query($sql);
   if ($query->num_rows > 0) {
   $output = "";
   $output .= "<tbody>";
   while ($row = $query->fetch_assoc()) {
   $last_id = $row['transac_Count'];

   $output.="<tr>
               <td>{$row["process_ID"]}</td>
               <td><a class = 'btn btn-outline-dark' href='view_profile.php?token={$row["requestor_ID"]}' target='blank'>{$row["requestor_ID"]}</a></td>
               <td>{$row["requestor_Res_Stat"]}</td>
               <td><a class = 'btn btn-outline-dark' href='{$row["valid_ID_1"]}' target = 'blank'>ID#1</a></td>
               <td><a class = 'btn btn-outline-dark' href='{$row["valid_ID_2"]}' target = 'blank'>ID#2</a></td>
               <td><a class = 'btn btn-outline-dark' href='{$row["address_Proof"]}' target = 'blank'>Bill</a></td>
               <td><a class = 'btn btn-outline-dark'  href='{$row["requestor_Image"]}' target = 'blank'>Requestor</a></td>
               <td><a class = 'btn btn-success' href='API/API_verification_accept.php?token={$row["requestor_ID"]}&prcs={$row["process_ID"]}&img={$row["requestor_Image"]}' id = 'action' {$display}>Accept</a><a class = 'btn btn-danger' href='API/API_verification_reject.php?token={$row["requestor_ID"]}&prcs={$row["process_ID"]}' id = 'action' {$display}>Reject</a></td>
             </tr>";
   }
   $output .= "<tbody>";
         
//   $output .= "<tbody id='pagination' style='text-align:left'>
//                  <tr>
//                 <td colspan='8'><button class='btn btn-success loadbtn' data-id='{$last_id}'>Load More</button></td>
//              </tr>
//               </tbody>";
   echo $output;     
   }else{
      echo '<tbody><center>
      <tr><td colspan = "7" style="text-align:center;">'.$extra.'<td></tr></center></tbody>';
   }
?>