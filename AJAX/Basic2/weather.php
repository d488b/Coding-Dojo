<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Weather</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$('form').submit(function(){
				var city = $('#weather').val();
				var url = "http://api.worldweatheronline.com/free/v1/weather.ashx?callback=?";
				$.get(url, {key: 'jtpc4myth9fwxjgwz9fh5fw5', q: $("#weather").val(), format: 'json'}, function(data){
					data = data['data']['current_condition'][0]
					$("#info").empty();
					$("#info").append('<h2>Weather for: ' + $("#weather").val() + "</h2>");
					$("#info").append('<p>Current temp in F: ' + data['temp_F'] + "</p>");
					$("#info").append('<p>Current temp in C: ' + data['temp_C'] + "</p>");
					$("#info").append('<p>Current Windspeed: ' + data['windspeedMiles'] + "</p>");
					$("#info").append('<p>Weather Description: ' + data['weatherDesc'][0]["value"] + "</p>");
					console.log(data);
				}, 'json');
				return false;

			});
		});
	</script>
</head>
<body>
	<h3>The Codingdojo weather report!</h3>
	<form>
		<select name="weather" id="weather">
			<option value="Chicago, IL">Chicago, IL</option>
			<option value="Las Vegas, NV">Las Vegas, NV</option>
			<option value="Sunnyvale, CA">Sunnyvale, CA</option>
			<option value="Orlando, FL">Orlando, FL</option>
		</select>
		<input type="submit" value="Get weather!"> 
	</form>
	<div id="info">


	</div>
	<div id='info2'></div>
</body>
</html>