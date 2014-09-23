<?php 
	session_start();

	if($_POST)
	{
		$errors= array();

		if(empty($_POST['email']))
		{
			$errors[] = "Email address cannot be blank.";
		}
		else if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == FALSE)
		{
			$errors[] = "Email should be in valid format.";
		}
		
		
		if(empty($_POST['first_name']))
		{
			$errors[] = "First name cannot be blank.";
		}
		else if(is_numeric($_POST['first_name']))
		{
			$errors[] = "First name cannot contain numbers.";
		}
		

		if(empty($_POST['last_name']))
		{
			$errors[] = "Last name cannot be blank.";
		}
		else if(is_numeric($_POST['last_name']))
		{
			$errors[] = "Last name cannot contain numbers.";
		}


		if(empty($_POST['password']))
		{
			$errors[] = "Password cannot be blank.";
		}
		else if(strlen($_POST['password']) < 7)
		{
			$errors[] = "Password cannot be less than 7 characters.";
		}


		if(empty($_POST['confirm_password']))
		{
			$errors[] = "Confirm password cannot be blank.";
		}
		else if($_POST['confirm_password'] != $_POST['password'])
		{
			$errors[] = "Passwords do not match.";
		}

		if($errors == array())
		{
			$_SESSION['success_message'] = "Thank you for submitting your form.";
		}
		else
		{
			$_SESSION['error_messages'] = $errors;
		}

	}
	header("location: practice.php");

?>