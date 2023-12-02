<?php
include("db_connection.php");

$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$price = filter_var(trim($_POST['price']), FILTER_SANITIZE_STRING);
$description = filter_var(trim($_POST['description']), FILTER_SANITIZE_STRING);
$category = filter_var(trim($_POST['category']), FILTER_SANITIZE_STRING);
$referringUrl = $_SERVER['HTTP_REFERER'];
$urlParts = parse_url($referringUrl);
parse_str($urlParts['query'], $queryParams);
$product = $queryParams['product'];
$productID = intval($product);

$query = "UPDATE `products` SET `name` = '$name', `price` = '$price', `description` = '$description', `category_id` = '$category' WHERE `products`.`id` = '$productID'";
$result = $mysql->query($query);

if($result) {
    echo "Данные обновлены";
} else {
    echo "Ошибка запроса к БД: " . $mysql->error;
    exit();
}

header("Location: ../pages/product.php?product=$productID");
?>