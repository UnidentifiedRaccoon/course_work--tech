<header>
    <nav class="sidebar_nav">
        <div class="logo">
            <a href="./main.php">
                <span class="sign_word">Техномарт</span>
            </a>
        </div>
        <div class="menu">
            <div id="catalog-menu">
                <a id="catalog-button-link" href="./catalog.php">Каталог</a>
                <div id="catalog-submenu">
                    <?php
                    include("../php/db_connection.php");

                    // Получить все категории из БД
                    $stmtCategories = $mysql->prepare("SELECT * FROM `categories`");
                    $stmtCategories->execute();
                    $resultCategories = $stmtCategories->get_result();

                    if ($resultCategories) {
                        while ($row = $resultCategories->fetch_assoc()) {
                            ?>
                            <a href="./category.php?category=<?= $row['id'] ?>"><?= $row['name'] ?></a>
                            <?php
                        }
                    } else {
                        echo "Ошибка запроса к БД: " . $stmtCategories->error;
                        exit();
                    }

                    $stmtCategories->close();
                    ?>
                </div>
            </div>
            <a href="./contact-info.php">Контакты</a>
            <a href="./dev.php">Разработка</a>
        </div>
        <div class="entry">
            <?php
            if($_COOKIE['authToken']):
                ?>
                <a href="./logout.php">Выход</a></li>
            <?php else: ?>
                <a href="./login.php">Вход</a></li>
            <?php endif;?>
        </div>
    </nav>
</header>