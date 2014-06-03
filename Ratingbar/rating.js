var i;

 function disable(){
	 	
	 
for(i=1;i<=10;i++)
{
 
document.getElementById(i).src="unselected.png";
}
document.getElementById("h").innerHTML=": 0/10";
}

function reset()
{
	document.getElementById("stars").onmouseout= function(){disable();};
	document.getElementById("h").innerHTML=": 0/10";
	for(i=1;i<=10;i++)
	{ var k=document.getElementById(i);
		k.src="unselected.png";
		k.onmouseover= function(){ submit(this.id);};
		k.onclick= function(){ submit1(this.id);};
		
	}
}		
function submit(j)
{
 for(i=1;i<=10;i++)
{
 if(i<=j)
 document.getElementById(i).src="selected.png";
else
document.getElementById(i).src="unselected.png";
}
document.getElementById("h").innerHTML=": "+j+ "/10";
}

function submit1(j)
{
document.getElementById("stars").onmouseout=null;
 for(i=1;i<=10;i++)
{
 var k=document.getElementById(i);
 k.onmouseover=null;
 if(i<=j)
 k.src= "selected.png";

 
 k.onclick=null;
}
alert("Are you sure you want to give a rating of "+j+ " stars?");
}