<?php


include_once 'names.php';


sort($names);

print_r($names);
$intTotalSum = 0;
foreach($names as $key=>$name) {
	$asciiSum = 0;
	$arrNameChrs = str_split($name);
	foreach($arrNameChrs as $char) {
		$asciiSum += ord($char) - 64;
	}
	$arrNameScore[$key] = $asciiSum * ($key+1);
	$intTotalSum += $arrNameScore[$key];
	echo "\n $key - $name - {$arrNameScore[$key]} ";

}



echo " \n tot sum = $intTotalSum | \n\n";


