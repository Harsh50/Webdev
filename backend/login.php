
<?php
session_start();


$username="";
$error1="";$error2="";
$auth_error="";global $flag;
global $captcha_error;




function validateCaptcha()
{
	$code=htmlspecialchars(trim($_POST["captcha"]));
	if(strcasecmp($_SESSION["security_code"],$code)!=0)
	{
		global $captcha_error;
		$captcha_error="* The code entered is incorrect";
		return false;
		
		}
	return true;
}

 	 
 	 $db=mysqli_connect("localhost","root","","users");
 
    if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
  }  
 


if(isset($_POST['user']) && isset($_POST['pass']))
{
	if(empty($_POST['user'])){
$error1="* Field cannot be empty";}
if (empty($_POST['pass'])){
$error2="* Field cannot be empty";} 
 	if(validateCaptcha())
{	
$username = mysqli_real_escape_string($db, $_POST['user']);

$password= sha1(mysqli_real_escape_string($db,$_POST['pass']));


$data = mysqli_query($db,"SELECT * from login where username='".$username."' and password='".$password."'");
   if(mysqli_num_rows($data)==1){
		$_SESSION['user']=$_POST["user"];
		$_SESSION['authenticated']=true;
		header("location:home.php");
		}
	else
	$auth_error=" *Invalid username or password!!";
}
}
?>
<!doctype html>
<html>
<head><title>FacePalm</title></head>
<style type="text/css">
body{
	font-family:sans-serif;
	font-size:25px;
	position:absolute;
	top:5%;
	left:30%;
	background: #20d8b8;
	}
	div{
		border-style: double;
		border-width: 4px;
		border-color: black;
	border-radius:10px;
	padding:15px;
	background-color: #fff;
		}
		input{
					height:20px;}
		a{
			text-decoration: none;}
			input[type="submit"],button{
				height:50px;
				width:100px;
				font-size: 20px;
				font-weight: bold;
				color:black;}
				button{float:right;}
				input[type="submit"],	button{border-radius:10px;}
				input[type="submit"]:hover,button:hover{
					background-color: lightblue;}
	h1
	{ 
	   
		
		font-weight: bold;
		}
		span{color:red;
		font-size: 18px;
		font-weight: bold;}
</style>
<body>
<h1>&nbsp&nbsp&nbspUser Login</h1>
<div>
<form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
<span><?php echo $auth_error?></span><br/><br/>
Username: <input type="text" name="user" value="<?php echo $username?>"> <span><?php echo $error1?></span><br/><br />
Password: <input type="password" name="pass"  /><span><?php echo $error2?></span><br /><br /><br />
<img id="captcha_image" src="create_image.php"></img><br /><br />
<label for='captcha' >Enter the code:</label>
    <input type="text" id="captcha" name="captcha"/><span id='captcha_error' class='error'><?php echo $captcha_error?></span><br><br>
    
   
<input type="submit" value="LogIn" /><button><a href="register.php"> Sign Up</a></button>
</form>


</div>
</body>
</html>