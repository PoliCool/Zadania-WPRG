<?php

$plik = "linki.txt"; // np. w pliku: http://example.com;Przykładowy link

if(file_exists($plik)) {
    $linki = file($plik);
    foreach($linki as $linia) {
        list($adres, $opis) = explode(";", trim($linia));
        echo "<a href='$adres'>$opis</a><br>";
    }
} else {
    echo "Plik z linkami nie istnieje.";
}
?>
