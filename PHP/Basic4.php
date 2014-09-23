<?php 
	$array = array( 121,3,121,232,12,1,42,2);
	$max = $array[0];
	foreach ($array as $item) {
		if ($item > $max){
			$max = $item;
		}

	}

 	$min = $array[0];
 	foreach ($array as $item) {
 		if ($item < $min) {
 			$min = $item;
 		}
 	}
 	echo "$min<br>" . "$max";
?>