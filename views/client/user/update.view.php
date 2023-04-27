<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.php'; ?>

<div class="container auth">
    <div class="row text-center">
        <h3 class="col-12 mb-3 text">изменение профиля</h3>
    </div>
    <form class="authForm mb-5" action="/app/tables/client/user/update_user.php" method="POST">
        <div class="auth text-center">
            <label for="name" class="col-sm-6 col-form-label mt-3">
                Измените Имя:
                <input type="text" class="form-control col-sm-6" name="name" value="<?= $user->name ?>">
            </label>
            <label for="email" class="col-sm-6 col-form-label">
                Измените почту:
                <input type="email" class="form-control col-sm-6 mt-1" name="email" value="<?= $user->email ?>">
            </label>
            <label for="phone" class="col-sm-6 col-form-label">
                Измените телефон:
                <input type="phone" class=" phone form-control col-sm-6 mt-1" name="phone" value="<?= $user->phone ?>">
            </label>

            <div class="form-group col-sm-6 col-form-label mb-5">
                <button class="button btn btnupdt" name="saveBtn">Сохранить</button>
            </div>
        </div>
    </form>
</div>

<script src="/assets/js/jquery/jquery-3.6.4.min.js"></script>
<script src="/assets/js/jquery/jquery.maskedinput.min.js"></script>
<script>
$('.phone').mask('+7 (999) 999-99-99');
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php'; ?>