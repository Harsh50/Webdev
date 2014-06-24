<?php
session_start();
?>
<!doctype html>
<head>
<meta charset="utf-8"></meta>
<title>Homepage</title>
<style>
  body {
            background: #20d8b8;
            color: #999;
            font-size: 100%;
            font-family:  sans-serif;
            margin: 3em;
        }

        .body_m {
            background: #999;
        }

       

          

        img {
            border-radius: 50%;
            height: 200px;
        }

        .sub {
            bottom: 0px;
            width: 100%;
            position: absolute;
            background: #636363;
            height: 40px;
            text-align: center;
            color: white;
            padding-bottom: 20px;
            font-size: 18px;
            font-weight: 300;
        }

        #name {
            font-size: 20px;
        }

        h2 {
            margin-bottom: 0;
        }

        h3 {
            color: #f6b3a4;
            margin-top: .5em;
            font-weight: normal;
        }

        .flip-container {
            margin: 0 auto;
            -webkit-perspective: 1000;
            -moz-perspective: 1000;
            
            
        }

            .flip-container:hover .flipper {
                -webkit-transform: rotateY(180deg);
                -moz-transform: rotateY(180deg);
            }

        .flipper {
            background: #fff;
            -webkit-transition: 0.6s;
            -webkit-transform-style: preserve-3d;
            -moz-transition: 0.6s;
            -moz-transform-style: preserve-3d;
            position: relative;
        }

        .front, .back {
            -webkit-backface-visibility: hidden;
            -moz-backface-visibility: hidden;
            position: absolute;
            top: 0;
            left: 0;
        }

        .front {
            text-align: center;
            padding-top: 30px;
            background: #fff;
            z-index: 1;
        }

        .flip-container, .front, .back {
            width: 20em;
            height: 20em;
        }

        .back {
            background: #636363;
            padding-top: 30px;
            -webkit-transform: rotateY(-180deg);
            -moz-transform: rotateY(-180deg);
        }

            .back p {
                margin-left: 30px;
                color: white;
                font-weight: 300;
            }
           a{
           	text-decoration:none;
           	color:black;
            padding:15px;
            border-radius:10px;
            background-color:#fff; 
            position:absolute;
            top:60%;
            left:47%;
            
            font-size:20px;          		
           		}
          a:hover{
          	background-color:lightblue;}
       </style>
</head>
<body>

<?php
$firstname=$lastname=$dp=$interest=$birth=$gender=$dept="";
if($_SESSION['authenticated']==true)
{
	
	$db=mysqli_connect("localhost","root","","users");
	if(mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		exit();
  } 
  $user=$_SESSION['user'];
		$sql="SELECT * from login where username="."'$user'";
		$data=mysqli_query($db,$sql);
		$info=mysqli_fetch_assoc($data);
			
		
				$firstname=$info["firstname"];
				$lastname=$info["lastname"];
				$dp=$info["dp"];
				$birth=$info["dob"];
				$interest=$info["interests"];
				$gender=$info["gender"];
				switch($info["dept"])
				{
					case 'cse':$dept="Computer Science and Engineering";
					           break;
					 case 'mech':$dept="Mechanical Engineering";
					           break;
					           case 'meta':$dept="Metallurgy and materials and Engineering";
					           break;
					           case 'ece':$dept="Electronics and Commnications Engineering";
					           break;
					           case 'chem':$dept="Chemical Engineering";
					           break;
					           case 'eee':$dept="Electrical and Electronics Engineering";
					           break;
              case 'prod':$dept="Production Engineering";
					           break;
          
					
					}
				
				
	
	
	
	
	}
	else {
		
	 header("Location:login.php",true,303);
	 die();
		
		}
?>


    
    <div class="flip-container">
        <div class="flipper">
            <div class="front">
                <img src=<?php echo "'uploads/".$dp."'"?> />
                <p><?php echo $firstname." ".$lastname?></p>
                <div class="sub">
                    <p><?php echo $dept?> </p>
                </div>
            </div>
            <div class="back">
                <p id="name"><?php echo $firstname." ".$lastname?></p>
                <p>Birth: <?php echo $birth?></p>
                <p>Gender:<?php echo $gender?></p>
                <p>Interests:<?php echo $interest?></p>
                
            </div>
        </div>
    </div>
    <div id="logout"><p><a href="logout.php">Logout</a></p></div>
</body>
</html>
</body>
</html>