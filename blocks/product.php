<?php
include("../php/db_connection.php");

$product = filter_var(trim($_GET['product']), FILTER_SANITIZE_URL);
$productNumber = intval($product);
// Получить продукт
$query = "SELECT * FROM `products` WHERE `id` = '$productNumber'";
$result = $mysql->query($query);

if($result) {
       $row = $result->fetch_assoc();
?>
    <div>
        <span><?= $row['category_id'] ?></span>
        <span><?= $row['name'] ?></span>
        <span><?= $row['price'] ?></span>
        <span><?= $row['description'] ?></span>
    </div>

<?php
} else {
    echo "Ошибка запроса к БД: " . $mysql->error;
    exit();
}
?>
