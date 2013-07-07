<?php

$arrNumLength = array();
$arrSortedCount = array();
for ($i = 1; $i< 10000; $i++) {

//    echo "\n i :  $i | ";
    $c= bcpow($i,3);


//    echo " c : $c";

    isset($arrNumLength[strlen($c)]) ? $arrNumLength[strlen($c)]++ : $arrNumLength[strlen($c)] = 1;

    $arrSortedNum = str_split($c,1);
    sort($arrSortedNum);
    $sortedNum = implode('',$arrSortedNum);

    isset($arrSortedCount[$sortedNum]['count']) ? $arrSortedCount[$sortedNum]['count']++ : $arrSortedCount[$sortedNum]['count'] = 1;
    $arrSortedCount[$sortedNum]['nums'][] = $c;

}

print_r($arrNumLength);

foreach ($arrSortedCount as $sortedNum => $numDetails) {

    if ($numDetails['count'] > 2 ) {
        echo "\nsorted Num : {$sortedNum} | count : {$numDetails['count']} | nums : " . implode(',',$arrSortedCount[$sortedNum]['nums']);
    }

}

echo "\n";