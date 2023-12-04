<header>
    <nav class="sidebar_nav">
        <ul class="sidebar__menu-list">
            <li class="sidebar__menu-item"><a class="sidebar__link" href="./main.php">Главная</a></li>
            <li class="sidebar__menu-item"><a class="sidebar__link" href="./contact-info.php">Контакты</a></li>
            <li class="sidebar__menu-item"><a class="sidebar__link" href="./dev.php">Разработка</a></li>
            <?php
            if($_COOKIE['authToken']):
                ?>
                <li class="sidebar__menu-item"><a class="sidebar__link" href="./logout.php">Выход</a></li>
            <?php else: ?>
                <li class="sidebar__menu-item"><a class="sidebar__link" href="./login.php">Вход</a></li>
            <?php endif;?>
        </ul>
    </nav>
</header>