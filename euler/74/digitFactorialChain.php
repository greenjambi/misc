<?php

$limit = isset($argv[1])? $argv[1] : 10;

$chainLengths = [
    169 => 3,
    363601 => 3,
    1454 => 3,
    871 => 2,
    45361 => 2,
    872 => 2,
    45362 => 2
];

for ($i = 1; $i < $limit; $i++) {
    echo "\n\n$i";

    if (isset($chainLengths[$i])) {
        continue;
    }

    $chainLengths[$i] = printFactorialChainLength($i);

    echo "\nLength : {$chainLengths[$i]}";
}



echo "\nDone\n";

/**
 * @param $n
 * @return bool
 */
function printFactorialChainLength($n)
{
    global $chainLengths;
    $sumFactorials = getSumFactorial($n);
    echo " -> $sumFactorials";

    if ($sumFactorials == $n) {
        return 0;
    }

    if (isset($chainLengths[$sumFactorials])) {
        return $chainLengths[$sumFactorials] + 1;
    }

    return printFactorialChainLength($sumFactorials) + 1;
}


/**
 * @param $n
 * @return int
 */
function getSumFactorial($n)
{
    $digits = str_split($n);

    $sumFactorials = 0;

    foreach ($digits as $digit) {
        $sumFactorials = $sumFactorials + gmp_strval(gmp_fact($digit));
    }
    return $sumFactorials;
}
