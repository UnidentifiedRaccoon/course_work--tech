<?php
include("../php/db_connection.php");

$product = filter_var(trim($_GET['product']), FILTER_SANITIZE_URL);
$productNumber = intval($product);
// Получить продукт
$query = "SELECT * FROM `products` WHERE `id` = '$productNumber'";
$result = $mysql->query($query);

if($result) {
    $row = $result->fetch_assoc();
    $categoryID = $row['category_id'];
    $query = "SELECT * FROM `categories` WHERE `id` = '$categoryID'";
    $resultCategory = $mysql->query($query);
    $rowCategory = $resultCategory->fetch_assoc()
    ?>
        <form id="edit-form" class="form" action="../php/product-edit.php" method="post">
            <input required сlass="form__input" type="text" name="name" id="name" placeholder="название" value="<?= $row['name'] ?>">
            <input required сlass="form__input" type="number" name="price" id="price" placeholder="цена" value="<?= $row['price'] ?>">
            <input сlass="form__input" type="text" name="description" id="description" placeholder="описание" value="<?= $row['description'] ?>">
            <input сlass="form__input" type="text" name="image" id="image" placeholder="ссылка на фотографию" value="<?= $row['image'] ?>">
            <input required сlass="form__input" type="number" name="category" id="category" placeholder="номер категории" value="<?= $categoryID ?>">
            <button class="form__button">
                save
            </button>
        </form>
    <?php
} else {
    echo "Ошибка запроса к БД: " . $mysql->error;
    exit();
}
?>
