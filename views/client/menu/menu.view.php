<?php

use App\models\Product;

include $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php"; ?>

<?php if (!isset($_SESSION["auth"]) || empty($_SESSION["auth"])) : ?>
    <div class="infoMenu">
        <h5>ВЫ НЕ ВОШЛИ В АККАУНТ</h5>
        <a href="/app/tables/client/user/auth.php" class="btn">ВОЙТИ</a>
    </div>
    <div class="container staffCont">

        <div class="row mt-5 g-5 mb-3 btnStaff">
            <a href="/app/tables/client/menu/menu.php?category=2" class="btn col-3 barmen" name="barmen">Напитки <img src="/upload/drink.png" width="50" height="50" alt="barmen"></a>
            <a href="/app/tables/client/menu/menu.php?category=1" class=" btn col-3 shef" name="shef">Закуски <img src="/upload/snack.png" width="50" height="50" alt="shef"></a>
        </div>

        <div class="row mt-3 mb-3">
            <?php foreach ($products as $product) : ?>
                <section class="lights mt-3 mb-3 col-12">
                    <div class="">

                        <article class="postcard lights blue">
                            <a class="postcard__img_link" href="#">
                                <img class="postcard__img" src="/upload/<?= $product->image ?>" alt="Image Title" />
                            </a>
                            <div class="postcard__text">
                                <h1 class="postcard__title blue"><a href="#"><?= $product->name ?></a></h1>
                                <div class="postcard__subtitle small">
                                    <i class="fas mr-2"></i><?= $product->category ?>
                                </div>
                                <div class="postcard__bar"></div>
                                <div class="postcard__preview-txt"><?= $product->description ?></div>
                                <ul class="postcard__tagbox">
                                    <form action="/app/tables/client/menu/menuAdd.php" method="GET">
                                        <?php foreach (Product::pricesByProduct($product->id) as $price) : ?>
                                            <input type="hidden" name="id" value="<?= $product->id ?>">
                                            <input type="radio" class="weight" checked name="weight-<?= $product->id ?>" id="<?= $product->id ?>-<?= $price->weight ?>" value="<?= $price->weight_id ?>">
                                            <label class="p-2 weightLabel btn mt-2" for="<?= $product->id ?>-<?= $price->weight ?>">
                                                <?= $price->weight ?>ml - <?= $price->price ?>₽
                                            </label>
                                            </input>
                                        <?php endforeach ?>
                                </ul>
                                </form>
                            </div>
                        </article>
                    </div>
                </section>
            <?php endforeach ?>
        </div>
    </div>
<?php elseif ($table == false) : ?>
    <div class="infoMenu">
        <h5>СТОЛ НЕ ЗАБРОНИРОВАН</h5>
        <a href="/app/tables/client/book/book.php" class="btn">ЗАБРОНИРОВАТЬ</a>
    </div>
    <div class="container staffCont">

        <div class="row mt-3 mb-3 g-7 btnStaff">
            <a href="/app/tables/client/menu/menu.php?category=2" class="btn col-3 barmen" name="barmen">Напитки <img src="/upload/drink.png" width="50" height="50" alt="barmen"></a>
            <a href="/app/tables/client/menu/menu.php?category=1" class=" btn col-3 shef" name="shef">Закуски <img src="/upload/snack.png" width="50" height="50" alt="shef"></a>
        </div>

        <div class="row mt-3 mb3">
            <?php foreach ($products as $product) : ?>
                <section class="lights mt-3 mb-3 col-12">
                    <div class="">

                        <article class="postcard lights blue">
                            <a class="postcard__img_link" href="#">
                                <img class="postcard__img" src="/upload/<?= $product->image ?>" alt="Image Title" />
                            </a>
                            <div class="postcard__text">
                                <h1 class="postcard__title blue"><a href="#"><?= $product->name ?></a></h1>
                                <div class="postcard__subtitle small">
                                    <i class="fas mr-2"></i><?= $product->category ?>
                                </div>
                                <div class="postcard__bar"></div>
                                <div class="postcard__preview-txt"><?= $product->description ?></div>
                                <ul class="postcard__tagbox">
                                    <form action="/app/tables/client/menu/menuAdd.php" method="GET">
                                        <?php foreach (Product::pricesByProduct($product->id) as $price) : ?>
                                            <input type="hidden" name="id" value="<?= $product->id ?>">
                                            <input type="radio" class="weight" checked name="weight-<?= $product->id ?>" id="<?= $product->id ?>-<?= $price->weight ?>" value="<?= $price->weight_id ?>">
                                            <label class="p-2 weightLabel mt-2 btn" for="<?= $product->id ?>-<?= $price->weight ?>">
                                                <?= $price->weight ?>ml - <?= $price->price ?>₽
                                            </label>
                                            </input>
                                        <?php endforeach ?>
                                </ul>
                                </form>
                            </div>
                        </article>
                    </div>
                </section>
            <?php endforeach ?>
        </div>
    </div>
