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
<body>
<h2> You have been successfully logged out. <a href="login.php">Click here</a> to login</h2></body>
</head>
</html>