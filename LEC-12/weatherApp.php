<?php
error_reporting(0); //error ba warning na dear jonno

$weather = " ";
$error = " ";
$dt = new DateTime('now',new DateTimeZone('Asia/Dhaka'));

if($_GET['city'])
{
	$urlcontent = file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=".urlencode($_GET['city'])."&appid=e671e2ef52d67bcec7a25da21cbcfc77");

	$weatherarry = json_decode($urlcontent,true);

	if($weatherarry['cod']==200)
	{
		$weather ="The Weather in :".$_GET['city']." is currently '".$weatherarry['weather'][0]['description']."'.";

		$tempincelcious = intval($weatherarry['main']['temp']-273.15);

		$weather.="The Temparature is ".$tempincelcious."&deg;C and wind Speed is ".$weatherarry['wind']['speed']."m/s";
	}
	else
	{
		$error = "couldnt Find the city! Please try Again";
	}

}



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		Weather API Example
	</title>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>


	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js" integrity="sha512-TW5s0IT/IppJtu76UbysrBH9Hy/5X41OTAbQuffZFU6lQ1rdcLHzpU5BzVvr/YFykoiMYZVWlr/PX1mDcfM9Qg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

 <style>
 	html
 	{
 		background: url(weather.jpg) no-repeat center fixed;
 		-webkit-background-size:cover;
 		background-size: cover;
 	}
 	body
 	{
 		background: none;
 	}
 	h1
 	{
 		color: Black;
 	}
 	.container
 	{
 		text-align: center;
 		margin-top: 100px;
 		width: 500px;
 	}
 	#weather
 	{
 		margin-top: 15px;
 	}

 </style>
</head>
<body>
	<div class="container">
		<h1>Whats Today Weather....?</h1>

		<form>
			<fieldset>
				<legend>Enter Your City Name</legend>
				<label style="font-size: 15;">City Name</label>
				<input type="text" name="city" class="form-control" id="" placeholder="Dhaka,Barishal.."><br>
				<input type="submit" name="submit" class="btn btn-success" value="Check">
			</fieldset>
		</form>

		<div id="weather">
		<?php
		if($weather)
		{
			echo '<div class="alert alert-success">'.$weather.'</div>';
		}
		else if($error)
		{
			echo '<div class="alert alert-danger">'.$error.'</div>';
		}


		?>
	   </div>

	   <?php 
	   echo $dt->format('F,j,Y,g:ia');
	   ?>
	</div>
	

</body>
</html>