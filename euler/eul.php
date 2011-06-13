<?php
ob_end_flush();
$limit = (isset($argv[1]) && ctype_digit($argv[1]) ) ? $argv[1] : 100 ;
echo "limit : $limit \n";
function sortAndNormalize(&$tri, $triPrev1=null, $triPrev2=null) {
	sort($tri,SORT_NUMERIC);
	foreach ($tri as $k => $sides ) {
		if ($k == 0) {
			continue;
		}
		$tri[$k] = $tri[$k]/$tri[0];
		if ($triPrev1 != null) {
			if ($tri[$k] != $triPrev1[$k]) {
				return false;
			}
		}

		if ($triPrev2 != null) {
			if ($tri[$k] != $triPrev2[$k]) {
				return false;
			}
		}

	}
	$tri[0] = 1;
	return true;
}


$abd_pairs = array();
for ($b = 2; $b < $limit; $b++) {
	echo "\nChecking b = $b ";

	for ($d=$b; $d + $b < $limit; $d++) {
		if($d%2!=0 && $b%2!=0 ) {
			if ($d!=$b) {
				continue;
			}
		}
///////////
//echo " p was $p \n";
///////////////
		$ceil_min_b_d = ceil((($b < $d) ? $b : $d)/2);
		for ($a=$ceil_min_b_d; $a < $b && $a < $d; $a++ ) {
			if($d%2==0 || $b%2==0 ) {
				if ($a%2!=0) {
					continue;
				}
			}
			$bolIsMultipleOfExisting = false;

			if (in_array("$a,$b,$d", $abd_pairs)) {
			//echo "found duplicate";
				continue;
			}

			list($p_start, $p_end) = ($a % 2 == 0 ) ? array($a/2,0) : array($a-1,floor($a/2)) ; 
			for ($p=$p_start; $p > $p_end  && !(in_array("$a,$b,$d", $abd_pairs)) ; $p--) {
				$px = $p; $py = $a - $p ;

$success = false;


// finding what the euation BD + Px[Px-B-D] + Py[Py-B-D] evalluates to. Theoretically it should be zero
$eq = $b * $d   +   $px*($px-$b-$d)   +    $py*($py-$b-$d);
if ($eq != 0 ) {
 	continue;
} else {
}


/*
// Checking if the center angle is 135 degress
$alpha = atan($px/($d-$py))/ pi() * 180;
if ($alpha >= 45) { echo "Y"; continue;}


$beta = atan($py/($b-$px)) / pi() * 180;
if ($beta >= 45) { echo "X"; continue;}
if (($alpha + $beta) != 45 ) { 
	echo "Z: ".($alpha + $beta)."  ";
	continue;
}


$theta =  atan($b/$d) / pi() * 180;
/*
if (($theta - $alpha) == $alpha || ($theta - $alpha) == $beta ) {
	$success = true;
} else {
	continue;
}
*/
	$success = true;
$last_d_for_give_b = $d;
echo ".";
$totCnt++;


//
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

					if (sortAndNormalize($tri_1) == false) {
						continue;
					}
					if (sortAndNormalize($tri_2 , $tri_1 ) == false) {
						continue;
					}
					if (sortAndNormalize($tri_3 , $tri_1, $tri_2 ) == false) {
						continue;
					}
				} catch (Exception $e) {
					echo "exception ".$e->getMessage()." $a,$b,$d";
				}

				if (($tri_1 == $tri_2 && $tri_2 == $tri_3) || $bolIsMultipleOfExisting) {
// echo " | winning theta = $theta";
// finding what the euation BD + Px[Px-B-D] + Py[Py-B-D] evalluates to. Theoretically it should be zero
// $eq = $b * $d   +   $px*($px-$b-$d)   +    $py*($py-$b-$d);
// echo " | eq evaluated to $eq";
//				if ($success)  

					$fp = fopen('results/Result_all_points.txt', 'a');
					fwrite($fp, "P($px,$py) | (a,b,d) = ($a,$b,$d) ". //| tri1 =  (". implode(",",$tri_1). ") " .
//					" tri2 = (". implode(",",$tri_2). ") " .
//					" tri3 = (". implode(",",$tri_3). ")" .

					" \n");
					fclose($fp);


					$fp = fopen('results/Result_abd_pairs_.txt', 'a');
					fwrite($fp,"(a,b,d) = ($a,$b,$d)\n");
					$abd_pairs[] = "$a,$b,$d";
					if ($d != $b) {
						$abd_pairs[] = "$a,$d,$b";
					fwrite($fp, "(a,b,d) = ($a,$d,$b)\n");
						
					}
					fclose ($fp);

				}
			}
		}
//$max_a = $b-1; $max_d = ($b-1) / 2
//if ($d > $b - $px - $py) {
//	echo "d_limit : $d";
//		}
	}
//	echo "| last d = $last_d_for_give_b";
}

echo "\ntotCount = $totCnt | abd count = ". sizeof($abd_pairs) ."\nDone\n";
