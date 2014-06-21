<?php

function update_database()
{
	 $db=mysqli_connect("localhost","root","","users");
 	 
 
    if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }  
  $username = mysqli_real_escape_string($db, $_POST['username']);
$password = sha1(mysqli_real_escape_string($db,$_POST['password']));
$fname= mysqli_real_escape_string($db,$_POST['fname']);
$lname = mysqli_real_escape_string($db,$_POST['lname']);	
$email = mysqli_real_escape_string($db,$_POST['email']);
$dob = mysqli_real_escape_string($db,$_POST['dob']);
$git = mysqli_real_escape_string($db,$_POST['link']);
$gender = mysqli_real_escape_string($db,$_POST['gender']);
$dept =mysqli_real_escape_string($db,$_POST['dept']);
$interests=mysqli_real_escape_string($db,$_POST['interests']);
$dp=	mysqli_real_escape_string($db,$_POST['username'].strtolower($_FILES['photo']['name']));
	$sql="INSERT INTO login (username, password, firstname,lastname,email,dob,git,gender,dept,interests,dp)
VALUES ('$username','$password','$fname','$lname','$email','$dob','$git','$gender','$dept','$interests','$dp')";
if (!mysqli_query($db,$sql)) {
  die('Error: ' . mysqli_error($db));
}
mysqli_close($db);
	
}