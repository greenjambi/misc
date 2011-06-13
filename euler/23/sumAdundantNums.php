<?php
ob_end_flush();

$arrAbundantNumbers = array();

function isAbundant($num)
{
	$sumDivisors = 1;
	for($i=2;$i<=sqrt($num);$i++) {
		if ($num % $i == 0) {
			$sumDivisors += $i;
			$sumDivisors += ($num/$i == $i)? 0 : $num/$i;
		}
		if ($sumDivisors > $num) {
			return true;
		}
	}
	return false;
}

function isSumOfAbundantNumbers($i)
{
	global $arrAbundantNumbers;
	foreach ($arrAbundantNumbers as $intAbundantNumber) {
		$numDiff = $i - $intAbundantNumber;
		if ($numDiff > 0 && in_array($numDiff,$arrAbundantNumbers)) {
			return true;
		}
		if ($intAbundantNumber > $i/2) {
			break;
		}
	}
	return false;
}

function arraySumCombination()
{
	global $arrAbundantNumbers;
	echo "\n finding sum combination... ";
	$arrSumCombination = array();
	$intSizeAbundantNums = sizeof($arrAbundantNumbers);
	foreach ($arrAbundantNumbers as $key => $intAbundantNumber) {
//		echo " - $i \n$intAbundantNumber " ;
		for($i=$key; $i< $intSizeAbundantNums ; $i++) {
			if ($intAbundantNumber + $arrAbundantNumbers[$i] > 28123 ) {
				continue 2;
			}
			$arrSumCombination[$intAbundantNumber + $arrAbundantNumbers[$i]] = 1;
//			echo "\n ".( $intAbundantNumber + $arrAbundantNumbers[$i]) ;
		}
	}
	
	echo "done";
	print_r($arrSumCombination);
}

function arraySumCombination_v2()
{
	echo "Finding which all are sum of abundant";
	global $arrAbundantNumbers;
	for ($i=1; $i<28123; $i++ ) {
		echo "last pointed at : $intAbundantNumberPointer \n $i";
		foreach($arrAbundantNumbers as $intAbundantNumberPointer => $intAbundantNumber) {
			if ($intAbundantNumber > $i) {
				continue 2;
			}
			if (in_array_v3( ($i-$intAbundantNumber)  ,   $arrAbundantNumbers    )) {
				echo " ** "; continue 2;
			}
		}

	}
}

function in_array_v2($n,$h)
{
	foreach($h as $hVal) {
		if ($n > $hVal) {
			return false;
		}
		if ($n == $hVal) {
			return true;
		}
		return false;
	}

	
}

function in_array_v3($n,$h)
{
	$res = exec("grep -w $n /tmp/aa.txt ");
	echo $res;
	if (trim($res) == '') {
		return false;
	}
	return true;
	
}

$intSumNumberNotSumOfAbundantNumbers = 0;
echo "Finding abundant numbers .. ";
for ($i=1;$i<=28123; $i++) {
/*	echo "\n $i ";
	if (isSumOfAbundantNumbers($i) == false) {
		$intSumNumberNotSumOfAbundantNumbers += $i;
		echo "*** --------  $intSumNumberNotSumOfAbundantNumbers " ; 
	}
*/
	if (isAbundant($i)) {
//	echo "\n $i ";
		$arrAbundantNumbers[] = $i;
	}

}
echo "done";

	$arrSumCombination = arraySumCombination();


echo "\n";
