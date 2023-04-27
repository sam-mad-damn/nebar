<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php"; ?>

<div class="container-fluid">

    <main class="main row justify-content-center">
        <img class=" col-4 main__img " src="/upload/chicksa.png" alt="">
        <div class="col-8 row-cols-s-12  d-flex flex-column text-center justify-content-center pt-4 pt-lg-0  site order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
            <h1 class="main__text">Бар НеБар в центре Челябинска</h1>
            <h2 class="main__text__ mt-3">Комфортный бар для своего времяпрепровождения</h2>
            <br><br> <br><br> <br> <br> <br>
            <a href="/app/tables/client/book/book.php" class="col-3 mx-auto btn-circle main__book">
                    <h5>ЗАБРОНИРОВАТЬ</h5> <img src="/upload/столы.png" alt="">
                </a>
        </div>
    </main>

    <div class="row cardss justify-content-center ">

        <!-- start advantage -->
        <h3 class="col-12 text-center mt-5 strong">ПРЕИМУЩЕСТВА</h3>
        <div class="row row-cols-1 row-cols-s-4 row-cols-md-4 row-cols-sm-2   g-3 mt-0 mb-5 text-center justify-content-center">
            <?php foreach ($advantages as $advantage) : ?>
                <div class="col ">
                    <div class="card h-100" style="background-color: <?= $advantage->color_card ?>; color:white;">
                        <div class="card-body">
                            <h5 class="card-title"><?= $advantage->text ?></h5>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>

        </div>
    </div>
    <!-- end advantage -->

    <!-- start card -->
    <div class="text text-center justify-content-center">
        <h3 class="mt-5 text">Рекомендуем попробовать</h3>
    </div>
    <div class="productCard justify-content-center mt-5">

        <!-- <div class="row"> -->
        <div class=" prds q">
            <div class="w-40">
                <img src="/upload/<?= $product->image ?>" class=" d-block" width="300" height="200" alt="крутая картинка да">
            </div>
            <div>
                <h4><?= $product->name ?></h4>
                <p><?= $product->description ?></p>
                <a href="/app/tables/client/menu/menu.php">Просмотреть еще</a>
            </div>


        </div>


        <div class="prd w">
            <div>
                <h4>Ассорти из сыров</h4>
                <a href="/app/tables/client/menu/menu.php">Просмотреть еще</a>
            </div>
            <div class="w-40">
                <img src="/upload/assortichees.png" height="150" alt="крутая картинка да">
            </div>

        </div>
        <div class=" prd e">
            <div>
                <h4>Салат с баклажанами </h4>
                <a href="/app/tables/client/menu/menu.php">Просмотреть еще</a>
            </div>
            <div class="w-40">
                <img src="/upload/backlan.png" height="130" alt="крутая картинка да">
            </div>
        </div>

        <div class=" prd r">
            <div>
                <h4>Цезарь с курицей</h4>
                <a href="/app/tables/client/menu/menu.php">Просмотреть еще</a>
            </div>
            <div class="w-40">
                <img src="/upload/cezar.png" height="150" alt="крутая картинка да">
            </div>

        </div>
        <div class=" prd t">

            <div>
                <h4>Голубая лагуна</h4>

                <a href="/app/tables/client/menu/menu.php">Просмотреть еще</a>
            </div>
            <div class="w-40">
                <img src="/upload/laguna.png" height="150" alt="крутая картинка да">
            </div>
        </div>

    </div>
    <!-- end card -->

    <!-- start btn -->
    <div class="container-fluid mt-5 btnGl">
        <a class="btnBook btn" href="/app/tables/client/book/book.php">ЗАБРОНИРОВАТЬ <img class="icon" src="/upload/столы.png" alt=""></a>
        <img class="sign" src="/upload/sign.png" alt="sign">
        <a class="btnMenu btn" href="/app/tables/client/menu/menu.php?category=2">МЕНЮ БАРА <img class="icon" src="/upload/menu.png" alt=""></a>
    </div>
    <!-- end btn -->

    <div class="cart justify-content-center mt-5 mb-5">
        <h3>МЫ НАХОДИМСЯ</h3>
        <iframe src="https://yandex.ru/map-widget/v1/?from=mapframe&ll=61.400236%2C55.163960&mode=whatshere&tab=inside&whatshere%5Bpoint%5D=61.400236%2C55.163960&whatshere%5Bzoom%5D=17&z=16" width="560" height="400" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe>
        <h3 class="leg mt-2">УЛ. КИРОВА, 100</h3>
    </div>

</div>

<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php"; ?>