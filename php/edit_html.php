<?php
    include("db_connection.php");
    include("token-check.php");

    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    $content = trim($_POST['content']);

    $query = "UPDATE `contents` SET content = '$content' where name = '$name'";
    $result = $mysql->query($query);

    if ($result) {
    } else {
        echo "Ошибка запроса к БД: " . $mysql->error;
        exit();
    }

    header("Location: ../pages/$name.php");
?>
