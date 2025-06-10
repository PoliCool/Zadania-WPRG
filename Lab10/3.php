<?php
session_start();
$account_login = "gal_anonim";
$account_psw = "420";
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: zad3.php");
    exit;
}
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    echo "<p>Zalogowano jako: {$_SESSION['login']}</p>";
    echo '<a href="?logout=1">Wyloguj</a>';
    exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['login'];
    $password = $_POST['password'];
    if ($username === $account_login && $password === $account_psw) {
        $_SESSION['logged_in'] = true;
        $_SESSION['login'] = $username;
        echo "<p>Zalogowano pomyślnie ".$username."</p>";
        echo '<a href="?logout=1">Wyloguj</a>';
        exit;
    } else {
        echo "<p>Sprobuj ponownie</p>";
    }
}

?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
</head>
<body>
<form method="POST">
    <label>Login</label><br>
    <input type="text" name="login"><br>
    <label>Password</label><br>
    <input type="password" name="password"><br><br>
    <input type="submit" value="Log in">
</form>
</body>
</html>