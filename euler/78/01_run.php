<?php

require_once 'IntegerPartitioningLogicClass.php';

$n = isset($argv[1])? $argv[1] : 7;

for ($i = 1; $i <= $n; $i++) {
    $integerPartitions = IntegerPartition::findP($i);
    echo "Number of ways you can partition $i : " .$integerPartitions ;

    if (bcmod($integerPartitions, 1000000) == 0) {
        echo "\nFound";
        break;
    }
    echo "\n";
}

echo "\n";