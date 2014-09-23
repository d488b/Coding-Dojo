<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Checker boarder</title>
	<style>
		td{
			width: 10px;
			height: 10px;
		}
		.red{
			background-color: red;
		}
		.black{
			background-color: black;
		}
	</style>
</head>
<body>
	<table border=1>
		<tbody>
			<?php
			function checker_board($size){
				for($tr = 0; $tr < $size; $tr++)
				{
					echo "<tr>";
					for($td = 0; $td < $size; $td++)
					{
						if(($tr + $td) % 2 == 0)
						{
							echo "<td class='red'></td>";
						}
						else
						{
							echo "<td class='black'></td>";
						}
					}
					echo "</tr>";
				}
			}
			checker_board(8);
			?>
		</tbody>
	</table>
</body>
</html>