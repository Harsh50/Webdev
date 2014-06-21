<?php
session_start();
global $error;
global $pass_error,$cpass_error,$date_error,$fname_error,$lname_error,$email_error,$link_error,$file_error,$user_error,$captcha_error;

function validateNonEmpty()
{

		if(empty($_POST["fname"]) or empty($_POST["email"]) or empty($_POST["username"]) or empty($_POST["dob"]) or empty($_POST["gender"]) or empty($_POST["password"]) or empty($_POST["cpassword"]))
		{
			global $error;
		$error="* Fields marked with asterisk cannot be empty";
		return true;
		}
else	 
return true;
}  
function validate()
{
	$t1= validateDate();
	$t2=validateEmail(); $t3=validateLink(); $t4=validateName(); $t5=validatePass();$t6=validateFile();
	$t7=validateUsername();
	$t8=validateCaptcha();
	if($t1 and $t2 and $t3 and $t4 and $t5 and $t6 and $t7 and $t8)
	return true;
	
	
	else {return false;}
}	
function validateDate()
{
	
	$date=htmlspecialchars(trim($_POST["dob"]));
	
	if(!preg_match("/^\d{4}-\d{2}-\d{2}$/",$date) and !empty($date))
	{  global $date_error;
		$date_error="* Invalid Format!!";
		return false;
		}
		else 
		return true;
	
}
function validateName()
{
	$fname=htmlspecialchars(trim($_POST["fname"]));
	$lname=htmlspecialchars(trim($_POST["lname"]));
	$f=$l=0;
	if(!preg_match("/^[A-Z][A-Za-z]*$/",$fname) and !empty($fname))
	{ global $fname_error;
	$fname_error ="* Invalid format! It should contain only alphabets and start with a capital letter";
	 $f=1;
	}
	if(!preg_match("/^[A-Z][A-Za-z]*$/",$lname) and !empty($lname))
	{ global $lname_error;
	$lname_error ="* Invalid format! It should contain only alphabets and start with a capital letter";
	 $l=1;
	}
	if($f or $l )
	return false;
	else 
	return true;
}	
function validateEmail()
{
	$email=htmlspecialchars(trim($_POST["email"]));
	if(!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$/",$email) and !empty($email))
	{ global $email_error;
		$email_error="*Invalid email!";
		return false;
		}
		else {
			return true;
	}
}

function validatePass()
{
	$pass=htmlspecialchars(trim($_POST["password"]));
	$cpass=htmlspecialchars(trim($_POST["cpassword"]));
	$flag1=$flag2=0;
	
	if(!preg_match("/^.{6,}$/",$pass) and !empty($pass))
	{
		global $pass_error;
	 $pass_error="*Should contain atleast 6 characters";
	 $flag1=1;
	}
	if($pass!=$cpass and !empty($cpass))
	{global $cpass_error;
		$cpass_error="*Passwords do not match!";
	 $flag2=1;
		}
	if($flag1 or $flag2)
	return false;
	else 
	return true;
}
function validateLink()
{
	$link=htmlspecialchars(trim($_POST["link"]));
	if(!preg_match("/^http[s]{0,1}|:\/\/github\.com\/\w+$/",$link) and !empty($link))
	{global $link_error;
	 $link_error="*Should be a valid github link of the form https://github.com/username";
	 return false;
	}
	return true;
}	
function validateFile()
{
	if($_FILES['photo']['name'])
	{
		if(!$_FILES['photo']['error'])
	   {
	   	 $file_name=$_FILES['photo']['tmp_name'];
	   	 if($_FILES['photo']['size'] > 200000) //can't be larger than 200 KB
		  {
			global $file_error;
			$file_error="* File size should be less than 200KB!";
			return false;
		  }
		  $currentdir = getcwd();
        $target = $currentdir."\/uploads\/".$_POST["username"].strtolower($_FILES['photo']['name']);
        
		  move_uploaded_file($_FILES['photo']['tmp_name'], $target);
		  return true;
		  }
		  
		  else {
		  	global $file_error;
		  	$file_error=$_FILES['photo']['error'];
		  	return false;
		  	}
	}
	return true;
}	  
function validateUsername()
{
	$db=mysqli_connect("localhost","root","","users");
	if(mysqli_connect_errno())
	{
		echo "Error connecting to database:" . mysqli_connect_error();
		exit();
		}
	$username=mysqli_real_escape_string($db,$_POST["username"]);
	$sql="SELECT * from login";
	$data=mysqli_query($db,$sql);
	while($info=mysqli_fetch_assoc($data))
	{
		if(strtolower($info["username"])==strtolower($username))
		{ global $user_error;
		$user_error="* This username is already taken! Please select some other username";
		return false;
			
			}
		
	}
	return true;
	
	}	
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
	
?>