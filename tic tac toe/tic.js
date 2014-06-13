
		var selected;
		var content;
		var winningCombinations;
		var turn = 0;
		var theCanvas;
		var c;
		var cxt;
		var squaresFilled = 0;
		
var user1,user2;
		
		window.onload=function(){
			
			selected= new Array();
			content = new Array();
			winningCombinations = [[0,1,2],[3,4,5],[6,7,8],[0,3,6],[1,4,7],[2,5,8],[0,4,8],[2,4,6]];

			for(var i = 0; i <= 8; i++){
			selected[i] = false;
			content[i]='';
			}
		       user1 = prompt("Enter player 1's name: ");
		       user2 = prompt("Enter player 2's name: ")
startTimer(10);

		
                if (typeof(Storage) == "undefined")

  document.getElementById("msg").innerHTML="Sorry, your browser does not support Web Storage...Leaderboard wont be shown";
  
  



}





		//Game methods
		function canvasClicked(canvasNumber){
			theCanvas = "canvas"+canvasNumber;
			c = document.getElementById(theCanvas);
			cxt = c.getContext("2d");
		
         startTimer(10);

			if(selected[canvasNumber-1] ==false){
				if(turn%2==0){
					cxt.beginPath();
					cxt.moveTo(10,10);
					cxt.lineTo(40,40);
					cxt.moveTo(40,10);
					cxt.lineTo(10,40);
					cxt.strokeStyle="lightcoral";
					cxt.lineWidth = 7;
					cxt.stroke();
					cxt.closePath();
					content[canvasNumber-1] = 'X';
				}

				else{
					cxt.beginPath();
					cxt.arc(25,25,20,0,Math.PI*2,true);
					cxt.strokeStyle="cyan";
					cxt.lineWidth = 7;
					cxt.stroke();
					cxt.closePath();
					content[canvasNumber-1] = 'O';
				}

				turn++;
				selected[canvasNumber-1] = true;
				squaresFilled++;
				checkForWinners(content[canvasNumber-1]);

				if(squaresFilled==9){
					alert("Its a draw!!");
			   leaderboard_update(user1,user2,0);
			   playAgain();
					
				}
			
			}
			else{
				alert("Space Already occupied!!");
			}

		}

		function checkForWinners(symbol){
			
			for(var a = 0; a < winningCombinations.length; a++){
			if(content[winningCombinations[a][0]]==symbol&&content[winningCombinations[a][1]]==	symbol&&content[winningCombinations[a][2]]==symbol){
				
					if(symbol=='X')
					{
					alert(user1+ " Won!!");
					leaderboard_update(user1,user2,10);
					playAgain();
					return;
				}
					else
					{
					alert(user2+ " Won!!");
					leaderboard_update(user2,user1,10);
					playAgain();
					return;}
				}
			}
			

		}

		function playAgain(){

                       
			y=confirm("PLAY AGAIN?");
			if(y==true){
				location.reload();
			}
			disable();
			
				
         
}
		
               
var id;
function startTimer(t)
{
 clearInterval(id);
 
 if(t>0)
{ 
  UpdateTimer(t);
t=t-1;
id=setTimeout(startTimer,1000,t);
}
else
{
 UpdateTimer(t);
 randomSelect();
}
 
}
function UpdateTimer(t) {
document.getElementById("timer").innerHTML=t;
}

function randomSelect()
{
 while(1)
 {
 var n= Math.floor(Math.random()*9+1);
 if(n!=null)
 {
 theCanvas = "canvas"+n;
			c = document.getElementById(theCanvas);
			cxt = c.getContext("2d");
 if(selected[n-1]==false)
 {
  if(turn%2==0){
					cxt.beginPath();
					cxt.moveTo(10,10);
					cxt.lineTo(40,40);
					cxt.moveTo(40,10);
					cxt.lineTo(10,40);
					cxt.strokeStyle="lightcoral";
					cxt.lineWidth = 7;
					cxt.stroke();
					cxt.closePath();
					content[n-1] = 'X';
				}

				else{
					cxt.beginPath();
					cxt.arc(25,25,20,0,Math.PI*2,true);
					cxt.strokeStyle="cyan";
cxt.lineWidth = 7;
					cxt.stroke();
					cxt.closePath();
					content[n-1] = 'O';
				}
           startTimer(10);
				turn++;
				selected[n-1] = true;
				squaresFilled++;
				checkForWinners(content[n-1]);

				if(squaresFilled==9){
					alert("THE GAME IS OVER!");
					
				}
		break;	
  }
 
}
}
}

function leaderboard_update(userA,userB,k)
{

	
	var flag1=0,flag2=0;
	for(var i=0;i<localStorage.length;i++)
{var key=localStorage.key(i);
 if(key==userA)
 {
	localStorage[key]=(parseInt(localStorage[key])+k);
	flag1=1;
}
if(key==userB)
{localStorage[key]=(parseInt(localStorage[key])-k);
	flag2=1;
	}
}
if(flag1==0)
localStorage.setItem(userA,k);
if(flag2==0)
localStorage.setItem(userB,-k);
}
function leaderboard_show()
{
	disable();
	
	document.getElementById("box").style.display="none";
	document.getElementById("t").style.display="none";
	document.getElementById("head").style.display="none";
var html="<table><th>Rank</th><th>Name</th><th>Points</th>";
var rank=new Array();

for(var i=0;i<localStorage.length;i++)
{var key=localStorage.key(i);
rank.push([key,localStorage[key]]);
}
rank.sort(function(a, b){ return a[1] < b[1];});
for(var i=0;i<rank.length;i++)
{
var key=rank[i][0];

html+="<tr><td>"+(i+1)+"</td><td>"+key+"</td><td>"+rank[i][1]+"</td></tr>";

}
html+="</table";
document.getElementById("leaderboard").innerHTML=html;
document.getElementById("leaderboard").style.display="block";
}
function disable()
{
for(var i=1;i<=9;i++)
{document.getElementById("canvas"+i).onclick=null;
	}
clearTimeout(id);
}