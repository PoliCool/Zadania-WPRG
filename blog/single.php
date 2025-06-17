<?php include("path.php") ?>
<?php include(ROOT_PATH . 'app/controllers/posts.php');
if(isset($_GET['id'])) {
    $post = selectOne('posts', ['id' => $_GET['id']]);
    $previousPost = getPreviousPost($_GET['id']);
    $nextPost = getNextPost($_GET['id']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--Ciekawostka z lepszym pozycjonowaniem w google -->
    <title><?php echo $post['title']?> </title>
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

<div class="content">

    <div class="main_content single">
        <h1 class="post_title"><?php echo $post['title']?> </h1>
        <div class ="post_content">
          <?php echo html_entity_decode($post['body']);?>
        </div>
    </div>
</div>

<div class="post-navigation">
    <?php if($previousPost): ?>
        <a href="single.php?id=<?php echo $previousPost['id']; ?>" class="button_nav">← Previous Post</a>
    <?php endif; ?>

    <?php if($nextPost): ?>
        <a href="single.php?id=<?php echo $nextPost['id']; ?>" class="button_nav">Next Post →</a>
    <?php endif; ?>
</div>


<!-- STOPKA -->
<?php include(ROOT_PATH . 'app/includes/footer.php'); ?>

</body>
</html>