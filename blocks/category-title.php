<?php
include("../php/db_connection.php");

$category = filter_var(trim($_GET['category']), FILTER_SANITIZE_URL);
$categoryNumber = intval($category);

//     Проверить, есть ли такая категория в БД
$query = "SELECT * FROM `categories` WHERE `id` = '$categoryNumber'";
$result = $mysql->query($query);

if($result) {
    $row = $result->fetch_assoc();
    if ($row) {
        ?>
        <h1><?= $row['name'] ?></h1>
        <?php
    } else {
        echo "Заголовок отсутствует:";
    }
} else {
    echo "Ошибка запроса к БД: " . $mysql->error;
    exit();
}
?>
