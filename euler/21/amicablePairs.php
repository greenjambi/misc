<?php
ob_end_flush();
$arrNumSumDiv = array();
function sumDivisors($i,$limit)
{
	global $arrNumSumDiv;

	if (isset($arrNumSumDiv[$i])) {
		return $arrNumSumDiv[$i];
	}
	$sum = 1;
	for($j=2;$j<sqrt($i);$j++) {
		if ($i%$j==0) { 
//echo "$j, ";
			$sum += $j;
			$sum += $i/$j;
		}
		if ($sum > $limit) {
			return false;
		}
	}
//echo "\n sum $sum | ";
	$arrNumSumDiv[$i] = $sum;
	return $sum;
}

for($i=4;$i<10000;$i++) {
	echo "\n $i";
	$sum1 = sumDivisors($i,10000);
	if ($sum1 == false || $i == $sum1) {
	 	continue;
	}

	$sum2 = sumDivisors($sum1,$i) ;
	if ($sum2 == false) {
		continue;
	}

	if ($i == $sum2) {
		echo "\n $i -- $sum1 -- $sum2";
		$arrAmicablePairs[] = $i;
	}

}


//sumDivisors(220,10000);
//sumDivisors(284,10000);
print_r($arrAmicablePairs);
$intSumAmicablePair = 0;
foreach ($arrAmicablePairs as $num) {
   $intSumAmicablePair += $num;
}



echo "\n sum = $intSumAmicablePair \n\n";
