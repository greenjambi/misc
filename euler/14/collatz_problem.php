<?php
ob_end_flush();
$chainLengthPair = array();
function findCollatzLength($num)
{
	global $chainLengthPair;
	$chain = array();
	$length = 0;
	while ($num != 1) {
		$chain[] = array($num,$length);
//		echo "\n -> $num   | $length";
		$num = (bcmod($num,2)==0)? bcdiv($num,2) : bcadd(bcmul($num,3),1);
		$length++;
		
		if (isset($chainLengthPair[$num])) {
			$length += $chainLengthPair[$num];
			$num=1;
		}
//		usleep(50000);
	}

	foreach($chain as $chainLink) {
		if (!isset($chainLengthPair[$chainLink[0]])) {
			$chainLengthPair[$chainLink[0]] = $length - $chainLink[1];
		}
	}
	return $length;
}

/*
$a = 113383; 
echo findCollatzLength($a);
die("\ndied\n");
*/

$maxLength = 0;
$maxLengthNum = 0;

for ($i=800000; $i<900000 ; $i++) {
	$collatzLength = findCollatzLength($i);
	echo "\n $i -- " . $collatzLength;// . " -- " . sizeof($chainLengthPair);
	if ($collatzLength > $maxLength) {
		$maxLength = $collatzLength;
		$maxLengthNum = $i; 
		echo " **";
	}
	

}
echo "\n\n$maxLengthNum - $maxLength "; 
echo "\n";
