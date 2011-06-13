<?php
ob_end_flush();
$fh = fopen("largeNumbers.txt", "r");
$sum[0]=0;$sum[1]=0;$sum[2]=0;$sum[3]=0;$sum[4]=0;
while (!feof($fh)) {
        $line = fgets($fh);
        echo "\n" .$line . " -  ";
		for ($i=0;$i<5;$i++ ) {
			$n = "s$i";
			$$n = substr($line,$i*10,10);
			$sum[$i] += $$n;
			echo $$n . " , ";
		}

}

echo "\n";print_r($sum);

fclose($fh);

echo "\n";



