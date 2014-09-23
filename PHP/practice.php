<?php 
	session_start();
 ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8'">
	<title>Registration Form</title>
</head>
<body>
	<div id="containter">
		<?php 
			if(isset($_SESSION['success_message']))
			{
				echo "<p>{$_SESSION['success_message']}</p>";
				unset($_SESSION['success_message']);
			}
			else if(isset($_SESSION['error_messages']))
			{
				foreach($_SESSION['error_messages'] as $error_message)
				{
					echo "<p>$error_message</p>";
				}
				unset($_SESSION['error_messages']);
			}
		?>
		<form action="practice1.php" method="post">
			<div class="field_block">	
				<label for="email">Email *</label>
				<input type="text" name="email" id="email" placeholder="Email Address">
			</div>
			<div class="field_block">	
				<label for="first_name">First Name *</label>
				<input type="text" name="first_name" id="first_name" placeholder="First Name">
			</div>			
			<div class="field_block">	
				<label for="last_name">Last Name *</label>
				<input type="text" name="last_name" id="last_name" placeholder="Last Name">
			</div>			
			<div class="field_block">	
				<label for="birth_date">Date of Birth</label>
				<input type="date" name="birth_date" id="birth_date">
			</div>
			<div class="field_block">	
				<label for="password">Password *</label>
				<input type="password" name="password" id="password" placeholder="Password">
			</div>			
			<div class="field_block">	
				<label for="confirm_password">Confirm Password *</label>s
				<input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
			</div>

			<input type="submit" value="Register">
		</form>
	</div>
</body>
</html>