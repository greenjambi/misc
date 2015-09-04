<?php

$limit = isset($argv[1])? $argv[1] : 7;

$summationsArray = [];

for ($i = 7; $i < $limit; $i++) {
    echo "\n $i | ";
//    echo "\n----";
    findCountSummation($i);
}


//print_r($summationsArray);

echo "\n";



function findCountSummation($num)
{
    $arrSummations = [];
    $totalCountSummations = 1;

    for ($i = $num - 1 ; $i >= 1; $i--) {

        $arrSummations[$i] = [];

        list($countSummationsFound, $arrSummations[$i]) = findSummations($num - $i, $i);

        $totalCountSummations = bcadd($totalCountSummations, $countSummationsFound);
    }

    echo " count of summations : $totalCountSummations";

    if (bcmod($totalCountSummations, 1000000) == 0) {
        echo "\n ****** Found a multiple";
        exit;
    }

}



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
            $countSummationsFound = bcadd($countSummationsFound, $countSummationsFoundInNest);
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