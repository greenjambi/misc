<?php

$file = fopen('p059_cipher.txt', 'r');

$data = fgetcsv($file);
$passCode = (isset($argv[1]))? (int)$argv[1] : 97;


for ($passCode = 97; $passCode <= 122; $passCode++) {

    $numErrors = 0;

    foreach ($data as $key => $code) {

        $code = (int) $code;

        if (($key) % 3 != 2) {
            continue;
        }

        $decodedAsciiValue = $code ^ $passCode;

        if (
        ! (
            ($decodedAsciiValue >= 65 && $decodedAsciiValue <= 90) ||
            ($decodedAsciiValue >= 97 && $decodedAsciiValue <= 122) ||
            ($decodedAsciiValue >= 97 && $decodedAsciiValue <= 122) ||
            (in_array($decodedAsciiValue, [32, 63]))
        )
        ) {
            $numErrors++;
        }

        $decodedChr = chr($decodedAsciiValue);
//        echo $decodedChr .  " ";
    }


    echo "\n$passCode ". chr($passCode) . " -> errors : $numErrors";
}

echo "\n";