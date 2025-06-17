<?php include('path.php');
include(ROOT_PATH . 'app/database/db.php');

$posts=getPublicPosts();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Main</title>
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
<?php include(ROOT_PATH . 'app/includes/messages.php'); ?>

<div class="content">
    <h1 class="new_posts">Najnowsze Posty</h1>
    <div class="main_content">

        <?php foreach ($posts as $post): ?>
            <div class="post">
                <img src="<?php echo BASE_URL.'/assets/images/' . $post['image'];?>" alt="" class="post_image">
                <div class="post_preview">
                    <h2><a href="single.php?id=<?php echo $post['id'];?>"><?php echo $post['title']; ?></a></h2>
                    <span><?php echo $post['username']; ?></span>
                    <span><?php echo date('F j, Y',strtotime($post['created_at'])); ?></span>
                    <p class="preview_text">
                        <?php echo html_entity_decode(substr($post['body'],0,150). '...'); ?>
                    </p>
                    <a href="single.php?id=<?php echo $post['id'];?>" class="button read_more">Read More</a>
                </div>
            </div>
        <?php endforeach; ?>

        <!-- Sztuczny dystans pod postami (nowy element) -->
        <div style="height: 50px;"></div>

    </div>
</div>

<!-- STOPKA -->
<?php include(ROOT_PATH . 'app/includes/footer.php'); ?>
</body>
</html>
