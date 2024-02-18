<?php
include("db_connection.php");
include("token-check.php");

$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$price = filter_var(trim($_POST['price']), FILTER_SANITIZE_STRING);
$description = filter_var(trim($_POST['description']), FILTER_SANITIZE_STRING);
$formCategory = filter_var(trim($_POST['category']), FILTER_SANITIZE_STRING);
$image = filter_var(trim($_POST['image']), FILTER_SANITIZE_STRING);
$company = filter_var(trim($_POST['company']), FILTER_SANITIZE_STRING);

$referringUrl = $_SERVER['HTTP_REFERER'];
$urlParts = parse_url($referringUrl);
parse_str($urlParts['query'], $queryParams);
$urlCategory = $queryParams['category'];
$urlCategoryNumber = intval($urlCategory);

$category =  $formCategory ? $formCategory : $urlCategoryNumber;

// Проверить, есть ли такая категория в БД
$query = "SELECT * FROM `categories` WHERE `id` = ?";
$stmt = $mysql->prepare($query);

if ($stmt) {
    // Привязываем параметры к подготовленному выражению
    $stmt->bind_param("i", $category);

    // Выполняем запрос
    $stmt->execute();

    // Получаем результаты запроса
    $result = $stmt->get_result();

    if ($result) {
        $value = $result->fetch_assoc();
        if (!$value) {
            echo "Запрашиваемая категория не существует";
            exit();
        }
    } else {
        echo "Ошибка запроса к БД: " . $stmt->error;
        exit();
    }

    // Закрываем подготовленное выражение
    $stmt->close();
} else {
    echo "Ошибка подготовки запроса: " . $mysql->error;
    exit();
}

// Используйте подготовленное выражение для предотвращения SQL-инъекций
$query = "INSERT INTO `products` (`id`, `category_id`, `name`, `price`, `description`, `image`, `company`) VALUES (NULL, ?, ?, ?, ?, ?, ?)";
$stmt = $mysql->prepare($query);

if ($stmt) {
    // Привязываем параметры к подготовленному выражению
    $stmt->bind_param("isssss", $category, $name, $price, $description, $image, $company);

    // Выполняем запрос
    $stmt->execute();

    // Закрываем подготовленное выражение
    $stmt->close();
} else {
    echo "Ошибка подготовки запроса: " . $mysql->error;
    exit();
}

if ($formCategory) {
    header("Location: ../pages/catalog.php");
} else {
    header("Location: ../pages/category.php?category=$category");
}
?>