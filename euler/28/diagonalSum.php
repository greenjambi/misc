<?php

ob_end_flush();
$size = 1001;

$maxLength = ($size-1)/2;

$sum = 0;
for ($i=0;$i<$maxLength; $i++) {

	$sum += 4* pow((2*$i + 1 ),2) + 12 * ($i + 1)  ;
echo "sum = $sum\n";	
}
	$sum += pow(2*$i+1,2);

echo "sum = $sum\n";
