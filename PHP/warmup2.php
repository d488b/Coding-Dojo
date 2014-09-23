<?php

$a = 1;
$b = 0;
$total = 0;

	for ($a; $a < 4000000; $a += $b)
	{
		$b += $a
		if( $b%2 == 0 AND $b <4000000)
		{
			$total += $b;
		}
		else if ($a%2 == 0 AND $a < 4000000)
		{
			$total += $a;
		}

	}


function fib($num1, $num2, $sum = 0)
{
	if($num1 > 4000000 or $num2 >4000000)
		return $sum;
	if($num1 % 2 == 0)
			$sum += $num1;
	return
}











?>








