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
    $categoryID = $row['category_id'];

    // Получить категорию продукта
    $stmtCategory = $mysql->prepare("SELECT * FROM `categories` WHERE `id` = ?");
    $stmtCategory->bind_param("i", $categoryID);
    $stmtCategory->execute();
    $resultCategory = $stmtCategory->get_result();
    $rowCategory = $resultCategory->fetch_assoc();
    ?>
    <form id="edit-form" class="form" action="../php/product-edit.php" method="post">
        <input required class="form__input" type="text" name="name" id="name" placeholder="название" value="<?= $row['name'] ?>">
        <input required class="form__input" type="number" name="price" id="price" placeholder="цена" value="<?= $row['price'] ?>">
        <input class="form__input" type="text" name="description" id="description" placeholder="описание" value="<?= $row['description'] ?>">
        <input class="form__input" type="text" name="image" id="image" placeholder="ссылка на фотографию" value="<?= $row['image'] ?>">
        <input required class="form__input" type="number" name="category" id="category" placeholder="номер категории" value="<?= $categoryID ?>">
        <input required class="form__input" type="text" name="company" id="company" placeholder="ссылка на логотип" value="<?= $row['company'] ?>">
        <button class="form__button">
            Coхранить
        </button>
    </form>
    <?php
} else {
    echo "Ошибка запроса к БД: " . $stmtProduct->error;
    exit();
}

$stmtProduct->close();
$stmtCategory->close();
?>