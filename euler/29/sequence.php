<?php

ob_end_flush();
$maxLimit = 100;

$arrSeq = array();
for ($i=2; $i<=$maxLimit; $i++) {
	
	for ($j=2; $j<=$maxLimit; $j++) {
		
		
		$res = pow($i,$j);
		echo "$res, ";
		$arrSeq[] = $res;
		
	}

}

echo "\n\n count = " . sizeof(array_unique($arrSeq));
echo "\n";
