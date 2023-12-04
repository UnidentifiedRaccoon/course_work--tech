<?php
    include("db_connection.php");

    $query = "SELECT `content` FROM `contents` WHERE `name` = '$name'";
    $result = $mysql->query($query);

    if ($result) {
        $row = $result->fetch_assoc();
?>
        <?= $row['content'] ?>
<?php

    } else {
        echo "Ошибка запроса к БД: " . $mysql->error;
        exit();
    }
?>
