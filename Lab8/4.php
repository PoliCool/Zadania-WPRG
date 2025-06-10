<!DOCTYPE html>
<html lang="pl">
<head><meta charset="UTF-8"><title>boy</title></head>
<body>
<form method="post">
    <input type="text" name="tekst" placeholder="Wpisz tekst" required>
    <button type="submit">Policz samogłoski</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tekst = strtolower($_POST['tekst']);
    $samogloski = ['a', 'e', 'i', 'o', 'u'];
    $licznik = 0;
    foreach (str_split($tekst) as $litera) {
        if (in_array($litera, $samogloski)) $licznik++;
    }
    echo "Liczba samogłosek: $licznik";
}
?>
</body>
</html>
