<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php"; ?>


<div class="container justify-content-center">
    <div class="row row-cols-1 row-cols-md-3 g-4 mb-3 justify-content-center cardBook">
        <?php foreach ($tables as $table) : ?>
            <div class="col-md-4 col-s-12">
                <div class="card text-center ">
                    <img src="/upload/<?= $table->image ?>" width="70" height="50" class="mt-2" alt="...">
                    <div class="card-body mt-4">
                        <h5 class="card-title">Стол №<?= $table->number ?></h5>
                        <p class="card-text">Кол-во мест: <?= $table->count_seats ?></p>
                        <a href="/app/tables/client/book/arrange.php?id=<?= $table->id ?>" class="btn mt-4 book">ЗАБРОНИРОВАТЬ</a>

                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>



<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php"; ?>