<?php include("../../path.php");?>
<?php include(ROOT_PATH . '/app/controllers/posts.php');?>
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
            <a href="create.php" class="button_big">Add Post</a>
            <a href="index.php" class="button_big" >Manage Posts</a>
        </div>
        <div class="admin_post_content">
            <h2 class="page_title">Manage Posts</h2>
            <?php include (ROOT_PATH . '/app/includes/messages.php');?>
            <table>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th colspan="3">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($posts as $key => $post): ?>
                    <tr>
                        <td><?php echo $key + 1; ?></td>
                        <td><?php echo $post['title']; ?></td>
                        <td>AWA</td>
                        <td><a href="edit.php?id=<?php echo $post['id'];?>" class="edit">edit</a></td>
                        <td><a href="edit.php?delete_id=<?php echo $post['id'];?>" class="delete">delete</a></td>
                        <td>
                            <?php if ($post['published']): ?>
                                <a href="#" class="unpublish">unpublish</a>
                            <?php else: ?>
                                <a href="#" class="publish">publish</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
</body>
</html>