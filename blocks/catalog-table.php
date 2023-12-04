<?php
include("../php/db_connection.php");

$query = "SELECT * FROM `products`";
$result = $mysql->query($query);

if($result) {
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
        <?php
        while ($row = $result->fetch_assoc()) {
            $categoryID = $row['category_id'];
            $query = "SELECT * FROM `categories` WHERE `id` = '$categoryID'";
            $resultCategory = $mysql->query($query);
            $rowCategory = $resultCategory->fetch_assoc()
        ?>
        <tr>
            <td><a href="category.php?category=<?= $categoryID ?>"><?= $rowCategory['name'] ?></a></td>
            <td><a href="product.php?product=<?= $row['id'] ?>"><?= $row['name'] ?></a></td>
            <td><?= $row['price'] ?></td>
            <td><?= $row['description'] ?></td>
            <td><img src="<?= $row['image'] ?>"></td>
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
