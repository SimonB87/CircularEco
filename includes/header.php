<?php
require 'config/config.php';

 /*if the user is loggen in, make the username variable equal to username. If user is not logged in, send him back to register page.*/
if (isset($_SESSION['username'])) {
  $userLoggedIn = $_SESSION['username'];
  $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
  $user = mysqli_fetch_array($user_details_query);
}
else {
  header("Location: register.php");
}

?>

<html>
<head>
	<title>Welcome to Circular Economy</title>

  <!-- jQuery link -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

  <!-- Bootstrap 3.3.2 - https://getbootstrap.com/docs/3.3/getting-started/ -->
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

  <!-- Fontawesome link -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

  <!-- my style sheet -->
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>
<body>

<div class="top_bar container">
  <div class="logo">
    <a href="index.php">Circular Economy</a>
  </div>

  <nav>
    <a href="#">
      <?php
        echo $user['first_name'];
      ?>
    </a>
    <a href="#"><i class="fa fa-home fa-lg"></i></a>
    <a href="#"><i class="fa fa-envelope fa-lg"></i></a>
    <a href="#"><i class="fa fa-bell-o fa-lg"></i></a>
    <a href="#"><i class="fa fa-users fa-lg"></i></a>
    <a href="#"><i class="fa fa-cog fa-lg"></i></a>
    <a href="#"><i class="fas fa-question"></i></a><!-- link to user-manual -->
    <a href="includes\handlers\logout.php"><i class="fa fa-sign-out-alt fa-lg"></i></a>

  </nav>

</div>

<div class="wrapper">
