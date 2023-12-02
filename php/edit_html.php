<?php
    include("db_connection.php");

    $data = json_decode(file_get_contents('php://input'), true);

    $content = $data['content'];
    $name = $data['name'];

    $query = "UPDATE `contents` SET content = '$content' where name = '$name'";
    $result = $mysql->query($query);

    if ($result) {
        exit();
    } else {
        echo "Ошибка запроса к БД: " . $mysql->error;
        exit();
    }
?>
