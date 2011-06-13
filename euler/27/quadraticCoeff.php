<?php
ob_end_flush();
require_once '../misc_functions/isPrime.php';

function equationResult($n,$a,$b)
{

	return pow($n,2) + $a*$n + $b;

}
$maxSum = 0;
for ($b = -999; $b<1000; $b+=2 ) {
//$b = 41;
//	echo " -------- \n";
	if (isPrime(abs($b))) {
		echo "$b - "; 
		$a_LowerLimit = -1 * $b - 1;
		$a_LowerLimit = ($a_LowerLimit > -999) ? $a_LowerLimit : -999;
		for ($a = $a_LowerLimit; $a < 1000; $a++) {
//			echo "\n --- $b X $a ==  ";
			$n = 0;
			do {
				$n++;
				$equationResult = equationResult($n,$a,$b);
//				echo "$equationResult, ";
		
			} while ($equationResult > 1 && isPrime($equationResult));
//			echo ".... $n - ";
			if ($n >= $maxSum) {
				$maxSum = $n;
				echo " a = $a | maxSum = $maxSum **  " ;
			}
		}
	}
}

echo "\n*********\n\n";
