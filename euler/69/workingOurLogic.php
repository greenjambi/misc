<?php

$m = $argv[1]?: 10;

for ($i=7; $i<=$m; $i+=30) {
    echo "\n$i";
    echo "\n " . ($i    );
    echo "\n " . ($i+4  );
    echo "\n " . ($i+6  );
    echo "\n " . ($i+10 );
    echo "\n " . ($i+12 );
    echo "\n " . ($i+16 );
    echo "\n " . ($i+22 );
    echo "\n " . ($i+24 );
}