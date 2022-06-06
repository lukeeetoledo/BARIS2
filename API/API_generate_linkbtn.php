<?php 
       include "SYSTEM_config.php";
       session_start();
       if (!isset($_SESSION['user_ID']) && !isset($_SESSION['user_Type']) && !isset($_SESSION['barangay_ID'])) {
           header("location:../index.php");
       }
       $barangay_ID = $_SESSION['barangay_ID'];
       $BaRIS_fileName = "BaRIS-report_".time(); 
       $BaRIS_PHP = $BaRIS_fileName.".php";
       $BaRIS_PDF = $BaRIS_fileName.".pdf";
       $PHPFile = "../saved_files/reports_php/".$BaRIS_PHP;
       $PHPLink = "saved_files/reports_php/".$BaRIS_PHP;
       $PDFFile = "../saved_files/reports_pdf/".$BaRIS_PDF;
       $PDFLink = "saved_files/reports_pdf/".$BaRIS_PDF;
       $PHPCode = "";
       $type = "";
       $month = "";
       $year = "";
       $content = "";
       if(isset($_GET['tokenT']) && isset($_GET['tokenM']) && isset($_GET['tokenY'])){
           $type = $_GET['tokenT'];
           $month = $_GET['tokenM'];
           $year = $_GET['tokenY'];
           $query_Set_info = "";
        //    ALL
           if($type == "all"){
            //    MONTH
               if($month == "all"){
                //    YEAR
                    if($year == "all"){
                        $query_Set_info = "SELECT * FROM barangay_reports_tbl WHERE barangay_ID = '$barangay_ID' ORDER BY report_Date ASC";
                    }else{
                        $query_Set_info = "SELECT * FROM barangay_reports_tbl WHERE barangay_ID = '$barangay_ID' AND date_Year = '$year' ORDER BY report_Date ASC";
                    }
               }else{
                if($year == "all"){
                    $query_Set_info = "SELECT * FROM barangay_reports_tbl WHERE barangay_ID = '$barangay_ID' AND date_Month = '$month' ORDER BY report_Date ASC";
                }else{
                    $query_Set_info = "SELECT * FROM barangay_reports_tbl WHERE barangay_ID = '$barangay_ID' AND date_Month = '$month' AND date_Year = '$year' ORDER BY report_Date ASC";
                }
               }

               $result_Set_info = mysqli_query($conn, $query_Set_info);

                        if(mysqli_num_rows($result_Set_info) > 0){
                            $content .=
                            "<table>
                                <thead>
                                <tr>
                                <td>#</td>
                                <td>Type</td>
                                <td>Program /Service-Type</td>
                                <td>Title /Agenda /Project</td>
                                <td>Description</td>
                                <td>Date</td>
                                <td>Summary</td>
                                <td>Number of Beneficiary</td>
                                <td>Type of Beneficiary</td>
                                <td>Meeting Start</td>
                                <td>Meeting End</td>
                                <td>Cost</td>
                                <td>Fund Source</td>
                                <td>Status</td>
                                <td>Conducted by</td>
                                <td>Sponsored by</td>
                            </tr>
                                </thead>
                                <tbody>";
                                $i=0;
                            while($row = mysqli_fetch_assoc($result_Set_info)){
                                $i++;
                                $content.= 
                                "<tr>
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
                                </tr>
                                ";  
                            }
                            $content .= "</tbody></table>";
                        }
           }else{
               #Programs/Services
            if($type == "programs/services"){
                //    MONTH
               if($month == "all"){
                //    YEAR
                    if($year == "all"){
                        $query_Set_info = "SELECT * FROM barangay_reports_tbl WHERE barangay_ID = '$barangay_ID' AND report_Type = 'Programs-Services' ORDER BY report_Date ASC";
                    }else{
                        $query_Set_info = "SELECT * FROM barangay_reports_tbl WHERE barangay_ID = '$barangay_ID' AND date_Year = '$year' AND report_Type = 'Programs-Services' ORDER BY report_Date ASC";
                    }
               }else{
                if($year == "all"){
                    $query_Set_info = "SELECT * FROM barangay_reports_tbl WHERE barangay_ID = '$barangay_ID' AND date_Month = '$month' AND report_Type = 'Programs-Services' ORDER BY report_Date ASC";
                }else{
                    $query_Set_info = "SELECT * FROM barangay_reports_tbl WHERE barangay_ID = '$barangay_ID' AND date_Month = '$month' AND report_Type = 'Programs-Services' AND date_Year = '$year' ORDER BY report_Date ASC";
                }
            }
            $result_Set_info = mysqli_query($conn, $query_Set_info);

            if(mysqli_num_rows($result_Set_info) > 0){
                $content .=
                "<table>
                    <thead>
                    <tr>
                    <td>#</td>
                    <td>Program /Service-Type</td>
                    <td>Title</td>
                    <td>Description</td>
                    <td>Date</td>
                    <td>Number of Beneficiary</td>
                    <td>Type of Beneficiary</td>
                    <td>Summary</td>
                </tr>
                    </thead>
                    <tbody>";
                    $i=0;
                while($row = mysqli_fetch_assoc($result_Set_info)){
                    $i++;
                    $content.= 
                    "<tr>
                    <td>{$i}</td>
                    <td>{$row['PS_Type']}</td>
                    <td>{$row['report_TAP']}</td>
                    <td>{$row['report_Description']}</td>
                    <td>{$row['report_Date']}</td>
                    <td>{$row['PS_Num_Beneficiary']}</td>
                    <td>{$row['PS_Type_Beneficiary']}</td>
                    <td>{$row['report_Summary']}</td>
                    </tr>
                    ";  
                }
                $content .= "</tbody></table>";
            }
            }
            // MEETINGS
            else if($type == "meetings"){
                 //    MONTH
               if($month == "all"){
                //    YEAR
                    if($year == "all"){
                        $query_Set_info = "SELECT * FROM barangay_reports_tbl WHERE barangay_ID = '$barangay_ID' AND report_Type = 'Meetings' ORDER BY report_Date ASC";
                    }else{
                        $query_Set_info = "SELECT * FROM barangay_reports_tbl WHERE barangay_ID = '$barangay_ID' AND date_Year = '$year' AND report_Type = 'Meetings' ORDER BY report_Date ASC";
                    }
               }else{
                if($year == "all"){
                    $query_Set_info = "SELECT * FROM barangay_reports_tbl WHERE barangay_ID = '$barangay_ID' AND date_Month = '$month' AND report_Type = 'Meetings' ORDER BY report_Date ASC";
                }else{
                    $query_Set_info = "SELECT * FROM barangay_reports_tbl WHERE barangay_ID = '$barangay_ID' AND date_Month = '$month' AND report_Type = 'Meetings' AND date_Year = '$year' ORDER BY report_Date ASC";
                }
            }
            $result_Set_info = mysqli_query($conn, $query_Set_info);

            if(mysqli_num_rows($result_Set_info) > 0){
                $content .=
                "<table>
                    <thead>
                    <tr>
                    <td>#</td>
                    <td>Agenda</td>
                    <td>Description</td>
                    <td>Date</td>
                    <td>Meeting Start [24-Hours]</td>
                    <td>Meeting End [24-Hours]</td>
                    <td>Summary</td>
                </tr>
                    </thead>
                    <tbody>";
                    $i=0;
                while($row = mysqli_fetch_assoc($result_Set_info)){
                    $i++;
                    $content.= 
                    "<tr>
                    <td>{$i}</td>
                    <td>{$row['report_TAP']}</td>
                    <td>{$row['report_Description']}</td>
                    <td>{$row['report_Date']}</td>
                    <td>{$row['Meet_start_time']}</td>
                    <td>{$row['Meet_end_time']}</td>
                    <td>{$row['report_Summary']}</td>
                    </tr>
                    ";  
                }
                $content .= "</tbody></table>";
            }
            }
            // BUDGET EXPENDITURE
            else if($type == "budget_expenditure"){
                   //    MONTH
               if($month == "all"){
                //    YEAR
                    if($year == "all"){
                        $query_Set_info = "SELECT * FROM barangay_reports_tbl WHERE barangay_ID = '$barangay_ID' AND report_Type = 'Budget-Expenditure' ORDER BY report_Date ASC";
                    }else{
                        $query_Set_info = "SELECT * FROM barangay_reports_tbl WHERE barangay_ID = '$barangay_ID' AND date_Year = '$year' AND report_Type = 'Budget-Expenditure' ORDER BY report_Date ASC";
                    }
               }else{
                if($year == "all"){
                    $query_Set_info = "SELECT * FROM barangay_reports_tbl WHERE barangay_ID = '$barangay_ID' AND date_Month = '$month' AND report_Type = 'Budget-Expenditure' ORDER BY report_Date ASC";
                }else{
                    $query_Set_info = "SELECT * FROM barangay_reports_tbl WHERE barangay_ID = '$barangay_ID' AND date_Month = '$month' AND report_Type = 'Budget-Expenditure' AND date_Year = '$year' ORDER BY report_Date ASC";
                }
            }
            $result_Set_info = mysqli_query($conn, $query_Set_info);

            if(mysqli_num_rows($result_Set_info) > 0){
                $content .=
                "<table>
                    <thead>
                    <tr>
                    <td>#</td>
                    <td>Project</td>
                    <td>Description</td>
                    <td>Date</td>
                    <td>Cost</td>
                    <td>Fund Source</td>
                    <td>Status</td>
                </tr>
                    </thead>
                    <tbody>";
                    $i=0;
                while($row = mysqli_fetch_assoc($result_Set_info)){
                    $i++;
                    $content.= 
                    "<tr>
                    <td>{$i}</td>
                    <td>{$row['report_TAP']}</td>
                    <td>{$row['report_Description']}</td>
                    <td>{$row['report_Date']}</td>
                    <td>{$row['BE_cost']}</td>
                    <td>{$row['BE_fund_source']}</td>
                    <td>{$row['BE_status']}</td>
                    </tr>
                    ";  
                }
                $content .= "</tbody></table>";
            }
            }
              // TRAINING/SEMINARS
            else if($type == "training/seminars"){
                //    MONTH
            if($month == "all"){
             //    YEAR
                 if($year == "all"){
                     $query_Set_info = "SELECT * FROM barangay_reports_tbl WHERE barangay_ID = '$barangay_ID' AND report_Type = 'Training-Seminars' ORDER BY report_Date ASC";
                 }else{
                     $query_Set_info = "SELECT * FROM barangay_reports_tbl WHERE barangay_ID = '$barangay_ID' AND date_Year = '$year' AND report_Type = 'Training-Seminars' ORDER BY report_Date ASC";
                 }
            }else{
             if($year == "all"){
                 $query_Set_info = "SELECT * FROM barangay_reports_tbl WHERE barangay_ID = '$barangay_ID' AND date_Month = '$month' AND report_Type = 'Training-Seminars' ORDER BY report_Date ASC";
             }else{
                 $query_Set_info = "SELECT * FROM barangay_reports_tbl WHERE barangay_ID = '$barangay_ID' AND date_Month = '$month' AND report_Type = 'Training-Seminars' AND date_Year = '$year' ORDER BY report_Date ASC";
             }
         }
         $result_Set_info = mysqli_query($conn, $query_Set_info);

         if(mysqli_num_rows($result_Set_info) > 0){
             $content .=
             "<table>
                 <thead>
                 <tr>
                 <td>#</td>
                 <td>Title</td>
                 <td>Description</td>
                 <td>Date</td>
                 <td>Conducted by</td>
                 <td>Sponsored by</td>
             </tr>
                 </thead>
                 <tbody>";
                 $i=0;
             while($row = mysqli_fetch_assoc($result_Set_info)){
                 $i++;
                 $content.= 
                 "<tr>
                 <td>{$i}</td>
                 <td>{$row['report_TAP']}</td>
                 <td>{$row['report_Description']}</td>
                 <td>{$row['report_Date']}</td>
                 <td>{$row['TS_conducted_by']}</td>
                 <td>{$row['TS_sponsored_by']}</td>
                 </tr>
                 ";  
             }
             $content .= "</tbody></table>";
         }
         }
         // Others
         else{
            //    MONTH
        if($month == "all"){
         //    YEAR
             if($year == "all"){
                 $query_Set_info = "SELECT * FROM barangay_reports_tbl WHERE barangay_ID = '$barangay_ID' AND report_Type = 'Others' ORDER BY report_Date ASC";
             }else{
                 $query_Set_info = "SELECT * FROM barangay_reports_tbl WHERE barangay_ID = '$barangay_ID' AND date_Year = '$year' AND report_Type = 'Others' ORDER BY report_Date ASC";
             }
        }else{
         if($year == "all"){
             $query_Set_info = "SELECT * FROM barangay_reports_tbl WHERE barangay_ID = '$barangay_ID' AND date_Month = '$month' AND report_Type = 'Others' ORDER BY report_Date ASC";
         }else{
             $query_Set_info = "SELECT * FROM barangay_reports_tbl WHERE barangay_ID = '$barangay_ID' AND date_Month = '$month' AND report_Type = 'Others' AND date_Year = '$year' ORDER BY report_Date ASC";
         }
     }
     $result_Set_info = mysqli_query($conn, $query_Set_info);

     if(mysqli_num_rows($result_Set_info) > 0){
         $content .=
         "<table>
             <thead>
             <tr>
             <td>#</td>
             <td>Title</td>
             <td>Description</td>
             <td>Date</td>
             <td>Summary</td>
         </tr>
             </thead>
             <tbody>";
             $i=0;
         while($row = mysqli_fetch_assoc($result_Set_info)){
             $i++;
             $content.= 
             "<tr>
             <td>{$i}</td>
             <td>{$row['report_TAP']}</td>
             <td>{$row['report_Description']}</td>
             <td>{$row['report_Date']}</td>
             <td>{$row['report_Summary']}</td>
             </tr>
             ";  
         }
         $content .= "</tbody></table>";
     }
     }
           }

        //    GENERATING PHP FILE
           if($content == ""){
               echo "<label class = 'btn btn-danger' style='pointer-events:none;'>Report not found!</label>";
           }else{
               $x_Type = ucwords($type);
               $x_Month = ucwords($month);
               $x_Year = ucwords($year);
            $PHPCode .= 
            ' <!DOCTYPE html>
             <html lang="en">
             <head>
                 <meta charset="UTF-8">
                 <meta http-equiv="X-UA-Compatible" content="IE=edge">
                 <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
                 <link rel="stylesheet" href="../../CSS/reports_PDF.css">
                 <title></title>
             </head>
             <body>
                    <label>Type: '.$x_Type.'</label></br>
                    <label>Month: '.$x_Month.'</label></br>
                    <label>Year: '.$x_Year.'</label></br></br></br>
                 '.$content.'
             </body>
             </html>';

             // Upload PHP file
             $toPHP = fopen($PHPFile, 'w');
             fwrite($toPHP, $PHPCode);
             fclose($toPHP);

        // Show Download Button

        //  echo "
        //  <label>Report PDF</label></br>
        //  <a class = 'btn btn-success' href='{$PHPLink}' target='blank'>Download</a>
        //  ";

        // INSERT toPDF.txt here...
        $curl = curl_init();
        $source = "https://baris.com.ph/" . $PHPLink;
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.pdfshift.io/v3/convert/pdf",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode(array(
                "source" => $source,
                "landscape" => true,
                "use_print" => false
            )),
            CURLOPT_HTTPHEADER => array('Content-Type:application/json'),
            CURLOPT_USERPWD => 'api:3351793c0ba7403fa032b2656a70f30f'
        ));

        $response = curl_exec($curl);
        file_put_contents($PDFFile, $response);
        echo "
  <label>Report PDF</label></br>
  <a class = 'btn btn-successs' href='{$PDFLink}' target='blank' style='background-color:#5cb85c;border-radius:12px'>Download</a>";
        //  DELETE PHP File
        // unlink($PHPFile);
             
           }
       }
   
?>