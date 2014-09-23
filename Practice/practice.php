<?php
function scores2($array)
{
	$new_array = $array;
	sort($new_array);
	if($array == $new_array)
		return "true";
	return "false";
}

	echo scores2(2,5,3,2,63,434,2,74533,42,34);

?>
