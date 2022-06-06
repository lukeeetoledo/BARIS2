<?php 
    include 'SYSTEM_config.php';

  $barangayID = $_SESSION['barangay_ID'];
  $user_ID = $_SESSION['user_ID'];
  $events_list = "";

  $query_Get_events = "SELECT * FROM barangay_history_tbl WHERE barangay_ID = '$barangayID' AND holder_Type = 'barangay' ORDER BY event_Date DESC";
  $result_Get_Events = mysqli_query($conn,$query_Get_events);

  if(mysqli_num_rows($result_Get_Events) > 0){
      while($row = mysqli_fetch_assoc($result_Get_Events)){
          $events_list .= "<tr>
            <td>{$row['event_Content']}</td>
            <td>{$row['event_Subject']}</td>
            <td><a class = 'btn btn-info' href='view_profile.php?token={$row["event_Holder"]}' target='blank'>{$row["event_Holder"]}</a></td>
            <td>{$row['event_Date']}</td>
          </tr>";
      }
  }
?>
