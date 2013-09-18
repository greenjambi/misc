<?php

/**
 *
 * http://cs.annauniv.edu/insight/Reading/algebra/indet/chakra.htm
 */

class Chakravala
{
    private static $_debug = false;

    public static function d($m)
    {
        if (self::$_debug) {
            echo $m;
        }
    }
    /**
     *
     * Solution to x^2 - D.y^2 = 1
     *
     * @param $D
     *
     * @return array
     */
    public static function findSolution($D)
    {
        // Initialise
        $p = 1;
        $k=1;
        $X = 1;
        $Y = 0;
        $intIteration = 0;
        do {

            self::d("\n interation : " . ++$intIteration);
            $oldP = $p;
            $oldK = $k;
            $oldX = $X;
            $oldY = $Y;
            // Choose a new value for p
            $rootD = round(sqrt($D));
            $intTempDiff = 0;

            while (
                ($rootD + $intTempDiff + $p) % $k != 0 &&
                ($rootD - $intTempDiff + $p) % $k != 0

            ) {

                $intTempDiff++;

            }

            // Step 1: find P
            if (($rootD - $intTempDiff + $p) % $k == 0) {
                $p = $rootD - $intTempDiff;
            } else {
                $p = $rootD + $intTempDiff;
            }

            self::d("\n p found : $p");

            // Step 2: find k
            $k = ($p*$p - $D) / $oldK;
            self::d("\n k found : $k");

            // Step 3: find x and y
            $X = bcdiv(bcadd(bcmul($p,$oldX), bcmul($D,$oldY)), abs($oldK));
            $Y = bcdiv(bcadd(bcmul($p,$oldY), $oldX), abs($oldK));

            self::d("\n x and y found : $X, $Y");

            if ($k == 1) {
                break;
            }

        } while(1);

        return array($X,$Y);
    }
}



//echo "61 : ";
//print_r(Chakravala::findSolution(61));