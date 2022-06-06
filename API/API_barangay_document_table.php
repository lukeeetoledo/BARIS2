<?php 
include 'SYSTEM_config.php';

if(!isset($_SESSION['user_ID']) && !isset($_SESSION['user_Type']) && !isset($_SESSION['barangay_ID'])){
    header("location:../index.php");
  }
$barangayID = $_SESSION['barangay_ID'];
$table = "";
$sql = "SELECT * FROM barangay_document_types_tbl WHERE barangay_ID = '$barangayID'";
$sql_result = mysqli_query($conn, $sql);

  if($sql_result){
      $i = 0;
        while ($row = $sql_result->fetch_assoc()){
            $i++;
            $table .= "
            <tr>
                <td>{$row['doc_Type']}</td>
                <td><input type = 'number' id = '{$row['ID']}' value = {$row['doc_Price']} disabled min=0></td>
                <td><button id = 'editbtn{$i}' onclick='enableSave(this, {$row['ID']}, savebtn{$i}, cancelbtn{$i})' style = 'margin-right: 5px'class = 'btn btn-success'>Edit</button>
                <button id = 'savebtn{$i}' onclick='savePrice(editbtn{$i}, {$row['ID']}, this, cancelbtn{$i})' style = 'margin-right: 5px;display:none'class = 'btn btn-info'>Save</button>
                <button id = 'cancelbtn{$i}' onclick='cancelEdit(editbtn{$i}, {$row['ID']}, savebtn{$i}, this, {$row['doc_Price']})' style = 'margin-right: 5px;display:none'class = 'btn btn-danger'>Cancel</button>
            </tr>";
        }
  }
?>
