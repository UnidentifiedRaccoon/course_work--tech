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
</head>
<body>
    <div class="page_wrapper">
        <div class="page">
            <?php require "../blocks/sidebar.php"?>
            <main class="main">
                <h1>Разработка</h1>
                <?php
                if($_COOKIE['isLoggedIn'] == true):
                    ?>
                    <button id="edit-btn">edit</button>
                <?php endif;?>
                <section id="edit-zone" data-name="dev">
                    <?php $name="dev"; require "../php/load_html.php"?>
                </section>
            </main>
        </div>
    </div>
</body>
</html>