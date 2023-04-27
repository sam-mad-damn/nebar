<?php

include $_SERVER["DOCUMENT_ROOT"] . "/views/templatesAdmin/header.php"; ?>

<div class="container justify-content-center">
    <div class="row justify-content-center text-center mt-3">
        <a href="/app/tables/admin/staff/staff.php" class=" btn col-2">← Обратно</a>
    </div>
    <div class="row justify-content-center p-3">
        <form action="/app/tables/admin/staff/insert.save.php" enctype="multipart/form-data" method="POST" class="card col-8 text-center justify-content-center formCard" style="width: 23rem;">
            <img src="/upload/nophoto.jpg" id="loadedImg" width="100" height="100" class="imgTable mt-3" alt="...">
            <div class="card-body">
                <label for="image" class="mt-3">Выберите фото</label>
                <input type="file" name="image" id="file" class="form-control">
                <label for="name" class="mt-3">Укажите Имя</label>
                <input type="text" class="form-control" name="name"></input>
                <?php if (!empty($_SESSION["error"]["name"])) : ?>
                    <p class="error"><?= $_SESSION["error"]["name"] ?></p>
                <?php endif ?>
                <label for="role" class="mt-3">Укажите Должность</label>
                <select name="role" class="form-control ">
                    <option value="Бармен">Бармен</option>
                    <option value="Повар">Повар</option>
                </select>
                <textarea name="description" id="" class="form-control mt-3 " cols="30" rows="10"></textarea>
                <?php if (!empty($_SESSION["error"]["description"])) : ?>
                    <p class="error"><?= $_SESSION["error"]["description"] ?></p>
                <?php endif ?>
                <button name="saveBtn" class="btn btn-success mt-3 mb-2">
                    ДОБАВИТЬ
                </button>
            </div>
            </а>
    </div>
</div>
<script src="/assets/js/loadImg.js" defer></script>
<?php
unset($_SESSION["error"]);
include $_SERVER["DOCUMENT_ROOT"] . "/views/templatesAdmin/footer.php"; ?>