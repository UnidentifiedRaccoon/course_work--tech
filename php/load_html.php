<?php
include("db_connection.php");

// Замените $name на значение, которое вам нужно выбрать из базы данных
$name = filter_var(trim($name), FILTER_SANITIZE_STRING);

// Используйте подготовленное выражение для предотвращения SQL-инъекций
$query = "SELECT `content` FROM `contents` WHERE `name` = ?";
$stmt = $mysql->prepare($query);

if ($stmt) {
    // Привязываем параметры к подготовленному выражению
    $stmt->bind_param("s", $name);

    // Выполняем запрос
    $stmt->execute();

    // Получаем результаты запроса
    $result = $stmt->get_result();

    if ($result) {
        $row = $result->fetch_assoc();
        echo $row['content'];
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
?>