<?php
    include("db_connection.php");
    include("token-generate.php");

    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
    if (mb_strlen($login) < 5 || mb_strlen($login) > 20) {
        echo "Недопустимая длина логина (от 5 до 20 символов)";
        exit();
    }
    if (mb_strlen($password) < 3 || mb_strlen($password) > 10) {
        echo "Недопустимая длина пароля (от 3 до 10 символов)";
        exit();
    }

// Используйте подготовленное выражение для предотвращения SQL-инъекций
    $query = "SELECT * FROM `users` WHERE `login` = ? AND `password` = ?";
    $stmt = $mysql->prepare($query);

    if ($stmt) {} else {
        echo "Ошибка подготовки запроса: " . $mysql->error;
        exit();
    }

    $stmt->bind_param("ss", $login, $password);

    // Выполняем запрос
    $stmt->execute();

    // Получаем результаты запроса
    $result = $stmt->get_result();

    if($result) {
        $user = $result->fetch_assoc();
        if ($user) {
            $authToken = generateToken($user['id']);
            setcookie('authToken', $authToken, time() + 3600, "/");
        } else {
            echo "Запрашиваемый пользователь отстутствует в БД";
            exit();
        }
    } else {
        echo "Ошибка запроса к БД: " . $mysql->error;
        exit();
    }

    $stmt->close();
    header("Location: ../pages/main.php");
?>