<?php else : ?>
    <div class="infoMenu">
        <h5>СТОЛ № <?= $table->number ?></h5>
        <p>НА <?= date_create($table->date)->Format('d.m.Y') ?> <?= $table->time ?></p>
        <p>В бронировании:</p>
        <?php foreach ($prods as $prod) : ?>
            <p><?= $prod->name . '(' . $prod->value . ' ml)' ?> - <?= $prod->count ?>шт.</p>
        <?php endforeach ?>
        <a href="/app/tables/client/book/book.php" class="btn">ЗАБРОНИРОВАТЬ ЕЩЕ</a>
    </div>

    <div class="container staffCont">

        <div class="row mt-3 mb-3 g-7 btnStaff">
            <a href="/app/tables/client/menu/menu.php?category=2" class="btn col-3 barmen" name="barmen">Напитки <img src="/upload/drink.png" width="50" height="50" alt="barmen"></a>
            <a href="/app/tables/client/menu/menu.php?category=1" class=" btn col-3 shef" name="shef">Закуски <img src="/upload/snack.png" width="50" height="50" alt="shef"></a>
        </div>

        <div class="row mt-3 mb3">
            <?php foreach ($products as $product) : ?>
                <section class="lights mt-3 mb-3 col-12">
                    <div class="">

                        <article class="postcard lights blue">
                            <a class="postcard__img_link" href="#">
                                <img class="postcard__img" src="/upload/<?= $product->image ?>" alt="Image Title" />
                            </a>
                            <div class="postcard__text">
                                <h1 class="postcard__title blue"><a href="#"><?= $product->name ?></a></h1>
                                <div class="postcard__subtitle small">
                                    <i class="fas mr-2"></i><?= $product->category ?>
                                </div>
                                <div class="postcard__bar"></div>
                                <div class="postcard__preview-txt"><?= $product->description ?></div>
                                <ul class="postcard__tagbox">
                                    <form action="/app/tables/client/menu/menuAdd.php" method="GET">
                                        <?php foreach (Product::pricesByProduct($product->id) as $price) : ?>
                                            <input type="hidden" name="id" value="<?= $product->id ?>">
                                            <input type="radio" class="weight" checked name="weight-<?= $product->id ?>" id="<?= $product->id ?>-<?= $price->weight ?>" value="<?= $price->weight_id ?>">
                                            <label class="p-2 weightLabel mt-2 btn" for="<?= $product->id ?>-<?= $price->weight ?>">
                                                <?= $price->weight ?>ml - <?= $price->price ?>₽
                                            </label>
                                            </input>
                                        <?php endforeach ?>
                                </ul>
                                <ul class="postcard__tagbox">
                                    <button name="btnAdd" class="btn btnAdd">ДОБАВИТЬ К БРОНИРОВАНИЮ</button>
                                    </li>
                                </ul>
                                </form>
                            </div>
                        </article>
                    </div>
                </section>
            <?php endforeach ?>
        </div>
    </div>
<?php endif; ?>






<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php"; ?>