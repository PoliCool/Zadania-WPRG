<?php include("../../path.php") ?>
<?php include(ROOT_PATH . '/app/controllers/posts.php');
adminOnly();
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
            <a href="create.php" class="button_big">Add Post</a>
            <a href="index.php" class="button_big" >Manage Posts</a>
        </div>
        <div class="admin_post_content">
            <h2 class="page_title">Add Posts</h2>

            <?php include(ROOT_PATH . '/app/helpers/formErrors.php'); ?>

            <form action="create.php" method="post" enctype="multipart/form-data">
                <label>Image</label>
                <input type="file" name="image" class="text_input" >
                <div>
                    <label>Title</label>
                    <input type="text" name="title" value="<?php echo $title ?>" class="text_input title_input">
                    <label>Text</label>
                    <input type="text" name="body" value="<?php echo $body ?>" class="text_input title_input">
                    <div>
                        <label>
                            <input type ="checkbox" name="published">
                            Published
                        </label>
                    </div>
                    <button type="submit" name="add_post" class="button button_big">Add post</button>

                </div>
            </form>


        </div>
    </div>
</div>
</body>
</html>