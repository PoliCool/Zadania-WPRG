<?php include("../../path.php") ?>
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
            <a href="create.html" class="button_big">Add User</a>
            <a href="index.html" class="button_big" >Manage Users</a>
        </div>
        <div class="admin_post_content">
            <h2 class="page_title">Create User</h2>
            <form action="create.html" method="post">

                <div>
                    <label>Username</label> <br>
                    <input type="text" name="text" class="text_input title_input"><br>
                    <label>Email</label><br>
                    <input type="text" name="title" class="text_input title_input"><br>
                    <label>Password</label><br>
                    <input type="text" name="text" class="text_input title_input"><br>
                    <label>Password Confirmation</label><br>
                    <input type="text" name="text" class="text_input title_input"><br>
                    <label>Role</label><br>
                    <select name="role" class="text_input">
                        <option value="admin">Admin</option>
                        <option value="user">Author</option>
                    </select>
                    <button type="submit" name="create_button" class="button button_big">Add User</button>
                </div>
            </form>
        </div>

    </div>
</div>
</body>
</html>