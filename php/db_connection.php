<?php
    $host = "localhost";
    $username = "root";
    $password = "root";
    $database = "tech";

    $mysql = new mysqli($host, $username, $password, $database);

    if ($mysql->connect_error) {
        die("Ошибка подключения: " . $mysql->connect_error);
    }
?>