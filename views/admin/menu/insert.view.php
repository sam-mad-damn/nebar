<?php

include $_SERVER["DOCUMENT_ROOT"] . "/views/templatesAdmin/header.php"; ?>

<div class="container justify-content-center">
    <div class="row justify-content-center text-center mt-3">
        <a href="/app/tables/admin/menu/menu.php" class=" btn col-2">← Обратно</a>
    </div>
    <div class="row justify-content-center p-3">
        <form action="/app/tables/admin/menu/insert.save.php" enctype="multipart/form-data" method="POST" class="menuForm">
            <div class="card col-8 text-center justify-content-center formCard" style="width: 23rem;">
                <img src="/upload/nophoto.jpg" id="loadedImg" width="100" height="100" class="imgTable mt-3" alt="...">
                <div class="card-body">
                    <label for="image" class="mt-3">Выберите фото</label>
                    <input type="file" name="image" id="file" class="form-control">
                    <label for="name" class="mt-3">Укажите название</label>
                    <input type="text" class="form-control" name="name"></input>
                    <?php if (!empty($_SESSION["error"]["name"])) : ?>
                        <p class="error"><?= $_SESSION["error"]["name"] ?></p>
                    <?php endif ?>

                    <label for="price" class="mt-3">Укажите цену за 100мл продукта</label>
                    <input type="number" class="form-control" name="price"></input>
                    <?php if (!empty($_SESSION["error"]["price"])) : ?>
                        <p class="error"><?= $_SESSION["error"]["price"] ?></p>
                    <?php endif ?>

                    <label for="category" class="mt-3">Укажите категорию</label>
                    <select name="category" class="form-control ">
                        <?php foreach ($categories as $category) : ?>
                            <option value="<?= $category->id ?>"><?= $category->name ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="card col-8 text-center justify-content-center formCard" style="width: 23rem;">
                <div class="card-body">
                    <textarea name="description" id="" class="form-control mt-3 " cols="30" rows="5"></textarea>
                    <?php if (!empty($_SESSION["error"]["description"])) : ?>
                        <p class="error"><?= $_SESSION["error"]["description"] ?></p>
                    <?php endif ?>
                    <label class="mt-3">Укажите вес продукта</label>
                    <div class="check form-check form-check-inline">
                    <?php foreach ($weights as $weight) : ?>
                        <input type="checkbox" class="" name="weight[]" id="weight-<?= $weight->id ?>" value="<?= $weight->id ?>"> <label class="weightLabel btn mt-1" for="weight-<?= $weight->id ?>"><?= $weight->value ?> ML</label></input>
                    <?php endforeach ?>
                    </div>
                    
                    <button name="saveBtn" class="btn btn-success mt-3 mb-2">
                        ДОБАВИТЬ
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="/assets/js/loadImg.js" defer></script>
<?php
unset($_SESSION["error"]);
include $_SERVER["DOCUMENT_ROOT"] . "/views/templatesAdmin/footer.php"; ?>