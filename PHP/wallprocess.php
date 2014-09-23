<?php 
	require("wall2.php");
	session_start();
if(isset($_POST['action']) and $_POST['action'] == "login")
{
	login();
}
else if(isset($_POST['action']) and $_POST['action'] == "register")
{
	registration();
}
else if(isset($_POST['action']) and $_POST['action'] == "post_message")
{
	postMessage();
}
else if(isset($_POST['action']) and $_POST['action'] == "post_comment")
{
	postComment();
}
else
{
	session_destroy();
	header("Location: Wall.php");
}


function registration()
{
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
		if(strlen($_POST['password']) < 6)
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
			$error_message[] = "Passwords match";
		}
	}
	if(isset($error_message['correct']) AND count($error_message['correct']) >= 4)
	{
		$query = "SELECT * FROM users WHERE email = '{$_POST['email']}'";
		$users = fetch_all($query);	
		if(count($users)>0)
		{
			$error_message[] = "someone already registered with this email address";
			$_SESSION['errors'] = $error_message;
			header("Location: wall.php");
		}
		else
		{
			$query = "INSERT INTO users (first_name, last_name, email, password, created_at) VALUES ('{$_POST['first_name']}', '{$_POST['last_name']}', '{$_POST['email']}', '".md5($_POST['password'])."', NOW())";
			mysql_query($query);

			$error_message['success'] = "User was successfully created!";
			$_SESSION['success'] = $error_message['success'];
			header("Location: wall.php");
		}
	}
	else
	{
		$_SESSION['errors'] = $error_message;
		header('location: Wall.php');
	}
}
	

function login()
{
	$errors = array();

	if(!(isset($_POST['email']) AND filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)))
	{
		$errors[] = "Invalid email.";
	}

	if((isset($_POST['password']) AND strlen($_POST['password']) < 6))
	{
		$errors[] = "Please double check your password. (length must be greater than 6)";
	}

	if(count($errors) > 0)
	{
		$_SESSION['errors'] = $errors;
		header('Location: wall.php');
	}
	else
	{
		$query = "SELECT * FROM users WHERE email = '{$_POST['email']}' AND password ='".md5($_POST['password'])."'";
		$users = fetch_all($query);
		
		if(count($users)>0)
		{
			$_SESSION['logged_in'] = true;
			$_SESSION['user']['first_name'] = $users[0]['first_name'];
			$_SESSION['user']['last_name'] = $users[0]['last_name'];
			$_SESSION['user']['email'] = $users[0]['email'];
			$_SESSION['user']['id'] = $users[0]['id'];
			header("Location: wall1.php");	
		}
		else
		{
			$errors[] = "Invalid login information";
			$_SESSION['errors'] = $errors;
			header('Location: wall.php');
		}
	}	
}

function postMessage()
{
	if(!empty($_POST['message']))
	{	
		$query = "INSERT INTO messages (message, users_id, created_at) VALUES ('{$_POST['message']}', '{$_SESSION['user']['id']}', NOW())";
		mysql_query($query);
		header("Location: Wall1.php");
	}
	
	else
	{
		$error = "Message cannot be blank.";
		$_SESSION['error'] = $error;
		header("Location: Wall1.php");
	}
}

function postComment()
{
	if(!empty($_POST['comment']))
	{
		$query = "INSERT INTO comments (comment, users_id, created_at, messages_id) VALUES ('{$_POST['comment']}', '{$_SESSION['user']['id']}', NOW(), '{$_POST['messages_id']}')";
		mysql_query($query);
		header("Location: Wall1.php");
	}
	else
	{
		$error = "Comments cannot be blank.";
		$_SESSION['error'] = $error;
		header("Location: Wall1.php");
	}

}
?>