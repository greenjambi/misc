<?php

function reduceFraction(&$n,&$d)
{
    $smaller = ($n < $d) ? $n : $d;
    for ($i=$smaller ; $i>1; $i--) {

        if ( $i <= $n && $i<= $d && $n%$i == 0 && $d%$i == 0  ) {

            $n = $n/$i;
            $d=$d/$i;
        }

    }
}

function reduceFraction_v2(&$n,&$d)
{
    $inputN = $n; $inputD = $d;
    error_log(" input : $n / $d");
    $bigger = ($n > $d) ? $n : $d;

    for ($i=2; $i<= $bigger/2; $i++) {

        while ($n%$i == 0 && $d%$i == 0  ) {

            $n = $n/$i;
            $d=$d/$i;
            $bigger = ($n > $d) ? $n : $d;
        }

    }
    error_log(" output: $n / $d");
    if ($inputN !== $n) {
        error_log('Reduced.');
    }
}

function reduceFraction_v3(&$n, &$d)
{
    echo "\n before $n / $d ";
    $l = $n; $s = $d;
    if ($l < $s) {
        list($l,$s) = array($s,$l);
    }

    while (1) {
echo ".";
        $r = bcmod($l,$s);
        if ($r == 0) {
            break;
        }

        $l = $s;
        $s = $r;

    }
    echo "\ndividing by : $s \n";
    $n = bcdiv($n,$s);
    $d = bcdiv($d,$s);

    echo "\n after $n / $d";
}




/////////

$f = array();

for ($i=1;$i <= 50; $i++) {
    foreach (array(1,2*$i,1) as $a){
        $f[] = $a;
    }
}

echo "\n F : " . implode(',',$f);

echo "\n";



for ($i = 1; $i< 103; $i++) {
//for ($i = 3; $i< 4; $i++) {

    echo "\ni:$i ";
    $previousSumN = 0;
    $previousSumD = 1;
    for ($j = $i-1; $j >=0; $j--) {

//        echo "\nf[j] : {$f[$j]} \n";
//        $newSumN = ($f[$j] * $previousSumD + $previousSumN);
        $newSumN = bcadd( bcmul($f[$j], $previousSumD) , $previousSumN);
        $newSumD = ($previousSumD);

//        echo "newSum : $newSumN / $newSumD\n";

        // Invert it
        list($newSumN,$newSumD) = array($newSumD,$newSumN);

//        echo "\n Start reduce .. ";
//        reduceFraction_v2($newSumN, $newSumD);
//        echo " End reduce\n";

        $previousSumN = $newSumN;
        $previousSumD = $newSumD;
    }

    // Add the 2 to the fraction

    $finalSumN = bcadd(bcmul(2,$previousSumD),  $previousSumN);
    $finalSumD = $previousSumD;

//    echo "\n Start reduce .. ";
//    reduceFraction_v3($finalSumN,$finalSumD);
//    echo " End reduce\n";

    echo " : $finalSumN / $finalSumD | value = " . ($finalSumN / $finalSumD);

    $digits = str_split($finalSumN,1);

    $nSum = 0;
    foreach ($digits as $digit) {
        $nSum += $digit;
    }
    echo " | sumDigits : $nSum";

//    break;
}

echo "\n";
