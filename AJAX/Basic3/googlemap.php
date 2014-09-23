<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Google Map</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<script>
	$(document).ready(function(){
		$('form').submit(function(){
			$("#directions").html('');
			
			
			$('#to_span').html($('#from').val());
			$('#from_span').html($('#to ').val());

			var url = "http://maps.googleapis.com/maps/api/directions/json";
			$.get(url, { sensor: false, origin: $('#from').val(), destination: $('#to').val() }, function(data){
				var directions = data['routes'][0]['legs'][0]['steps'];
				for(var item in directions)
				{
					$("#directions").append(directions[item]["html_instructions"] + "<br>");
				}
				console.log(data['routes'][0]['legs'][0]['steps']);
			},'json');
			return false;
		});
	});
	</script>
</head>
<body>
	<form>
		From: <input  type="text" name="from" id="from">
		To: <input  type="text" name="to" id="to">
		<input type="submit" value="Get directions!">
	</form>
	<h3><u>Directions to  <span id='to_span'></span> from <span id='from_span'></span>    </u> </h3>
	<div id="directions">
		
	</div>
</body>
</html>