<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>course_work--tech</title>
    <script src="../js/product-edit.js" defer></script>
</head>
<body>
<div class="page_wrapper">
    <div class="page">
        <?php require "../blocks/header.php"?>
        <div class="content">
            <?php require "../blocks/sidebar.php"?>
            <main class="main">
                <h1>Продукт</h1>
                <section>
                    <?php require "../blocks/product.php"?>
                </section>
                <?php
                if($_COOKIE['authToken']):
                    ?>
                    <button id="edit-btn">edit</button>
                    <form id="def-form" action="../php/product-del.php" method="post">
                        <button type="submit">delete</button>
                    </form>
                    <?php require "../blocks/product-edit-form.php"?>
                <?php endif;?>
            </main>
        </div>
        <?php require "../blocks/footer.php"?>
    </div>
</div>
</body>
</html>