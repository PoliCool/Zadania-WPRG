<!DOCTYPE html>
<html lang="pl">
<head><meta charset="UTF-8"><title>minies</title></head>
<body>
<form method="post">
    <input type="text" name="ciag" placeholder="Wpisz ciąg" required>
    <button type="submit">Wyczyść</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ciag = $_POST['ciag'];
    $czysty = preg_replace('/[\\\\\\/\\:*?"<>|+\\-.]/', '', $ciag);
    echo "Po usunięciu niepożądanych znaków: $czysty";
}
?>
</body>
</html>
