<?php $res = $display->select_all("admin WHERE username = " . "'" . $_SESSION['admin_logged_in'] . "'"); ?>

<head>
	<link href="https://fonts.googleapis.com/css?family=Baloo+Bhai" rel="stylesheet">
</head>

<body>
  <h1 style="background-color:#ed2553;border-radius:50px;text-align:center;font-family: 'Baloo Bhai', cursive;box-shadow:5px 5px 9px black;text-shadow:2px 2px #fff;">Admin Profile</h1><br>
  <center><img src="devlop/img2.png"style="width:180px;height:180px;background-color:blue;"class="img-circle"></center>
  <div class="container"style="width:100%;">
    <form action="/action_page.php">
      <div class="form-group">
        <label for="email">Name:</label>
        <input type="text" readonly id="username" value="<?= $res[0]['username']; ?>" class="form-control" name="name">
      </div>
      <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" readonly class="form-control" id="pwd" placeholder="Enter password" name="pwd"value="<?= $res[0]['password']; ?>">
      </div>
    </form>
  </div>
</body>
</html>