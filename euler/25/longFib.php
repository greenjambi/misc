<?php

$f[1] = 1;
$f[2] = 1;

for( $i=3; $i<5000; $i++ ) {

	$f[$i] = bcadd($f[$i-1], $f[$i-2]);
	echo "\n$i - ". strlen($f[$i]) . " - {$f[$i]}";
	if (strlen($f[$i]) >= 1000) {
		echo "\n\ndone";break;
	}
}

echo "\n";
