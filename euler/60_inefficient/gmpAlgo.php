<?php

include '../misc_functions/init.php';

$i = 100009841;
$j=1;
$db = new db();
do {
    
    
    $strQuery = "INSERT IGNORE INTO euler.primes (val) VALUES ";
    for ($c = 0; $c< 10000; $c++) {
        
        $i = gmp_strval(gmp_nextprime($i));
        
        $strQuery .= "('$i'),";
        
        
    } 
    
    $db->executeInsert("$strQuery  ('1')");
    d('Inserted ' . ($j++ * 10000) . ' records');
    
    if ($i > 1000000000) {
        break;
    }
    
    
} while (1);

d("Done\n");