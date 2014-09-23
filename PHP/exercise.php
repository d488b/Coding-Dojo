<?php 

	session_start();
	
	// var_dump($_SESSION);
	$_SESSION['testing'] = "Hi";
 ?>


<html>
	<head>
		<title>Form Exercises</title>
	</head>

	<body>
<?php 
	if(isset($_SESSION['message']))
	{
		echo "<div class='error'>" . $_SESSION['message'] . "</div>";
	}



 ?>

			<form action = "process.php" method="post">
				Email: <input type="text" name="email" placeholder="enter email address" /><br>
				Password:<input type="password" name="password" placeholder="password" /><br>
				<input type="submit" value="Login" />
			</form>

	</body>
</html>
