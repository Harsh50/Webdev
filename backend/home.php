<?php
session_start();
?>
<!doctype html>
<head>
<meta charset="utf-8"></meta>
<title>Homepage</title>
</head>
<body>
<?php
$firstname=$lastname="";
if($_SESSION['authenticated']==true)
{
	
	$db=mysqli_connect("localhost","root","","users");
	if(mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		exit();
  } 
		$sql="SELECT * from login";
		$data=mysqli_query($db,$sql);
		while($info=mysqli_fetch_assoc($data)) {
			
			if($info["username"]==$_SESSION["user"])
			{
				$firstname=$info["firstname"];
				$lastname=$info["lastname"];
				$dp=$info["dp"];
				}
	}
	echo "<br><h2>Welcome ".$firstname." ".$lastname;
	echo "<br><br><a href='logout.php'>Logout</a>";
	echo "<br/><br/><img src='uploads/".$dp." height='150' width='100''></img>";
	}
	else {
		
	 header("Location:login.php",true,303);
	 die();
		
		}
?>
</body>
</html>