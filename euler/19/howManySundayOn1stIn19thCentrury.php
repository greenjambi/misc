<?php


$numSundays = 0;
for ($i=1901;$i<=2000; $i++) {
	for($j=1;$j<=12;$j++) {

		$res = exec("ncal $j $i|egrep -w 1|awk '{print $1;}'");
		if ($res == 'Su')  {
			echo "\n $i-$j-1 -> $res";
			$numSundays++;
		}

	}

}

echo "\n\n numsudays = $numSundays \n\n";
