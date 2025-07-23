<?php
error_reporting(0);

$weather = "";
$error = "";

$dt = new DateTime('now', new DateTimeZone('Asia/Dhaka'));

if(isset($_GET['lat']) && isset($_GET['lon']))
{
	$lat = $_GET['lat'];
	$lon = $_GET['lon'];
}
$urlContent = @file_get_contents("https://api.openweathermap.org/data/2.5/weather?lat={$lat}&lon={$lon}&appid=e671e2ef52d67bcec7a25da21cbcfc77");

	$weatherArray = json_decode($urlContent, true);

	if($weatherArray && $weatherArray['cod'] == 200)
	{
		$city = $weatherArray['name'];
		$weather = "The weather in <b>".$city."</b> is currently '<b>".$weatherArray['weather'][0]['description']."</b>'.";

		$tempInCelcius = intval($weatherArray['main']['temp'] - 273.15);

		$weather.= "The Temparature is: ".$tempInCelcius."&deg;C and wind speed is:" .$weatherArray['wind']['speed']."m/s.";

	}

	else
	{
		$error = "Couldn't find the the city- Please tryu again";
	}



?>

<!DOCTYPE html>
<html>
<head>
	<title>Weather App</title>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<style type="text/css">
		html
		{
			background: url(weather-img.jpg) no-repeat center fixed;
			-webkit-background-size: cover;
			background-size: cover;
		}

		body
		{
			background: none;
		}

		h1
		{
			color: white;
		}

		.container
		{
			text-align: center;
			margin-top: 100px;
			width: 450px;
		}

		input
		{
			margin: 15px, 0;
		}

		#weather
		{
			margin-top: 15px;
		}
	</style>

	<script type="text/javascript">
		window.onload = function()
		{
			const search = new URLSearchParams(window.location.search);
			if(!search.has('lat') || !search.has('lon'))
			{
				if(navigator.geolocation)
				{
					navigator.geolocation.getCurrentPosition(function(position){

						let lat = position.coords.latitude;
						let lon = position.coords.longitude;
						window.location.href = `?lat=${lat}&lon=${lon}`;

					}, function(error){

						alert("Location access denied. cannot fetch weather data");
					});
				}

				else
				{
					alert("Geolocation is not supported by your device.");
				}
			}
		}
	</script>
</head>
<body>
	<div class="container">
		<h1>What's Today Weather</h1>
		
		<div id="weather">
			<?php

				if($weather)
				{
					echo '<div class="alert alert-success" role="alert">'.$weather.'</div>';			
				}

				elseif($error)
				{
					echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
				}

			?>
		</div>

		<?php echo $dt->format('F j,Y,g:ia'); ?>
	</div>
</body>
</html>