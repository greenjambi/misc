<?php

ob_end_flush();

$arrPow = array();
for ($i=0;$i<10;$i++) {

	$arrPow[] = pow($i,5);

}

$intSumOfNums = 0;
for ($i=2;$i< 354294; $i++) {

//	echo ".";
	$arrDigits = str_split(trim($i));
	$sum = 0;
	foreach ($arrDigits as $intDigit) {

		$sum += $arrPow[$intDigit];
		
	}
	
	if ($sum == $i	) {
		$intSumOfNums += $i;
		echo "\n$i ** " ; 

	}
	
}


echo "  prd = $intSumOfNums \n";
