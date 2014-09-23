<?php
	$x = array(4, 6, 1, 3, 5, 7, 25);
	echo "<h1>Part 1</h1>";
	function draw_stars($array){
		for($i = 0; $i<count($array); $i++ ){
			for($j = 0; $j<$array[$i]; $j++ ){
				echo "*";
			}
				echo "<br>";
		}

		
	}
	echo draw_stars($x);
	$y = array(4, "Tom", 1, "Michael", 5, 7, "Jimmy Smith");
	echo "<h1>Part 2</h1>";
	function draw_stars1($array)
	{
		for($i = 0; $i<count($array); $i++ )
		{
			if (is_numeric($array[$i]))
			{
				for($j = 0; $j<$array[$i]; $j++ )
				{
					echo "*";
				}
					echo "<br>";
			}

			else
			{
				for ($j = 0; $j<strlen($array[$i]); $j++)
				{	
					echo substr(strtolower($array[$i]), 0, 1);
				}
					echo "<br>";
			}
		
		}
	}
	echo draw_stars1($y);



?>

