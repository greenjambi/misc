<?php


function findNumRoutes($num) {
	$theArray = array();
	$theArray[1][1] = 1;
	for($i=2;$i<=$num+1;$i++) {

		$theArray[$i][1] = 1;
		for($j=2;$j<$i;$j++) {
			$theArray[$i][$j] = $theArray[$i][$j-1] + $theArray[$i-1][$j];
		}
		$theArray[$i][$i] = 2*$theArray[$i][$i-1];
	}
	return $theArray[$num+1][$num+1];
}


echo findNumRoutes(20);

echo "\n";
