<?php 
session_start();
	$error_message = array();
	if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
	{
		$error_message['correct'][] = "Email is valid";
	}
	else
	{
		$error_message['email']= "Invalid email!";
	}

	if(isset($_POST['first_name']))
	{
		if(!ctype_alpha($_POST['first_name']))
		{	
			$error_message[] = "Invalid name!";
		}
		else
		{
			$error_message['correct'][] = "Name is valid";
		}
	}
	if(isset($_POST['last_name']))
	{
		if(!ctype_alpha($_POST['last_name']))
		{	
			$error_message[] = "Invalid last name!";
		}
		else
		{
			$error_message['correct'][] = "Last name is valid";
		}
	}
	if(isset($_POST['password']))
	{
		if(strlen($_POST['password']) < 7)
		{
			$error_message[] = "Invalid password! Entry is too short.";
		}
		else
		{
			$error_message['correct'][] = "Password accepted";
		}
	}	
	if(isset($_POST['confirm_password']))
	{
		if($_POST['confirm_password'] != $_POST['password'])
		{
			$error_message[] = "Passwords do not match!";
		}
		else
		{
			// $error_message[] = "Passwords match";
		}
	}
	if(isset($error_message['correct']) AND count($error_message['correct']) == 4)
	{
		$_SESSION['success'] ="Thanks for submitting your information.";
		header('location: wall.php');
	}
	else
	{
		header('location: AdvancedBasic.php');
	}
	$_SESSION['errors'] = $error_message;
	


?>