<?php

/**
 * Function to calculate the PHI
 *
 * // THis used to use the bruteforce
 *
 * @param $n
 * @return string
 */
function phiN_old($n)
{

    $relativeNonPrimeNumbers = [];

    $i = gmp_strval(gmp_nextprime(1));

    // Iterate through each number and check if it is a relative prime
    while ($i < $n) {

        // Is $i relative prime to $n ?
        // Lets find if they both have a common divisor greater than 1

        $isCommonDivisor = 2;
        while ($isCommonDivisor <= $i) {
            if ($i % $isCommonDivisor == 0  && $n % $isCommonDivisor == 0) {
                $relativeNonPrimeNumbers[] = $i;
                break;

            }
            $isCommonDivisor++;
        }


        $i++;

    }

    // So how many relative primes do have ?
    // Total numbers less than n which are not relative prime
    return $n - count($relativeNonPrimeNumbers) - 1;

}

/**
 * This uses the function in http://en.wikipedia.org/wiki/Euler%27s_totient_function
 *
 * @param $n
 *
 * @return float
 */
function nByPhiN($n)
{
    $factors = factor($n);
//    $factors = array_unique($factors);
    $return = 1;

    foreach ($factors as $factor) {

        $return  = ($return * $factor) / ($factor - 1);

    }

    return $return;
}



function factor($n){

    $factors = [];

    while ($n > 1) {
        $leastFactor = leastFactor($n);
        $factors[] = $leastFactor;
        while ($n % $leastFactor == 0) {
            $n = $n / $leastFactor;
        }
    }

    return $factors;
}

function leastFactor($n)
{
    if ($n==0) return 0;
    if ($n%1 || $n*$n < 2) return 1;
    if ($n%2==0) return 2;
    if ($n%3==0) return 3;
    if ($n%5==0) return 5;
    $m = sqrt($n);
    for ($i=7; $i<=$m; $i+=30) {
        if (($q=$n/$i)      == floor($q)) return $i;
        if (($q=$n/($i+4))  == floor($q)) return $i+4;
        if (($q=$n/($i+6))  == floor($q)) return $i+6;
        if (($q=$n/($i+10)) == floor($q)) return $i+10;
        if (($q=$n/($i+12)) == floor($q)) return $i+12;
        if (($q=$n/($i+16)) == floor($q)) return $i+16;
        if (($q=$n/($i+22)) == floor($q)) return $i+22;
        if (($q=$n/($i+24)) == floor($q)) return $i+24;
    }
    return $n;
}