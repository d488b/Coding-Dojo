<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add a poll</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/polls.css">
</head>
<body>
	<div class="container">
		<h1 class="offset2">Add a poll</h1>
		<form action='process.php' method="post" class="form-horizontal">
			<input type="hidden" name="action" value="create">
		    <label class="control-label" for="title">Title</label>
		    <div class="controls">
		      	<input type="text" id="title" name="title" placeholder="title">
		    </div>
		    <label class="control-label" for="description">Description</label>
		    <div class="controls">
		      	<input type="text" id="description" name="description" placeholder="Short description">
		    </div>
			<label class="control-label">Options</label>
		    <div class="controls">
		    	<input type="text" name="option1" placeholder="Option 1">
		    </div>
		    <div class="controls">
		    	<input type="text" name="option2" placeholder="Option 2">
		    </div>
		    <div class="controls">
		    	<input type="text" name="option3" placeholder="Option 3">
		    </div>
		    <div class="controls">
		    	<input type="text" name="option4" placeholder="Option 4">
		    </div>
		    </div>
			<input type="submit" value="Add poll" class="btn btn-primary offset4">
			<a href="index.php" class="btn btn-warning">Cancel</a>
		</form>
	</div>
</body>
</html>