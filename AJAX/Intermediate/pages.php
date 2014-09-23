<?php
require('pagesconnection.php');
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pagination</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$('form').submit(function(){
				var form = $(this);
				$.post(form.attr('action'), form.serialize(), function(data){
					console.log(data);
					$('tbody').html(data.html);
					$("#pages").html(data.buttons);
				}, 'json');
				return false;
			});
			$("#pages").on('click', 'button', function(){
				$('#page').val($(this).attr('id'));
				$('form').submit();
			});
			$('#name').keyup(function(){
				$('#page').val('1');
				$('form').submit();
			})
			$("input").change(function(){
				$('#page').val('1');
				$('form').submit();
			})
			$('form').submit();
		});
	</script>
</head>
<body>
	<form action="pagesprocess.php" method='post'>
		<input type="hidden" name="page" value="1" id="page">
		<input type="text" name="name" id="name">
		<input type="date" name="from" id="from">
		<input type="date" name="to" id="to">
		<input type="submit" value="Search">
	</form>
	<div id="pages"></div>
	<table class="table">
		<thead>
			<tr>
				<th>Leads ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Registered Date</th>
				<th>Email</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
</body>
</html>