<?php 
	function convert_number($i)
	{


		if($i %2 == 0)
		{
			$i = $i / 2;
		}
		else
		{
			$i = (($i * 3) + 1);
		}
	return $i;
	}
echo convert_number(2523);
?>
