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
<table>
    <thead>
    <tr>
        <th>Категория</th>
        <th>Название
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
        </<tr>
        </tbody>
    </table>
<?php
} else {
    echo "Ошибка запроса к БД: " . $mysql->error;
    exit();
}
?>
