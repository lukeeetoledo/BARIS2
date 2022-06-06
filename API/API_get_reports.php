<?php 
    include 'SYSTEM_config.php';

  $barangayID = $_SESSION['barangay_ID'];
  $user_ID = $_SESSION['user_ID'];
  $report_0 = "";
  $report_1 = "";
  $report_2 = "";
  $report_3 = "";
  $report_4 = "";
  $report_5 = "";

  #ALL
  $query_Get_reports_0 = "SELECT * FROM barangay_reports_tbl WHERE barangay_ID = '$barangayID' ORDER BY report_Date DESC";
  $result_Get_reports_0 = mysqli_query($conn,$query_Get_reports_0);

  if(mysqli_num_rows($result_Get_reports_0) > 0){
      $i = 0;
      while($row = mysqli_fetch_assoc($result_Get_reports_0)){
          $i++;
          $report_0 .= "<tr>
            <td>{$i}</td>
            <td>{$row['report_Type']}</td>
            <td>{$row['PS_Type']}</td>
            <td>{$row['report_TAP']}</td>
            <td>{$row['report_Description']}</td>
            <td>{$row['report_Date']}</td>
            <td>{$row['report_Summary']}</td>
            <td>{$row['PS_Num_Beneficiary']}</td>
            <td>{$row['PS_Type_Beneficiary']}</td>
            <td>{$row['Meet_start_time']}</td>
            <td>{$row['Meet_end_time']}</td>
            <td>{$row['BE_cost']}</td>
            <td>{$row['BE_fund_source']}</td>
            <td>{$row['BE_status']}</td>
            <td>{$row['TS_conducted_by']}</td>
            <td>{$row['TS_sponsored_by']}</td>
          </tr>";
      }
  }
  #Programs/Services
  $query_Get_reports_1 = "SELECT * FROM barangay_reports_tbl WHERE barangay_ID = '$barangayID' AND report_Type = 'Programs-Services' ORDER BY report_Date DESC";
  $result_Get_reports_1 = mysqli_query($conn,$query_Get_reports_1);

  if(mysqli_num_rows($result_Get_reports_1) > 0){
      $i = 0;
      while($row = mysqli_fetch_assoc($result_Get_reports_1)){
          $i++;
          $report_1 .= 
          "<tr>
            <td>{$i}</td>
            <td>{$row['PS_Type']}</td>
            <td>{$row['report_TAP']}</td>
            <td>{$row['report_Description']}</td>
            <td>{$row['report_Date']}</td>
            <td>{$row['PS_Num_Beneficiary']}</td>
            <td>{$row['PS_Type_Beneficiary']}</td>
            <td>{$row['report_Summary']}</td>
          </tr>";
      }
  }

    #Meetings
    $query_Get_reports_2 = "SELECT * FROM barangay_reports_tbl WHERE barangay_ID = '$barangayID' AND report_Type = 'Meetings' ORDER BY report_Date DESC";
    $result_Get_reports_2 = mysqli_query($conn,$query_Get_reports_2);
  
    if(mysqli_num_rows($result_Get_reports_2) > 0){
        $i = 0;
        while($row = mysqli_fetch_assoc($result_Get_reports_2)){
            $i++;
            $report_2 .= "<tr>
            <td>{$i}</td>
            <td>{$row['report_TAP']}</td>
            <td>{$row['report_Description']}</td>
            <td>{$row['report_Date']}</td>
            <td>{$row['Meet_start_time']}</td>
            <td>{$row['Meet_end_time']}</td>
            <td>{$row['report_Summary']}</td>
          </tr>";
        }
    }

    #Budget Expenditure
    $query_Get_reports_3 = "SELECT * FROM barangay_reports_tbl WHERE barangay_ID = '$barangayID' AND report_Type = 'Budget-Expenditure' ORDER BY report_Date DESC";
    $result_Get_reports_3 = mysqli_query($conn,$query_Get_reports_3);
  
    if(mysqli_num_rows($result_Get_reports_3) > 0){
        $i = 0;
        while($row = mysqli_fetch_assoc($result_Get_reports_3)){
            $i++;
            $report_3 .= "<tr>
            <td>{$i}</td>
            <td>{$row['report_TAP']}</td>
            <td>{$row['report_Description']}</td>
            <td>{$row['report_Date']}</td>
            <td>{$row['BE_cost']}</td>
            <td>{$row['BE_fund_source']}</td>
            <td>{$row['BE_status']}</td>
          </tr>";
        }
    }

    #Training-Seminars
    $query_Get_reports_4 = "SELECT * FROM barangay_reports_tbl WHERE barangay_ID = '$barangayID' AND report_Type = 'Training-Seminars' ORDER BY report_Date DESC";
    $result_Get_reports_4 = mysqli_query($conn,$query_Get_reports_4);
  
    if(mysqli_num_rows($result_Get_reports_4) > 0){
        $i = 0;
        while($row = mysqli_fetch_assoc($result_Get_reports_4)){
            $i++;
            $report_4 .= "<tr>
            <td>{$i}</td>
            <td>{$row['report_TAP']}</td>
            <td>{$row['report_Description']}</td>
            <td>{$row['report_Date']}</td>
            <td>{$row['TS_conducted_by']}</td>
            <td>{$row['TS_sponsored_by']}</td>
          </tr>";
        }
    }

     #Others
     $query_Get_reports_5 = "SELECT * FROM barangay_reports_tbl WHERE barangay_ID = '$barangayID' AND report_Type = 'Others' ORDER BY report_Date DESC";
     $result_Get_reports_5 = mysqli_query($conn,$query_Get_reports_5);
   
     if(mysqli_num_rows($result_Get_reports_5) > 0){
         $i = 0;
         while($row = mysqli_fetch_assoc($result_Get_reports_5)){
             $i++;
             $report_5 .= "<tr>
             <td>{$i}</td>
             <td>{$row['report_TAP']}</td>
             <td>{$row['report_Description']}</td>
             <td>{$row['report_Date']}</td>
             <td>{$row['report_Summary']}</td>
           </tr>";
         }
     }
?>