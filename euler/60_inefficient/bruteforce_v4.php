<?php
///////////////////////
$maxLimitToSearchFor = 20000;
////////////////////////

function isPrime($a)
{
    return ($a == gmp_strval( gmp_nextprime($a - 1)));
}

/**
 * @param $arrStart
 * @param $intNumCount
 * @return array|boolean
 */
function findNextPrimePair($arrStart, $intNumCount)
{
    global $maxLimitToSearchFor;

//    echo "inputs  : " ; print_r($arrStart);

    $arrReturn = array();

    foreach ($arrStart as $key => $start) {

        $startValue = $start[sizeof($start) -1];

        do {

            $nextPrime = gmp_strval( gmp_nextprime($startValue));

//            if ($nextPrime <= $arrReturn[$key - 1]) {
//                $start = $nextPrime;
//                continue;
//            }

            if ($nextPrime > $maxLimitToSearchFor) {
                break;
            }


            $isPair = true;
            for ($i=0; $i < sizeof($start) ; $i++) {

                if (!(isPrime($start[$i] . $nextPrime ) && isPrime($nextPrime . $start[$i]))) {
                    $isPair = false;
                }

            }
            if ($isPair == true) {
                $arrReturn[] =  array_merge($start, array($nextPrime));
            }
            $startValue = $nextPrime;
        } while (1);
    }

    if (empty($arrReturn)) {
        return false;
    }

    if (sizeof($arrReturn[0]) < $intNumCount) {

        return findNextPrimePair($arrReturn, $intNumCount);
    } else {
//        echo "\nMax size reached : " . sizeof($arrReturn[0]);
        return $arrReturn;
    }
}

//////////////////////
// Main function start
//////////////////////
$a = 2;
$arrNum = array('sum' => 0);

do {

	echo "\nPrime : $a";

    $start = $a;

    $arrStart = array(array($a));

    $arrPrimePair = findNextPrimePair($arrStart, 5);

    foreach ($arrPrimePair as $pairs) {

        echo "\nPrime pair : " . implode(",", $pairs) .
            " | Sum : " . array_sum($pairs);

        if ($arrNum['sum'] > (array_sum($pairs)) || $arrNum['sum'] == 0) {

            $arrNum['nums'] = $pairs;

            $arrNum['sum'] = array_sum($pairs);
            $maxLimitToSearchFor=array_sum($pairs);
        }
    }



//    while ($arrPrimePair !== false) {
//        echo "\nPrime pair : " . implode(",", $arrPrimePair) .
//        " | Sum : " . array_sum($arrPrimePair);
//
//
//        $arrPrimePair = findNextPrimePair($arrPrimePair, $intConstantPosition);
//    }



	$a = gmp_strval( gmp_nextprime($a));
} while ($a < $maxLimitToSearchFor);

print_r($arrNum);

echo "\n";

