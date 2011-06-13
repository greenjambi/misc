<?php

$arrPrd = array();
$prd = 1;
for ($i=1;$i<=10;$i++) {
	$prd *= $i;
	$arrPrd[11-$i] = $prd;
}
print_r($arrPrd);
$bal = 1000000;
for($i = 1; $i<=10; $i++) {
	echo "\n $i - bal = ". number_format($bal ); 
	for ($j=1;$j<10;$j++) {
		if ($j*$arrPrd[$i+1] >= $bal ) {
			break;
		}
	}
	$multiplier = $j -1 ;
	echo "   multiplier = $multiplier  | multiplicant = {$arrPrd[$i+1]}";
	$bal -= ($multiplier)*$arrPrd[$i+1];
	echo "  | m = " .  number_format($multiplier * $arrPrd[$i+1]); 
}

echo "\n\n";
