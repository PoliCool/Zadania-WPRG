<!DOCTYPE html>
<html lang="pl">
<head><meta charset="UTF-8"><title>alfa</title></head>
<body>
<form method="post">
    <input type="text" name="liczba" placeholder="Wpisz liczbę zmiennoprzecinkową" required>
    <button type="submit">Policz cyfry po przecinku</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $liczba = $_POST['liczba'];
    if (strpos($liczba, '.') !== false) {
        $czesci = explode('.', $liczba);
        $ile = strlen(rtrim($czesci[1], '0'));
    } else {
        $ile = 0;
    }
    echo "Liczba cyfr po przecinku: $ile";
}
?>
</body>
</html>
