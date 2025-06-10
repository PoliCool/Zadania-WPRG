<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">

</head>
<body>
<form action="zadanie1.php" method="get">
    Podaj datę urodzenia: <input type="date" name="data">
    <input type="submit" value="Wyślij">
</form>
</body>
<?php

function dzienTygodnia($data) {
    return date('l', strtotime($data));
}

function ileLat($data) {
    $urodziny = new DateTime($data);
    $dzisiaj = new DateTime();
    return $dzisiaj->diff($urodziny)->y;
}

function dniDoUrodzin($data) {
    $dzisiaj = new DateTime();
    $urodziny = DateTime::createFromFormat('Y-m-d', date('Y') . '-' . date('m-d', strtotime($data)));
    if($urodziny < $dzisiaj) {
        $urodziny->modify('+1 year');
    }
    return $dzisiaj->diff($urodziny)->days;
}

if(isset($_GET['data'])) {
    $data = $_GET['data'];
    echo "Dzień tygodnia: " . dzienTygodnia($data) . "<br>";
    echo "Ukończone lata: " . ileLat($data) . "<br>";
    echo "Dni do najbliższych urodzin: " . dniDoUrodzin($data);
}
?>
