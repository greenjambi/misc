<?php

$limit = isset($argv[1])? $argv[1] : 10;
$maxLimit = 1500000;
$limit = ($limit > $maxLimit)? $maxLimit : $limit;

$pythogoranTriples = [];

for ($m = 2; $m <= $limit ; $m++) {

    echo "\n$m";
    for ($n = 1; $n < $m; $n++) {
        if (2 * $m * ($m + $n) > $maxLimit) {
            echo "\nBreaking";
            break;
        }

        $a = 2 * $m * $n;
        $b = $m*$m - $n * $n;
        $c = $m*$m + $n * $n;
        $sum = $a + $b + $c;

        insertTriples($sum, $a, $b, $c);

        $k = 2;

        while ($sum * $k < $maxLimit) {
            insertTriples($sum * $k, $a * $k, $b * $k, $c * $k);
            $k++;
        }

    }

}

$countUniquePythogoranTriple = 0;
foreach ($pythogoranTriples as $pythogoranTriple) {
    if (sizeof($pythogoranTriple) == 1) {
        $countUniquePythogoranTriple ++ ;
    }
}

echo "Count of unique pythogoran triples : $countUniquePythogoranTriple";

echo "\nDone\n";

function insertTriples($sum, $a, $b, $c)
{
    global $pythogoranTriples;

    if ($a > $b) {
        $toAdd = $b . '-' . $a . '-' . $c;
    } else {
        $toAdd = $a . '-' . $b . '-' . $c;
    }

    if (!isset($pythogoranTriples[$sum]) || ! in_array($toAdd, $pythogoranTriples[$sum])) {
        $pythogoranTriples[$sum][] = $toAdd;
    }

}