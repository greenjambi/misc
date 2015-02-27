<?php

/**
 * Trying to convert the JS code to php
 * as this JS code seems extremely fast
 *
 * @param $n
 *
 * @return float
 */
function nByPhiN($n)
{
    $totient = totient($n);

    return $n/$totient;
}


function totient($n) {
    $s = $n;
    $len=strlen($s);

    // var phi, q, r, y, t, x, res, factors,
    $f1=1;

    if ($s == '' ) return 'Empty input';

    if ($s < 1) return 0;
    if ($s < 3) return 1;

    $q = 1;
    $r = 1;
    $phi = $s;
    $res = factor($n);
    $res = explode('*', $res);


    if (sizeof($res) < 2) {
        return $phi - 1;
    }

    $factors = $res;

    for ($i=0; $i<sizeof($factors); $i++) {
        $f0 = $f1;
        $f1 = $factors[$i];

        if ($f1 != $f0) {              // phi = phi*(1 - 1/f1); [in steps]
            $y = $f1;  // y = f
            $t = $y - 1;           // t = f-1
            $x = $phi * $t;            // x = phi*(f-1)
            $q = $x / $y;
            $phi = $q;
        }
    }
    return $phi;
}

function factor($n){
    if ($n%1 || $n==0) {return $n;}
    $minFactor = leastFactor($n);
    if ($n == $minFactor) return $n;
    return $minFactor . '*' . factor($n/$minFactor);
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