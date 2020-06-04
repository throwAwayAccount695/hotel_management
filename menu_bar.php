<?php 
session_start();
if(isset($_SESSION['create_account_logged_in'])){
	$eid = $_SESSION['create_account_logged_in'];
}
error_reporting(1);
?>
<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>                        
			</button>
			<img src="logo/logo2.png"/width="160px"height="40px"style="margin-top:5px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
				<li><a href="index.php"title="Home">Home</a></li>
				<li><a href="room_details.php?room_id=34"title="Gallery">Room Details </a></li>
				<li><a href="about.php"title="About">About </a></li>
				<li><a href="image_gallery.php"title="Gallery">Gallery </a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<?php if($_SESSION['create_account_logged_in']!="") : ?>
				<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">View Status <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="profile.php">Profile</a></li>
						<li><a href="order.php">Booking Status</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</li>
				<?php else : ?>
					<li><a href="admin/index.php"title="Admin Login"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Admin Login</a></li>
					<li><a href="login.php"title="login"><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;User Login</a></li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</nav>   

<!--Menu Bar Close Here -->
