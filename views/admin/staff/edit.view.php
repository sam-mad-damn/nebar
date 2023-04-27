<?php

include $_SERVER["DOCUMENT_ROOT"] . "/views/templatesAdmin/header.php"; ?>

<div class="container justify-content-center">
    <div class="row justify-content-center text-center mt-5">
        <a href="/app/tables/admin/staff/staff.php" class=" btn col-2">← Обратно</a>
    </div>
    <div class="row justify-content-center p-2">
        <form action="/app/tables/admin/staff/updt.php" enctype="multipart/form-data" method="POST" class="card col-8 text-center justify-content-center formCard" style="width: 23rem;">
            <img src="/upload/<?= $pers->image ?? "nophoto.jpg" ?>" id="loadedImg" width="180" height="120" class="imgTable mt-3" alt="...">
            <div class="card-body">
                <p class="error"><?= $_SESSION["error"]["img"] ?? "" ?></p>
                <label for="image" class="mt-3">Выберите фото</label>
                <input type="file" name="image" id="file" class="form-control">
                <label for="name" class="mt-3">Укажите Имя</label>
                <input type="text" class="form-control" name="name" value="<?= $pers->name ?>"></input>
                <label for="count" class="mt-3">Укажите должность</label>
                <input type="hidden" name="id" value="<?= $pers->id ?>">
                <select name="role" class="form-control ">
                    <option value="Бармен">Бармен</option>
                    <option value="Повар">Повар</option>
                </select>
                <textarea name="description" id="" class="form-control mt-3 " cols="30" rows="10"><?=$pers->description?></textarea>
                <?php if (!empty($_SESSION["error"]["description"])) : ?>
                    <p class="error"><?= $_SESSION["error"]["description"] ?></p>
                <?php endif ?>
                <button name="saveBtn" class="btn btn-success mt-3 mb-2">
                    СОХРАНИТЬ
                </button>
            </div>
            </а>
    </div>
</div>
<script src="/assets/js/loadImg.js" defer></script>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/templatesAdmin/footer.php"; ?>