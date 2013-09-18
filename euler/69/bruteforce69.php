<?php

function phiN($n)
{

    $intCountNonRelativePrime = 1;

//echo "nonrelativeprime:";
    for ($relativePrime=2; $relativePrime<$n; $relativePrime++) {

        $divisor = gmp_strval(gmp_nextprime(1));
        while ($divisor <= $relativePrime) {
            if ($n%$divisor == 0 && $relativePrime % $divisor ==0) {
//echo "$relativePrime|";
                $intCountNonRelativePrime++;
                break;

            }
            $divisor = gmp_strval(gmp_nextprime($divisor));

        }
    }

    return $n / ($n-$intCountNonRelativePrime);

}


for ($i=1;$i<1000;$i++) {

    echo "\n i:$i";
    echo " phi : " . phiN($i);

}

echo "\n";