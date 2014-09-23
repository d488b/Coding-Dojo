<?php 
session_start();
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Registration</title>
</head>
<body>
	<div id="container">
		<h3 id="validation">
			<?php 
				
				if(isset($_SESSION['success']))
				{
					echo $_SESSION['success'] . "<br>";
				}
				if(isset($_SESSION['errors']))
				{
					if(isset($_SESSION['errors']['correct']))
					{
						foreach ($_SESSION['errors']['correct'] as $error)
						{
							echo $error . "<br>";
						}
						unset($_SESSION['errors']['correct']);
					}
					if(isset($_SESSION['errors']))
					{
						foreach($_SESSION['errors'] as $error)
						{
							echo $error . "<br>";
						}
					}
				}
			unset($_SESSION['errors']);
			unset($_SESSION['success']);

			?>
		</h3>
		<h1>Register</h1>
		<form id="user_registration" action="wallprocess.php" method="post">
			<input type="hidden" name="action" value="register" />
			<label>Email: </label>
			<input type="text" name="email"><br>
			<label>First Name: </label>
			<input type="text" name="first_name"><br>
			<label>Last Name: </label>
			<input type="text" name="last_name"><br>
			<label>Password: </label>
			<input type="password" name="password"><br>
			<label> Confirm Password: </label>
			<input type="password" name="confirm_password"><br>
			<label> Birth Date: </label>
			<input type="date" name="birth_date"><br>
			<input type="submit">
		</form>
		<h1>Login</h1>
		<form id="user_login" action="wallprocess.php" method="post">
			<input type="hidden" name="action" value="login" />
			<label>Email: </label>
			<input type="text" name="email"><br>
			<label>Password: </label>
			<input type="password" name="password"><br>
			<input type="submit">
		</form>
	</div>
</body>
</html>



