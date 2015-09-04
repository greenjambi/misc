<?php

$num = isset($argv[1])? $argv[1] : 10;

$arrSummations = [];

$totalCountSummations = 0;

$summationsArray = [];

$i = 2;

while ($i < $num) {

    echo "\n$i | ";

    $arrSummations[$i] = [];

    list($countSummationsFound, $arrSummations[$i]) = findPrimSummations($num - $i, $i);

    if ($countSummationsFound == 0) {
        unset($arrSummations[$i]);
    }

    echo "Count of summations found : $countSummationsFound";
    $totalCountSummations += $countSummationsFound;

    $i = gmp_strval(gmp_nextprime($i));
}

echo "\nTotal count of summations : $totalCountSummations";

//print_r($arrSummations);

echo "\n";



//////////////////////////////

function findPrimSummations($sum, $index)
{
    global $summationsArray;

//    if (isset($summationsArray[$index]) && isset($summationsArray[$index][$sum])) {
//        return [
//            $summationsArray[$index][$sum],
//            []
//        ];
//    }

    $countSummationsFound = 0;
    $arrSummationsForIndex = [];

    $i = 2;

    while ($i <= $sum ) {


        if ($i > $index) {
            break;
        }
        $arrSummationsForIndex[$i] = [];
        if ($i == $sum) {
            $countSummationsFound++;
            $arrSummationsForIndex[$i] = 0;
        } else {
            list($countSummationsFoundInNest, $arrSummationsForIndex[$i]) = findPrimSummations($sum - $i, $i);
            $countSummationsFound += $countSummationsFoundInNest;
            if ($countSummationsFoundInNest == 0) {
                unset($arrSummationsForIndex[$i]);
            }
        }

        $i = gmp_strval(gmp_nextprime($i));
    }

//    $summationsArray[$index][$sum] = $countSummationsFound;


    return [
        $countSummationsFound,
        $arrSummationsForIndex
//        []
    ];
}