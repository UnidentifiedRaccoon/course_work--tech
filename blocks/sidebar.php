<aside class="sidebar">
    <nav class="sidebar_nav">
        <ul class="sidebar__menu-list">
            <li class="sidebar__menu-item">
                <a class="sidebar__link" href="./catalog.php">Каталог</a>
                <ul class="sidebar__submenu-list">
                    <?php
                    include("../php/db_connection.php");

                    //     Проверить, есть ли такая категория в БД
                    $query = "SELECT * FROM `categories`";
                    $result = $mysql->query($query);

                    if($result) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <li class="sidebar__submenu-item"><a class="sidebar__link" href="./category.php?category=<?= $row['id'] ?>"><?= $row['name'] ?></a></li>
                            <?php
                        }
                    } else {
                        echo "Ошибка запроса к БД: " . $mysql->error;
                        exit();
                    }
                    ?>
                </ul>
            </li>
        </ul>
    </nav>
</aside>