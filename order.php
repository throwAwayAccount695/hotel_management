<?php 
session_start();
error_reporting(1);
//Check If User Is LoggedIn
$eid = $_SESSION['create_account_logged_in'];
if(empty($eid)){
  header('location:login.php'); 
}
require_once('classes/Display.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Online Hotel.com</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="css/style.css"rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="margin-top:50px;">
  <?php include('menu_bar.php'); ?>
  <div class="container-fluid">
    <h1 class="text-center text-primary">[ Booking Details ]</h1><br>
    <div class="container">
      <div class="row">
        <table class="table table-striped table-bordered table-hover table-responsive"style="height:150px;">
          <!-- Table names -->
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>Country</th>
            <th>Room Type</th>
            <th>Check In Date</th>
            <th>Check In Time</th>
            <th>Check Out Date</th>
            <th>Occupancy</th>
            <th>Cancel</th>
          </tr>
          <?php 
            $sql = $display->select_all("room_booking_details where email='$eid'");
            for($i = 0; $i < count($sql); $i++){
              $oid=$sql[$i]['id'];
              echo "<!-- Table Element $i -->";
              echo "<tr>";
              echo "<td>".$sql[$i]['name']."</td>";
              echo "<td>".$sql[$i]['email']."</td>";
              echo "<td>".$sql[$i]['phone']."</td>";
              echo "<td>".$sql[$i]['address']."</td>";
              echo "<td>".$sql[$i]['country']."</td>";
              echo "<td>".$sql[$i]['room_type']."</td>";
              echo "<td>".$sql[$i]['check_in_date']."</td>";
              echo "<td>".$sql[$i]['check_in_time']."</td>";
              echo "<td>".$sql[$i]['check_out_date']."</td>";
              echo "<td>".$sql[$i]['Occupancy']."</td>";
              echo "<td><a href='cancel_order.php?order_id=$oid' style='color:Red'>Cancel</a></td>";
              echo "</tr>";
            }                         
          ?> 
        </table>
      </div>
    </div>
  </div>
  <?php include('Footer.php'); ?>
</body>
</html>
