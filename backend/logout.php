<?php
session_start();
$_SESSION['authenticated']=false;
$_SESSION['user']="";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8"/>
<title>Logged Out</title>
<style>
body{
	font-family:sans-serif;
	font-size:25px;
	position:absolute;
	top:5%;
	background: #20d8b8;
	}</style>
	</head>
<body>
<h3> You have been successfully logged out. <a href="login.php">Click here</a> to login</h3></body>
</body>
</html>