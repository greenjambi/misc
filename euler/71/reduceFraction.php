<?php

function reduceFraction($n, $d)
{
    $limit = ($n > $d) ? $d : $n;

    for ($i = 2; $i <= $limit; $i++) {
        while ($n % $i == 0 && $d % $i == 0) {
            $n /= $i;
            $d /= $i;
        }
    }

    return [$n, $d];
}