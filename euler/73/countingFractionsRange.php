<?php

require_once '../72/hasCommonFactors.php';
require_once '../69/phiN_2.method.php';

$limit = isset($argv[1])? $argv[1] : 10;

$countFractions = 0;

for ($d = 2; $d <= $limit; $d++) {

    $minN = ceil($d * 1 / 3);
    $maxN = floor($d / 2);

    echo "\nIteration : $d";
//    echo ".";

    for ($n = $minN; $n <= $maxN; $n++ ) {

        $fraction = $n/$d;

        if ($fraction > 1/3 && $fraction < 1/2) {

            if (! hasCommonFactors($n, $d)) {

                $countFractions++;

//                echo "\nFound new fraction : $n/$d";

            }
        }
    }
}

echo "\nLimit : $limit | Number of fractions between 1/3 and 1/2 : $countFractions";

$countFractions = 0;

for ($d = 2; $d <= $limit; $d++) {

    if ($d % 10000 == 0) {
        echo ".";
    }

    $totient = totient($d);

    $countFractions += $totient;

}

$calculatedFractions = floor($countFractions / 6);

echo " | totalNumFractions : $countFractions | calculatedNumFractions : $calculatedFractions";

echo "\n";