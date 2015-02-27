<?php

require_once 'phiN.method.php';

////////////////////////////
// Start the main program here.
////////////////////////////
$nextPrime = gmp_strval(gmp_nextprime(1));

$limit = isset($argv[1]) ? $argv[1] : 100;
$largestNByPhi = array('n' => 0, 'nByPhi' => 0);

// Iterate through each n
for ($n=15;$n<$limit;$n++) {

    $nByPhi = nByPhiN($n);

//    echo "\n n:$n | Phi: $phi | nByPhi : $nByPhiBy";
    echo ".";

    if ($largestNByPhi['nByPhi'] < $nByPhi ) {

        $largestNByPhi = [
            'n' => $n,
            'nByPhi' => $nByPhi
        ];

        echo "\n Found the next largest nByPhi n:$n | nByPhi : $nByPhi";
    }
}

echo "\n"; print_r($largestNByPhi);


echo "\n";