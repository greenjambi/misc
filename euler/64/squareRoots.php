<?php


/**
 *
 * √N = a0 +  1
 *          -----
 *            x / √N - y
 *
 */


/**
 * @param $N
 */
function findCoefficients ($N) {

    if (pow(floor(sqrt($N)), 2) == $N ) {
        return false;
    }

    $a[0] = floor(sqrt($N));

    $initialX = 1;
    $initialY = $a[0];
    $x = 1;
    $y = $a[0];


    $intInfiniteLoopPreventionCounter = 0;
    $bolHasFoundPeriod = false;
    do {

        // The reversed fraction becomes
        // x . ( √N + y)
        //  --------
        //    N - yy

        $denominator = $N - ($y*$y);
        if ($denominator % $x != 0) {
            throw new Exception("x:$x | denominator:$denominator | y:$y");
        }

        $denominator = $denominator / $x;

        // After some derivation I foud that
        // A <= (a0 + y) / D

        $A = floor(($a[0] + $y) / $denominator);

        $a[sizeof($a)] = $A;

        $x = $denominator;
        $y = ($A * $denominator) - $y;



        if ($x == $initialX && $y = $initialY) {
            $bolHasFoundPeriod = true;
        }


        if ($intInfiniteLoopPreventionCounter++ > 1000) {
            throw new Exception(" Exception : intInfiniteLoopPreventionCounter : $intInfiniteLoopPreventionCounter");
        }

    } while($bolHasFoundPeriod === false);

    return $a;

}

$intCountNumOddPeriod = 0;
for ($i = 2 ; $i <= 10000; $i++) {

    echo "\n## $i";

    $coeffs = findCoefficients($i);
    if ($coeffs == false) {
        continue;
    }
    echo " coeffs : " . implode(',', $coeffs);

    if (sizeof($coeffs) % 2 == 0) {
        // This is including the a0. So expect the count to be even.
        $intCountNumOddPeriod++;

    }
}

echo "\n Count odd period : $intCountNumOddPeriod\n";