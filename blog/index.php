<?php include('path.php');
include(ROOT_PATH . 'app/database/db.php');

$posts=selectAll('posts',['published'=>1]);

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

        <div class="post">
            <img src="https://picsum.photos/200/300" alt="" class="post_image">
            <div class="post_preview">
                <h2><a href="single.html">LOLOLOl sadkaosjdw dwolo</a></h2>
                <span>Adam Rutkowski</span>
                <span>15/06/2025</span>
                <p class="preview_text">
                    skibid sigma elo sigjidsa
                </p>
                <a href="single.html" class="button read_more">Read More</a>
            </div>
        </div>
</div>
<!-- STOPKA -->
<?php include(ROOT_PATH . 'app/includes/footer.php'); ?>
</body>
</html>