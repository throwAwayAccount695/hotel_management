<?php 
session_start();
error_reporting(1);
require_once('classes/Display.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Online Hotel.Com</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">
  <link href="css/style.css"rel="stylesheet"/>
</head>

<body style="margin-top:50px;">
  <?php include('menu_bar.php'); ?>
<div id="myCarousel" class="carousel slide" data-ride="carousel"> <!--Slider Image Start Here--> 
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <?php
        $slider = $display->select_all("slider");
        $path="image/Slider/"; 
        for($k = 0; $k < count($slider); $k++) : ?>
          <li data-target="#myCarousel" data-slide-to="<?= $k; ?>" <?= ($k == 0) ? 'class="active"' : ''; ?>></li>
        <?php endfor; ?>
    </ol>
    <!--Indicators Close Here-->

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <?php for($i = 0; $i < count($slider); $i++) : ?>
        <div class="<?= ($i == 0) ? 'item active' : 'item'; ?>">
          <img style="max-height: 480px;" src="<?= $path . $slider[$i]['image']; ?>" alt="Image">
          <div class="carousel-caption">
            <h2><?= $slider[$i]['caption']; ?></h2>
          </div>      
        </div>
      <?php	endfor; ?>	  
    </div>

    
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a> 
    <!-- Left and right controls Close Here -->
    
</div> <!--Room Info Start Here-->

<div class="container-fluid"id="red">
  <div class="container text-center">    
  <h1>Welcome To <font color="#a6e22b;"><b>Online Hotel.Com</b></font></h1><hr><br>
  <div class="row">
    <div class="hov">
        <?php 
          $rooms = $display->select_all("rooms");
          for($j = 0; $j < count($rooms); $j++) : ?>
            <div class="col-sm-4">
              <img src="image/rooms/<?= $rooms[$j]['image']; ?>"class="img-responsive thumbnail"alt="Image"id="img1"> <!--Id Is Img1-->
              <h4 class="Room_Text">[ <?= $rooms[$j]['type']; ?>]</h4>
              <p class="text-justify"><?= substr($rooms[$j]['details'],0,100); ?></p><br>
              <a href="room_details.php?room_id=<?= $rooms[$j]['room_id']; ?>" class="btn btn-danger text-center">Read more</a><br><br>
            </div>
        <?php endfor; ?>
      </div>
    </div>
  </div>
</div>

<?php include('Footer.php'); ?>

</body>
</html>