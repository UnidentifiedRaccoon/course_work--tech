<aside class="sidebar">
    <nav class="sidebar_nav">
        <ul class="sidebar__menu-list">
            <li class="sidebar__menu-item">
                <a class="sidebar__link" href="./catalog.php">Каталог</a>
                <ul class="sidebar__submenu-list">
                    <?php
                    include("../php/db_connection.php");

                    // Получить все категории из БД
                    $stmtCategories = $mysql->prepare("SELECT * FROM `categories`");
                    $stmtCategories->execute();
                    $resultCategories = $stmtCategories->get_result();

                    if ($resultCategories) {
                        while ($row = $resultCategories->fetch_assoc()) {
                            ?>
                            <li class="sidebar__submenu-item"><a class="sidebar__link" href="./category.php?category=<?= $row['id'] ?>"><?= $row['name'] ?></a></li>
                            <?php
                        }
                    } else {
                        echo "Ошибка запроса к БД: " . $stmtCategories->error;
                        exit();
                    }

                    $stmtCategories->close();
                    ?>
                </ul>
            </li>
        </ul>
    </nav>
</aside>