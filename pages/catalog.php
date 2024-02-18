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
    <script src="../js/menu-catalog-show.js" defer></script>
</head>
<body>
    <div class="page_wrapper">
        <div class="page">
            <?php require "../blocks/header.php"?>
            <div class="content">
                <main class="main">
                    <h1><span>Каталог</span></h1>
                    <section>
                        <?php require "../blocks/catalog-table.php"?>
                    </section>
                    <?php
                    if($_COOKIE['authToken']):
                        ?>
                        <button id="add-btn">Добавить</button>
                        <form id="add-form" class="form" action="../php/product-add.php" method="post">
                            <input required сlass="form__input" type="text" name="name" id="name" placeholder="название">
                            <input required сlass="form__input" type="number" name="price" id="price" placeholder="цена">
                            <input сlass="form__input" type="text" name="description" id="description" placeholder="описание">
                            <input сlass="form__input" type="text" name="image" id="image" placeholder="ссылка на фотографию">
                            <input required сlass="form__input" type="number" name="category" id="category" placeholder="номер категории">
                            <input required class="form__input" type="text" name="company" id="company" placeholder="ссылка на логотип">
                            <button id="cancel-btn" type="button">Отменить</button>
                            <button class="form__button">
                                Сохранить
                            </button>
                        </form>
                    <?php endif;?>
                </main>
            </div>
            <?php require "../blocks/footer.php"?>
        </div>
    </div>
</body>
</html>