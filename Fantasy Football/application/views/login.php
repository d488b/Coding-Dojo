<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>DBFF Login/Register</title>
	<link rel="stylesheet" type="text/css" href="" />
</head>
<body>
	<div id="container">
		<header>
			<h1>Welcome To DB Fantasy Football</h1>
			<h3>Login</h3>
			<h3>Register</h3>
			<form id="login">
				<input type="hidden" name="action" value="login" />
				<label>Email: </label>
				<input type="text" name="user_name"><br>
				<label>Password: </label>
				<input type="password" name="password"><br>
				<input type="submit" value="Login">
			</form>
			<form id="register">
				<input type="hidden" name="action" value="register" />
				<label>First Name: </label>
				<input type="text" name="first_name"><br>
				<label>Last Name: </label>
				<input type="text" name="last_name"><br>
				<label>Email: </label>
				<input type="text" name="email"><br>
				<label>Password: </label>
				<input type="password" name="password"><br>
				<label>Confirm Password: </label>
				<input type="password" name="confirm_password"><br>
				<input type="submit" value="Register">
		</header>









	</div>
</body>
</html>
