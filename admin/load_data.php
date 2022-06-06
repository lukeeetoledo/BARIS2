<?php
   
   // Include the database configuration file
   require_once('SYSTEM_config.php');
   $limit = 5;
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

   $sql = "SELECT * FROM system_brgy_registration_tbl WHERE request_Status = '$filter' LIMIT $page, $limit";
   $query = $conn->query($sql);
   if ($query->num_rows > 0) {
   $num_rows = mysqli_num_rows($query);
   $output = "";
   $output .= "<tbody>";
   while ($row = $query->fetch_assoc()) {
         
   
   $last_id = $row['transac_Count'];
   $output.="<tr>
               <td>{$row["process_ID"]}</td>
               <td><a class = 'btn btn-outline-light' href='../view_profile.php?token={$row["requestor_ID"]}' target='blank'>{$row["requestor_ID"]}</a></td>
               <td>{$row["requestor_Position"]}</td>
               <td>{$row["requestor_Res_Stat"]}</td>
               <td><a class = 'btn btn-outline-light' href='../{$row["valid_ID_1"]}' target = 'blank'>ID#1</a></td>
               <td><a class = 'btn btn-outline-light' href='../{$row["valid_ID_2"]}' target = 'blank'>ID#2</a></td>
               <td><a class = 'btn btn-outline-light' href='../{$row["address_Proof"]}' target = 'blank'>Bill</a></td>
               <td><a class = 'btn btn-outline-light'  href='../{$row["requestor_Image"]}' target = 'blank'>Requestor</a></td>
               <td><a class = 'btn btn-success' href='registration_accept.php?token={$row["requestor_ID"]}&prcs={$row["process_ID"]}&img={$row["requestor_Image"]}' id = 'action' {$display}>Accept</a><a class = 'btn btn-danger' href='registration_reject.php?token={$row["requestor_ID"]}&prcs={$row["process_ID"]}' id = 'action' {$display}>Reject</a></td>
             </tr>";
   }
   $output .= "<tbody>";
         
   $output .= "<tbody id='pagination' style='text-align:left'>
                 <tr>
                <td colspan='9'><button class='btn btn-success loadbtn' data-id='{$last_id}'>Load More</button></td>
             </tr>
              </tbody>";
   $output.=$num_rows;
   echo $output;     
   }else{
      echo '<tbody><tr><td colspan = "8" style="text-align:center;">'.$extra.'<td></tr></tbody>';
   }
?>