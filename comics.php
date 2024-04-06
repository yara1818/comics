<?php
error_reporting(E_ALL);

require_once "./pdo.php";

$id_comic = $_GET['id'];

$theme_comic = $_GET['theme'];
?>

<!DOCTYPE html>
<php lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Protest+Strike&family=Oswald:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/menu.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/comic.css">
    <title>Комикс</title>
</head>
<body>
    <header class="header">
        <div class="header__container">
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
        $res = $pdo->prepare("SELECT comic_chapter_name, comic_chapter_img FROM chapters WHERE id = $id_comic");
        $res->execute();
        $result = $res->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <section class="section section__comic">
        <div class="section__title"><?= $result[0]["comic_chapter_name"] ?></div>
        <div class="comic__block">
            <div class="block__container">
                <div class="block__img-list">
                    <img class="comic__img" src="<?= $result[0]["comic_chapter_img"] ?>">
                </div>
                <ul class="comic__menu">
                    <?php
                        $id_comic_next = $id_comic + 1;
                        $id_comic_last = $id_comic - 1;
                        
                        $res = $pdo->prepare("SELECT * FROM chapters WHERE comic_id = $theme_comic AND id = $id_comic_next");
                        $res->execute();
                        $result = $res->fetchAll(PDO::FETCH_ASSOC);
                        
                        $res1 = $pdo->prepare("SELECT * FROM chapters WHERE comic_id = $theme_comic AND id = $id_comic_last");
                        $res1->execute();
                        $result1 = $res1->fetchAll(PDO::FETCH_ASSOC);       

                        if ($result1):
                        ?>
                            <li class="menu__item">
                                <a class="menu__link" href="./comics.php?id=<?= $id_comic_last; ?>&theme=<?=$theme_comic?>">Предыдущая</a>
                            </li>
                        <?php
                            endif;
                            if ($result):
                        ?>
                            <li class="menu__item">
                                <a class="menu__link" href="./comics.php?id=<?= $id_comic_next; ?>&theme=<?=$theme_comic?>">Следующая</a>
                            </li>
                        <?php
                            endif;
                        ?>
                </ul>

            </div>
        </div>
    </section>
</body>
</php>