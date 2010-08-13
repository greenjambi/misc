<?php
ob_end_flush();
function sortAndNormalize(&$tri) {
	sort($tri,SORT_NUMERIC);
	foreach ($tri as $k => $sides ) {
		if ($k == 0) {
			continue;
		}
		$tri[$k] = $tri[$k]/$tri[0];
	}
	$tri[0] = 1;
}


$abd_pairs = array();
for ($b = 2; $b < 100; $b++) {
	echo "Checking b = $b\n";
	for ($d=2; $d <= $b && $d + $b < 100; $d++) {

///////////
//echo " p was $p \n";
///////////////

		for ($a=1; $a < $b && $a < $d; $a++ ) {

			if (in_array("$a,$b,$d", $abd_pairs)) {
			//echo "found duplicate";
				continue;
			}


			for ($p=1; $p < $a  && !(in_array("$a,$b,$d", $abd_pairs)) ; $p++) {
				$px = $p; $py = $a - $p ;
				$CDsq = pow(($d-$a),2);
				$DPsq = pow($px,2) + pow($d-$py,2);
				$CPsq = pow($px,2) + pow($a - $py,2);
				$BDsq = pow($d,2) + pow($b,2);
				$ABsq = pow($b-$a,2);
				$APsq = pow($a-$px,2) + pow($py,2);
				$BPsq = pow($b-$px,2) + pow($py,2);


				$tri_1 = array( $CDsq, $DPsq, $CPsq );
				$tri_2 = array( $DPsq, $BPsq, $BDsq );
				$tri_3 = array( $ABsq, $APsq, $BPsq );
				
				try {

					sortAndNormalize($tri_1);
					sortAndNormalize($tri_2);
					sortAndNormalize($tri_3);
				} catch (Exception $e) {
					echo "exception ".$e->getMessage()." $a,$b,$d";
				}

				if ($tri_1 == $tri_2 && $tri_2 == $tri_3) {

					$fp = fopen('results/Result_all_points.txt', 'a');
					fwrite($fp, "P($px,$py) | (a,b,d) = ($a,$b,$d) | tri1 =  (". implode(",",$tri_1). ") " .
					" tri2 = (". implode(",",$tri_2). ") " .
					" tri3 = (". implode(",",$tri_3). ")" .

					" \n");
					fclose($fp);


					$fp = fopen('results/Result_abd_pairs_.txt', 'a');
					fwrite($fp, "(a,b,d) = ($a,$b,$d)\n");
					$abd_pairs[] = "$a,$b,$d";
					if ($d != $b) {
						$abd_pairs[] = "$a,$d,$b";
					fwrite($fp, "(a,b,d) = ($a,$d,$b)\n");
						
					}
					fclose ($fp);

				}
			}
		}
	}
}

echo "\nDone\n";
