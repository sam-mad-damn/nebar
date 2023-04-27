<?php

use App\models\Product;

include $_SERVER["DOCUMENT_ROOT"] . "/views/templatesAdmin/header.php"; ?>

<div class="container justify-content-center">
    <div class="row justify-content-center text-center mt-2">
        <a href="/app/tables/admin/menu/menu.php" class=" btn col-2">← Обратно</a>
    </div>
    <div class="row justify-content-center p-2">
        <div class="card col-8 text-center" style="width: 23rem;">
            <img src="/upload/<?= $product->image ?>" width="100" height="240" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?= $product->name ?></h5>
                <p class="card-text"><?= $product->description ?></p>
                <p class="card-text">Вес и цена:</p>
                <?php foreach (Product::weightAndPrice($product->id) as $res) : ?>
                    <p><?= $res->weight . " ml - " . $res->weightPrice ?> ₽</p>
                <?php endforeach; ?>
                <button type="button" class="btn btn-primary openWindow" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Изменить описание
                </button>
            </div>
        </div>

        <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog justify-content-center">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Описание</h1>
                        <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/app/tables/admin/menu/description.php" method="post">
                        <div class="modal-body justify-content-center">
                            <input type="hidden" name="id" value="<?= $product->id ?>">
                            <textarea name="description" id="" cols="55" rows="10"><?= $product->description ?></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="updt" class="btn btn-primary">Сохранить</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="/assets/js/modal.js"></script>

<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/templatesAdmin/footer.php"; ?>