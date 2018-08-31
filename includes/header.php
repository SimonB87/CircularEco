<?php
require 'config/config.php';

 /*if the user is loggen in, make the username variable equal to username. If user is not logged in, send him back to register page.*/
if (isset($_SESSION['username'])) {
  $userLoggedIn = $_SESSION['username'];
}
else {
  header("Location: register.php");
}

?>

<html>
<head>
	<title>Welcome to Swirlfeed</title>
</head>
<body>

  ++++<br>
