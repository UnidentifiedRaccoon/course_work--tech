<?php
include("db_connection.php");
include("token-check.php");


$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$price = filter_var(trim($_POST['price']), FILTER_SANITIZE_STRING);
$description = filter_var(trim($_POST['description']), FILTER_SANITIZE_STRING);
$formCategory = filter_var(trim($_POST['category']), FILTER_SANITIZE_STRING);
$image = filter_var(trim($_POST['image']), FILTER_SANITIZE_STRING);

$referringUrl = $_SERVER['HTTP_REFERER'];
$urlParts = parse_url($referringUrl);
parse_str($urlParts['query'], $queryParams);
$urlCategory = $queryParams['category'];
$urlCategoryNumber = intval($urlCategory);

$category =  $formCategory ? $formCategory : $urlCategoryNumber;

//     Проверить, есть ли такая категория в БД
$query = "SELECT * FROM `categories` WHERE `id` = '$category'";
$result = $mysql->query($query);

if($result) {
    $value = $result->fetch_assoc();
    if ($value) {
    } else {
        echo "Запрашиваемая категория не существует";
        exit();
    }
} else {
    echo "Ошибка запроса к БД: " . $mysql->error;
    exit();
}

$query = "INSERT INTO `products` (`id`, `category_id`, `name`, `price`, `description`, `image`) VALUES (NULL, '$category', '$name', '$price', '$description', '$image')";
$result = $mysql->query($query);

if ($formCategory) {
    header("Location: ../pages/catalog.php");
} else {
    header("Location: ../pages/category.php?category=$category");
}
?>