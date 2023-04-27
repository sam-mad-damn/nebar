<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.php';
session_start(); ?>

<div class="container auth">
    <div class="row text-center">
        <h3 class="col-12 text mt-5">регистрация</h3>
    </div>
    <form class="createForm mb-5 row text-center" action="/app/tables/client/user/insert.php" method="POST">

        <div class="form-group row create">
            <label for="name" class="col-sm-6 col-form-label mt-4">
                Введите имя:
                <input type="text" class="form-control col-sm-6" name="name" value="<?= $_SESSION["data"]["name"] ?? "" ?>">
            </label>
            <?php if (!empty($_SESSION["error"]["name"])) : ?>
                <p class="error"><?= $_SESSION["error"]["name"] ?></p>
            <?php endif ?>

            <label for="email" class="col-sm-6 col-form-label mt-3">
                Введите почту:
                <input type="email" class="form-control col-sm-6" name="email" value="<?= $_SESSION["data"]["email"] ?? "" ?>">
            </label>
            <?php if (!empty($_SESSION["error"]["email"])) : ?>
                <p class="error"><?= $_SESSION["error"]["email"] ?></p>
            <?php endif ?>

            <label for="phone" class="col-sm-6 col-form-label mt-3">
                Введите телефон:
                <input type="phone" class=" phone form-control col-sm-6" name="phone" value="<?= $_SESSION["data"]["phone"] ?? "" ?>">
            </label>
            <?php if (!empty($_SESSION["error"]["phone"])) : ?>
                <p class="error"><?= $_SESSION["error"]["phone"] ?></p>
            <?php endif ?>

            <label for="password" class="col-sm-6 col-form-label mt-3">Пароль:
                <input type="password" name="password" class="form-control col-sm-6" id="password">
            </label>
            <?php if (!empty($_SESSION["error"]["password"])) : ?>
                <p class="error"><?= $_SESSION["error"]["password"] ?></p>
            <?php endif ?>

            <label for="password_confirmation" class="col-sm-6 col-form-label mt-3">Подтвердите пароль:
                <input type="password" name="password_confirmation" class="form-control col-sm-6" id="password_confirmation">
            </label>

            <label style="margin-left: 20px;" for="agreement" class="col-sm-12 col-form-label mt-2">
                <input type="checkbox" checked name="agreement" id="agreement">
                Согласен на обработку персональных данных</label>

            <?php if (!empty($_SESSION["error"]["glob"])) : ?>
                <p class="error"><?= $_SESSION["error"]["glob"] ?></p>
            <?php endif ?>

            <div class="form-group col-sm-6 col-form-label mt-1 mb-4">
                <button class="button btn btnupdt" name="btn">Зарегистрироваться</button>
            </div>
        </div>
    </form>
</div>

<script src="/assets/js/jquery/jquery-3.6.4.min.js"></script>
<script src="/assets/js/jquery/jquery.maskedinput.min.js"></script>
<script>
    $('.phone').mask('+7 (999) 999-99-99');

    document.querySelector('#agreement').addEventListener('change', (e) => {
        document.querySelector('[name=btn]').disabled = !e.target.checked
    })
</script>
<?php
unset($_SESSION["error"]);
unset($_SESSION["data"]);
include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php';
?>