<form action="zadanie2.php" method="get">
    Ścieżka: <input type="text" name="sciezka"><br>
    Nazwa katalogu: <input type="text" name="nazwa"><br>
    Operacja:
    <select name="operacja">
        <option value="read">Read</option>
        <option value="create">Create</option>
        <option value="delete">Delete</option>
    </select><br>
    <input type="submit" value="Wykonaj">
</form>
<?php
// zadanie2.php
function obslugaKatalogu($sciezka, $nazwa, $operacja = 'read') {
    if(substr($sciezka, -1) !== '/') $sciezka .= '/';
    $pelna = $sciezka . $nazwa;

    if($operacja == 'read') {
        if(is_dir($pelna)) {
            return scandir($pelna);
        } else {
            return "Katalog nie istnieje.";
        }
    } elseif($operacja == 'create') {
        if(mkdir($pelna)) return "Katalog utworzony.";
        else return "Nie udało się utworzyć.";
    } elseif($operacja == 'delete') {
        if(is_dir($pelna) && count(scandir($pelna)) == 2) {
            if(rmdir($pelna)) return "Katalog usunięty.";
            else return "Nie udało się usunąć.";
        } else return "Katalog nie istnieje lub nie jest pusty.";
    }
}

if(isset($_GET['sciezka'], $_GET['nazwa'], $_GET['operacja'])) {
    $wynik = obslugaKatalogu($_GET['sciezka'], $_GET['nazwa'], $_GET['operacja']);
    if(is_array($wynik)) print_r($wynik);
    else echo $wynik;
}
?>
