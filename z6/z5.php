<?php
function panagram($a){
    $alfabet = range('a', 'z');
    $a = str_replace(' ','', $a);
    $a = strtolower($a);
    foreach ($alfabet as $letter) {
        if (strpos($a, $letter) === false) {
            return false;
        }
    }
    return true;
}
echo panagram("The quick brown fox jumps over the lazy dog")
?>