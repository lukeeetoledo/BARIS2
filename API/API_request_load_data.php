
<?php
   require_once('SYSTEM_config.php');
    session_start();
     if(!isset($_SESSION['user_ID']) && !isset($_SESSION['user_Type']) && !isset($_SESSION['barangay_ID'])){
      header("location:../index.php");
  }
   $barangay_ID = (int)$_SESSION['barangay_ID'];
$limit = 5;
   $num_rows = 0;
   if (isset($_POST['page_no'])) {
      $page = $_POST['page_no'];
   }else{
      $page = 0;
   }
   $req = "Online";
   $meh = mysqli_query($conn,"SELECT * FROM barangay_documents_tbl  WHERE barangay_ID = '$barangay_ID' AND doc_Requestmode = '$req'");
   $num_rows = mysqli_num_rows($meh);
 $sql = "SELECT * FROM barangay_documents_tbl  WHERE barangay_ID = '$barangay_ID' AND doc_Requestmode = '$req' LIMIT $page, $limit";
   
   $query = $conn->query($sql);
   if ($query->num_rows > 0) {
   $output = "";
   $output .= "<tbody>";
   while ($row = $query->fetch_assoc()) {
         
    $last_id = $row['doc_Count'] - 1;
   $output.="<tr>
   <td>{$row["doc_ID"]}</td>
   <td>{$row["user_ID"]}</td>
   <td>{$row["doc_Type"]}</td>
   <td>{$row["doc_Fname"]} {$row["doc_Mname"]} {$row["doc_Lname"]}</td>
   <td>{$row["doc_Email"]}</td>
   <td>{$row["doc_Contact"]}</td>
   <td>{$row["doc_DeliverType"]}</td>
   <td>{$row["doc_Requestmode"]}</td>
   <td><a class='btn btn-info' href='view_document_stats.php?token1={$row["doc_ID"]}&token2={$row["doc_Type"]}' target='blank'>View</a>
   <a class='btn btn-success' href='API/API_generate_document.php?tokenDT={$row['doc_Type']}&tokenDID={$row['doc_ID']}&tokenMode={$row["doc_Requestmode"]}&tokenAct=EMAIL'>Send</a>
   <a  class='btn btn-success' href='API/API_generate_document.php?tokenDT={$row['doc_Type']}&tokenDID={$row['doc_ID']}&tokenMode={$row["doc_Requestmode"]}&tokenAct=PDF' target='blank'>PDF</a>
             </tr>";
   }
   $output .= "<tbody>";
               
   $output .= "<tbody id='pagination' style='text-align:left'>
            <tr>
             <td colspan='13'><button class='btn btn-success loadbtn' data-id='{$last_id}'>Load More</button></td>
            </tr>
            </tbody>";
$output.=$num_rows;
   echo $output;     
   }else{
        $output .= "<tbody>
            <tr>
             <td colspan='13'>That is all.</td>
            </tr>
            </tbody>";
             echo $output;   
   }
?>