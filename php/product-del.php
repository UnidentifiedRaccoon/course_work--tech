<?php
include("db_connection.php");
include("token-check.php");

$referringUrl = $_SERVER['HTTP_REFERER'];
$urlParts = parse_url($referringUrl);
parse_str($urlParts['query'], $queryParams);
$urlProduct = $queryParams['product'];
$productID = intval($urlProduct);

// Используйте подготовленное выражение для предотвращения SQL-инъекций
$query = "DELETE FROM `products` WHERE `id` = ?";
$stmt = $mysql->prepare($query);

if ($stmt) {
    // Привязываем параметры к подготовленному выражению
    $stmt->bind_param("i", $productID);

    // Выполняем запрос
    $stmt->execute();

    // Закрываем подготовленное выражение
    $stmt->close();

    // Переносим header после проверки результата запроса
    header("Location: ../pages/catalog.php");

} else {
    echo "Ошибка подготовки запроса: " . $mysql->error;
    exit();
}
?>