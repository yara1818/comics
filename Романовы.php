<?php
error_reporting(E_ALL);

require_once "./pdo.php";
function send_sql($sql)
{
    global $pdo;

    $res = $pdo->prepare($sql);

    if ($res->execute()) 
        echo "Вроде ок!";
    else 
        echo "Ошибка";
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Protest+Strike&family=Oswald:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/menu.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/comics.css">
    <title>Романовы</title>
</head>
<body>
    <header class="header">
        <div class="header__container">
        <div class="header__block header__block_main">
                <!-- <img class="header__img" src="./img/Романовы.jpeg"> -->
            </div>
            <div class="header__block header__block_fourth">
                <div class="block__container block__container_fourth">
                    <ul class="header__menu">
                        <li class="menu__item">
                            <a class="menu__link" href="./index.php#comics">Комиксы</a>
                        </li>
                        <li class="menu__item">
                            <a class="menu__link" href="./cards-game.php">Первая Игра</a>
                        </li>
                        <li class="menu__item">
                            <a class="menu__link" href="./new-game.php">Вторая Игра</a>
                        </li>
                        <li class="menu__item">
                            <a class="menu__link" href="./about.php">Обо мне</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <?php
        $res = $pdo->prepare("SELECT id, comic_chapter_name, comic_chapter_img FROM chapters WHERE comic_id = 2");
        $res->execute();
        $result = $res->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <section class="section section__chapters">
        <div class="section__container">
            <div class="section__title">Главы:</div>
            <div class="chapters__block-list">
                <div class="block-list__container">
                <ol class="chapters__list" type="I">
                <?php
                    foreach ($result as $chapter) {
                    echo '<li class="chapters__item">';
                    echo '<a class="chapters__link" href="./comics.php?id=' . $chapter['id'] . '&theme=2">' . $chapter['comic_chapter_name'] . '</a>';
                    echo '</li>';
                    }
                ?>
</ol>
            </div>
            </div>
        </div>
    </section>
    <footer class="footer">
        <div class="footer__container">
            <div class="footer__text">© 2024. Все права защищены</div>
        </div>
    </footer>   
</body>
</html>