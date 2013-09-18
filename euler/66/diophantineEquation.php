<?php

require_once 'Chakravala.php';

$greatestMinimalX = 0;
$DwithGreatestMinimalX = 0;

for ($D = 2; $D <= 1000; $D++) {

    if (bcpow(floor(sqrt($D)),2) == $D) {
        continue;
    }

    echo "\nD:$D";

//    $x = 'Not found';
//    $y=0;
//    while(1) {
//
//        $y = bcadd($y,1);
//        if ($y % 100000 == 0) {
//            error_log($y);
//        }
//        // sqrt (1 + D.y^2)
//        $xx = bcadd(1 , bcmul($D, bcpow($y,2)));
//
//        if (bcpow(floor(bcsqrt($xx)),2) == $xx) {
//            $x = bcsqrt($xx);
//            break;
//        }
//
//    }
//
//    echo "\n bruteforce : $x,$y ";
    list($fromChakravala['X'],$fromChakravala['Y']) = Chakravala::findSolution($D);
    echo "\n chakravala : {$fromChakravala['X']},{$fromChakravala['Y']} ";

    if ($fromChakravala['X'] > $greatestMinimalX) {
        $greatestMinimalX = $fromChakravala['X'];
        $DwithGreatestMinimalX = $D;
    }

}

echo "\n D : $DwithGreatestMinimalX | Greatest minimal X : $greatestMinimalX | length : ". strlen($greatestMinimalX) ." \n\n";