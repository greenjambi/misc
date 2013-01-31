<?php

ob_end_flush();

include '../misc_functions/isPrime.php';
include '../misc_functions/init.php';

$db = new db();

d('Querying for primes..');

//
// 

$arrPrimes = $db->executeUnbuffeSelect('SELECT val FROM euler.primes WHERE val > 673 ORDER BY val LIMIT 100000 ');

d('done', 0);

foreach ($arrPrimes as $prime) {
    //d(' --> '.$prime['val']);
}

d("Done\n");









function memCheck($l)
{
    d(" memory check @ ".$l." : ". (memory_get_usage() / 1024 / 1024) . " mb ");
}