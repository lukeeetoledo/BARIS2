<?php include 'API/API_get_view.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="img/Logo_192.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="CSS/view_post.css">

  <title><?php echo $post_ID; ?></title>
</head>

<body>
  <center>
'<div class="card">
                <div id="date"><?php echo $post_Date; ?></div>
                <div id="name"><?php echo $post_Creator; ?> <span style="color: green;">■</span></div>
                <hr>
                <div id="title"><?php echo $post_Title; ?></div>
                <hr>
                <div style="border:solid 1px white; padding: 8px; border-radius:5px;">
                <p><?php echo $post_Text_Content; ?></p>
                </div><br>
                <div id="<?php echo $post_ID; ?>" class="carousel" data-interval="false">
                    <!-- Indicators -->
                    <ol class="carousel-indicators"><?php echo $indicator; ?></ol>
    
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" style="border-radius:5px">
                    <?php echo $items; ?>
                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#<?php echo $post_ID; ?>" data-slide="prev" style=" height:30%; margin:auto">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#<?php echo $post_ID; ?>" data-slide="next" style=" height:30%; margin:auto">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
  </center>
</body>
</html>