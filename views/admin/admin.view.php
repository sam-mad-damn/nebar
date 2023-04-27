<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="/assets/bootstrap-5.3.0-alpha3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/bootstrap-5.3.0-alpha3-dist/js/bootstrap.bundle.min.js">

    <link rel="stylesheet" href="/assets/css/<?=$style?>.css">
</head>

<body>

<div class="container ">
    <div class="row justify-content-center text-center mt-5 ">
    <form action="/app/tables/admin/auth.check.php" method="post" class="form col-4 authBlock p-5">
                <label for="phone" class="form-label col-5">Ваш телефон</label>
                <input value="<?= $_SESSION["phone"]??"" ?>"  type="phone" name="phone"  class="phone form-control col-2 mt-1 mb-2" id="phone">
                <label for="password" class="form-label col-4">Пароль</label>
                <input type="password" name="password" class="form-control col-4 mb-3" id="password">
            
            <p class="error"><?= $_SESSION["error"]??"" ?></p>
            <div class="form-group">
                <button class="btn btn-primary btn_vhod mt-3" name="btn">Войти</button>
            </div>
        </form>
    </div>
        
</div>

<script src="/assets/js/jquery/jquery-3.6.4.min.js"></script>
<script src="/assets/js/jquery/jquery.maskedinput.min.js"></script>
<script>
$('.phone').mask('+7 (999) 999-99-99');
</script>

<?php
unset($_SESSION["error"]); 
include $_SERVER["DOCUMENT_ROOT"] . "/views/templatesAdmin/footer.php"; ?>