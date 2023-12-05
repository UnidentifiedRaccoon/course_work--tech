<?php
include("../php/db_connection.php");

$product = filter_var(trim($_GET['product']), FILTER_SANITIZE_URL);
$productNumber = intval($product);

// Получить продукт
$stmtProduct = $mysql->prepare("SELECT * FROM `products` WHERE `id` = ?");
$stmtProduct->bind_param("i", $productNumber);
$stmtProduct->execute();
$resultProduct = $stmtProduct->get_result();

if ($resultProduct) {
    $row = $resultProduct->fetch_assoc();

    // Получить категорию продукта
    $categoryID = $row['category_id'];
    $stmtCategory = $mysql->prepare("SELECT * FROM `categories` WHERE `id` = ?");
    $stmtCategory->bind_param("i", $categoryID);
    $stmtCategory->execute();
    $resultCategory = $stmtCategory->get_result();
    $rowCategory = $resultCategory->fetch_assoc();
    ?>
    <table>
        <thead>
        <tr>
            <th>Категория</th>
            <th>Название</th>
            <th>Цена</th>
            <th>Описание</th>
            <th>Изображение</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><a href="category.php?category=<?= $categoryID ?>"><?= $rowCategory['name'] ?></a></td>
            <td><a href="product.php?product=<?= $row['id'] ?>"><?= $row['name'] ?></a></td>
            <td><?= $row['price'] ?></td>
            <td><?= $row['description'] ?></td>
            <td><img src="<?= $row['image'] ?>"></td>
        </tr>
        </tbody>
    </table>
    <?php
} else {
    echo "Ошибка запроса к БД: " . $stmtProduct->error;
    exit();
}

$stmtProduct->close();
$stmtCategory->close();
?>