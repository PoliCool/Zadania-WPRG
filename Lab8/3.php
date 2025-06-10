<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8"><title>alfa</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        input, select, button { margin: 5px; padding: 8px; }
    </style>
</head>
<body>
<form method="post">
    <input type="text" name="tekst" placeholder="Wpisz tekst" required>
    <select name="operacja">
        <option value="strrev">Odwróć ciąg</option>
        <option value="strtoupper">Wielkie litery</option>
        <option value="strtolower">Małe litery</option>
        <option value="strlen">Długość tekstu</option>
        <option value="trim">Usuń spacje z początku i końca</option>
    </select>
    <button type="submit">Wykonaj</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tekst = $_POST['tekst'];
    $operacja = $_POST['operacja'];
    if ($operacja == "strlen") {
        $wynik = strlen($tekst);
    } else {
        $wynik = $operacja($tekst);
    }
    echo "Wynik: $wynik";
}
?>
</body>
</html>
