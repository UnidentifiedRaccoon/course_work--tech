<?php
include("../php/db_connection.php");

$category = filter_var(trim($_GET['category']), FILTER_SANITIZE_URL);
$categoryNumber = intval($category);

// Проверить, есть ли такая категория в БД
$stmtCategory = $mysql->prepare("SELECT * FROM `categories` WHERE `id` = ?");
$stmtCategory->bind_param("i", $categoryNumber);
$stmtCategory->execute();
$resultCategory = $stmtCategory->get_result();

if ($resultCategory) {
    $value = $resultCategory->fetch_assoc();
    if (!$value) {
        echo "Запрашиваемая категория не существует";
        exit();
    }
} else {
    echo "Ошибка запроса к БД: " . $stmtCategory->error;
    exit();
}

$stmtCategory->close();

// Получить все товары заданной категории
$stmtProducts = $mysql->prepare("SELECT * FROM `products` WHERE `category_id` = ?");
$stmtProducts->bind_param("i", $categoryNumber);
$stmtProducts->execute();
$resultProducts = $stmtProducts->get_result();

if ($resultProducts) {
    ?>
    <table>
        <thead>
        <tr>
            <th>Название</th>
            <th>Цена</th>
            <th>Описание</th>
            <th>Изображение</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($row = $resultProducts->fetch_assoc()) {
            ?>
            <tr>
                <td><a href="product.php?product=<?= $row['id'] ?>"><?= $row['name'] ?></a></td>
                <td><?= $row['price'] ?></td>
                <td><?= $row['description'] ?></td>
                <td><img src="<?= $row['image'] ?>"></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <?php
} else {
    echo "Ошибка запроса к БД: " . $stmtProducts->error;
    exit();
}

$stmtProducts->close();
?>