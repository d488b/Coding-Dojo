<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Posts</title>
	<link rel="stylesheet" href="basic1.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript">
        $(document).ready(function(){
        $(document).on('submit',"form", function(){
            var form = $(this);
            $.post(
            	form.attr('action'),
            	form.serialize(),
            	function(data){
             	$('#notes').html(data);
            }, "json");
            return false;
        });
    });
	</script>
</head>
<body>
	<div id="wrapper">
		<h1>My Posts:</h1>
		<div id="notes"></div>
		<form action="basic1process.php" method="post">
			<label>Add a note:</label><br>
			<textarea name='content' rows="5" cols='45'></textarea><br>
			<input type="submit" value="Post It!">
		</form>

</body>
</html>