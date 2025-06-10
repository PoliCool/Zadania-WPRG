
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
<form method="POST">
    <label for="głosy">Oddaj głos</label><br>
    <select name="głosy" id="glosy">
        <option value="SigmaBoy">Marek</option>
        <option value="WojtekGola">Radek</option>
        <option value="Baxton">Darek</option>
    </select><br>
    <input type="submit" value="VOTE">
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['glosy'])){
    $user_vote = $_POST['głosy'];
    $upperc_user_vote = ucfirst($user_vote);

    setcookie('locked', "1", time() + 60, "/");
    echo "<h1>Oddano glos na: ".$upperc_user_vote."</h1>";
    exit;
}

?>
</body>
</html>