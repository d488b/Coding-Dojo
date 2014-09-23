<?php
session_start();
include('Wall2.php');
$query = "SELECT * FROM messages LIMIT  5";
$messages = fetch_all($query);
$query = "SELECT * FROM comments ORDER BY created_at ASC";
$comments = fetch_all($query);
?>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Wall</title>
	<link rel="stylesheet" href="wallprocess.css">
</head>
<body>
	<div id="container">
		<div id="header">
			<h1>CodingDojo Wall</h1>
			<h4>Welcome <?= $_SESSION['user']['first_name'] ?>!</h4>
			<a href="Wall.php">Log off</a>
		</div>
		<div id="main">	
			<div id="messages">
				<?php 
					if(isset($_SESSION['error']))
					{
						echo $_SESSION['error'] . "<br>";
						unset($_SESSION['error']);
					}


				?>
				<h5>Post a message</h5> 
				<form action="wallprocess.php" method="post">
					<input type="hidden" name="action" value="post_message">
					<input id="box" type="text" name="message" style="width:800px;height:80px;">
					<input id="button" type="submit" value="Post a message">
				</form>

			</div>
			<div id="posted_messages">
<?php 		foreach($messages as $message)
			{ ?>
				<h3><?= $message['users_id'] . " " . $message['created_at'] ?></h3>
				<p><?= $message['message'] ?></p>
<?php			foreach($comments as $comment)
				{ 
					if($message['id'] == $comment['messages_id'])
					{?>
						<div id="comment_box">
						<h3><?= $comment['users_id'] . " " . $comment['created_at'] ?></h3>
						<p><?= $comment['comment'] ?></p>
						</div>
<?php				} ?>
<?php			} ?>
				<form action="wallprocess.php" method="post">
					<input type="hidden" name="messages_id" value=<?= $message['id'] ?>>
					<textarea rows="4" cols="100" name="comment"></textarea><br>
					<input type="submit" value="Post a comment">
					<input type="hidden" name="action" value="post_comment">
				</form>
<?php		} ?>
			
			</div>
		</div>
	</div>

</body>
</html>