<?php

$mojeIP = $_SERVER['REMOTE_ADDR'];
$plik = "dozwolone_ip.txt"; // np. w pliku: 127.0.0.1

if(file_exists($plik)) {
    $ipLista = file($plik, FILE_IGNORE_NEW_LINES);
    if(in_array($mojeIP, $ipLista)) {
        include 'strona_dla_ip.php';
    } else {
        include 'strona_dla_reszty.php';
    }
} else {
    echo "Brak pliku z IP.";
}
?>
