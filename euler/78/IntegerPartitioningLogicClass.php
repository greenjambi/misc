<?php

/**
 * Class IntegerPartition
 *
 * https://en.wikipedia.org/wiki/Partition_%28number_theory%29
 *
 * @author Shiraz Hazel <shiraz.hazel@ffrees.co.uk>
 */
class IntegerPartition
{
    /**
     * The array that would contain the partition function elements
     *
     * @var array
     */
    public static $partitionFunctionP = [
        0 => 1
    ];

    public static function findP($n)
    {
        if ($n < 0) {
            throw new Exception('Trying to find the partition function of a negative number');
        }

        //
        // If the array already has the number, return that
        //
        if (isset(self::$partitionFunctionP[$n])) {
            return self::$partitionFunctionP[$n];
        }

        //
        // If the array does not have the number, calculate it
        //

        $k = 1;
        $g = 0;
        $sum = 0;

        while ($n - $g >= 0) {
            $g = $k * (3 * $k - 1) / 2;

            if ($n-$g < 0) {
                break;
            }

            $sum = bcadd($sum, bcmul(pow(-1, $k-1) , self::findP($n-$g)));

            if ($k > 0) {
                $k = $k * -1;
            } else {
                $k = (-1 * $k) + 1;
            }
        }

        // $sum will now have the partitionFunctionP value

        self::$partitionFunctionP[$n] = $sum;

        return self::$partitionFunctionP[$n];
    }
}