<?php
ob_end_flush();


function isPrime($num)
{
	for ($i = 3; $i <= ceil($num /3); $i++) {
		if ($num % $i == 0) {
			return false;
		}
	}
	return true;
}

////////


$upperLimitEx = 2000000;
$limit = $upperLimitEx/6 + 1;
$sum = 5;

for ($i=1; $i<=$limit  ;$i++) {

	$n1 = 	6*$i - 1;
	$n2 = 6*$i + 1;
	if (isPrime($n1) && $n1 < $upperLimitEx ) {
		echo "\n## $n1";
		$sum += $n1;
	}
	if (isPrime($n2) && $n2 < $upperLimitEx) {
		echo "\n## $n2";
		$sum += $n2;
	}
}

/*
$limit = 10000;
$sum = 5;

for ($i=5; $i<$limit  ;$i+=2) {

	if (isPrime($i)) {
		echo "\n## $i";
	    $sum += $i;
	
	}
}
*/

echo "\n##sum = $sum";

echo "\n";
