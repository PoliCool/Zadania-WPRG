
<header>
    <a class="logo" href="<?php echo BASE_URL . '/index.php' ?>">
        <h1 class="logo_name">
            <span class="part1">Rutkowski</span><span class="part2">Blog</span>
        </h1>
    </a>
        <div class="nav_wrapper">
            <ul class="nav">
                <?php if (isset($_SESSION['user_id'])): ?>
                <li>
                    <?php echo $_SESSION['username'] ?>

                </li>
                <li class="menu_item">
                    <a><span class="material-symbols-outlined">menu</span></a>
                    <ul class="dropdown">

                        <?php if($_SESSION['admin']): ?>
                            <li><a href="<?php echo BASE_URL .'/admin/dashboard.php' ?>">Dashboard</a></li>

                        <?php endif; ?>
    <li><a href="<?php echo BASE_URL . '/logout.php' ?>">Logout</a></li>
    </ul>
    </li>
    <?php else: ?>
        <li><a href="<?php echo BASE_URL . '/login.php' ?>">Login</a></li>
        <li><a href="<?php echo BASE_URL . '/register.php' ?>">Register</a></li>
    <?php endif; ?>
    </ul>
    </div>

</header>