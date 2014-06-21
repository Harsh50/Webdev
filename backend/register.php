


<?php 

include_once("validator.php");
include_once("update.php");
if(isset($_POST['submitted']))
{
$f1=validateNonEmpty();$f2=validate();
if($f1 and $f2)
{
	update_database();
	header("Location:thanku.htm");
		
}

}
function autocomplete($name)
{
	if(isset($_POST[$name]))
   return htmlspecialchars(trim($_POST[$name]));
   
   return "";	
	}
	?>
<!doctype html>
<html>






<head>
<meta charset="utf-8" ></meta>
<title>Registration</title>
<style type="text/css">
body{
	font-family:sans-serif;
	font-size:18px;}
input,select[name="dept"],textarea[name="interests"]{
	position:absolute;
	left:20%;}
	span[class="error"]{position: absolute;
	color:red;
	font-size: 14px;
left:40%;
	font-weight: bold;}
	span[class="gerror"]{
	color:red;
	font-weight: bold;
	font-size: 16px;	
		}

	input:hover{
		background-color: lightgrey;}
input[type="radio"]
{
	position:absolute;
	left:auto;
	}
</style>
<link rel="stylesheet" href="jquery/css/ui-lightness/jquery.css"></link>
<script type="text/javascript" src="jquery/js/jquery-1.10.2.js" ></script>
<script type="text/javascript" src="jquery/js/jquery.js" ></script>
<script type="text/javascript" src="validator.js" ></script>
<script>
$(document).ready(function(){
$("#dob").datepicker({changeMonth:true,changeYear:true,dateFormat:'yy-mm-dd', yearRange: "1900:2014"});
$("#submit").button();
$("#radio").buttonset();

 
});</script>
</head>
<body>
<h4 style="color:red;">*required fields</h4>
<form action="<?php $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
<fieldset >
<legend>Register</legend>

<input type='hidden' name='submitted' id='submitted' value='1'/>





<div class='container'>
<span class="gerror"><?php global $error;echo $error;?></span><br /><br />
    <label for='fname' >First Name *: </label>
    <input type='text' name='fname' id='fname' value='<?php echo autocomplete("fname"); ?>'   onblur="validate(this)" required/>
    <span id='fname_error' class='error'><?php echo $fname_error?></span><br/><br/>

    <label for='lname' >Last Name: </label>
    <input type='text' name='lname' id='lname' value='<?php echo autocomplete("lname"); ?>' onblur="validate(this)"/>
    <span id='lname_error' class='error'><?php echo $lname_error?></span><br/><br/>
    <label for='gender' >Gender*:</label><br/>
    <div id="radio">
    <input id="radio1" type="radio" name="gender" value="male" required/><label for="radio1">Male</label>
    <input id="radio2" type="radio" name="gender" value="female" required/><label for="radio2">Female</label>
    <input id="radio3" type="radio" name="gender" value="other" required/><label for="radio3">Other</label>
    <span id='gender_error' class='error'></span><br /><br /></div>
    <label for='email' >Email Address *:</label>
    <input type='email' name='email' id='email' pattern="^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$" onblur="validate(this)" value='<?php echo autocomplete("email"); ?>'  required/>
    <span id='email_error' class='error'><?php echo $email_error?></span><br/><br/>

    <label for='username' >Username *:</label>
    <input type='text' name='username' id='username' value='<?php echo autocomplete("username"); ?>' required onblur="validate(this)"/>
    <span id='username_error' class='error'><?php echo $user_error?></span><br/><br/>

    <label for='dob' >Date Of Birth(yyyy/mm/dd)*:</label>
    <input type='text' name='dob' id='dob' value='<?php echo autocomplete("dob"); ?>' required onblur="validate(this)"/>
    <span id='dob_error' class='error'><?php echo $date_error?></span><br/><br/>

    <label for='password' >Password*:</label>
    
    
    <input type='password' name='password' id='password' onblur="validate(this)" required/>
<span id='password_error' class='error'><?php echo $pass_error?></span>
   <br/><br/>
    <label for='cpassword' >Confirm Password*:</label>
    <input type="password" name="cpassword" id="cpassword" required onblur="validate(this)"/>
    <span id='cpassword_error' class='error'><?php echo $cpass_error?></span><br/><br/>
    <label for='link' >Github Profile link :</label>
    <input type='url' name='link' id='link' value='<?php echo autocomplete("link"); ?>' onblur="validate(this)"/>
    <span id='link_error' class='error'><?php echo $link_error?></span><br/><br/>
    <label for='dept' >Department*:</label>
    <select name="dept" required>
    
    <option value="cse">Computer Science and Engineering</option>
    <option value="ece">Electronic and Communication Engineering</option>
    <option value="mech">Mechanical Engineering</option>
    <option value="eee">Electrical and Electronics Engineering</option>
    <option value="meta">Metallurgy and Materials Engineering</option>
    <option value="prod">Production Engineering</option>
    <option value="chem">Chemical Engineering</option>
    <option value="civil">Civil Engineering</option></select>
    <span id='dob_error' class='error'></span><br/><br/>
    <label for='photo' >Upload Profile Pic:</label>
    <input type="file" id="photo" name="photo"/>
    <span id='file_error' class='error'><?php echo $file_error?></span><br/><br/>
    <label for='interest' >Interests:</label>
    <textarea rows="5" cols="25" id="interests" name="interests" ><?php echo autocomplete("interests"); ?></textarea><br/><br/>
  <br/> <br/><br/><br/>
   <img style="position:absolute;left:20%;" id="captcha_image" src="create_image.php"></img><br /><br /><br />
   <label for='captcha' >Enter the code:</label>
    <input type="text" id="captcha" name="captcha"/><span id='captcha_error' class='error'><?php echo $captcha_error?></span><br><br>
   <br /><input type='submit' id='submit' value='Submit' /><br/>
</div>

</fieldset>



</form>
</body>
</html>