<?php
///////////////////////
$maxLimitToSearchFor = 500;
////////////////////////

function isPrime($a)
{
    return ($a == gmp_strval( gmp_nextprime($a - 1)));
}

/**
 * @param $arrStart
 * @return array|boolean
 */
function findNextPrimePair($arrStart)
{
    global $maxLimitToSearchFor;

    echo "inputs  : " ; print_r($arrStart);

    $arrReturn = $arrStart;

    foreach ($arrStart as $key => $start) {

        if ($key == 0 ) { continue; }

        do {

            $nextPrime = gmp_strval( gmp_nextprime($start));

            if ($nextPrime <= $arrReturn[$key - 1]) {
                $start = $nextPrime;
                continue;
            }

            if ($nextPrime > $maxLimitToSearchFor) {
                return false;
            }


            $isPair = true;
            for ($i=0; $i < $key ; $i++) {

                if (!(isPrime($arrStart[$i] . $nextPrime ) && isPrime($nextPrime . $arrStart[$i]))) {
                    $isPair = false;
                }

            }
            if ($isPair == true) {
                $arrReturn[$key] = $nextPrime;
                if (sizeof($arrStart) - 1  == $key) {
                    return $arrReturn;
                }
                break;
            }
            $start = $nextPrime;
        } while (1);
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

    $arrStart = array($a,$a, $a);


    $arrPrimePair = findNextPrimePair($arrStart);
    while ($arrPrimePair !== false) {
        echo "\nPrime pair : " . implode(",", $arrPrimePair) .
        " | Sum : " . array_sum($arrPrimePair);

        if ($arrNum['sum'] > (array_sum($arrPrimePair)) || $arrNum['sum'] == 0) {

            $arrNum['nums'] = $arrPrimePair;

            $arrNum['sum'] = array_sum($arrPrimePair);
        }

        $arrPrimePair = findNextPrimePair($arrPrimePair);
    }



	$a = gmp_strval( gmp_nextprime($a));
} while ($a < 10) ; //$maxLimitToSearchFor);

print_r($arrNum);

echo "\n";
