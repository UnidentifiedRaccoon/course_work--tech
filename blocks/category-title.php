<?php
include("../php/db_connection.php");

$category = filter_var(trim($_GET['category']), FILTER_SANITIZE_URL);
$categoryNumber = intval($category);

// Проверить, есть ли такая категория в БД
$stmtCategory = $mysql->prepare("SELECT * FROM `categories` WHERE `id` = ?");
$stmtCategory->bind_param("i", $categoryNumber);
$stmtCategory->execute();
$resultCategory = $stmtCategory->get_result();

if ($resultCategory) {
    $row = $resultCategory->fetch_assoc();
    if ($row) {
        ?>
        <h1><span><?= $row['name'] ?></span></h1>
        <?php
    } else {
        echo "Заголовок отсутствует";
    }
} else {
    echo "Ошибка запроса к БД: " . $stmtCategory->error;
    exit();
}

$stmtCategory->close();
?>