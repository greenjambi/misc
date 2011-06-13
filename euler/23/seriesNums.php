<?php

ob_end_flush();

for ($i=1;$i<28123;$i++)  {
	$grepRes = exec("grep -w $i sumAbundantNums");
//	if (trim($grepRes) == '') {
		echo "\n$i";
//	} 

}


echo "\n";
