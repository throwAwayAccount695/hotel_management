<?php require_once('classes/Display.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Online Hotel.Com</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="css/style.css"rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="margin-top:50px;"> 
  <?php include('menu_bar.php'); ?>
  <!-- Image Container -->
  <div class="container">
    <h2>Image Gallery</h2>
    <div class="row">
      <?php $images = $display->get_files("image/image_gallery"); ?>
      <?php for($i = 0; $i < $display->count_files("image/image_gallery"); $i++) : ?>
        <div class="col-md-4">
          <div class="thumbnail">
            <a href="<?= $images[$i]?>" target="_blank">
              <img src="<?= $images[$i]?>" alt="<?= "img$i is missing"?>" style="width:100%;height:160px;">
            </a>
          </div>
        </div>
      <?php	endfor; ?>
    </div>
  </div>
  <?php include('Footer.php'); ?>
</body>
</html>


