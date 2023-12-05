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
</head>
<body>
<div class="page_wrapper">
    <div class="page">
        <?php require "../blocks/header.php"?>
        <div class="content">
            <?php require "../blocks/sidebar.php"?>
            <main class="main">
                <h1>Вход</h1>
                <section>
                    <form class="form" action="../php/login.php" method="post">
                        <input сlass="form__input" type="text" name="login" id="login" placeholder="логин">
                        <input сlass="form__input" type="password" name="password" id="password" placeholder="пароль">
                        <button class="form__button">
                            Войти
                        </button>
                    </form>
                </section>
            </main>
        </div>
        <?php require "../blocks/footer.php"?>
    </div>
</div>
</body>
</html>