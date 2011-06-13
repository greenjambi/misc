<?php

require 'grid.php';
global $greatestProduct;
$greatestProduct = array(
	'prd'		=> 0,
	'position'	=> 'nil'
);

function checkAndPutGreatestProduct($n1,$n2,$n3,$n4,$vector)
{
	global $greatestProduct;
	$prd = $n1*$n2*$n3*$n4;
//echo $prd;	
	if ($greatestProduct['prd'] < $prd) {
		$greatestProduct = array(
			'prd'		=> $prd,
			'position'	=> $vector
		);
		echo "prd = $prd | position = $vector \n";
	}

}

for ($i=0;$i<20;$i++) {
//echo $i;
	for ($j=0;$j<20;$j++) {
		// Right
		if ($j<=16) {
			checkAndPutGreatestProduct(
				$g[$i][$j],
				$g[$i][$j+1],
				$g[$i][$j+2],
				$g[$i][$j+3],
				"R:$i,$j"
			);
		}

		// Right Diagonal
		if ($i<=16 && $j<=16 ) {
			checkAndPutGreatestProduct(
				$g[$i][$j],
				$g[$i+1][$j+1],
				$g[$i+2][$j+2],
				$g[$i+3][$j+3],
				"RD:$i,$j"
			);
		}

		// Down
		if ($i<=16) {
			checkAndPutGreatestProduct(
				$g[$i][$j],
				$g[$i+1][$j],
				$g[$i+2][$j],
				$g[$i+3][$j],
				"D:$i,$j"
			);
		}

		// Left diagonal
		if ($i<=16 && $j >= 3) {
			checkAndPutGreatestProduct(
				$g[$i][$j],
				$g[$i-1][$j+1],
				$g[$i-2][$j+2],
				$g[$i-3][$j+3],
				"LD:$i,$j"
			);
		}

	}
}
