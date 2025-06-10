<!DOCTYPE html>
<html lang="pl">
<head><meta charset="UTF-8"><title>cimi</title></head>
<body>
<form method="post">
    <input type="text" name="tekst" placeholder="Wpisz tekst" required>
    <button type="submit">Wyślij</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tekst = $_POST['tekst'];
    echo "Duże litery: " . strtoupper($tekst) . "<br>";
    echo "Małe litery: " . strtolower($tekst) . "<br>";
    echo "Pierwsza wielka: " . ucfirst(strtolower($tekst)) . "<br>";
    echo "Pierwsze litery słów wielkie: " . ucwords(strtolower($tekst)) . "<br>";
}
?>
</body>
</html>
