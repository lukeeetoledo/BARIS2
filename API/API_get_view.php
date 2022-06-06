<?php 
include 'SYSTEM_config.php';

if(!isset($_GET['token'])){
    echo "<script>alarm('Post not found!;);window.close();</script>";
}

$media = "";
$post_ID = $_GET['token'];
$post_Date = "";
$post_Creator = "";
$post_Title = "";
$post_Text_Content = "";
$indicator = "";
$items = "";
$query_Get_post = "SELECT * FROM barangay_post_tbl WHERE post_ID = '$post_ID' ";
$result_Get_post = mysqli_query($conn,$query_Get_post);

if(mysqli_num_rows($result_Get_post) > 0){
    $query_Get_media = "SELECT * FROM barangay_post_media WHERE post_ID = '$post_ID'";
    $result_Get_media = mysqli_query($conn,$query_Get_media);
    $row = mysqli_fetch_assoc($result_Get_post);
    $post_Date = $row['post_Date'];
    $post_Creator = $row['post_Creator'];
    $post_Title = $row['post_Title'];
    $post_Text_Content = $row['post_Text_Content'];
    $i = 0;
    while ($row_Get_media = mysqli_fetch_assoc($result_Get_media)){
        $media = "";
        if($i == 0){
            $media_File_path = $row_Get_media['post_Media'];
            $media_ID = $row_Get_media['media_ID'];
            $extension = pathinfo($media_File_path, PATHINFO_EXTENSION);
            $extension = strtolower($extension);
            if($extension == 'jpeg' || $extension == 'jpg' || $extension == 'png'){
                $media .= '<img src="'.$media_File_path.'" alt="'.$media_ID.'">';
            }else if($extension == 'mp4' || $extension == 'mkv'){
                 $media = ' <center>
                 <video controls>
                     <source src="'.$media_File_path.'" type="video/'.$extension.'">
                     Our website does not support this type of file.
                     Try [mp4,mkv].
                 </video>
             </center>';
            }
            $indicator .= '<li data-target="#'.$post_ID.'" data-slide-to="' . $i . '" class="active"></li>';
            $items .=   '<div class="item active">
                        '.$media.'
                        </div>';
        }else{
            $media_File_path = $row_Get_media['post_Media'];
            $media_ID = $row_Get_media['media_ID'];
            $extension = pathinfo($media_File_path, PATHINFO_EXTENSION);
            $extension = strtolower($extension);
            if($extension == 'jpeg' || $extension == 'jpg' || $extension == 'png'){
                $media .= '<img src="'.$media_File_path.'" alt="'.$media_ID.'">';
            }else if($extension == 'mp4' || $extension == 'mkv'){
                 $media = ' <center>
                 <video controls>
                     <source src="'.$media_File_path.'" type="video/'.$extension.'">
                     Our website does not support this type of file.
                     Try [mp4,mkv].
                 </video>
             </center>';
            }
            $indicator .= '<li data-target="#'.$post_ID.'" data-slide-to="'.$i.'"></li>';
            $items .=  '<div class="item">
            '.$media.'
            </div>';
        }    
        $i++;  
    }
}
?>