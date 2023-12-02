<?php
include("db_connection.php");

$referringUrl = $_SERVER['HTTP_REFERER'];
$urlParts = parse_url($referringUrl);
parse_str($urlParts['query'], $queryParams);
$urlProduct = $queryParams['product'];
$productID = intval($urlProduct);


//     Проверить, есть ли такая категория в БД
$query = "DELETE FROM `products` WHERE `id` = '$productID'";
$result = $mysql->query($query);

header("Location: ../pages/catalog.php");

if($result) {
    echo "Товар удален";
} else {
    echo "Ошибка запроса к БД: " . $mysql->error;
    exit();
}

?>