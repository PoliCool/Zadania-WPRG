<?php include("../../path.php") ?>
<?php include(ROOT_PATH . '/app/controllers/users.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin post create</title>
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- Ikonki -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    <!--Czcionka-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Edu+NSW+ACT+Hand+Pre:wght@400..700&display=swap" rel="stylesheet">
</head>
<body>
<?php include (ROOT_PATH . '/app/includes/adminHeader.php');?>
<div class="content">

    <?php include (ROOT_PATH . '/app/includes/adminSidebar.php');?>
    <div class="admin_content">

        <div class="button_group">
            <a href="create.php" class="button_big">Add User</a>
            <a href="index.php" class="button_big" >Manage Users</a>
        </div>
        <div class="admin_post_content">
            <h2 class="page_title">Edit User</h2>
            <form action="edit.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <div>
                    <label>Usernamer</label>
                    <input type="text" name="username"  class="text_input title_input">
                    <label>Email</label>
                    <input type="text" name="email"  class="text_input title_input">
                    <label>Password</label>
                    <input type="text" name="password"  class="text_input title_input">
                    <label>Password Confirmation</label>
                    <input type="text" name="passwordConfirmation"  class="text_input title_input">
                    <button type="submit" name="update_user" class="button button_big">Update User</button>
                </div>
            </form>
        </div>

    </div>
</div>
</body>
</html>