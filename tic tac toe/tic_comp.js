

		var selected;

		var content;

		var winningCombinations;

		

		var theCanvas;

		var c;

		var cxt;

		var squaresFilled = 0;

		

var username;
 var player='X';
 var cpu='O';
var currentTurn=player;
		

		window.onload=function(){

			

			selected = [];

			content = [];

			winningCombinations = [[0,1,2],[3,4,5],[6,7,8],[0,3,6],[1,4,7],[2,5,8],[0,4,8],[2,4,6]];



			for(var l = 0; l <= 8; l++){

			selected[l] = false;

			content[l]='';

			}

		       username = prompt("Enter your name:");

startTimer(10);



		

                if (typeof(Storage) == "undefined")



  document.getElementById("msg").innerHTML="Sorry, your browser does not support Web Storage...Leaderboard wont be shown";
  

  







};






 function cpuMove()
 {
 	if(currentTurn==player) return;
 	if(squaresFilled==9) return;
 	copy();
 	cpuCurrentTurn=cpu;
 	var res,ci,choose = -500;
 	for(var i=0;i<cpuContent.length;i++)
 	{
 		 if(cpuContent[i]==='')
 		 {
 		 	cpuContent[i]=cpuCurrentTurn;
 		 	squaresFilled++;
 		 	swapCpuTurn();
 		 	res=search(1);
 		 	cpuContent[i]='';
 		 	squaresFilled--;
 		 	if(choose == -500){
					choose = res;
					ci = i;}
					
			else if(res > choose){
					choose = res;
					ci = i;
					
				}
 		 	
 		 	 swapCpuTurn();
 		 	}
 		}
 	var k=ci+1;
 	canvasClicked(k);
 	
 	
 	}





		//Game methods

		function canvasClicked(canvasNumber){

			theCanvas = "canvas"+canvasNumber;

			c = document.getElementById(theCanvas);

			cxt = c.getContext("2d");

         startTimer(10);



			if(selected[canvasNumber-1] ===false){

				if(currentTurn==player){

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



				swapCurrentTurn();

				selected[canvasNumber-1] = true;

				squaresFilled++;

				var symbol=checkForWinners(content);
				if(symbol=='X')
				{
					alert("You Won!!");
					playAgain();
					leaderboard_update(20);
					return;}
				else if(symbol=='O')
				{
					
					alert("You Lost!!");
					leaderboard_update(-5);
					playAgain();
					return;}



				if(squaresFilled==9){

					alert("Its a draw!!");
					leaderboard_update(0);
					playAgain();
					return;

					

				}

			  cpuMove();

			}

			else{

				alert("Space already occupied!!");

			}



		}

function swapCurrentTurn()
{if(currentTurn==player)
 currentTurn=cpu;
 else
 currentTurn=player;
}
 
 var cpuContent=[];


 function copy()
 {
 for(var l = 0; l <= 8; l++)
 {
 	cpuContent[l]=content[l];
 	}
 }	
 var cpuCurrentTurn;
 
 	function swapCpuTurn()
 	{
 		if (cpuCurrentTurn==cpu)
 		cpuCurrentTurn=player;
 		else
 		cpuCurrentTurn=cpu;}
 	function search(level)
 	{
 		var res=checkForWinners(cpuContent);
 		if(res == 'O'){
		return  100-level;
	}else if(res == 'X'){
		return level-100;
	}else if(res=="draw")
	return 0;
	
	var choose = -500;
	var temp;
	
	for(var i = 0 ; i < cpuContent.length ; i++){
		
			if(cpuContent[i] ===''){
				cpuContent[i] = cpuCurrentTurn;
				swapCpuTurn();
				squaresFilled++;
				temp = search(level + 1);
				swapCpuTurn();
				cpuContent[i] = '';
				squaresFilled--;
				if(choose == -500){
					choose = temp;
				}else if(cpuCurrentTurn==cpu){
					if(temp > choose) choose = temp;
				}else if(cpuCurrentTurn==player){
					if(temp < choose) choose = temp;
				}
			}	
		}
	
	return choose;
}
 	

		function checkForWinners(c){

			

			for(var a = 0; a < winningCombinations.length; a++){

			if(c[winningCombinations[a][0]]=='X'&& c[winningCombinations[a][1]]==	'X' && c[winningCombinations[a][2]]=='X')

				return 'X';
			}	
for( a = 0; a < winningCombinations.length; a++){
			if(c[winningCombinations[a][0]]=='O'&& c[winningCombinations[a][1]]==	'O' && c[winningCombinations[a][2]]=='O'){

				return 'O';	

			}
		}
		if(squaresFilled==9)

        return "draw";
       else
       return "notend";
     }

		
		



		function playAgain(){



                       

			y=confirm("PLAY AGAIN?");

			if(y===true){

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
 if(n!==null)
 {
 theCanvas = "canvas"+n;

			c = document.getElementById(theCanvas);

			cxt = c.getContext("2d");
 if(selected[n-1]===false)
 {
  if(currentTurn==player){

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

				swapCurrentTurn();

				selected[n-1] = true;

				squaresFilled++;

				var symbol=checkForWinners(content);
				if(symbol=='X')
				{
					alert("You Won!!");
					playAgain();
					leaderboard_update(20);
					return;}
				else if(symbol=='O')
				{
					
					alert("You Lost!!");
					leaderboard_update(-5);
					playAgain();
					return;}



				if(squaresFilled==9){

					alert("Its a draw!!");
					leaderboard_update(0);
					playAgain();
					return;

					

				}



			

					
      cpuMove();
      break;
				}
      
			
  }
 
}
}


function leaderboard_update(k)
{
	
	
	var flag=0;
	for(var i=0;i<localStorage.length;i++)

{var key=localStorage.key(i);
 if(key==username)
 {
	localStorage[key]=(parseInt(localStorage[key])+k);
	flag=1;
}
}
if(flag===0)
localStorage.setItem(username,k);
}
function leaderboard_show()
{disable();
	
	document.getElementById("box").style.display="none";
	document.getElementById("t").style.display="none";
	document.getElementById("head").style.display="none";
var html="<table><th>Rank</th><th>Name</th><th>Points</th>";
var rank=[];


for(i=0;i<localStorage.length;i++)

{var key=localStorage.key(i);
rank.push([key,localStorage[key]]);
}
rank.sort(function(a, b){ return a[1] < b[1] ? 1 : a[1] > b[1] ? -1 : 0 ;});
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
