<?php

file_put_contents('ways.html',$msg);
function w($msg) {
	file_put_contents('ways.html',$msg,FILE_APPEND);
}

$TOTAL = 200;
function main($args) {
global $TOTAL;
$intIt = 0;
		$coins = array(1, 2, 5, 10, 20, 50, 100, 200);
//		int[] ways = new int[TOTAL + 1];
		$ways[0] = 1;
 
		foreach( $coins as $coin) {
//echo "$coin.";
			for($j=$coin; $j <= $TOTAL; $j++) {
//echo $j;
$intIt++ ;
				$ways[$j] += $ways[$j - $coin];
			}
echo "$coin : ways[200] = {$ways[200]}\n";
w( "<tr><td>$coin</td>");
foreach ($ways as $way) {
	w( "<td>$way</td>");
}
w("</tr>");
		}
 
		echo "Result: " ; print_r($ways[200]) ; echo  " iterations = $intIt\n";
}


w( "<table border=1 style='border-collapse:collapse' ><tr><td></td>");
for($i=0;$i<=200;$i++) {
	w("<td>$i</td>");
}
w("</tr>");
main(1);
w("</table>");


