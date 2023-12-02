<?php
include("../php/db_connection.php");

$category = filter_var(trim($_GET['category']), FILTER_SANITIZE_URL);
$categoryNumber = intval($category);

//     Проверить, есть ли такая категория в БД
$query = "SELECT * FROM `categories` WHERE `id` = '$categoryNumber'";
$result = $mysql->query($query);

if($result) {
    $value = $result->fetch_assoc();
    if ($value) {} else {
        echo "Запрашиваемая категория не существует";
        exit();
    }
} else {
    echo "Ошибка запроса к БД: " . $mysql->error;
    exit();
}

// Получить все товары заданной категории
$query = "SELECT * FROM `products` WHERE `category_id` = '$categoryNumber'";
$result = $mysql->query($query);

if($result) {
    ?>
    <table>
        <thead>
        <tr>
            <th>Название</th>
            <th>Цена</th>
            <th>Описание</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td><a href="product.php?product=<?= $row['id'] ?>"><?= $row['name'] ?></a></td>
            <td><?= $row['price'] ?></td>
            <td><?= $row['description'] ?></td>
        </<tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <?php
} else {
    echo "Ошибка запроса к БД: " . $mysql->error;
    exit();
}
?>
