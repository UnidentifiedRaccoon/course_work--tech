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
    <script src="../js/product-add.js" defer></script>
</head>
<body>
    <div class="page_wrapper">
        <div class="page">
            <?php require "../blocks/sidebar.php"?>
            <main class="main">
                <h1>Каталог</h1>
                <section>
                    <?php require "../blocks/catalog-table.php"?>
                </section>
                <?php
                if($_COOKIE['isLoggedIn'] == true):
                    ?>
                    <button id="add-btn">add</button>
                    <form id="add-form" class="form" action="../php/product-add.php" method="post">
                        <input required сlass="form__input" type="text" name="name" id="name" placeholder="название">
                        <input required сlass="form__input" type="number" name="price" id="price" placeholder="цена">
                        <input сlass="form__input" type="text" name="description" id="description" placeholder="описание">
                        <input required сlass="form__input" type="number" name="category" id="category" placeholder="номер категории">
                        <button class="form__button">
                            save
                        </button>
                    </form>
                <?php endif;?>
            </main>
        </div>
    </div>
</body>
</html>