<?php


require_once '../69/phiN_2.method.php';


function isTotientPermuted($number, $totient)
{
    if (strlen($number) != strlen($totient)) {
        return false;
    }

    $numberParts = str_split($number);
    $totientParts = str_split($totient);
    sort($numberParts, SORT_NUMERIC);
    sort($totientParts, SORT_NUMERIC);

    if ($numberParts === $totientParts) {
        return true;
    }

    return false;
}

// Main

$requiredResult = [
    'n' => 0,
    'lowestNByPhi' => 10
];

for ($iteration = 10; $iteration < 10000000; $iteration++) {

    $totient = totient($iteration);

    $isTotientPermuted = isTotientPermuted($iteration, $totient);

    $nByPhi = $iteration/$totient;

    if (! $isTotientPermuted) {
        continue;
    }

    echo "\n$iteration : $totient  -- Permuted ";
    if ($nByPhi < $requiredResult['lowestNByPhi']) {
        $requiredResult['n'] = $iteration;
        $requiredResult['lowestNByPhi'] = $nByPhi;
        echo "\nLowest n/phi found : " . print_r($requiredResult, 1);

    }
}

echo "\nRequired result";
print_r($requiredResult);