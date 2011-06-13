<?php

for ($a=1;$a<333;$a++) {
	
	for ($b=($a+1);$b<500;$b++) {
		$c=1000-($a+$b);
		if ($c>$b) {
//			echo "$a.";
//			echo "b,c = $b,$c";
			if ($a*$a + $b*$b == $c*$c) {
				echo " \n\n || a,b,c = $a,$b,$c";
			}
		}
//		echo "\n";
	}
}


