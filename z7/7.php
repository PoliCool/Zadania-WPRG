<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Kalkulator</title>
    <style>
        body {
            background-color: #111;
            color: white;
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .container {
            max-width: 400px;
            margin: auto;
        }
        .section {
            margin-bottom: 30px;
            padding: 15px;
            border-bottom: 1px solid white;
        }
        input, select, button {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 10px;
            font-size: 16px;
        }
        .result {
            font-weight: bold;
            color: #0f0;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Kalkulator</h1>

    <!-- Kalkulator prosty -->
    <div class="section">
        <h2>Prosty</h2>
        <form method="post">
            <input type="number" name="a" step="any" required placeholder="Liczba 1">
            <input type="number" name="b" step="any" required placeholder="Liczba 2">
            <select name="simple_op">
                <option value="add">Dodawanie</option>
                <option value="sub">Odejmowanie</option>
                <option value="mul">Mnożenie</option>
                <option value="div">Dzielenie</option>
            </select>
            <button type="submit" name="calculate_simple">Oblicz</button>
        </form>
        <?php
        if (isset($_POST['calculate_simple'])) {
            $a = $_POST['a'];
            $b = $_POST['b'];
            $op = $_POST['simple_op'];
            $wynik = "Błąd";

            if (is_numeric($a) && is_numeric($b)) {
                switch ($op) {
                    case "add": $wynik = $a + $b; break;
                    case "sub": $wynik = $a - $b; break;
                    case "mul": $wynik = $a * $b; break;
                    case "div": $b != 0 ? $wynik = $a / $b : $wynik = "Nie dziel przez 0"; break;
                }
                echo "<div class='result'>Wynik: $wynik</div>";
            }
        }
        ?>
    </div>

    <!-- Kalkulator zaawansowany -->
    <div class="section">
        <h2>Zaawansowany</h2>
        <form method="post">
            <input type="text" name="zaaw_val" required placeholder="Wartość">
            <select name="advanced_op">
                <option value="cos">Cosinus</option>
                <option value="sin">Sinus</option>
                <option value="tan">Tangens</option>
                <option value="bin2dec">Binarnie na dziesiętne</option>
                <option value="dec2bin">Dziesiętne na binarne</option>
                <option value="dec2hex">Dziesiętne na szesnastkowe</option>
                <option value="hex2dec">Szesnastkowe na dziesiętne</option>
            </select>
            <button type="submit" name="calculate_advanced">Oblicz</button>
        </form>
        <?php
        if (isset($_POST['calculate_advanced'])) {
            $val = $_POST['zaaw_val'];
            $op = $_POST['advanced_op'];
            $wynik = "Błąd";

            switch ($op) {
                case "cos": $wynik = cos(deg2rad(floatval($val))); break;
                case "sin": $wynik = sin(deg2rad(floatval($val))); break;
                case "tan": $wynik = tan(deg2rad(floatval($val))); break;
                case "bin2dec": $wynik = bindec($val); break;
                case "dec2bin": $wynik = decbin((int)$val); break;
                case "dec2hex": $wynik = dechex((int)$val); break;
                case "hex2dec": $wynik = hexdec($val); break;
            }

            echo "<div class='result'>Wynik: $wynik</div>";
        }
        ?>
    </div>
</div>
</body>
</html>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Kalkulator</title>
    <style>
        body {
            background-color: #111;
            color: white;
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .container {
            max-width: 400px;
            margin: auto;
        }
        .section {
            margin-bottom: 30px;
            padding: 15px;
            border-bottom: 1px solid white;
        }
        input, select, button {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 10px;
            font-size: 16px;
        }
        .result {
            font-weight: bold;
            color: #0f0;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Kalkulator</h1>

    <!-- Kalkulator prosty -->
    <div class="section">
        <h2>Prosty</h2>
        <form method="post">
            <input type="number" name="a" step="any" required placeholder="Liczba 1">
            <input type="number" name="b" step="any" required placeholder="Liczba 2">
            <select name="simple_op">
                <option value="add">Dodawanie</option>
                <option value="sub">Odejmowanie</option>
                <option value="mul">Mnożenie</option>
                <option value="div">Dzielenie</option>
            </select>
            <button type="submit" name="calculate_simple">Oblicz</button>
        </form>
        <?php
        if (isset($_POST['calculate_simple'])) {
            $a = $_POST['a'];
            $b = $_POST['b'];
            $op = $_POST['simple_op'];
            $wynik = "Błąd";

            if (is_numeric($a) && is_numeric($b)) {
                switch ($op) {
                    case "add": $wynik = $a + $b; break;
                    case "sub": $wynik = $a - $b; break;
                    case "mul": $wynik = $a * $b; break;
                    case "div": $b != 0 ? $wynik = $a / $b : $wynik = "Nie dziel przez 0"; break;
                }
                echo "<div class='result'>Wynik: $wynik</div>";
            }
        }
        ?>
    </div>

    <!-- Kalkulator zaawansowany -->
    <div class="section">
        <h2>Zaawansowany</h2>
        <form method="post">
            <input type="text" name="zaaw_val" required placeholder="Wartość">
            <select name="advanced_op">
                <option value="cos">Cosinus</option>
                <option value="sin">Sinus</option>
                <option value="tan">Tangens</option>
                <option value="bin2dec">Binarnie na dziesiętne</option>
                <option value="dec2bin">Dziesiętne na binarne</option>
                <option value="dec2hex">Dziesiętne na szesnastkowe</option>
                <option value="hex2dec">Szesnastkowe na dziesiętne</option>
            </select>
            <button type="submit" name="calculate_advanced">Oblicz</button>
        </form>
        <?php
        if (isset($_POST['calculate_advanced'])) {
            $val = $_POST['zaaw_val'];
            $op = $_POST['advanced_op'];
            $wynik = "Błąd";

            switch ($op) {
                case "cos": $wynik = cos(deg2rad(floatval($val))); break;
                case "sin": $wynik = sin(deg2rad(floatval($val))); break;
                case "tan": $wynik = tan(deg2rad(floatval($val))); break;
                case "bin2dec": $wynik = bindec($val); break;
                case "dec2bin": $wynik = decbin((int)$val); break;
                case "dec2hex": $wynik = dechex((int)$val); break;
                case "hex2dec": $wynik = hexdec($val); break;
            }

            echo "<div class='result'>Wynik: $wynik</div>";
        }
        ?>
    </div>
</div>
</body>
</html>
