<?php
    include("db_connection.php");

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

    $query = "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'";
    $result = $mysql->query($query);

    if($result) {
        $user = $result->fetch_assoc();
        if ($user) {
            setcookie('isLoggedIn', true, time() + 3600, "/");
        } else {
            echo "Запрашиваемый пользователь отстутствует в БД";
            exit();
        }
    } else {
        echo "Ошибка запроса к БД: " . $mysql->error;
        exit();
    }

    header("Location: ../pages/main.php");
?>