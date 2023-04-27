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

    <link rel="stylesheet" href="/assets/css/<?=$style?>.css">
</head>

<body>

<div class="sidenav">
  <div>
  <a href="/app/tables/admin/menu/menu.php">Меню</a>
  <a href="/app/tables/admin/table/table.php">Столы</a>
  <a href="/app/tables/admin/book/book.php">Бронирование</a>
  <a href="/app/tables/admin/staff/staff.php">Персонал</a>
  </div>
  <div>
    <img src="/upload/shrek.png" width="160" height="220" alt="">
  </div>
  <div>
  <a href="/app/tables/admin/profile/profile.php" >Профиль</a>
    <a href="/app/tables/client/user/logout.php" class="mb-5">Выйти</a>
  </div>
  
</div>