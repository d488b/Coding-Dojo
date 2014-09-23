<?php

//given a postitive integer calculate the sum of the digits, do this until the sum is one digit in size



function sum_to_one($input)
{
	$string_input = (string)$input;
	$sum = 0;
	if(strlen($string_input) == 1)
		return $input;
	for($i = 0; $i < strlen($string_input); $i++)
	{
		$sum += $string_input[$i];
	}
	sum_to_one($sum);
}
// echo sum_to_one(1234567);

function sum_to_one_math($input)
{
	$sum = 0;
	while ($input)
	{
		$sum += $input % 10;
		$input = floor( $input / 10 );
	}
	if ($sum > 9)
		return sum_to_one_math($sum);
	return $sum;
}
// echo sum_to_one_math(1234567);


function sum_to_1($input)
{
	$string_input = (string)$input;
	while (strlen($string_input) > 1)
	{
		$array = str_split($string_input);
		$sum = array_sum($array);
		$string_input = (string)$sum;
	}
	return $sum;
}

// echo sum_to_1(1234567);