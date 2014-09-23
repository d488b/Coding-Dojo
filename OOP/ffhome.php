<?php
	require('connection.php');
	session_start();
	if(!isset($_SESSION['logged_in']))
	{
		header("Location: fflogin.php");
		exit;
	}
	$connection = new Connection("friend_finder");
	$query = "SELECT * FROM friends LEFT JOIN users ON friend_id = users.id WHERE user_id = " . $_SESSION['id'];
	$friends = $connection->fetch_all($query);
	$query = "SELECT * FROM users";
	$people = $connection->fetch_all($query);
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
	<script type="text/javascript">
		$(document).ready(function(){

		});
	</script>
</head>
<body>
	<div class="container">
		<h1>Welcome <?= $_SESSION['first_name'] ?></h1>
		<a href="ffprocess.php">Log Out</a>
		<h3>List of Friend</h3>
		<div id="friends">
			<table class="table">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
					</tr>
				</thead>
				<tbody>
<?php  				$my_friends = array();
					foreach($friends as $friend)
					{
						$my_friends[] = $friend['id'];
						echo "<tr><td>" . $friend['first_name'] . " " . $friend['last_name'] . "</td><td>" . $friend['email'] . "</td></tr>";
					} ?>
				</tbody>
			</table>
		</div>
		<div id="people">
			<table class="table">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
<?php 				foreach($people as $person)
					{
						echo "<tr><td>" . $person['first_name'] . " " . $person['last_name'] . "</td><td>" . $person['email'] . "</td>";
						if(in_array($person['id'], $my_friends))
						{
							echo "<td>Friends</td></tr>";
						}
						else
						{ ?>
							<td>
								<form action="ffprocess.php" method="post">
									<input type="hidden" name="action" value="add_friend">
									<input type="hidden" name="id" value="<?= $person['id'] ?>">
									<input type="submit" value="Add Friend">
								</form>
							</td></tr>
<?php					}
					} ?>
				</tbody>
			</table>
		</div>
		
	</div>
</body>
</html>