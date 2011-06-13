<?php

$a= bcpow('2','1000');
$b = str_split($a);
print_r($b);
$sum = 0;
foreach($b as $d) {
	$sum += $d;
}
echo "\n" . $sum;
echo "\n";
