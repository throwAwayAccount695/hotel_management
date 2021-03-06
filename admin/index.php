<?php 
//This Is The LogginIN Page For The Admin Part Of The Site
session_start();
error_reporting(1);
require_once($_SERVER['DOCUMENT_ROOT'] . '/hotel_management/classes/Display.php');
extract($_REQUEST);

if(isset($login)){
	if($eid=="" || $pass==""){
	  $error= "<h3 style='color:red'>Fill all details</h3>";	
	} else{
    //hashes password with md5 and adds salt to the string.
    $pwd = md5($pass . $display->get_salt());
	  $sql = $display->select_all("admin WHERE username='$eid' AND password='$pwd'", TRUE);
		if(mysqli_num_rows($sql)){
      $_SESSION['admin_logged_in'] = $eid;
		  header('location:dashboard.php');	
		} else{
		  $error= "<h3 style='color:red'>Invalid login details</h3>";	
		}	
	}
}
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
  <link href="../css/style.css"rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Akronim|Libre+Baskerville" rel="stylesheet">
</head>

<body id="primary"style="margin-top:50px;">
	<?php include('menu_bar.php'); ?>
  <div class="container-fluid">
    <div class="container">
      <div class="row"><br>
        <div class="col-sm-4"></div>
        <div class="col-sm-4 text-center"style="box-shadow:2px 2px 2px;background-color:#990707;">
          <h1 align="center"><b><font style="font-family: 'Libre Baskerville', serif;text-shadow:5px 5px #000;">Admin Login ?</font></b></h1>
          <img src="../image/clipart/user.png"alt="Bird" width="200" height="170"style="padding-top:30px;">
          <?php //Outputs Error Message ?>
          <?= @$error;?>
          <!-- Form -->
          <form method="post"><br>
            <div class="form-group">
              <input type="Email" class="form-control"name="eid" placeholder="Email Id">
            </div>
            <div class="form-group">
              <input type="Password" class="form-control"name="pass" placeholder="Password">
            </div>
            <input type="submit" value="Login" name="login" class="btn btn-primary btn-group btn-group-justified"required>
          </form><br>  
        </div>
      </div><br>
    </div>
  </div>
<?php include('Footer.php'); ?>
</body>
</html>
