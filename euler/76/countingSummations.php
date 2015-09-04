<?php

$num = isset($argv[1])? $argv[1] : 7;

$arrSummations = [];

$totalCountSummations = 0;

$summationsArray = [];

for ($i = $num - 1 ; $i >= 1; $i--) {

    echo "\n$i | ";

    $arrSummations[$i] = [];

    list($countSummationsFound, $arrSummations[$i]) = findSummations($num - $i, $i);

    echo "Count of summations found : $countSummationsFound";
    $totalCountSummations += $countSummationsFound;
}

echo "\nTotal count of summations : $totalCountSummations";

//print_r($summationsArray);

echo "\n";



//////////////////////////////

function findSummations($sum, $index)
{
    global $summationsArray;

    if (isset($summationsArray[$index]) && isset($summationsArray[$index][$sum])) {
        return [
            $summationsArray[$index][$sum],
            []
        ];
    }

    $countSummationsFound = 0;
    $arrSummationsForIndex = [];
    for ($i = 1; $i <= $sum; $i++) {
        if ($i > $index) {
            break;
        }
        $arrSummationsForIndex[$i] = [];
        if ($i == $sum) {
            $countSummationsFound++;
            $arrSummationsForIndex[$i] = 0;
        } else {
            list($countSummationsFoundInNest, $arrSummationsForIndex[$i]) = findSummations($sum - $i, $i);
            $countSummationsFound += $countSummationsFoundInNest;
        }
    }

//    if ($index == 2) {
//        echo "\nindex : 2 | for sum : $sum | count : $countSummationsFound";
//    }

    $summationsArray[$index][$sum] = $countSummationsFound;


    return [
        $countSummationsFound,
//        $arrSummationsForIndex
        []
    ];
}