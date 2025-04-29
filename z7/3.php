<?php

function utworzTablice($a, $b, $c, $d) {
    $tablica = array();

    $index = $a;
    $wartosc = $c;

    while ($index <= $b && $wartosc <= $d) {
        $tablica[$index] = $wartosc;
        $index++;
        $wartosc++;
    }

    print_r($tablica);
}

// przykładowe użycie
utworzTablice(3, 7, 10, 20);
?>
