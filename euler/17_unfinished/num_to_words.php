<?php

$words = array('0'=> '' ,'1'=> 'one' ,'2'=> 'two' ,'3' => 'three','4' => 'four','5' => 'five','6' => 'six',
	'7' => 'seven','8' => 'eight','9' => 'nine','10' => 'ten','11' => 'eleven','12' => 'twelve','13' => 'thirteen',
	'14' => 'fourteen','15' => 'fifteen','16' => 'sixteen','17' => 'seventeen','18' => 'eighteen','19' => 'nineteen',
	'20' => 'twenty','30' => 'thirty','40' => 'forty','50' => 'fifty','60' => 'sixty','70' => 'seventy','80' => 'eighty',
	'90' => 'ninty','100' => 'hundred','1000' => 'thousand'
);


function num_to_words($num) 
{
	global $words;
	$word = '';
	$digits = array_reverse(str_split($num));
//	print_r($digits);
	if ($digits[1]!=1) {
		$word = $words[$digits[0]];

		$d2 = $digits[1]*10;
		if($words[$d2] != '') {
			$word = $words[$d2]."$word";
		} 

	} else {
		$word = $words[$digits[1].$digits[0]];
		
	}

	$d3 = $digits[2];
	if($words[$d3]!='') {
		if($word!='') {
			$word = "and$word";
		}
		$word = "{$words[$d3]}hundred".$word;

	}

	echo "$num - $word - " . strlen($word);
	return strlen($word);

}

$length = 0;
for($i=1;$i<=999;$i++) {

	$length+=num_to_words($i);
	echo " - $length \n";

}


echo "\nOneThousand - ". strlen("onethousand");
echo "\nlen = ". ($length + strlen("onethousand"));

echo "\n";


