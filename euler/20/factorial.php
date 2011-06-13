<?php
ob_end_flush();
$prd = 1;
for($i=1;$i<=100;$i++) {
	$prd =  bcmul($prd,$i);
	echo "\n$i = $prd";

}

$factorialDigits = str_split($prd);
$factorialDigitSum = 0;
foreach($factorialDigits as $factorialDigit) {
	$factorialDigitSum += $factorialDigit;
}

echo " \n digits sum = $factorialDigitSum \n\n";
