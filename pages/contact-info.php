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
    <script src="../js/content-edit.js" defer></script>
    <script src="../js/menu-catalog-show.js" defer></script>
</head>
<body>
    <div class="page_wrapper">
        <div class="page">
            <?php require "../blocks/header.php"?>
            <div class="content">
                <main class="main">
                    <h1><span>Контакты</span></h1>
                    <section id="edit-zone">
                        <?php $name="contact-info"; require "../php/load_html.php"?>
                    </section>
                    <?php
                    if($_COOKIE['authToken']):
                        ?>
                        <button id="edit-btn">edit</button>
                    <?php endif;?>
                    <form id="edit-form" class="form"  action="../php/edit_html.php" method="post">
                        <textarea name="content" id="content" cols="100" rows="25"></textarea>
                        <input сlass="form__input" type="text" name="name" id="name" hidden value="contact-info">
                        <button id="cancel-btn" type="button">Cancel</button>
                        <button type="submit">Save</button>
                    </form>
                </main>
            </div>
            <?php require "../blocks/footer.php"?>
        </div>
    </div>
</body>
</html>