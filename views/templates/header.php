<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="/assets/bootstrap-5.3.0-alpha3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/bootstrap-5.3.0-alpha3-dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="/assets/js/jquery/jquery-ui.min.css">

    <link rel="stylesheet" href="/assets/css/<?= $style ?>.css">
    <link rel="stylesheet" href="/assets/css/burger.css">
</head>

<body>
    <nav>
        <ul class="nav">
            <div class="num">
                <li class="nav-item ">
                    <a class="nav-link" aria-current="page" href="/"><img src="/upload/barlog.png" width="60" height="30" alt=""></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" aria-current="page" href="/">ГЛАВНАЯ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/app/tables/client/menu/menu.php?category=2">МЕНЮ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/app/tables/client/book/book.php">БРОНИРОВАНИЕ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/app/tables/client/staff/staff.php?role=бармен">ПЕРСОНАЛ</a>
                </li>
            </div>
            <div class="num">
                <?php if (!isset($_SESSION["auth"]) || !$_SESSION["auth"]) : ?>
                    <li class="nav-item">
                        <a class="nav-link signin" href="/app/tables/client/user/auth.php">ВОЙТИ</a>
                    </li>
                    <li class="nav-item signup">
                        <a class="nav-link" href="/app/tables/client/user/create.php">ЗАРЕГИСТРИРОВАТЬСЯ</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item prof">
                        <a class="nav-link" aria-current="page" href="/app/tables/client/user/profile.php"><?= $_SESSION["name"] ?></a>
                    </li>
                    <li class="nav-item exit">
                        <a class="nav-link " href="/app/tables/client/user/logout.php">ВЫЙТИ</a>
                    </li>
                <?php endif ?>
                <li class="nav-item">
                    <a class="nav-link " href="#">+7 922 013 31 34</a>
                </li>
            </div>
        </ul>
    </nav>

    <div class="hamburger-menu ">
        <input id="menu__toggle" type="checkbox" />
        <label class="menu__btn" for="menu__toggle">
            <span></span>
        </label>
        <img class="menu__log" src="/upload/barlogM.png" width="70" height="40" alt="">

        <ul class="menu__box">
            <li><a class="menu__item" aria-current="page" href="/">ГЛАВНАЯ</a></li>
            <li><a class="menu__item" href="/app/tables/client/menu/menu.php?category=2">МЕНЮ</a></li>
            <li><a class="menu__item" href="/app/tables/client/book/book.php">БРОНИРОВАНИЕ</a></li>
            <li><a class="menu__item" href="/app/tables/client/staff/staff.php?role=бармен">ПЕРСОНАЛ</a></li>
            <?php if (!isset($_SESSION["auth"]) || !$_SESSION["auth"]) : ?>
                <li><a class="menu__item" href="/app/tables/client/user/auth.php">ВОЙТИ</a></li>
                <li><a class="menu__item" href="/app/tables/client/user/create.php">ЗАРЕГИСТРИРОВАТЬСЯ</a></li>
            <?php else : ?>
                <li><a class="menu__item" aria-current="page" href="/app/tables/client/user/profile.php"><?= $_SESSION["name"] ?></a></li>
                <li><a class="menu__item" href="/app/tables/client/user/logout.php">ВЫЙТИ</a></li>
            <?php endif ?>
            <li><a class="menu__item" href="#">+7 922 013 31 34</a></li>
        </ul>
    </div>