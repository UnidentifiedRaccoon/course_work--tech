<?php
include("db_connection.php");
include("token-check.php");

$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$price = filter_var(trim($_POST['price']), FILTER_SANITIZE_STRING);
$description = filter_var(trim($_POST['description']), FILTER_SANITIZE_STRING);
$category = filter_var(trim($_POST['category']), FILTER_SANITIZE_STRING);
$image = filter_var(trim($_POST['image']), FILTER_SANITIZE_STRING);
$company = filter_var(trim($_POST['company']), FILTER_SANITIZE_STRING);
$referringUrl = $_SERVER['HTTP_REFERER'];
$urlParts = parse_url($referringUrl);
parse_str($urlParts['query'], $queryParams);
$product = $queryParams['product'];
$productID = intval($product);

// Используйте подготовленное выражение для предотвращения SQL-инъекций
$query = "UPDATE `products` SET `name` = ?, `price` = ?, `description` = ?, `category_id` = ?, `image` = ?, `company` = ? WHERE `products`.`id` = ?";
$stmt = $mysql->prepare($query);

if ($stmt) {
    // Привязываем параметры к подготовленному выражению
    $stmt->bind_param("ssssssi", $name, $price, $description, $category, $image, $company, $productID);

    // Выполняем запрос
    $stmt->execute();

    // Закрываем подготовленное выражение
    $stmt->close();

    echo "Данные обновлены";
} else {
    echo "Ошибка подготовки запроса: " . $mysql->error;
    exit();
}

header("Location: ../pages/product.php?product=$productID");
?>