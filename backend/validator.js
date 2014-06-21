function validate(obj)
{
	if(!(obj.id=="lname"||obj.id=="link"||obj.id=="upload"||obj.id=="interests"))
	{
	validateNonEmpty(obj);}
	validateFormat(obj);
}	
function validateNonEmpty(obj)
{
	if(obj!=null)
	{
	if( obj.value=="" )
	{
		
		document.getElementById(""+obj.id+"_error").innerHTML="*Please enter a value";
		return false;
		}
		else{
		document.getElementById(""+obj.id+"_error").innerHTML="";
		return true;
		}
		}
}
function validateFormat(obj)
{
	var regex;
	var error="Invalid Format!";
	if(obj.value=="")
	return;
	if(obj.id=="fname" || obj.id=="lname")
	{
	regex=/^[A-Z][A-Za-z]*$/;
	error+="It should contain alphabets with first letter capital";
	}
	else if(obj.id=="email")
	{
	regex=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$/;
	error="Enter a valid email id";
}
	else if(obj.id=="username")
	{
	regex=/^\w+$/;
	error="It should be alphanumeric";
}
	else if(obj.id=="dob")
	{
	regex=/^\d{4}-\d{2}-\d{2}$/;
}
	else if(obj.id=="password")
	{
	regex=/^.{6,}$/;
	error="Should contain atleast 6 characters";
}
	else if(obj.id=="cpassword")
	{
	 var p=document.getElementById("password");
	 if(p.value!=obj.value)	
	 document.getElementById("cpassword_error").innerHTML="*Passwords do not match!";
	 else
	 document.getElementById("cpassword_error").innerHTML="";
	 return;
	}
	else if(obj.id=="link")
	{
	regex=/^https:\/\/github\.com\/\w+$/;
	error="Please enter a valid link of the form https://github.com/username";
}
	else
	return;
	if(!regex.test(obj.value))
	document.getElementById(""+obj.id+"_error").innerHTML="*"+error;
	else
	document.getElementById(""+obj.id+"_error").innerHTML="";
	}