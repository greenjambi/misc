<?php

$fh = fopen("sumAbundantNums", "r");
$sum = 0;
while (!feof($fh)) {
	$line = trim(fgets($fh));
	$sum = bcadd($sum, $line);
	echo $line ." - " . $sum . "\n";
}

fclose($fh);

echo "\n";
