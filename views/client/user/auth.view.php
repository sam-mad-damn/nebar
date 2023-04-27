<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.php'; ?>

<div class="container auth">
    <div class="row text-center">
        <h3 class="col-12 text">вход</h3>
    </div>
    <form action="/app/tables/client/user/auth_check.php" method="POST" class="authForm mb-5 row text-center">
        <div class="form-group row auth text-center">
            <label for="phone" class="col-sm-6 col-form-label mt-5 ">
                Введите телефон:
                <input type="phone" class=" phone form-control col-sm-6" name="phone">
            </label>
            <label for="password" class="form-label col-sm-6 col-form-label ">Пароль:
                <input type="password" name="password" class="form-control col-sm-6" id="password">
            </label>

            <?php if (!empty($_SESSION["error"])) : ?>
                <p class="error"><?= $_SESSION["error"] ?></p>
            <?php endif ?>

            <div class="form-group">
                <button class="button btnupdt btn  mt-2 mb-3 col-sm-6" name="authBtn">ВОЙТИ</button>
            </div>

            <h6 class="col-sm-7 mt-1 mb-5 text-center"><a class="btn" style="color: white;" href="/app/tables/client/user/create.php"><small>ВЫ ЕЩЕ НЕТ АККАУНТА? - ЗАРЕГИСТРИРУЙТЕСЬ! </small> →</a></h6>
        </div>
    </form>
</div>

<script src="/assets/js/jquery/jquery-3.6.4.min.js"></script>
<script src="/assets/js/jquery/jquery.maskedinput.min.js"></script>
<script>
$('.phone').mask('+7 (999) 999-99-99');
</script>

<?php
unset($_SESSION["error"]);
include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php';
?>