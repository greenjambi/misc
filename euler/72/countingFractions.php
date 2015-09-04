<?php

require_once '../69/phiN_2.method.php';

$limit = isset($argv[1])? $argv[1] : 10;

$countFractions = 0;

for ($d = 2; $d <= $limit; $d++) {

    if ($d % 10000 == 0) {
        echo ".";
    }

    $totient = totient($d);

    $countFractions += $totient;

}

echo "\nLimit : $limit | Number of fractions : $countFractions";

echo "\n";