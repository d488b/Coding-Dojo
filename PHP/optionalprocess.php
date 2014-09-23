<?php 
	session_start();
	if(isset($_POST['months']))
	{	
		if($_POST['months'] == "January" OR $_POST['months'] == "February" OR $_POST['months'] == "March")
		{	
			$_SESSION['quarter'] = "1st";
		}
		else if($_POST['months'] == "April" OR $_POST['months'] == "May" OR $_POST['months'] == "June")
		{	
			$_SESSION['quarter'] = "2nd";
		}
		else if($_POST['months'] == "July" OR $_POST['months'] == "August" OR $_POST['months'] == "September")
		{
			$_SESSION['quarter'] = "3rd";
		}
		else if($_POST['months'] == "October" OR $_POST['months'] == "November" OR $_POST['months'] == "December")
		{	
			$_SESSION['quarter'] = "4th";
		}
		header("Location: optional1.php");
	}
	 
	if(isset($_POST['months']))
	{
		if($_POST['months'] == "January" OR $_POST['months'] == "February" OR $_POST['months'] == "December")
		{	
			$_SESSION['season'] = "Winter";
		}
		else if($_POST['months'] == "April" OR $_POST['months'] == "May" OR $_POST['months'] == "March")
		{	
			$_SESSION['season'] = "Spring";
		}
		else if($_POST['months'] == "July" OR $_POST['months'] == "August" OR $_POST['months'] == "June")
		{
			$_SESSION['season'] = "Summer";
		}
		else if($_POST['months'] == "October" OR $_POST['months'] == "November" OR $_POST['months'] == "September")
		{	
			$_SESSION['season'] = "Fall";
		}
		header("Location: optional1.php");
	}

	if(isset($_POST['months']) AND $_POST['months'] == "January")
	{
		$_SESSION['birthstone'] = "Garnet";
		header("Location: optional1.php");
	}















	 ?>