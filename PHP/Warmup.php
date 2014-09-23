<?php 
	$total = 0;
	for ($i = 100; $i <= 4000000; $i++)
		if($i %3 == 0 Xor $i % 5 == 0)
			$total += $i;
		echo $total;

 ?>



 <?php
	$sum = 0;
	for ($i = 100; i < 4000001; $i ++){
			if(($i % 3 or $i %5) and !($i %3 and $i %5)){
				$sum = $sum + $i;
			}
	}
	echo "Sum is: " . $sum;
?>




<?php 
function sum ($first, $second) {
	$total = 0;
	for($i=$first; $i <= $second; $i++){
		if (!((($i %5) == 0 ) && (($i % 3) == 0))){

		}
	}
}
	
?>