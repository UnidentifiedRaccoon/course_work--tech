<?php
    include("db_connection.php");
    include("token-check.php");

    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    $content = trim($_POST['content']);

// Используйте подготовленное выражение для предотвращения SQL-инъекций
    $query = "UPDATE `contents` SET content = ? WHERE name = ?";
    $stmt = $mysql->prepare($query);

    if ($stmt) {
        // Привязываем параметры к подготовленному выражению
        $stmt->bind_param("ss", $content, $name);

        // Выполняем запрос
        $stmt->execute();

        // Закрываем подготовленное выражение
        $stmt->close();
    } else {
        echo "Ошибка подготовки запроса: " . $mysql->error;
        exit();
    }

    header("Location: ../pages/$name.php");
?>
