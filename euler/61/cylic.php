<?php
//generate

include_once '../misc_functions/init.php';




function  findCyclicNumsFor($p) {

    global $Ps;
    $arrReturn = array();
    $types[] = $p[0];
    $numPrevious = $p[1];

    $arrReturn[] = $p;

    while (1) {
        foreach ($Ps as $pToCompare) {

            $typeToCompare = $pToCompare[0];
            $numToCompare = $pToCompare[1];
//echo "\nnumPrevious : $numPrevious |  numTOCompare : " . $numToCompare;
            if (in_array($typeToCompare, $types)) {
                continue;
            }
            if (substr($numPrevious, -2) == substr($numToCompare, 0, 2)) {

//echo "\nfound : $numPrevious <=> $numToCompare";
                $arrReturn[] = $pToCompare;
                $types[] = $typeToCompare;
                $numPrevious = $numToCompare;

                if (sizeof($arrReturn) == 6 &&
                    substr($numToCompare, -2) == substr($p[1], 0, 2)

                ) {
                    return $arrReturn;
                } else {
//echo "\nSize : " . sizeof($arrReturn);
                    continue 2;
                }
            }
        }

        return false;

    }
}


$n = 1;
$db = new db();

// Populate the figurate numbers
do {

    echo " n : $n";
    // Triangular
    $p3 = $n * ($n+1) / 2;
    $p4 = $n * $n;
    $p5 = $n * (3 * $n - 1) / 2 ;
    $p6 = $n * (2 * $n -1);
    $p7 = $n * (5 * $n - 3) / 2;
    $p8 = $n * (3 * $n - 2);

    if (
        $p3 > 9999 &
        $p4 > 9999 &
        $p5 > 9999 &
        $p6 > 9999 &
        $p7 > 9999 &
        $p8 > 9999
    ) {
        break;
    }


    if ($p3 >=1000 && $p3 <=9999 ) {$Ps[] = array(3,$p3);}
    if ($p4 >=1000 && $p4 <=9999 ) {$Ps[] = array(4,$p4);}
    if ($p5 >=1000 && $p5 <=9999 ) {$Ps[] = array(5,$p5);}
    if ($p6 >=1000 && $p6 <=9999 ) {$Ps[] = array(6,$p6);}
    if ($p7 >=1000 && $p7 <=9999 ) {$Ps[] = array(7,$p7);}
    if ($p8 >=1000 && $p8 <=9999 ) {$Ps[] = array(8,$p8);}

    $n++;

} while(1);

//print_r($Ps);
//
// $p has all the 4 digit figurate numbers

unset($p3);unset($p4);unset($p5);unset($p6);unset($p7);unset($p8);

$arrCyclicNum = array();
foreach ($Ps as $intCount => $p) {

    $type = $p[0];
    $num = $p[1];
    echo "\n count : " . $intCount . " | num : $num";

    $unkCyclic = findCyclicNumsFor($p);

//    echo "\n return : ";

    if ($unkCyclic !== false) {
        $sum = 0;
        foreach ($unkCyclic as $cyclicNum) {
            $sum += $cyclicNum[1];
        }
        $unkCyclic['sum'] = $sum;
        $arrCyclicNum[] = $unkCyclic;

    } else {
        echo " : not found ";
    }


}
print_r($arrCyclicNum);

//var_export(findCyclicNumsFor(array(4,8281)));