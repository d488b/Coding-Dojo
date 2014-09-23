<!doctype html>
<html lang="en">
<head>
	<title>Login</title>	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div id="reg" class="span6 offset2"></div>
		<div class="row">
			<form class="form-horizontal span6" action="ffprocess.php" method="post">
				<input type="hidden" name="action" value="register">
				<h2>Register</h2>
				<div class="control-group email">
					<label class="control-label" for="email">Email*</label>
					<div class="controls">
						<input type="text" id="email" name="email" placeholder="Email">
					</div>
				</div>
				<div class="control-group first_name">
					<label class="control-label" for="first_name">First Name*</label>
					<div class="controls">
						<input type="text" id="first_name" name="first_name" placeholder="First Name">
					</div>
				</div>
				<div class="control-group last_name">
					<label class="control-label" for="last_name">Last Name*</label>
					<div class="controls">
						<input type="text" id="last_name" name="last_name" placeholder="Last Name">
					</div>
				</div>
				<div class="control-group password">
					<label class="control-label" for="password">Password*</label>
					<div class="controls">
						<input type="password" id="password" name="password" placeholder="Password">
					</div>
				</div>
				<div class="control-group password">
					<label class="control-label" for="confirm_password">Confirm Password*</label>
					<div class="controls">
						<input type="password" id="confirm_password" name="confirm_password" placeholder="Password">
					</div>
				</div>

				<div class="control-group controls">
					<input type="submit" value="Register">
				</div>
			</form>

			<!-- login -->
			<form class="form-horizontal span6" action="ffprocess.php" method="post">
					<input type="hidden" name="action" value="login">
					<h2>Log In</h2>
				<div class="control-group">
					<label class="control-label" for="email">Email</label>
					<div class="controls">
						<input type="text" id="email" name="email" placeholder="Email">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="password">Password</label>
					<div class="controls">
						<input type="password" id="password" name="password" placeholder="Password">
					</div>
				</div>
				<div class="control-group controls">
					<input type="submit" value="Log In">
				</div>
			</form>
		</div>
	</div>	

</body>
</html>