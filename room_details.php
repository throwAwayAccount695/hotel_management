<?php require_once('classes/Display.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Online Hotel.Com</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="css/style.css"rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">
</head>

<body style="margin-top:50px;">
	<?php include('menu_bar.php'); ?>
  <br><br><br>
	<div class="container-fluid"style="margin-top:2%;">
		<div class="continer">
			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-7">
					<div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <?php 
              $room_type = $display->get_room_type($_GET['room_id']); 
              $image_count = $display->count_files("image/$room_type");
            ?>
            <ol class="carousel-indicators">
              <?php for($i = 0; $i < $image_count; $i++) : ?>
                <li data-target="#myCarousel" data-slide-to="<?= $i; ?>" <?= ($i == 0) ? 'class="active"' : ''; ?>></li>
              <?php endfor; ?>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
              <?php for($j = 0; $j < $image_count; $j++) : ?>
                <div class="<?= ($j == 0) ? 'item active' : 'item'; ?>">
                  <img src="<?= $display->get_files("image/" . $room_type)[$j]; ?>"class="thumbnail" alt="img<?= $j + 1; ?>">
                </div>
              <?php endfor; ?>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

          <?php 
            $rooms = $display->select_all("rooms");
            for($l = 0; $l < count($rooms); $l++) : 
              if($rooms[$l]["room_id"] == $_GET["room_id"]) : ?>
                <h2 class="Ac_Room_Text"><?= $rooms[$l]['type']; ?></h2>
                <h3 class="Ac_Room_Text"><?= $rooms[$l]['price']; ?></h3>
                <p class="text-justify"><?= $rooms[$l]['details']; ?></p>
              <?php endif; ?>
          <?php endfor; ?>

          <div class="row">
            <h2>Amenities & Facilities</h2>
            <img src="image/icon/wifi.png"class="img-responsive">
            <a href="Login.php" class="btn btn-danger">Book Now</a><br><br>
          </div>
	      </div>

				<div class="col-sm-3">
					<div class="panel panel-primary">
					  <div class="panel-heading">
						  <h4 align="center">Room Type</h4>
					  </div><br>
					  <div class="panel-body-right text-center">
              <!--Fetch Mysql Database Select Query Room Details -->
              <?php for($k = 0; $k < count($rooms); $k++) : ?>
                <a href="room_details.php?room_id=<?= $rooms[$k]['room_id']; ?>"><?= $rooms[$k]['type']; ?></a><hr>
              <?php endfor; ?>
              <!--Fetch Mysql Database Select Query Room Details -->
					  </div>
				  </div>
				</div>
			</div>
		</div>
	</div>
  <?php include('footer.php'); ?>
</body>
</html>
