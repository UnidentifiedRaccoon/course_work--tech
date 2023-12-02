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
            <td><a href="category.php?category=<?= $row['category_id'] ?>"><?= $row['category_id'] ?></a></td>
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
