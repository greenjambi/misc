<?php

/*
CREATE TABLE euler.primes (
id int unsigned not null primary key,
val int unsigned not null unique ,
lastUpdate timestamp not null default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP
);
*/

ob_end_clean();

include '../misc_functions/isPrime.php';
include '../misc_functions/db.class.php';

$db = new db();
for ($i=6;$i<100000;$i+=6) {
     
    foreach (array($i-1,$i+1) as $j) {
        if (isPrime($j)) {
            d("$j : Prime");
            $db->executeInsert("INSERT IGNORE INTO euler.primes SET val = $j");
        }
    }
}

d('Done');
d("\n"); 

function d($m) 
{
    echo "\n## $m";
}