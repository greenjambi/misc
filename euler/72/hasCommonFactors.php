<?php

require_once '../71/reduceFraction.php';

function hasCommonFactors($n, $d)
{

    list($reducedN, $reducedD) = reduceFraction($n, $d);

    if ($reducedN !== $n) {
        return true;
    }

    return false;
}

