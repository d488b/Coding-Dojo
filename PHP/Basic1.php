<?php 
	$number = rand(50, 100);
	echo $number;
	$score = $number;
	if($score < 70)
	{	
		echo "<h1>$score</h1>";
		echo "<h2>Grade: D</h2>"; 
	}
	elseif($score >= 70 && $score < 80)
	{	
		echo "<h1>$score</h1>";
		echo "<h1>Grade: C</h2>";
	}
	elseif ($score < 90 && $score >= 80)
	{	
		echo "<h1>$score</h1>";
		echo "<h2>Grade: B</h2>";
	}
	else
	{
		echo "<h1>$score</h1>";
		echo "<h2>Grade: A</h2>";
	}
?>