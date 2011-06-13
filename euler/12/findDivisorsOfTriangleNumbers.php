<?php
ob_end_flush();
for ($i=3;$i<50000;$i++) {
	$sum = $i*($i+1)/2;
	$arrDivisors = array(1,$sum);
	$limit = sqrt($sum);
	for ($j=2;$j<=$limit; $j++) {
		if ($sum%$j==0) {
			$arrDivisors[] = $j;
			$arrDivisors[] = $sum/$j;
		}

	}
//sort($arrDivisors);
//	echo "## $sum : ". implode(',',$arrDivisors) . "\n";
if (sizeof($arrDivisors) > 400) {
	echo "## $sum : ". sizeof($arrDivisors) . "\n";
}

}

echo "\n";
