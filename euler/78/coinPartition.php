<?php

// Does not seem to work

$n = isset($argv[1])? $argv[1] : 5;

for ($numCountGroups = 1; $numCountGroups <= $n; $numCountGroups++) {

    $numCombinations = stirlingNumber($n,$numCountGroups);

    echo "\n$numCombinations combinations of $numCountGroups parts: ";
}


function stirlingNumber($n, $k)
{
    $sum = 0;
    for ($j = 1; $j<= $k; $j++) {
        $multiplier = (($k-$j)%2==0)? 1 : -1 ;
        $sum += $multiplier * pow($j, $n-1) / (fact($j-1)*fact($k-$j));
    }
    return $sum;
}

function fact($n)
{
    return (int) gmp_strval(gmp_fact($n));
}

echo "\n";