<?php

require_once 'reduceFraction.php';

$requiredHighestFraction = [
    'n' => 3,
    'd' => 7,
    'n/d' => 0
];

for ($iteration = 100000 - 20; $iteration < 1000000; $iteration++) {

    $n = floor($iteration * 3 / 7);

    echo "\nIteration : $iteration";

    $fraction = $n/$iteration;

    if ($fraction > $requiredHighestFraction['n/d'] && $fraction < 3/7) {
        $requiredHighestFraction = [
            'n' => $n,
            'd' => $iteration,
            'n/d' => $fraction
        ];

        list($requiredHighestFraction['n'], $requiredHighestFraction['d']) = reduceFraction($n, $iteration);

        echo "\nFound new fraction : $n/$iteration";
        echo "\nReduced to : {$requiredHighestFraction['n']}/{$requiredHighestFraction['d']} = $fraction";


    }

}

echo "\nFraction : " . print_r($requiredHighestFraction, 1);

