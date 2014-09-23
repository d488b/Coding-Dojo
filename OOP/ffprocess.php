<?php
include("connection.php");
session_start();
class Process{
	private $connection;

	function __construct()
	{
		$this->connection = new Connection("friend_finder");
		if(isset($_POST['action']) AND $_POST['action'] == 'register')
		{
			$message = $this->registerAction();
			echo json_encode($message);
		}
		elseif(isset($_POST['action']) AND $_POST['action'] == 'login')
		{
			$message = $this->loginAction();
			echo json_encode($message);
		}
		elseif(isset($_POST['action']) AND $_POST['action'] == 'add_friend')
		{
			$this->add_friend();
		}
		else
		{
			session_destroy();
			header("Location: fflogin.php");
			exit;
		}
	}

	private function registerAction()
	{
		//invalid email
		if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
		{
			$message["email"] = "Incorrect email format.";
		}
		//numbers in name
		if(!ctype_alpha($_POST["first_name"]) or strlen($_POST["first_name"]) < 1)
		{
			$message["first_name"] = "Incorrect first name format.";
		}
		//numbers in name
		if(!ctype_alpha($_POST["last_name"]) or strlen($_POST["last_name"]) < 1)
		{
			$message["last_name"] = "Incorrect last name Format.";
		}
		//Passwords did not match
		if($_POST["password"] != $_POST["confirm_password"])
		{
			$message["confirm_password"] = "Your passwords don't match";
		}
		//Too short of password
		if(strlen($_POST["password"]) < 6)
		{
			$message["password"] = "Password must be longer than 5";
		}

		//If no errors were found
		if(!isset($message))
		{
			$check_user = mysql_query("SELECT * FROM users WHERE users.email = '".$_POST['email']."'");
			$rows = mysql_num_rows($check_user);

			//If no user with same email
			if($rows == 0)
			{
				$new_user_sql = "INSERT INTO users(first_name, last_name, email, password, created_at, updated_at) VALUES('".mysql_real_escape_string($_POST['first_name'])."', '".mysql_real_escape_string($_POST['last_name'])."', '".mysql_real_escape_string($_POST['email'])."', '".mysql_real_escape_string(md5($_POST['password']))."', NOW(), NOW()) ";
				$new_user = mysql_query($new_user_sql);

				$_SESSION['id'] = mysql_insert_id();
				$_SESSION['email'] = $_POST['email'];
				$_SESSION['last_name'] = $_POST['last_name'];
				$_SESSION['first_name'] = $_POST['first_name'];
				$_SESSION['logged_in'] = TRUE;
				return;
			}
			//Found user with same email
			else
			{
				$message['email'] = "Email ".$_POST['email']." already in user.";
				return $message;
			}
		}
		return $message;
	}
	//Log in 
	private function loginAction()
	{
		$user_info = $this->connection->fetch_record("SELECT * FROM users WHERE users.email = '".$_POST['email']."' AND users.password = '".md5($_POST['password'])."' ");

		if($user_info != NULL)
		{
			$_SESSION['id'] = $user_info['id'];
			$_SESSION['email'] = $user_info['email'];
			$_SESSION['last_name'] = $user_info['last_name'];
			$_SESSION['first_name'] = $user_info['first_name'];
			$_SESSION['logged_in'] = TRUE;

			return;
		}
		else
		{
			$message["badpassemail"] = "Invalid email or password";
			return $message;
		}
	}

	private function add_friend()
	{
		$query = "INSERT INTO friends(user_id, friend_id) VALUES({$_SESSION['id']},{$_POST['id']})";
		mysql_query($query);
		$query = "INSERT INTO friends(user_id, friend_id) VALUES({$_POST['id']},{$_SESSION['id']})";
		mysql_query($query);
		header('location: ffhome.php');
	}

}

$process = new Process();
?>