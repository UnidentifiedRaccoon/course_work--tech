<aside class="sidebar">
    <nav class="sidebar_nav">
        <ul class="sidebar__menu-list">
            <li class="sidebar__menu-item"><a class="sidebar__link" href="./main.php">Главная</a></li>
            <li class="sidebar__menu-item">
                <a class="sidebar__link" href="./catalog.php">Каталог</a>
                <ul class="sidebar__submenu-list">
                    <li class="sidebar__submenu-item"><a class="sidebar__link" href="./category.php?category=1">Категория 1</a></li>
                    <li class="sidebar__submenu-item"><a class="sidebar__link" href="./category.php?category=2">Категория 2</a></li>
                    <li class="sidebar__submenu-item"><a class="sidebar__link" href="./category.php?category=3">Категория 3</a></li>
                </ul>
            </li>
            <li class="sidebar__menu-item"><a class="sidebar__link" href="./contact-info.php">Контакты</a></li>
            <li class="sidebar__menu-item"><a class="sidebar__link" href="./dev.php">Разработка</a></li>
            <?php
                if($_COOKIE['isLoggedIn'] == true):
            ?>
                <li class="sidebar__menu-item"><a class="sidebar__link" href="./logout.php">Выход</a></li>
            <?php else: ?>
                <li class="sidebar__menu-item"><a class="sidebar__link" href="./login.php">Вход</a></li>
            <?php endif;?>
        </ul>
    </nav>
</aside>