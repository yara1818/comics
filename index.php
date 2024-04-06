<?php
error_reporting(E_ALL);

require_once "./pdo.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Protest+Strike&family=Oswald:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/menu.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Comics</title>
</head>
<body>
    <header id="header" class="header">
        <div class="header__container">
            <div class="header__block_with-img">
                <div class="header__block header__block_first">
                    <div class="block__container block__container_first"></div>
                </div>
                <div class="header__block header__block_second">
                    <div class="block__container block__container_second">
                        <div class="header__subtitle">Historis_Roboter</div>
                    </div>
                </div>
                <div class="header__block header__block_third">
                    <div class="block__container block__container_third">
                        <div class="header__title">Comics</div>
                    </div>
                </div>
                <img class="header__logo" src="./img/logo.png">
            </div>
            <div class="header__block header__block_fourth">
                <div class="block__container block__container_fourth">
                    <ul class="header__menu">
                        <li class="menu__item">
                            <a class="menu__link" href="#comics">Комиксы</a>
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
        $res = $pdo->prepare("SELECT * FROM comics");
        $res->execute();
        $result = $res->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <section id="comics" class="section section__comics">
        <div class="section__container">
            <div class="section__title">Комиксы</div>
            <div class="comics__cards">
                <div class="cards__title">Исторические</div>
                <div class="cards__container">
                    <a class = "comics__card_link" href="./Романовы.php">
                        <div class="comics__card">
                            <img class="card__img" src="<?= $result[1]["comic_img"] ?>">
                            <div class="card__description"><?= $result[1]["comic_name"] ?></div>
                        </div>
                    </a>
                    <a class = "comics__card_link" href="./Рюриковичи.php">
                        <div class="comics__card">
                            <img class="card__img" src="<?= $result[0]["comic_img"] ?>">
                            <div class="card__description"><?= $result[0]["comic_name"] ?></div>
                        </div>
                    </a>
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