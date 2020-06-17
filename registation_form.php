<?php
require_once('classes/Display.php');
extract($_REQUEST);

if(isset($save))
{
  $sql = $display->select_all("create_account WHERE email='$email'", TRUE);
  if(mysqli_num_rows($sql)){
    $msg= "<h1 style='color:red'> account already exists</h1>";    
  } else{
    //hashes password with md5 and adds salt to the string.
    $pwd = md5($password . $display->get_salt());
    $result = $display->insert_into(
      "create_account", array('name', 
      'email', 'password', 'mobile', 'address', 'gender', 'country', 'pictrure'), 
      array($name, $email, $pwd, $phone, $address, $gender, $country, $picture));
    if($result){
      $msg= "<h1 style='color:green'>Data Saved Successfully</h1>"; 
      header('location:Login.php');
    } else{
      $msg= "<h1 style='color:red'>Something Went Wrong</h1>"; 
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
  <link href="css/style.css"rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai" rel="stylesheet">
</head>
<body style="margin-top:50px;">
  <?php include('menu_bar.php'); ?>
  <div class="container-fluid"style="background-color:#4286f4;color:#000;">
    <div class="container">
      <div class="row">
        <center><h1 style="background-color:#ed2553; border-radius:50px;display:inline-block;"><b><font color="#080808">Create New Account?</font></b></h1></center>
      	<!-- Outputs Error Messages -->
        <center><?= @$msg;?></center><br>
        <div class="col-sm-2"></div>
          <div class="col-sm-6 ">
            <!-- Form -->
            <form class="form-horizontal"method="post">
              <div class="form-group">
                <div class="control-label col-sm-5"><h4>Name :</h4></div>
                <div class="col-sm-7">
                  <input type="text" name="name" class="form-control"placeholder="Enter Your Name"required>
                </div>
              </div>

              <div class="form-group">
                <div class="control-label col-sm-5"><h4>Email:</h4></div>
                <div class="col-sm-7">
                  <input type="text" name="email" class="form-control"placeholder="Enter Your Email" autocomplete="off"required>
                </div>
              </div>

              <div class="form-group">
                <div class="control-label col-sm-5"><h4>Password :</h4></div>
                <div class="col-sm-7">
                  <input type="password" name="password" class="form-control"placeholder="Enter Your Password"autocomplete="off"required>
                </div>
              </div>

              <div class="form-group">
                <div class="control-label col-sm-5"><h4>Mobile Number:</h4></div>
                <div class="col-sm-7">
                  <input type="number" name="phone" class="form-control"placeholder="Enter Your Mobile Number"required>
                </div>
              </div>

              <div class="form-group">
                <div class="control-label col-sm-5"><h4>Address :</h4></div>
                <div class="col-sm-7">
                  <textarea  name="address" class="form-control"required></textarea>
                </div>
              </div>

              <div class="form-group">
                <div class="control-label col-sm-5"><h4 id="top">Gender :</h4></div>
                <div class="col-sm-7">
                  <input type="radio" name="gender"value="male"required><b>Male</b>&emsp;
                  <input type="radio" name="gender"value="Female"required><b>Female</b>&emsp;
                  <input type="radio" name="gender"value="Other"required><b>Other</b>
                </div>
              </div>

              <div class="form-group">
                <div class="control-label col-sm-5"><h4>Country :</h4></div>
                <div class="col-sm-7">
                  <select name="country" class="form-control"required>
                    <option>India</option>
                    <option>Pakistan</option>
                    <option>China</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <div class="control-label col-sm-5"><h4 id="top">profile pic :</h4></div>
                <div class="col-sm-7">
                  <input type="file" name="picture"accept="image/*"required>
                </div>
                <div class="row">
                  <div class="col-sm-6"style="text-align:right;"><br>
                    <input type="submit" value="Submit" name="save"class="btn btn-success btn-group-justified"required style="color:#000;font-family: 'Baloo Bhai', cursive;height:40px;"/>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include('Footer.php'); ?>
</body>
</html>
