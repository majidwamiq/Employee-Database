<?php

ob_start();
session_start();

unset($_SESSION['login']);
session_destroy();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Logout</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<style>
  	.h1{
    	text-align: center;
  font-family: serif;
  font-size: 50px;
  margin-top: 8%;
  margin-right: 30px;
  color: #1e0138;
   font-style: italic;
    }
    .a{
    	text-align: center;
  font-family: serif;
  font-size: 20px;
    }
  </style>
</head>
<body>
	<div>
		<h1 class="h1">
		Logout Successfully
		<br>
		<img src="img/emoji.png" width="100px" height="100px">
</h1>
<div class="a">
	<a href="login.html">click Here To Login Again</a>
</div>
	</div>
</nav>
</body>
</html>