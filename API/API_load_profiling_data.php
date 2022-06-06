
<?php
   include('SYSTEM_config.php');
   session_start();
   $barangay_ID = (int)$_SESSION['barangay_ID'];
   $num_rows = 0;

   $sql = "SELECT * FROM barangay_profiling_tbl WHERE barangay_ID = '$barangay_ID' ORDER BY prof_Lname ASC";
   $query = $conn->query($sql);
   if ($query->num_rows > 0) {
   $output = "";
   $output .= "<tbody>";
   while ($row = $query->fetch_assoc()) {
    $num_rows++;
   $output.="<tr>
               <td>{$row["prof_ID"]}</td>
               <td>{$row["prof_Fname"]}</td>
               <td>{$row["prof_Lname"]}</td>
               <td>{$row["prof_Mname"]}</td>
               <td>{$row["prof_Suffix"]}</td>
               <td>{$row["prof_Birthdate"]}</td>
               <td>{$row["prof_Sex"]}</td>
               <td>{$row["prof_Address"]}</td>
               <td>{$row["prof_Addressstatus"]}</td>
               <td>{$row["prof_Fathername"]}</td>
               <td>{$row["prof_Fatheroccu"]}</td>
               <td>{$row["prof_Mothername"]}</td>
               <td>{$row["prof_Motheroccu"]}</td>
               <td> <a class='btn btn-success' style = 'width: 100%'href='./barangay_List.php?token={$row["prof_ID"]}'>Update<a class='btn btn-danger'style = 'width: 100%' href='API/API_deleteresident.php?token={$row["prof_ID"]}' target='blank'>Delete</td>
             </tr>";
   }
   $output .= "<tbody>";
   $output.=$num_rows;
   echo $output;     
   }
?>