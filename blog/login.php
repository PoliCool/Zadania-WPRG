<?php include("path.php") ?>
<?php include(ROOT_PATH . 'app/controllers/users.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Ikonki -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    <!--Czcionka-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Edu+NSW+ACT+Hand+Pre:wght@400..700&display=swap" rel="stylesheet">
</head>
<body>
<?php include(ROOT_PATH . 'app/includes/header.php'); ?>

<div class="auth_content">
    <form action="login.php" method="post" class="auth_form">
        <h2 class="form_title">Login</h2>
        <?php if(count($errors) > 0): ?>
            <div class="msg_error">
                <ul>
                    <?php foreach($errors as $error): ?>
                        <li><?php echo $error?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <div>
            <label>Username</label>
            <br>
            <input type="text" name="username" class="text_input">
        </div>

        <div>
            <label>Password</label>
            <br>
            <input type="password" name="password" class="text_input">
        </div>

        <div>
            <button type="submit" name="login_button" class="button button_big">Login</button>
        </div>
        <p><a href="<?php echo BASE_URL . '/register.php' ?>">Register</p>
    </form>
</div>


</body>
</html>