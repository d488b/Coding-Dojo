<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Intermediate 2</title>
	<link rel="stylesheet" href="../css/Intermediate2.css">
</head>
<body>


<?php
	echo "<table>";
		echo "<thead><tr>";
		for ( $i = 0; $i < 10 ; $i ++)
		{
			echo "<th>" . $i . "</th>";
		}
		echo "</tr></thead>";

		echo "<tbody>";
		for ($row = 1; $row < 10 ; $row++)
		{ 
			if( $row %2 == 0)
			{
				echo "<tr class='shaded'>";
			}
			else 
			{
				echo "<tr>";
			}
			echo "<td class='bold'>" . $row . "</td>";
			for ($num = 1; $num < 10 ; $num++ )
		{
			echo "<td>" . $num * $row . "</td>";
		}
		echo "</tr>";
		}

		echo "</tbody>";
	echo "</table>";

 ?>

</body>
</html>