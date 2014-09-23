<?php 
	
	$heads = 0;
	$tails = 0;
	for ( $i = 0; $i < 5000; $i++){
		$coin = rand(0,1);
	if ($coin == 0) {	
		$heads ++;
		echo "$i You got heads! so far, you've got heads " . $heads . " times" . " and tails " . $tails . " times so far.<br>" ;
	}
	else{
		$tails ++;
		echo "$i You got tails! so far, you've got tails " . $tails . " times" . " and heads " . $heads . " times so far.<br>" ;

	}

}

?>