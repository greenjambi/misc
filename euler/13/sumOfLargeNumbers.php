<?php

$fh = fopen($argv[1], "r");
$sum = 0;
while (!feof($fh)) {
	$line = fgets($fh);
	$sum += $line;
	echo $sum . "\n";
}

fclose($fh);

echo "\n";
