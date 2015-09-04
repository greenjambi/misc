<?php

$file = fopen('p059_cipher.txt', 'r');

$data = fgetcsv($file);
$passCode = [
    103,
    111,
    100,
];

$numErrors = 0;

$sumDecodedAsciiValue = 0;

foreach ($data as $key => $code) {

    $code = (int) $code;

    $passCodeIndex = ($key % 3);

    $decodedAsciiValue = $code ^ $passCode[$passCodeIndex];

    $sumDecodedAsciiValue += $decodedAsciiValue;

    $decodedChr = chr($decodedAsciiValue);
    echo "$decodedChr";
}


echo "\nSum of the decoded ascii values = $sumDecodedAsciiValue";


echo "\n";