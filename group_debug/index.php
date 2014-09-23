<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>The Polls</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/polls.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script>
		function update_results()
		{
			$('#poll_update').submit(function(){
				var form = $(this);
				console.log(form);
				$.post(form.attr('action'), form.serialize(), function(data){
					get_results();
					return false;
				}, "json");
			});
		}
		funcion get_results()
		{
			$("#update_post").submit(function(){
				var form = $(this);
				console.log(form);
				$.post(form.attr('action'), form.serialize(), function(data){
					$("#target").text(data.html);
					update_results();
				});
				return false;
			);
			$("#update_post").submit();
		}
		$(document).(function(){
			get_results();
		});
	</script>
</head>
<body>
	<div class='container'>
		<form action="process.php" method='post' id="update_post">
			<input type="hidden" name='action' value='get_polls'>
		</form>
		<h1>The polls</h1>
		<a class="btn btn-primary" href="add_poll.php">Add a poll</a>
		<div id="target"></div>
	</div>
</body>
</html>