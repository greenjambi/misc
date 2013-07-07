<?php

for ($i = 1; $i < 100; $i++) {

    for ($j=1;$j<100;$j++) {

        $r = bcpow($i,$j);
        if (strlen($r) == $j) {
            echo "\n $i ^ $j == $r | ";
        }

    }
}


echo "\n";