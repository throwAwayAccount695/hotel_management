<?php 
session_start();
error_reporting(1);
require_once('classes/Display.php');
?>
<!DOCTYPE html>
<html lang="en">
<head><!--Head Open  Here-->
  <title>Online Hotel.Com</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">
  <link href="css/style.css"rel="stylesheet"/>
</head> <!--Head Open  Here-->
<body style="margin-top:50px;">
  <?php
      include('menu_bar.php');
  ?>
<div id="myCarousel" class="carousel slide" data-ride="carousel"> <!--Slider Image Start Here--> 
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
	   <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <!--Indicators Close Here-->

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
    <?php
      $slider = $display->select_all("slider");
      $path="image/Slider/";
      for($i = 0; $i < count($slider); $i++) : 
        if($i == 0) : ?>
          <div class="item active">
            <img src="<?php echo $path . $slider[$i]['image']; ?>" alt="Image">
            <div class="carousel-caption">
              <h2><?php echo $slider[$i]['caption']; ?></h2>
            </div>      
          </div>
        <?php else: ?>	
          <div class="item">
            <img src="<?php echo $path . $slider[$i]['image']; ?>" alt="Image">
            <div class="carousel-caption">
              <h2><?php echo $slider[$i]['caption'] ?></h2>
            </div>      
          </div>	
        <?php endif; ?>
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

 <div class="container-fluid"id="red"><!--Id Is Red--> 
<div class="container text-center">    
  <h1>Welcome To <font color="#a6e22b;"><b>Online Hotel.Com</b></font></h1><hr><br>
  <div class="row">
    <div class="hov"><!--Hov is Class-->
    
	
<?php 
  $rooms = $display->select_all("rooms");
  for($j = 0; $j < count($rooms); $j++) : ?>
    <div class="col-sm-4">
      <img src="image/rooms/<?php echo $rooms[$j]['image']; ?>"class="img-responsive thumbnail"alt="Image"id="img1"> <!--Id Is Img1-->
      <h4 class="Room_Text">[ <?php echo $rooms[$j]['type']; ?>]</h4>
      <p class="text-justify"><?php echo substr($rooms[$j]['details'],0,100); ?></p><br>
      <a href="room_details.php?room_id=<?php echo $rooms[$j]['room_id']; ?>" class="btn btn-danger text-center">Read more</a><br><br>
    </div>
  <?php endfor; ?>
  </div>
  </div>
</div>
</div>

<?php include('Footer.php'); ?>

</body>
</html>