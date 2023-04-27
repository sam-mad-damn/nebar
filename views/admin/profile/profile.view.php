<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templatesAdmin/header.php'; ?>
<br>
<div class="container justify-content-center text-center g-4">
    <div class="row justify-content-center text-center g-4 mt-4 mb-4">
        <div class="col-10 info">
            <h5 class=""><?= $user->name ?></h5>
            <h5 class=""><?= $user->email ?></h5>
            <h5 class=""><?= $user->phone ?></h5>
            <form action="/app/tables/admin/profile/update.php" class="col-2" style="min-width: 50px; padding-left:350px">
                <button class="button btn sort" name="changeBtn"><big>ИЗМЕНИТЬ</big></button>
            </form>
        </div>
        <div class="row justify-content-center text-center g-4">
            <?php if ($user->role_id == "3") : ?>
                <div class="col-3">

                    <button type="button" class="btn btn-primary sort openWindow" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        ДОБАВИТЬ АДМИНА
                    </button>
                </div>
            <?php endif ?>

            <div class="modal modalAd" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog justify-content-center">
                    <div class="modal-content">
                        <div class="modal-header">

                            <h1 class="modal-title fs-5" id="exampleModalLabel">Создание администратора</h1>
                            <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form action="/app/tables/admin/profile/insert.php" method="post">
                            <div class="modal-body justify-content-center">
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
                                    <input type="phone" class="phone form-control col-sm-6" name="phone" value="<?= $_SESSION["data"]["phone"] ?? "" ?>">
                                </label>
                                <?php if (!empty($_SESSION["error"]["phone"])) : ?>
                                    <p class="error"><?= $_SESSION["error"]["phone"] ?></p>
                                <?php endif ?>

                                <label for="password" class="col-sm-6 col-form-label mt-3">Пароль:
                                    <input type="password" name="password" class="form-control col-sm-6" id="password">
                                </label>

                                <label for="password_confirmation" class="col-sm-6 col-form-label mt-3">Подтвердите пароль:
                                    <input type="password" name="password_confirmation" class="form-control col-sm-6" id="password_confirmation">
                                </label>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="updt" class="btn btn-primary">Создать</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<script src="/assets/js/jquery/jquery-3.6.4.min.js"></script>
<script src="/assets/js/jquery/jquery.maskedinput.min.js"></script>
<script>
    $('.phone').mask('+7 (999) 999-99-99');
</script>

<script src="/assets/js/modal.js"></script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templatesAdmin/footer.php'; ?>