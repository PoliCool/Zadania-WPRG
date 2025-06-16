<?php include("../../path.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin user manage</title>
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
            <a href="create.php" class="button_big">Add user</a>
            <a href="index.php" class="button_big" >Manage users</a>
        </div>
        <div class="admin_post_content">
            <h2 class="page_title">Manage Users</h2>
            <table>
                <th>ID</th>
                <th>Username</th>
                <th>Role</th>
                <th colspan="2">Action</th>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Policool</td>
                    <td>User</td>
                    <td><a href="#" class="edit">edit</a></td>
                    <td><a href="#" class="delete">delete</a></td>

                </tr>
                <tr>
                    <td>2</td>
                    <td>Bloqver</td>
                    <td>Admin</td>
                    <td><a href="#" class="edit">edit</a></td>
                    <td><a href="#" class="delete">delete</a></td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>
</body>
</html>