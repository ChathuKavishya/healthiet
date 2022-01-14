<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>BMI Calculator</title>
		<link href="images/Logo.png" rel="icon">
	</head>
	<style media="screen">
		body{
			margin: 0;
			padding: 0;
			text-align: center;
			font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
			background-image: linear-gradient(120deg,#6bff77, #026e3c);
			min-height: 150vh;
		}
		div{
			width: 500px;
			position: absolute;
			top: 50%;
			left: 50%;
			background-color: #fff;
			transform: translate(-50%, -50%);
			padding: 20px;
			border-radius: 10px;
			box-shadow: 1px 1px 20px #152413;
		}
		h2{
			font-size: 30px;
			font-weight: 600;
		}
		.text{
			text-align: left;
			margin-left: 150px;
		}
		#w, #h{
			color: #222f3e;
			text-align: left;
			font-size: 20px;
			font-weight: 200;
			outline: none;
			border: none;
			background: none;
			border-bottom: 1px solid #026e3c;
			width: 200px;
		}
			#w:focus, #h:focus{
				border-bottom: 2px solid #026e3c;
				width: 300px;
				transition: .5s;
			}
			#result{
				color: #026e3c;
			}
			#demo{
				font-family:Georgia, 'Times New Roman', Times, serif ;
				color: #6e0210;
			}
			#btn{
				font-family: inherit;
				margin-top: 10px;
				border: none;
				color: #fff;
				background-image: linear-gradient(120deg,#ff6b6b, #026e3c);
				width: 150px;
				padding: 10px;
				border-radius: 30px;
				outline: none;
				cursor: pointer;
			}
			#btn:hover{
				box-shadow: 1px 1px 10px #026e3c;
			}
			#info{
				font-size: 12px;
				font-family: inherit;
			}
	</style>


<script type="text/javascript">
		function BMI() {
			var h=document.getElementById('h').value;
			var w=document.getElementById('w').value;
			var bmi=w/(h/100*h/100);
			var bmio=(bmi.toFixed(2));

			document.getElementById("result").innerHTML="Your BMI is " + bmio;
			let resulting;

			if (bmio < 18.5) {
			resulting = "You are Underweight!";
			} else if (bmio < 25) {
			resulting = "You are Normal!";
			} else if (bmio < 30) {
			resulting = "You are Overweight!";
			} else {
			resulting = "You are obese!";
			}
			document.getElementById("demo").innerHTML = resulting;
		}
	</script>


<?php

include('includes/database.inc.php');

session_start();
echo "helloooo";
if($_SESSION["memberID"] != NULL){
	if (isset($_GET["submit"])) {
		$mass = $_GET['weight'];
		$height = $_GET['height'];
		$height = $height/100;
		function bmi($mass,$height) {
			$bmi = $mass/($height*$height);
			return $bmi;
		}   
		$bmi = bmi($mass,$height); //<--- this is critical
	}
	
	$memberID = $_SESSION["memberID"];
	$sql = "UPDATE healthcare SET bmi=? WHERE memberID=?;";
	$stmt = mysqli_stmt_init($conn);

	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header ("location: ../signup.php?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt, 'ss',$bmi,$memberID);   
	mysqli_stmt_execute($stmt);       
	mysqli_stmt_close($stmt); 
	echo "hello";
}
?> 

<body>
	<form >
		<div>
			<h2>BMI Calculator</h2>
			<p class="text">Height [cm]</p>
			<input type="text" id="h" name= "height">
			<p class="text">Weight [kg]</p>
			<input type="text" id="w" name= "weight">
			<p id="result"></p>
			<p id="demo"></p>
			<form action="cal.php" method="GET">
			<button id="btn" type = "submit" name ="submit"  onClick="BMI()">Calculate</button>
 			</form>
			<p id="info">Please enter height [cm] and weight [kg]</p>
            <a href="userPannel.html" class="btn">Home</a>
	
		</div>
</form>
</body>
</html>