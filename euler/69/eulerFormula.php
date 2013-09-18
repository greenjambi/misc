<?php


function phiN($n)
{

    $p = array();

    $i = gmp_strval(gmp_nextprime(1));
    while ($i < $n) {

        if ($n % $i == 0) {
            $p[] = $i;
        }

        $i = gmp_strval(gmp_nextprime($i));
    }

    $piP = $n;
    foreach ($p as $i) {
        $piP = bcmul($piP , bcdiv(($i - 1 ) , $i));

    }

    return $piP;

}

$nextPrime = gmp_strval(gmp_nextprime(1));

$largestPiByN = array('n' => 0, 'phiByN' => 0);

for ($n=1;$n<10;$n++) {

    if ($n == $nextPrime) {
        $nextPrime = gmp_strval(gmp_nextprime($n));
        continue;
    }

    $phiByN =  bcdiv(phiN($n), $n);

//    if ($n % 100000 == 0) {
    echo "\n i:$n : $phiByN";

//    }

    if ($largestPiByN['phiByN'] < $phiByN ) {

        $largestPiByN = array(
            'n' => $n,
            'phiByN' => $phiByN
        );
    }



}

print_r($largestPiByN);


echo "\n";