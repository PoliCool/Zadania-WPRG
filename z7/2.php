<?php

function rozszerzTablice($tablica, $n) {
    if ($n < 0 || $n >= count($tablica)) {
        echo "BŁĄD\n";
        return;
    }

    $nowaTablica = [];

    for ($i = 0; $i <= count($tablica); $i++) {
        if ($i == $n) {
            $nowaTablica[] = "X";
        }
        if ($i < count($tablica)) {
            $nowaTablica[] = $tablica[$i];
        }
    }

    print_r($nowaTablica);
}

// przykładowe użycie
$mojeDane = array("a", "b", "c", "d");
rozszerzTablice($mojeDane, 2); // powinno dodać "X" przed "c"
?>
