<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Person Table</title>
	<style>
		.black{
			background-color: black;
			color: white;
		}
	</style>
</head>
<body>
	<?php
	$users = array( 
	   array('first_name' => 'Michael', 'last_name' => ' Choi '),
	   array('first_name' => 'John', 'last_name' => 'Supsupin'),
	   array('first_name' => 'Mark', 'last_name' => ' Guillen'),
	   array('first_name' => 'KB', 'last_name' => 'Tonel'),

	); ?>

	<table border=2>
		<thead>
			<tr>
				<th>User #</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Full Name</th>
				<th>FULL NAME</th>
				<th>Length</th>
			</tr>
		</thead>
		<tbody>
			<?php
			function table_maker($users)
			{
				$i = 1;
				$table = "";
				foreach($users as $user)
				{
					$class = "";
					if($i % 5 == 0)
						$class = "black";
					$full_name = trim($user['first_name']) . " " . trim($user['last_name']);
					
					$table .= "<tr class='$class'>";
					$table .= "<td>" . $i++ . "</td>";
					$table .= "<td>" . $user['first_name'] . "</td>";
					$table .= "<td>" . $user['last_name'] . "</td>";
					$table .= "<td>" . $full_name . "</td>";
					$table .= "<td>" . strtoupper($full_name) . "</td>";
					$table .= "<td>" . strlen($full_name) . "</td>";
					$table .= "</tr>";
				}
				return $table;
			}
			echo table_maker($users);

			?>
		</tbody>
	</table>
</body>
</html>