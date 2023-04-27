<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templatesAdmin/header.php'; ?>

<div class="container auth">
    <form class=" row justify-content-center text-center authForm mb-5 mt-5" action="/app/tables/admin/profile/update_user.php" method="POST">
        <div class=" col-6 auth text-center">
            <label for="name" class="col-sm-6 col-form-label mt-5">
                Измените Имя:
                <input type="text" class="form-control col-sm-6 mt-1" name="name" value="<?= $user->name ?>">
            </label>
            <label for="email" class="col-sm-6 col-form-label mt-2">
                Измените почту:
                <input type="email" class="form-control col-sm-6 mt-1" name="email" value="<?= $user->email ?>">
            </label>
            <label for="phone" class="col-sm-6 col-form-label mt-2">
                Измените телефон:
                <input type="phone" class="form-control col-sm-7 mt-1 phone" name="phone" value="<?= $user->phone ?>">
            </label>

            
                <button class="button btn btnArrange col-sm-6 mt-2 sort" name="saveBtn">Сохранить</button>

        </div>
    </form>
</div>

<script src="/assets/js/jquery/jquery-3.6.4.min.js"></script>
<script src="/assets/js/jquery/jquery.maskedinput.min.js"></script>
<script>
$('.phone').mask('+7 (999) 999-99-99');
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templatesAdmin/footer.php'; ?>