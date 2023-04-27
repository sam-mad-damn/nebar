<?php

use App\models\Product;

include $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php"; ?>

<div class="conteiner products-basket">
    <div class="col-12 text-center mb-3">
        <h4 class="totalPrice"><?= Product::totalPrice($_GET['id']) != 0 ? "Итог: " . $totalPrice . ' ₽' : " Заказ пустой" ?></h4>
        <h4 class="totalCount"><?= Product::totalCount($_GET['id']) != 0 ? "Итоговое кол-во:" . $totalCount . ' шт' : "" ?></h4>
        <button class="clear btn ">Очистить заказ</button>
    </div>
    <?php foreach ($products as $item) : ?>
        <div class="row d-flex justify-content-center align-items-center h-100 basket-position" style="--bs-gutter-x: 0rem;">
            <div class="col-10">
                <div class="card rounded-3 mb-4">
                    <div class="card-body p-4">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="col-md-2 col-lg-2 col-xl-2">
                                <img src="/upload/<?= $item->image ?>" width="150" height="150" style="object-fit: cover; margin-right:25px" class="img-fluid rounded-3" alt="<?= $item->name ?>">
                            </div>
                            <div class="col-md-3 col-lg-3 col-xl-3">
                                <p class="lead fw-normal mb-2"><?= $item->name ?></p>
                                <span class="text-muted price" id="pr-<?= $item->id ?>" data-price="<?= $item->price ?>"><?= $item->price ?>₽/шт.</span>
                                <span class="text-muted value" id="val-<?= $item->id ?>" data-value="<?= $item->value ?>"><?= $item->value ?>ml</span>
                            </div>
                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                <button class="btn px-2 minus" data-product-id="<?= $item->product_id ?>" data-weight-id="<?= $item->weight_id?>">-</button>

                                <p id="count-<?= $item->product_id ?>-<?= $item->weight_id?>" class="form-control form-control-sm" data-count="<?= $item->count ?>"><?= $item->count ?></p>

                                <button class="btn px-2 plus" data-product-id="<?= $item->product_id?>" data-weight-id="<?= $item->weight_id?>">+</button>
                            </div>
                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                <h5 class="mb-0 total" data-price-position="<?= $item->product_id?>-<?= $item->weight_id?>"><?= $item->price_position ?>₽</h5>
                            </div>
                            <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                <button class="trash btn btn-danger" data-product-id="<?= $item->product_id ?>" data-weight-id="<?= $item->weight_id?>">X</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>

<script src="/assets/js/fetch.js"></script>
<script src="/assets/js/loadBasket.js"></script>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php"; ?>